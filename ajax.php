<?php
	include "include/koneksi.php";
	include "include/fungsi.php";
	
	// Menampilkan info catalog
		
		$value = $_GET['id'];
		$syarat = $_GET['syarat'];
		
		if($syarat == 1)	// Info catalog pada index.php (client)
		{
			// Mengetahui jumlah seluruh barang
			$totalItem = jumlah($value, 'jenis', 'none');
			$itemPerPage = 3;
			$offset = $_GET['offset'];
			
			$queryGambar = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis 
						JOIN merek ON barang.id_merek = merek.id_merek WHERE barang.id_jenis = '$value' ORDER BY id_barang LIMIT $itemPerPage OFFSET $offset";
			$exe2 = mysql_query($queryGambar);
			
			while($hasilGambar = mysql_fetch_array($exe2))
			{	
				echo "<img src='$hasilGambar[path]'/><br>";
				echo "Nama : $hasilGambar[nama_barang]<br>" . "Jenis : $hasilGambar[nama_jenis]<br>" . "Merek : $hasilGambar[nama_merek]<br>"
					  . "Deskripsi : $hasilGambar[deskripsi]<br>" . "Harga : $hasilGambar[harga]<br>";
			}
			
			// Menampilkan page (angka dibawah)
			$page = ceil($totalItem/$itemPerPage);
			bottomNav($page, $value);
			
		}
		else if($syarat == 2)
		{
			echo "Berhasil!";
		}
		
?>