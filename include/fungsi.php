<?php
	/*=================================================================================================
	*File kumpulan fungsi reusable dalam project.
	*Fungsi dapat digunakan sebagai beragam jenis (tergantung mode)
	===================================================================================================*/

	// Bagian untuk mengetahui jumlah barang dengan id_* tertentu
	function jumlah($merek, $kolom, $mode)		//$merek = identifier, $kolom = nama kolom, $mode = none -> tampil, insert -> tambah (untuk upload)
	{
		$sql_select = "SELECT * FROM barang WHERE id_$kolom = '$merek'";
		if($merek === "all")		// Untuk penampilan default
		{
			$sql_select = "SELECT * FROM barang";
		}

		if($mode === "insert")	// Jika digunakan pada upload
		{
			$jumlahStok = 1;
		}
		else
		{
			$jumlahStok = 0;
		}

		$exe = mysql_query($sql_select);
		while(mysql_fetch_array($exe))
		{
			$jumlahStok++;
		}
		return $jumlahStok;
	}


	// Fungsi untuk melihat semua daftar barang pada tabel
	function lihatSemuaBarang($mode)		// $mode = tampil -> cuma lihat (statsitik), none -> ada aksinya (manage)
	{
		$itemPerPage = 25;
		$offset = 0;

		echo "
		<table border=1px>
			<thead>
				<th>No</th>
				<th>Id Barang</th>
				<th>Nama</th>
				<th>Jenis</th>
				<th>Merek</th>
				<th>Deskripsi</th>
				<th>Gambar</th>
				<th>Harga</th>";

				if($mode === "tampil")
				{
					// Do nothing
				}
				else if($mode === "manage")
				{
					echo "<th>Aksi</th>";
				}

				echo "</thead>";
				$queryBarang = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis
												Join merek ON barang.id_merek = merek.id_merek ORDER BY barang.id_barang
											 	LIMIT $itemPerPage OFFSET $offset";
				$no = 1;
				$exeBarang = mysql_query($queryBarang);
				while($hasilBarang = mysql_fetch_array($exeBarang))
				{
					echo "
							<tr>
								<td>$no</td>
								<td class='idBarang $no'>$hasilBarang[id_barang]</td>
								<td>$hasilBarang[nama_barang]</td>
								<td>$hasilBarang[nama_jenis]</td>
								<td>$hasilBarang[nama_merek]</td>
								<td>$hasilBarang[deskripsi]</td>
								<td><img src='../$hasilBarang[path]' width=50px></td>
								<td>$hasilBarang[harga]</td>";

								if($mode === "tampil")
								{
									// Do nothing
								}
								else if($mode === "manage")
								{
									echo "<td>
											<a href='../admin/hapus.php?kode=$hasilBarang[id_barang]&syarat=2' class='hapus'>Hapus</a> |
											<a href='../admin/upload.php?id=$hasilBarang[id_barang]&syarat=edit' class='edit'>Edit</a>
										 </td>";

								}

							echo "</tr>
						 ";
					$no++;
				}
		echo "</table>";
		$page = ceil($no/$itemPerPage);
		bottomNav($page, "all", $itemPerPage);		// Masih bug
	}

	// Fungsi bottom nav (untuk menu navigasi pada catalog index.php)
	function bottomNav($page, $id, $itemPerPage)
	{
		$offsetnya = 0;
		for($i = 1; $i <= $page; $i++)
		{
			echo "<a class='a' href='ajax.php?id=$id&syarat=1&offset=$offsetnya'>" . $i . "</a> ";
			$offsetnya += $itemPerPage;	// Ganti untuk ganti range offset
		}
	}
?>
