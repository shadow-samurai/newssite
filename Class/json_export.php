		<?php
include_once '../config/config.php';

$id = $_REQUEST['news_id'];
$select_news = "SELECT `title` , `main` , `date_added`,`uniqe_image_path` FROM news WHERE `id`= '$id'";
$json = array();
mysqli_set_charset($connecion, "utf8");
$result = $connecion->query($select_news);
while ($row = $result->fetch_assoc()) {
	$json = $row;

}

$filename = "$id" . '_json' . '.txt';
$content = json_encode($json);

$handle = fopen("$filename", "w");
fwrite($handle, "$content");
fclose($handle);

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . basename("$filename"));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize("$filename"));
readfile("$filename");
exit;

// fwrite("$filename", "$content");
// header("Cache-Control: public");
// header("Content-Description: File Transfer");
// header("Content-Length: " . filesize("$filename") . ";");
// header("Content-Disposition: attachment; filename=$filename");
// header("Content-Type: application/octet-stream; ");
// header("Content-Transfer-Encoding: binary");
// // readfile($filename);

?>