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
	
	include "../include/koneksi.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vanilla Boutique | Dashboard</title>
	</head>
	<body>
		<h1>Dashboard</h1>
		selamat datang <?php echo "$_SESSION[username]";?><br>
		<a href="logout.php">Logout</a>
		<a href="upload.php">Upload</a>
		
		<?php
			if($_SESSION['level'] === "admin")
			{
				echo "<a href='manage.php'>Manaage</a>";
				include "../include/statistik.php";
			}
		?>
	</body>
</html>