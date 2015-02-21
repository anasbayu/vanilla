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
		<title>Vanilla Boutique | Dashboard</title>
	</head>
	<body>
		<label>Dashboard</label>
		<a href="logout.php">Logout</a>
		<a href="upload.php">Upload</a>
	</body>
</html>