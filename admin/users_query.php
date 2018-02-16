<?php
include_once '../config/config.php';

$type = $_REQUEST['type'];

switch ($type) {
case 'showallusers':
	$select_users = "SELECT * FROM users";
	$result = $connecion->query($select_users);
	$i = 0;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$responce->rows[$i]['id'] = $row["id"];
		$responce->rows[$i]['username'] = $row["username"];
		$responce->rows[$i]['password'] = $row["password"];
		$responce->rows[$i]['make_date'] = $row["make_date"];
		$responce->rows[$i]['role'] = $row["role"];
		$i++;
	}
	echo json_encode($responce);
	break;
case 'editeusers':
	$select_users = "SELECT * FROM users";
	$result = $connecion->query($select_users);
	$i = 0;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$responce->rows[$i]['id'] = $row["id"];
		$responce->rows[$i]['username'] = $row["username"];
		$responce->rows[$i]['password'] = $row["password"];
		$responce->rows[$i]['make_date'] = $row["make_date"];
		$responce->rows[$i]['role'] = $row["role"];
		$i++;
	}
	echo json_encode($responce);
	break;
default:
	# code...
	break;
}

?>