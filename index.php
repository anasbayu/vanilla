<?php
	include "include/koneksi.php";
?>

<form method="post" action="index.php">
	<select name="jenisBarang" onchange="send(this.value)">
		<option value="">Jenis</option>
		<?php
			$query = "SELECT * FROM jenis";
			$exe = mysql_query($query);
			
			while($hasil = mysql_fetch_array($exe))
			{
				echo "<option value=$hasil[0]>$hasil[1]</option>";
			}
		?>
	</select>
	
	<!--
	<select name="merekBarang">
		<option>Merek</option>
		<?php
			/* BELUM
			
			$query = "SELECT * FROM merek WHERE id_merek = '$jenisTerpilih'";
			$exe = mysql_query($query);
			
			while($hasil = mysql_fetch_array($exe))
			{
				echo "<option value=$hasil[0]>$hasil[1]</option>";
			}*/
		?>
	</select>
	-->
</form>

<div id="catalog">	
	<?php
		// Menampilkan info catalog
		
		$value = $_POST['jenisBarang'];
		$queryGambar = "SELECT * FROM barang JOIN jenis ON barang.id_jenis = jenis.id_jenis 
						JOIN merek ON barang.id_merek = merek.id_merek WHERE barang.id_jenis = '$value'";
		$exe2 = mysql_query($queryGambar);
		
		while($hasilGambar = mysql_fetch_array($exe2))
		{	
			echo "<img src='$hasilGambar[path]'/><br>";
			echo "Nama : $hasilGambar[nama_barang]<br>" . "Jenis : $hasilGambar[nama_jenis]<br>" . "Merek : $hasilGambar[nama_merek]<br>"
				  . "Stok : $hasilGambar[stok]<br>" . "Deskripsi : $hasilGambar[deskripsi]<br>" 
				  . "<a href='admin/hapus.php?kode=$hasilGambar[id_barang]&syarat=2'>Hapus</a><br>";
		}
	?>
</div>
<div id="ajax">aaaaaa</div>	

<script src="js/jquery-2.1.3.min.js"></script>
<script>
	function send(val)
	{
		$('#ajax').load("ajax.php?id=" + val);
	}
</script>