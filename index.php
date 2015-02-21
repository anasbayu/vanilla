<?php
	include "include/koneksi.php";
?>

<form method="post" action="index.php">
	<select name="jenisBarang" onchange="ajax(this.value)">
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
	
	<button type="submit">submit</button>
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
			echo "<img src='$hasilGambar[3]'/><br>";
			echo "Nama : $hasilGambar[2]<br>" . "Jenis : $hasilGambar[6]<br>" . "Merek : $hasilGambar[9]<br>" . "Stok : $hasilGambar[7]<br>"
				  . "<a href='admin/hapus.php?kode=$hasilGambar[0]&syarat=2'>Hapus</a><br>";
		}
	?>
</div>
<div id="catalog2">aaaaaa</div>	
	
<script>
	function ajax(str)
	{
		if(str="")
		{
			document.getElementById("catalog2").innerHTML = "BBBBBBBBBBBB";
			return;
		}
		
		var xhr = new XMLHttpRequest();
		xhr.onreadystatechange = function(){
			if(xhr.readystate === 4)
			{
				document.getElementById("catalog2").innerHTML = "adaw";
			}
		};
		xhr.open('GET', 'ajax.php?id=' + str, true);
		xhr.send();
		//document.getElementById("catalog2").innerHTML = "a";
	}
</script>