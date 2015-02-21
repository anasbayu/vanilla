<?php
	include '../include/koneksi.php';
	
	$kodenya = $_GET['kode'];
	$syarat = $_GET['syarat'];
	$path; 					// Mnyimpan path file yang akan didelete (untuk tabel audio)
	$lokasi;				// Menyimpan lokasi untuk header
	$namaTabel;				// Menyimpan nama tabel
	
	if($syarat == 1)			// Hapus tabel comment
	{
		$namaTabel = "comment";
		$lokasi = "../notification.php?notif=2";
	}
	else if($syarat == 2)		// Hapus tabel barang
	{
		$query = "SELECT * FROM barang WHERE id_barang = '$kodenya'";
		$exe = mysql_query($query);
		$hasil = mysql_fetch_array($exe);
		$namaTabel = "barang";
		$lokasi = "../notification.php?notif=7";
		$path = addslashes($hasil['path']);
		unlink("../$path");
		echo "selamat";
		
		
		// Bagian untuk mengetahui jumlah barang dengan id_jenis tertentu		
		$sql_select = "SELECT * FROM barang WHERE id_jenis = '$hasil[1]'";
		$jumlahStok = -1;
		$exe = mysql_query($sql_select);
		while(mysql_fetch_array($exe))
		{
			$jumlahStok++;
		}
		
		// Perintah untuk mengupdate stok berdasar jumlah yang didapat sebelumnya
		$sql_update = "UPDATE jenis SET stok = '$jumlahStok' WHERE id_jenis = '$hasil[1]'";
		mysql_query($sql_update);
	}
	else						// Hapus tabel playlist
	{
		$namaTabel = "playlist";
		$lokasi = "music.php";
	}
	
	
	$query = "DELETE FROM $namaTabel WHERE id_$namaTabel = '$kodenya'";
	mysql_query($query);					
	header("location: $lokasi");		
?>