<?php
session_start();
include 'config/config.php';
if (isset($_REQUEST['type'])) {
	switch ($_REQUEST['type']) {
	case 'show_users':
		$select_users = "SELECT * FROM users";
		$result = $connecion->query($select_users);
		$i = 0;
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$responce->rows[$i]['id'] = $row["id"];
			$responce->rows[$i]['usrname'] = $row["username"];
			$responce->rows[$i]['password'] = $row["password"];
			$responce->rows[$i]['make_date'] = $row["make_date"];
			$responce->rows[$i]['role'] = $row["role"];
			$i++;
		}
		echo json_encode($responce);
		break;
	case 'add_user':
		$username = $_REQUEST['username'];
		$password = $_REQUEST['password'];
		$make_date = $_REQUEST['make_date'];
		$role = $_REQUEST['role'];
		$query = "INSERT INTO users values ('$username','$password','$make_date')";
		$connecion->query($query);
		if ($connecion->connect_error) {
			die("Connection failed: " . $connecion->connect_error);
		}
		echo "Connected successfully";
		break;
	case 'login':
		$captcha_main = $_SESSION["code"];
		$captcha_user = $_REQUEST["captcha"];
		if (isset($_REQUEST['username']) && isset($_REQUEST['password']) && $captcha_main == $captcha_user) {
			$username = $_REQUEST['username'];
			$password = $_REQUEST['password'];
			$query_login = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
			$result = $connecion->query($query_login);
			$count = mysqli_num_rows($result);
			if ($count == true) {
				// session_start();
				while ($obj = $result->fetch_object()) {
					$_SESSION['user_id'] = $obj->id;
					$_SESSION['username'] = $obj->username;
				}
				/* free result set */
				$result->close();
				header('Location: /Project/admin/index.php?show=main');
			} else {
				echo "username or password is wrong";
			}
		} else {
			echo "username or password or captcha is wrong !!!";
		}
		break;
	default:
		# code...
		break;
	}
}
?>