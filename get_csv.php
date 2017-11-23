<?php
require_once('config.php');

$center = $_GET['csv_table'];
if(!empty($_GET)) {
    $select = "SELECT * INTO OUTFILE '{$center}.csv' FIELDS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '\"' LINES TERMINATED BY '\n' FROM $center";
if(!mysqli_query($conn, $select)){
	echo 'error occured';
};
}