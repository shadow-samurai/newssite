<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once '../config/config.php';
if (isset($_REQUEST['type']) && $_REQUEST['type'] == "insert") {
	$name = $_REQUEST['onvan'];
	$username = $_REQUEST['username'];
	$user_added = $_SESSION['user_id'];
	$dest_image_path = "../uploads/images/" . $username . "/";

	if (is_dir($dest_image_path)) {
	} else {
		mkdir($dest_image_path, 777, true);
	}

	$file_uploaded = $_FILES["pic"]['tmp_name'];

	$main_path = $dest_image_path . "/" . $_FILES["pic"]['name'];
	move_uploaded_file($file_uploaded, $main_path);
	$pic_path = $_FILES["pic"]['name'];
	$insert_news_query = "INSERT INTO `category`(`name`,`uniqe_pic`,`user_added`) VALUES ('$name','$pic_path','$user_added')";
	mysqli_set_charset($connecion, "utf8");

	if ($connecion->query($insert_news_query) === TRUE) {
		header('Location: index.php?show=category');
	} else {
		echo "Error: " . $insert_news_query . "<br>" . $connecion->error;
	}

} else {
	# code...
}
?>

