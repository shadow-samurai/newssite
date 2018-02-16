<?php
require_once 'Class/jdf.php';
require_once 'commands.php';
$id = $_REQUEST['id'];
$select_news1 = "SELECT `title` , `main` , `date_added`,`uniqe_image_path` FROM news WHERE `id`= '$id'";
mysqli_set_charset($connecion, "utf8");
$result1 = $connecion->query($select_news1);
while ($row1 = $result1->fetch_assoc()) {
	?>
<div class="row">
	<article class="col-xs-12">
		<img src=<?php echo "$news_pic_path" . $row1["uniqe_image_path"]; ?> class="img-circle" alt="Bird">
		<h4><?php echo $row1["title"]; ?></h4>
		<p><?php
$text = $row1["main"];
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
	$text = preg_replace('/quo/', ' ', $text);
	$text = preg_replace('/r/', ' ', $text);
	$text = preg_replace('/st ong/', ' ', $text);
	$text = preg_replace('/hr/', ' ', $text);
	$text = preg_replace('/p/', ' ', $text);
	$text = preg_replace('/a/', ' ', $text);
	$text = preg_replace('/\//', ' ', $text);
	$text = preg_replace('/strong/', ' ', $text);
	$text = strip_tags($text);
	$text = substr("$text", 100);
	echo "$text";
	?></p>
		<!-- <ul class="list-inline"> -->

	<!-- word -->
			<a href='Class/word_template.php?news_id=<?php echo "$id"; ?>' alt="ssss">
				<img src="css/images/word_icon.jpg">
			</a>
	<!-- excel -->
			<a href='Class/excel_template.php?news_id=<?php echo "$id"; ?>'>
				<img src="css/images/excell.png">
			</a>
	<!-- Json -->
			<a href='Class/json_export.php?news_id=<?php echo "$id"; ?>'>
				<img src="css/images/json.png">
			</a>


			<ul class="list-inline">
				<li> تاریخ ارسال خبر :<?php $date = gmdate("Y-m-d", $row1['date_added']);
	echo jdate("Y/m/d", strtotime($date));
	?></li>




			</ul>
		</article>
	</div>
	<?php
}
$connecion->close();
?>