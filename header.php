<?php
header('Content-Type: text/html; charset=utf-8');
include_once 'config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php
$query_title = "SELECT * FROM master limit 1";
$result1 = $connecion->query($query_title);
while ($row1 = $result1->fetch_assoc()) {
	?>
		<title><?php echo $row1['site_name']; ?></title>
		<!-- CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/custom.css" rel="stylesheet">
		<link href="css/jquery-ui.css" rel="stylesheet">
		<!-- jQuery -->
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container">
			<div  style="font-size: 25px;text-decoration-color: red">
				<?php echo $row1['site_name']; ?>
			</div>
		</div>
		<?php }?>