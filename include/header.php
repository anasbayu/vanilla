<?php

function printLogo() {
	echo "
		<div class='grid-4 main-logo'>
			<img src='../gambar/brand5.png' alt='Logo'>
		</div>
	";
}

function printAdminHeader($projectDir, $path) {
	if ($path == $projectDir . "/admin/coba.php") {
		echo "Sukses";
	} else {
		echo "Gagal";
	}
}

function printHeader($userState, $projectDir, $path) {
	if ($userState == "admin") {
		printAdminHeader($projectDir, $path);
	} else {
		printClientHeader($projectDir, $path);
	}
}

?>
