<?php
	$host = "localhost";
	$user = "root";
	$pwd = "";
	$db = "vanilla";
	
	$konek = mysql_connect($host, $user, $pwd) or die("gagal koneksi karena " . mysql_error);
	mysql_select_db($db, $konek);
?>
