<?php
session_start();
include_once '../config/config.php';

$type = $_REQUEST['type'];

switch ($type) {
case 'role':
	$select_users = "SELECT * FROM role";
	$result = $connecion->query($select_users);
	$i = 0;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$responce->rows[$i]['id'] = $row["id"];
		$responce->rows[$i]['role_name'] = $row["role_name"];
		$responce->rows[$i]['role'] = $row["role"];
		$i++;
	}
	echo json_encode($responce);
	break;


	case 'insert':
	if (isset($_REQUEST['type']) && $_REQUEST['type'] == "insert") {
	// $select_roles = "SELECT * FROM role";
	// $result = $connecion->query($select_roles);
	// $i = 0;
	// while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	// 	$responce->rows[$i]['id'] = $row["id"];
	// 	$responce->rows[$i]['role_name'] = $row["role_name"];
	// 	$responce->rows[$i]['role'] = $row["role"];
	// 	$i++;
	// }
	// echo json_encode($responce);
					echo $role_name = $_REQUEST['role_name'];

		 foreach($_POST['check'] as $selected){
		 	$arrayName[] =$selected;
		 	var_dump($arrayName);

        }

			$role_selected  = implode(",", $arrayName);
        $insert_new_role = "INSERT INTO  role (`id`,`role_name`,`role`) VALUES (0,'$role_name','$role_selected')";
	mysqli_set_charset($connecion, "utf8");

	if ($connecion->query($insert_new_role) === TRUE) {
		// header('Location: index.php?show=role');
	} else {
		echo "Error: " . $insert_new_role . "<br>" . $connecion->error;
	}

} else {
	# code...
}


	break;




case 'editeusers':
	$select_users = "SELECT * FROM role";
	$result = $connecion->query($select_users);
	$i = 0;
	while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
		$responce->rows[$i]['id'] = $row["id"];
		$responce->rows[$i]['role_name'] = $row["role_name"];
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