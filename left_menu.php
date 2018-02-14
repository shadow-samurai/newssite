<?php
$connecion = mysqli_connect($localhost, $db_username, $db_password, $db_name);
if ($connecion->connect_error) {
	die("Connection failed: " . $connecion->connect_error);
}
?>
<div class="col-sm-3">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h1 class="panel-title"><span class="glyphicon glyphicon-cog"></span> اخبار تصویری </h1>
		</div>
		<div class="panel-body">
			<?php
$select_news_left = "SELECT `id`,`title` , `main` , `date_added` , `uniqe_image_path` FROM news WHERE `position`='2'";
mysqli_set_charset($connecion, "utf8");
$result_left = $connecion->query($select_news_left);
if ($result_left->num_rows > 0) {
	while ($row_left = $result_left->fetch_assoc()) {
		$id = $row_left["id"];
		?>
			<div class="row">
				<article class="col-xs-12">
					<img src=<?php echo "$news_pic_path" . $row_left["uniqe_image_path"]; ?> class="img-circle2" alt="Bird">
					<h5><?php echo $row_left["title"]; ?></h5>
					<li><a href='index.php?id=<?php echo "$id"; ?>'>ادامه خبر</a></li>
				</article>
			</div>
			<?php
}
} else {
	echo "0 results";
}
$connecion->close();
?>
		</div>
	</div>
</div>