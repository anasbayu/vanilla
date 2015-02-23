<?php
	include "include/koneksi.php";
	include "include/fungsi.php";
	
	// Menampilkan info catalog
		
		$value = $_GET['id'];
		$queryGambar = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis 
						JOIN merek ON barang.id_merek = merek.id_merek WHERE barang.id_jenis = '$value'";
		$exe2 = mysql_query($queryGambar);
		
		while($hasilGambar = mysql_fetch_array($exe2))
		{	
			echo "<img src='$hasilGambar[path]'/><br>";
			echo "Nama : $hasilGambar[nama_barang]<br>" . "Jenis : $hasilGambar[nama_jenis]<br>" . "Merek : $hasilGambar[nama_merek]<br>";
		}
	echo "uwaw";
?>