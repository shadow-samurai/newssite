<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once '../config/config.php';
if (isset($_REQUEST['type']) && $_REQUEST['type'] == "insert") {

	$site_name = $_REQUEST['site_name'];
	$insert_master_query = "INSERT INTO  master (`site_name`) VALUES ('$site_name')";
	mysqli_set_charset($connecion, "utf8");

	if ($connecion->query($insert_master_query) === TRUE) {
		header('Location: index.php?show=master');
	} else {
		echo "Error: " . $insert_master_query . "<br>" . $connecion->error;
	}
} else {
	# code...
}

?>