<?php
include "include/functions.php";
include "include/header.php";

$projectDir = "/ProjectKu/vanilla";
$path = $_SERVER[REQUEST_URI];
printHeader(getUserState($projectDir, $path), $projectDir, $path);
?>
