<?php

function getUserState($projectDir, $path) {
	$userState = "";

	if (substr($path, strlen($projectDir), 6) == "/admin") {
		$userState =  "admin";
	} else {
		$userState =  "client";
	}

	return $userState;
}

?>
