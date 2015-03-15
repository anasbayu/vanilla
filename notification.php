<!DOCTYPE html>
<html>
	<head>
		<title>Vanilla Boutique | Notification</title>
	</head>

	<body>
		<?php
			$notif = $_GET['notif'];
			$sec = 2;
			$header = "";
			$pesan = "";

			if($notif == 1)	// Tambah Jenis
			{
				$lokasi = "admin/manage";
				$header = "<h2>Terimakasih</h2>";
				$pesan = "<h4>Jenis barang baru telah berhasil ditambahkan</h4>";
			}
			else if($notif == 2)	// Sukses Update data
			{
				$lokasi = "admin/manage";
				$header = "<h2>Selamat!</h2>";
				$pesan = "<h4>Telah berhasil mengupdate data.</h4>";
			}
			else if($notif == 3)	// Sukses upload
			{
				$lokasi = "admin/upload";
				$header = "<h2>Selamat!</h2>";
				$pesan = "<h4>barang berhasil diupload.</h4>";
			}
			else if($notif == 4)	// Gagal upload
			{
				$sec = 4;
				$lokasi = "admin/upload";
				$header = "<h2>Maaf</h2>";
				$pesan = "	<h4>Gagal!</h4>
							<h4>Beberapa solusi yang bisa anda coba :</h4>

							<h5><ul>
								<li>File musik harus memiliki format .png atau .jpg.</li>
								<li>File harus berukuran kurang dari 5mb.</li>
								<li>Nama file tidak boleh melebihi 50 karakter.</li>
								<li>File gambar dengan nama yang sama telah diupload sebelumnya.</li>
							</ul></h5>
						 ";
			}
			else if($notif == 5)	// Restricted acces saat mencoba masuk area admin tanpa login
			{
				$no = 3;
				$lokasi = "admin/index";
				$header = "<h2>STOP!</h2>";
				$pesan = "
							<h4>Anda tidak memiliki hak akses untuk memasuki laman ini. Silahkan melakukan login terlebih dahulu.</h4>
						 ";
			}
			else if($notif == 6)				// Gagal login (pass atau username salah)
			{
				$no = 3;
				$lokasi = "admin/index";
				$header = "<h2>Maaf</h2>";
				$pesan = "
							<h4>Password atau username yang anda masukkan salah, silahkan login kembali.</h4>
						 ";
			}
			else if($notif == 7)			// Berhasil hapus dari tabel barang (database)
			{
				$lokasi = "admin/dashboard";
				$header = "<h2>Selamat!</h2>";
				$pesan = "
							<h4>Barang telah berhasil dihapus dari database.</h4>
						 ";
			}
			else if($notif == 8)		// Tambah merek
			{
				$lokasi = "admin/manage";
				$header = "<h2>Terimakasih</h2>";
				$pesan = "<h4>Merek barang baru telah berhasil ditambahkan</h4>";
			}
			else if($notif == 9)
			{
				$lokasi = "admin/manage";
				$header = "<h2>Maaf</h2>";
				$pesan = "<h4>Gagal update data.</h4>";
			}
		?>
		<div class="box effect7">
			<?php
				echo $header;
				echo $pesan;
			?>

		</div>
		<meta http-equiv="refresh" content="<?php echo $sec;?>;url=<?php echo $lokasi;?>.php"/>
	</body>
</html>
