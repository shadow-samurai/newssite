<?php
header('Content-Type: text/html; charset=utf-8');
$localhost = "127.0.0.1";
$db_username = "root";
$db_password = "123";
$db_name = "Project";
$connecion = new mysqli($localhost, $db_username, $db_password, $db_name);
mysqli_set_charset($connecion, "utf8");
if ($connecion->connect_error) {
	die("Connection failed: " . $connecion->connect_error);
}
