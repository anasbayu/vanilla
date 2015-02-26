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
	include "../include/fungsi.php";
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Vanilla Boutique | Manage</title>
	</head>
	<body>
		<h1>Manage</h1>
		selamat datang <?php echo "$_SESSION[username]";?><br>
		<a href="logout.php">Logout</a>
		<a href="upload.php">Upload</a>
		
		<?php
			echo "<a href='manage.php'>Manaage</a>";
			lihatSemuaBarang('manage');
		?>
		
		<div id="editAjax">disini area edit</div>
	</body>
</html>