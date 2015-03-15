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
