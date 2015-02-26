<?php
	include "include/koneksi.php";
?>

<form method="post" action="index.php">
	<select name="jenisBarang" onchange="sendAjax(this.value, 0)">
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

<div id="ajax">Ajax disini nanti</div>	


<script src="js/jquery-2.1.3.min.js"></script>
<script>
	function sendAjax(val, offset)
	{
		$('#ajax').load("ajax.php?id=" + val + "&syarat=1&offset=" + offset);
	}
</script>