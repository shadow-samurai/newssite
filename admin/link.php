<?php
session_start();
include_once '../config/config.php';
// header('Content-Type: text/html; charset=utf-8');
// include_once '../config/config.php';
// if (isset($_REQUEST['type']) && $_REQUEST['type'] == "insert") {
		// 	$name = $_REQUEST['name'];
		// 	$address = $_REQUEST['address'];
		// 	$user_added = $_SESSION['user_id'];
		// 	$insert_news_query = "INSERT INTO `other_site`(`name`,`url`,`user_add`) VALUES ('$name','$address','$user_added')";
		// 	mysqli_set_charset($connecion, "utf8");
		// 	if ($connecion->query($insert_news_query) === TRUE) {
				// 		header('Location: index.php?show=category');
		// 	} else {
				// 		echo "Error: " . $insert_news_query . "<br>" . $connecion->error;
		// 	}
// } else {
		// 	# code...
// }
if (isset($_REQUEST['type'])) {
	$type = $_REQUEST['type'];
switch ($type) {
	case 'insert':
		$name = $_REQUEST['name'];
	$address = $_REQUEST['address'];
	$user_added = $_SESSION['user_id'];
	$insert_news_query = "INSERT INTO `other_site`(`name`,`url`,`user_add`) VALUES ('$name','$address','$user_added')";
	mysqli_set_charset($connecion, "utf8");
	if ($connecion->query($insert_news_query) === TRUE) {
		header('Location: index.php?show=category');
	} else {
		echo "Error: " . $insert_news_query . "<br>" . $connecion->error;
	}
	break;
	case 'show':
	$select_users = "SELECT * FROM other_site";
	$result = $connecion->query($select_users);
	$i = 0;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$responce->rows[$i]['id'] = $row["id"];
		$responce->rows[$i]['name'] = $row["name"];
		$responce->rows[$i]['url'] = $row["url"];
		$i++;
	}
	echo json_encode($responce);
	break;
		case 'update':
	$select_users = "SELECT * FROM other_site";
	$result = $connecion->query($select_users);
	$i = 0;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$responce->rows[$i]['id'] = $row["id"];
		$responce->rows[$i]['name'] = $row["name"];
		$responce->rows[$i]['url'] = $row["url"];
		$i++;
	}
	echo json_encode($responce);
	break;
	
	default:
		# code...
		break;
}
}
?>