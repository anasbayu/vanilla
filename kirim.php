<?php
	session_start();

	//error_reporting(0);
	include "include/koneksi.php";
	include "include/fungsi.php";

	//$kodenya = $_GET['kode'];
	$syarat = $_GET['syarat'];
	$syaratNotif;		// Menyimpan syarat untuk pesan notifikasi pada notification.php
	$lokasi;			// Menyimpan lokasi untuk header

	if($syarat == 1)			// Tambah jenis
	{
		$syaratNotif = 1;
		$lokasi = "notification";
		$id_jenis = $_POST['id_jenis'];
		$nama_jenis = addslashes($_POST['nama_jenis']);
		$stok = 0;

		$sql_masukin = "INSERT INTO jenis
						VALUES ('$id_jenis', '$nama_jenis', $stok)";
		mysql_query($sql_masukin) or die('Gagal'.mysql_error());
	}
	else if($syarat == 2)					// Tambah Merek
	{
		$syaratNotif = 8;
		$lokasi = "notification";
		$id_merek = $_POST['id_merek'];
		$nama_merek = addslashes($_POST['nama_merek']);
		$sql_masukin = "INSERT INTO merek
						VALUES ('$id_merek', '$nama_merek')";
		mysql_query($sql_masukin) or die('Gagal'.mysql_error());
	}
	else if($syarat == 3)				// Upload File
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
	else if($syarat == 4)				// Update data
	{
		$syaratNotif = 2;
		$lokasi = "notification";

		$id = $_POST['id_barang'];
		$namaBarang = addslashes($_POST['nama_barang']);
		$jenis = $_POST['jenis_barang'];
		$merek = $_POST['merek_barang'];
		$gambar = $_FILES['gambar'];
		$path = mysql_real_escape_string("gambar/" . $gambar["name"]);
		$deskripsi = addslashes($_POST['deskripsi']);
		$harga = addslashes($_POST['harga']);
		$pathLama = $_POST['pathLama'];

		// Jika tidak ganti gambar, path == yang lama.
		if($gambar["name"] == "")
		{
			$path = $pathLama;
		}

		$sql_masukin = "UPDATE barang SET id_jenis = '$jenis', nama_barang = '$namaBarang', id_merek = '$merek',
										deskripsi = '$deskripsi', harga = '$harga', path = '$path' WHERE id_barang = '$id'";

		if(isset($gambar))
		{
			// Jika ganti gambar, hapus gambar lama.
			if($pathLama != "gambar/" . $gambar["name"])
			{
				if(file_exists("gambar/" . $gambar["name"]))
				{
					echo "File sudah ada!";
					$syaratNotif = 9;
				}
				else
				{
					mysql_query($sql_masukin) or die('Gagal masukin '.mysql_error());	// Insert tabel barang
					unlink($pathLama);
					$allowed =  array('jpg', 'png', 'jpeg');			// Menyimpan extensi apa saja yang boleh disimpan
					$filename = $gambar['name'];
					$ext = pathinfo($filename, PATHINFO_EXTENSION);	// Mengecek extensi file

					if(in_array($ext,$allowed) && $gambar['size'] < 2097152) // 2097152 = 2mb
					{
						move_uploaded_file($gambar["tmp_name"], "gambar/" . $gambar["name"]);
					}
					else
					{
						$syaratNotif = 4;					// Gagal
						$lokasi = "notification";			// Nanti diganti ke alert
					}
				}
			}
		}
	}

	header("location:$lokasi.php?notif=$syaratNotif");
?>
