<?php
$news_pic_path = "/Project/uploads/images/admin/";
require_once 'Class/jdf.php';
require_once 'commands.php';
?>
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<?php
include 'header.php';
?>
</nav>
<div class="container-fluid">
	<?php
include 'right_menu.php';
?>
	<div class="col-sm-6">
		<?php if (isset($_SESSION['username'])): ?>
		<div class="alert alert-success alert-dismissible" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<strong> کاربر
			<?php echo $_SESSION['username']; ?>
			خوش آمدید</strong>  هم اکنون ساعت		<?php
date_default_timezone_set("Asia/Tehran");
echo date("h:i:sa") . " ";
?>
			میباشد
		</div>
		<?php endif?>
		<!-- news content -->

		<?php
if (isset($_REQUEST['id'])) {
	include 'single.php';
} elseif (isset($_REQUEST['category'])) {
	$category = $_REQUEST['category'];
	$select_news = "SELECT `id`,`title` , `main` , `date_added`,`uniqe_image_path` ,`category_id` FROM news WHERE `position`='1' AND `category_id`='$category' order by id DESC";
	mysqli_set_charset($connecion, "utf8");
	$result = $connecion->query($select_news);
	if ($result->num_rows > 0) {
		while ($row = $result->fetch_assoc()) {
			$id = $row["id"];
			?>
		<div class="row">
			<article class="col-xs-12">
				<img src=<?php echo "$news_pic_path" . $row["uniqe_image_path"]; ?> class="img-circle" alt="Bird">
				<h4>
				<a href='index.php?id=<?php echo "$id"; ?>'><?php echo $row["title"]; ?></a></li>
				<ul class="list-inline">
					</h4>
					<p><?php
$text = $row["main"];
			$text = preg_replace("'<script[^>]*>.*?</script>'si", '', $text);
			$text = preg_replace('/<!--.+?-->/', '', $text);
			$text = preg_replace('/{.+?}/', '', $text);
			$text = preg_replace('/&nbsp;/', ' ', $text);
			$text = preg_replace('/&amp;/', ' ', $text);
			$text = preg_replace('/&quot;/', ' ', $text);
			$text = preg_replace('/nbsp;/', ' ', $text);
			$text = preg_replace('/zwnj;/', ' ', $text);
			$text = preg_replace('/&lt;/', ' ', $text);
			$text = preg_replace('/&gt;/', ' ', $text);
			$text = preg_replace('/p;/', ' ', $text);
			$text = strip_tags($text);
			$text1 = substr($text, 0, 1700);
			echo "$text1";
			?>
					</p>
					<li><a href='index.php?id=<?php echo "$id"; ?>'>ادامه خبر</a></li>
					<ul class="list-inline">
						<li> تاریخ ارسال خبر :<?php $date = gmdate("Y-m-d", $row['date_added']);
			echo jdate("Y/m/d", strtotime($date));
			?></li>
					</ul>
				</article>
			</div>
			<?php
}
	}
} else {
	include 'all_news.php';
}
?>
		</div>
		<?php
include 'left_menu.php';
?>
		</div><!--/container-fluid-->
		<?php
include 'footer.php';
?>