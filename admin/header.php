<?php
header('Content-Type: text/html; charset=utf-8');
include_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="R.@">
        <meta name="keyword" content="News , nullbyte">
        <link rel="shortcut icon" href="img/favicon.html">
        <?php
$query_title = "SELECT * FROM master limit 1";
$result1 = $connecion->query($query_title);
while ($row1 = $result1->fetch_assoc()) {
	?>
        <title><?php echo $row1['site_name']; ?></title>
        <?php }?>
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">
        <script src="editor/ckeditor.js"></script>
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.jqGrid.min.js"></script>
        <script src="../js/jquery_pagination.js"></script>
        <script src="../js/grid.locale-en.js"></script>
        <link href="../css/ui.jqgrid.css" rel="stylesheet">
        <link href="../css/jquery-ui.css" rel="stylesheet">



        

    </head>
    <body>