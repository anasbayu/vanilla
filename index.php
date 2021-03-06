<?php
	include "include/koneksi.php";
?>

<!doctype html>
<html>
	<head>
		<title>Vanilla Boutique | Home</title>
		<meta charset="utf-8" lang="id">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" type="text/css" href="css/normalize.css">
		<link rel="stylesheet" type="text/css" href="css/grid.css">
		<link rel="stylesheet" type="text/css" href="css/style.css">
	</head>
	<body>
		<select name="jenisBarang" onchange="sendAjax(this.value, 0, 1)">
			<option value="all">Jenis</option>
			<?php
				$query = "SELECT * FROM jenis";
				$exe = mysql_query($query);

				while($hasil = mysql_fetch_array($exe))
				{
					echo "<option value=$hasil[0]>$hasil[1]</option>";
				}
			?>
		</select>

		<select name="merekBarang" onchange="sendAjax(this.value, 0, 2)">
			<option value="all">Merek</option>
			<?php
				$query = "SELECT * FROM merek";
				$exe = mysql_query($query);

				while($hasil = mysql_fetch_array($exe))
				{
					echo "<option value=$hasil[0]>$hasil[1]</option>";
				}
			?>
		</select>

		<input type="text" id="searchInput" placeholder="Cari berdasar nama"/>
		<button onclick="search()">cari</button>

		<div class="grid-container main-content" id="ajax"></div>
	</body>
</html>

<script src="js/jquery-2.1.3.min.js"></script>
<script>
	function sendAjax(val, offset, syarat)
	{
		$('#ajax').load("ajax.php?id=" + val + "&syarat=" + syarat + "&offset=" + offset);
	}

	function search()
	{
		var text = $('#searchInput').val();
		$('#ajax').load("search.php?value=" + text);
	}
	sendAjax("all", 0, 1);	// Manggil saat dibuka halamanya.
</script>
