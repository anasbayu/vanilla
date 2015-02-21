<?php
	session_start();
	
	include "../include/koneksi.php";
	// error_reporting(0);

	$username = $_POST['username'];
	$password = $_POST['password'];

	$get_id = mysql_query("SELECT * FROM login WHERE username = '$username' AND password = '$password'");
	$data = mysql_fetch_array($get_id);
	$jumlah = mysql_num_rows($get_id);

	if ($jumlah > 0) 
	{
		$_SESSION['username'] = $username;
		header("location:dashboard.php");
	} 
	else 
	{
		header("location:../notification.php?notif=6");
	}
?>