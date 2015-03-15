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
	//include "../include/fungsi.php";
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
		<a href="manage.php">Manage</a>

		<div id="manageArea"></div>

		<div id="editAjax">disini area edit</div>
		<div id="tambahMerek">disini area tambah merek</div>
		<div id="tambahJenis">disini area tambah jenis</div>

		<script src="../js/jquery-2.1.3.min.js"></script>
		<script src="../js/overlay.js"></script>
		<script>
			$('#manageArea').load('manageBarang.php');
			$(document).ready(function(){
				

				/*$('.hapus').click(function(event){
					event.preventDefault();
					var url = $(this).attr('href');
					$('#editAjax').load(url);
				});*/

				$('#tambahMerek').click(function(){
					$('#tambahMerek').load('tambahMerek.php');
				});

				$('#tambahJenis').click(function(){
					$('#tambahJenis').load('tambahJenis.php');
				});
			});
		</script>
	</body>
</html>
