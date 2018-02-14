<?php
session_start();
header('Content-Type: text/html; charset=utf-8');
include_once '../config/config.php';
if (isset($_REQUEST['type']) && $_REQUEST['type'] == "insert") {
	$username = $_SESSION['username'];
	$title = $_REQUEST['onvan'];
	$main = $_REQUEST['editor'];
	$main = htmlentities($main, ENT_QUOTES, "UTF-8");
	$main = $connecion->real_escape_string($main);
	$user_added = $_SESSION['user_id'];
	$date_added = time();
	$position = $_REQUEST['radio'];
	$dest_image_path = "../uploads/images/" . $username . "/";
	$category = $_REQUEST['category'];

	if (is_dir($dest_image_path)) {
	} else {
		mkdir($dest_image_path, 777, true);
	}

	$file_uploaded = $_FILES["news_pic"]['tmp_name'];
	$main_path = $dest_image_path . "/" . $_FILES["news_pic"]['name'];
	move_uploaded_file($file_uploaded, $main_path);
	$pic_path = $_FILES["news_pic"]['name'];
	$insert_news_query = "INSERT INTO  news (`title`,`main`,`user_added`,`date_added`,`position`,`uniqe_image_path`,`category_id`) VALUES ('$title','$main','$user_added','$date_added','$position','$pic_path','$category')";
	mysqli_set_charset($connecion, "utf8");

	if ($connecion->query($insert_news_query) === TRUE) {
		header('Location: index.php?show=news');
	} else {
		echo "Error: " . $insert_news_query . "<br>" . $connecion->error;
	}

} else {
	# code...
}
?>