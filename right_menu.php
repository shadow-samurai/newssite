<?php 
require_once 'commands.php';
?>
<div class="col-sm-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title"><span class="glyphicon glyphicon-random"></span> منوی اصلی</h1>
		</div>
		<div class="list-group">
			<a href="index.php" class="list-group-item">صفحه اصلی</a>
			<?php
$select_category = "SELECT `id`,`name` FROM category";
// mysqli_set_charset($connecion, "utf8");
$result_category = $connecion->query($select_category);
if ($result_category->num_rows > 0) {
	while ($category = $result_category->fetch_assoc()) {?>
			<a href="index.php?category=<?php echo $category["id"]; ?>" class="list-group-item"> <?php echo $category["name"]; ?> </a>
			<?php
}
}

?>
			<a href="admin/index.php?show=main" class="list-group-item">ورود به صفحه مدیریت</a>
		</div>
	</div>






	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title"><span class="glyphicon glyphicon-random"></span> سایت های مرتبط</h1>
		</div>
		<div class="list-group">
			<?php
$select_category = "SELECT `id`,`name`,`url` FROM other_site";
// mysqli_set_charset($connecion, "utf8");
$result_category = $connecion->query($select_category);
if ($result_category->num_rows > 0) {
	while ($other_site = $result_category->fetch_assoc()) {?>
			<a href="http://<?php echo $other_site["url"]; ?>" class="list-group-item"> <?php echo $other_site["name"]; ?> </a>
			<?php
}
}

?>
		</div>
	</div>












</div>





