<?php
$host_name = 'localhost';
$db_name = 'cane_weight';
$hUsername = 'root';
$hPassword = '';
$con = mysqli_connect($host_name, $hUsername, $hPassword, $db_name);
if(!$con) {
    die('Server connection failed.');
}

$conn = mysqli_connect($host_name, $hUsername, $hPassword, 'cane_weight_to');
if(!$conn) {
  die('Server connection failed.');
}
	