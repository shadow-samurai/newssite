<?php
session_start();
include_once '../config/config.php';
if ($_REQUEST['file'] == "images") {
	$username = $_SESSION['username'];
	$dest_image_path = "../uploads/images/" . $username . "/";
	if (is_dir($dest_image_path)) {
	} else {
		mkdir($dest_image_path, 777, true);
	}
	$file_uploaded = $_FILES["pic"]['tmp_name'];
	$main_path = $dest_image_path . "/" . $_FILES["pic"]['name'];
	if (move_uploaded_file($file_uploaded, $main_path)) {
		$insert_image_query = "INSERT INTO  media (`user_upload_id`,`path`,`upload_date`,`type`) VALUES (1,'$main_path',45645,1)";
		if ($connecion->query($insert_image_query) === TRUE) {
			header('Location: index.php?show=images');
		} else {
			echo "Error: " . $insert_image_query . "<br>" . $connecion->error;
		}

	} else {
		echo $_FILES["pic"]["error"];
		echo "no";
	}
} else {
}
?>