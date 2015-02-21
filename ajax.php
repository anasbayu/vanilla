<?php
	include "include/koneksi.php";
	
	// Menampilkan info catalog
		
		$value = $_GET['id'];
		$queryGambar = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis 
						JOIN merek ON barang.id_merek = merek.id_merek WHERE barang.id_jenis = '$value'";
		$exe2 = mysql_query($queryGambar);
		
		while($hasilGambar = mysql_fetch_array($exe2))
		{	
			echo "<img src='$hasilGambar[3]'/><br>";
			echo "Nama : $hasilGambar[2]<br>" . "Jenis : $hasilGambar[6]<br>" . "Merek : $hasilGambar[9]<br>" . "Stok : $hasilGambar[7]<br>";
		}
	echo "uwaw";
?>