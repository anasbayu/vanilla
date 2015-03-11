<?php
	session_start();
	error_reporting(0);
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

			$header = "Upload";
			$anu = 3;

			// Buat value
			$valId = "";
			$valNama = "";
			$valDeskripsi = "";
			$valHarga = "";

			// Jika mengedit (admin)
			$syarat = $_GET['syarat'];
			if($syarat === "edit")
			{
				$id = $_GET['id'];
				$query = "SELECT * FROM barang WHERE id_barang = '$id'";
				$exe = mysql_query($query);
				$hasil = mysql_fetch_array($exe);

				$header = "Edit";
				$anu = "4&idLama=$id&path=$valId";

				$valId = $hasil['id_barang'];
				$valNama = $hasil['nama_barang'];
				$valDeskripsi = $hasil['deskripsi'];
				$valHarga = $hasil['harga'];
				$valPath = $hasil['path'];
			}
		?>
	</head>
	<body>
		<h2><?php echo $header ?></h2>
		<form method="post" action="../kirim.php?syarat=<?php echo $anu ?>" enctype="multipart/form-data">
			<input type="text" name="id_barang" id="id_barang" placeholder="id barang" maxlength="7" value="<?php echo $valId ?>" required/><br>
			<input type="text" name="nama_barang" id="nama_barang" placeholder="nama barang" maxlength="50" value="<?php echo $valNama ?>" required/><br>
			<!--JENIS BARANG-->
			<select name="jenis_barang">
				<option value="">Jenis barang</option>
				<?php
					$query = "SELECT * FROM jenis";
					$exe = mysql_query($query);

					while($hasilJenis = mysql_fetch_array($exe))
					{
						if($hasil['id_jenis'] === $hasilJenis['id_jenis'])
						{
							echo "<option value=$hasilJenis[0] selected=selected>$hasilJenis[1]</option>";
						}
						else
						{
							echo "<option value=$hasilJenis[0]>$hasilJenis[1]</option>";
						}
					}
				?>
			</select>
			<br>
			<!--MEREK BARANG-->
			<select name="merek_barang">
				<option value="">Merek barang</option>
				<?php
					$query = "SELECT * FROM merek";
					$exe = mysql_query($query);

					while($hasilMerek = mysql_fetch_array($exe))
					{
						if($hasil['id_merek'] === $hasilMerek['id_merek'])
						{
							echo "<option value=$hasilMerek[0] selected=selected>$hasilMerek[1]</option>";
						}
						else
						{
							echo "<option value=$hasilMerek[0]>$hasilMerek[1]</option>";
						}
					}
				?>
			</select><br>
			<input type="text" name="harga" id="harga" placeholder="harga barang" maxlength="10" value="<?php echo $valHarga ?>" required/><br>
			<textarea name="deskripsi" placeholder="deskripsi barang" maxlength="500" required><?php echo $valDeskripsi ?></textarea><br>
			<?php
				if($syarat === "edit")
				{
					echo "<img id='gambarShow' src=../" . $hasil[3] . " /><br>";
					echo "<div id='ganti'>ganti gambar</div>";
				}
					// Kalo $syarat == edit, nanti di hide sama jquery
					echo "<input class='file' type='file' name='gambar' id='gambar' required/><br>";
			?>
			<button type="submit" name="submit" id="submit"><?=$header ?></button>
		</form>
		<script src="../js/jquery-2.1.3.min.js"></script>
		<script>
			$('#gambar').hide(); // (BUG, Harusnya di delete)
			// Append input type= hidden dengan name='gambar'dan value='$valPath(tulisan gambar/ diilangin. jadi tinggal nama gambarnya aja)'

			$('#ganti').click(function(){
				$('#gambar').show();						// Show browse
				$('#gambarShow').hide(1000);		// Hide gambar thumbnail (preview)
			});
		</script>
	</body>
</html>
