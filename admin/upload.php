<?php
	session_start();
	if(isset($_SESSION['username']))
	{
		//Do nothing
	}
	else
	{
		header("location:../notification.php?notif=5");
	}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vanilla Boutique | Music</title>
		<?php
			include "../include/koneksi.php";
		?>
	</head>
	<body>
		<h2>Upload</h2>
		<form method="post" action="../kirim.php?syarat=3" enctype="multipart/form-data">
			<input type="text" name="id_barang" id="id_barang" placeholder="id barang" maxlength="7" required/><br>
			<input type="text" name="nama_barang" id="nama_barang" placeholder="nama barang" maxlength="50" required/><br>
			<!--JENIS BARANG-->
			<select name="jenis_barang">
				<option value="">Jenis barang</option>
				<?php
					$query = "SELECT * FROM jenis";
					$exe = mysql_query($query);
					
					while($hasil = mysql_fetch_array($exe))
					{
						echo "<option value=$hasil[0]>$hasil[1]</option>";
					}
				?>
			</select>
			
			<!--MEREK BARANG-->
			<select name="merek_barang">
				<option value="">Merek barang</option>
				<?php
					$query = "SELECT * FROM merek";
					$exe = mysql_query($query);
					
					while($hasil = mysql_fetch_array($exe))
					{
						echo "<option value=$hasil[0]>$hasil[1]</option>";
					}
				?>
			</select><br>
			<input class="file" type="file" name="gambar" id="gambar" required/><br>
			<button type="submit" name="submit" id="submit">Upload</button>
		</form>
	</body>
</html>