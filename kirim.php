<?php
	session_start();
	
	//error_reporting(0);
	include "include/koneksi.php";
	include "include/fungsi.php";
	
	$kodenya = $_GET['kode'];
	$syarat = $_GET['syarat'];	
	$syaratNotif;		// Menyimpan syarat untuk pesan notifikasi pada notification.php
	$lokasi;			// Menyimpan lokasi untuk header
	
	if($syarat == 1)			// Insert comment
	{	
		$syaratNotif = 1;
		$lokasi = "notification";
		$name = addslashes($_POST['name']);
		$email = $_POST['email'];
		$comment = addslashes($_POST['comment']);
		$subject = addslashes($_POST['subject']);
				
		$sql_masukin = "INSERT INTO comment 
						(name, email, subject, comment)
						VALUE ('$name','$email','$subject','$comment')";
		mysql_query($sql_masukin) or die('Gagal'.mysql_error());	
	}
	else if($syarat == 2)					// Insert playlist
	{
		$syaratNotif = 2;
		$lokasi = "admin/music";
		$query = mysql_query("SELECT * FROM audio WHERE id_audio = $kodenya") or die(mysql_error());
		$hasil = mysql_fetch_array($query);
		$judul = addslashes($hasil[1]);
		$penyanyi = addslashes($hasil[2]);
		$path = mysql_real_escape_string($hasil[3]);
		$sql_masukin = "INSERT INTO playlist 
						VALUES ('','$judul','$penyanyi','$path', '$hasil[0]')";
		mysql_query($sql_masukin) or die('Gagal'.mysql_error());
	}
	else				// Upload File
	{
		$syaratNotif = 3;
		$lokasi = "notification";
		
		$idBarang = addslashes($_POST['id_barang']);
		$namaBarang = addslashes($_POST['nama_barang']);
		$jenis = $_POST['jenis_barang'];
		$merek = $_POST['merek_barang'];
		$gambar = $_FILES['gambar'];
		$path = mysql_real_escape_string("gambar/" . $gambar["name"]);
		$deskripsi = addslashes($_POST['deskripsi']);
		$harga = addslashes($_POST['harga']);
		
		// Perintah untuk memasukkan data dari form ke database
		$sql_masukin = "INSERT INTO barang 
						VALUES ('$idBarang', '$jenis', '$namaBarang', '$path', '$merek', '$deskripsi', '$harga')";
		
		$jumlahStok = jumlah($jenis, 'jenis', 'insert');
		
		// Perintah untuk mengupdate stok berdasar jumlah yang didapat sebelumnya
		$sql_update = "UPDATE jenis SET stok = '$jumlahStok' WHERE id_jenis = '$jenis'";
		
		if(isset($gambar))
		{
			if(file_exists("gambar/" . $gambar["name"]))
			{
				echo "File sudah ada!";
				$syaratNotif = 4;	
			}
			else
			{
				$allowed =  array('jpg', 'png', 'jpeg');			// Menyimpan extensi apa saja yang boleh disimpan
				$filename = $gambar['name'];
				$ext = pathinfo($filename, PATHINFO_EXTENSION);	// Mengecek extensi file
				
				if(in_array($ext,$allowed) && $gambar['size'] < 2097152) // 2097152 = 2mb
				{
					move_uploaded_file($gambar["tmp_name"], "gambar/" . $gambar["name"]);
					//echo "disimpan di " . "gambar" . $gambar["name"];		
					mysql_query($sql_masukin) or die('Gagal masukin '.mysql_error());	// Insert tabel barang
					mysql_query($sql_update) or die('Gagal update '.mysql_error());		// Update tabel jenis
				}
				else
				{	
					$syaratNotif = 4;					// Gagal
					$lokasi = "notification";			// Nanti diganti ke alert
				}
			}
		}
	}
	header("location:$lokasi.php?notif=$syaratNotif");
	
			/*
			echo $_FILES["uploadMusic"]["name"] . "<br>";
			echo $_FILES["uploadMusic"]["size"] . "<br>";
			echo $_FILES["uploadMusic"]["type"] . "<br>";
			echo $_FILES["uploadMusic"]["tmp_name"] . "<br>";
			*/
?>