<?php
	/*=================================================================================================
	*File kumpulan fungsi reusable dalam project.
	*Fungsi dapat digunakan sebagai beragam jenis (tergantung mode)
	===================================================================================================*/

	// Bagian untuk mengetahui jumlah barang dengan id_* tertentu		
	function jumlah($merek, $kolom, $mode)		//$merek = identifier, $kolom = nama kolom, $mode = none -> tampil, insert -> tambah (untuk upload)
	{
		$sql_select = "SELECT * FROM barang WHERE id_$kolom = '$merek'";
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
				$queryBarang = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis Join merek ON barang.id_merek = merek.id_merek";
				$no = 1;
				$exeBarang = mysql_query($queryBarang);
				while($hasilBarang = mysql_fetch_array($exeBarang))
				{
					echo "
							<tr>
								<td>$no</td>
								<td>$hasilBarang[id_barang]</td>
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
											<a href='../admin/hapus.php?kode=$hasilBarang[id_barang]&syarat=2'>Hapus</a> | 
											<a href='../ajax.php?id=$hasilBarang[id_barang]&syarat=2'>Edit</a>
										 </td>";
									
								}
								
							echo "</tr>
						 ";
					$no++;
				}
		echo "</table>";
	}

	// Fungsi bottom nav (untuk menu navigasi pada catalog index.php)
	function bottomNav($page, $id)
	{
		$offsetnya = 0;
		for($i = 1; $i <= $page; $i++)
		{
			echo "<a href='ajax.php?id=$id&syarat=1&offset=$offsetnya'>" . $i . "</a> ";
			$offsetnya += 3;
		}
	}
?>