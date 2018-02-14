 <?php
// session_start();

include_once '../config/config.php';

if (isset($_REQUEST['news_id'])) {
	$news_id = $_REQUEST['news_id'];
}

$select_news = "SELECT `title` , `main` , `date_added`,`uniqe_image_path`, `category_id` FROM news WHERE id='$news_id'";
mysqli_set_charset($connecion, "utf8");
$result = $connecion->query($select_news);
if ($result->num_rows > 0) {
	$row = $result->fetch_assoc();
}
switch ($row['category_id']) {
case '5':
	$category = "اقتصادی";
	break;
case '6':
	$category = "فرهنگی";
	break;
default:
	$category = "ورزشی";
	break;
}

$title = $row['title'];

$text = $row['main'];
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

?>

    <head>
    <title>Students</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet"   href="../css/word_template.css">


    </head>

    <?php
header('Content-Description: File Transfer');
header('Content-Type: application/msword');
header("Content-Disposition: attachment; filename=nullbyte-ir.doc");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
$content = "<html>";
$content .= "<body lang=EN-US style='tab-interval:.5in'>

<div class=WordSection1>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;mso-yfti-tbllook:1184;mso-padding-alt:0in 5.4pt 0in 5.4pt'>
 <tr style='mso-yfti-irow:0;mso-yfti-firstrow:yes'>
  <td width=462 style='width:346.6pt;border:none;border-bottom:solid white 1.5pt;
  background:#9E3A38;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><b><span
  style='font-size:12.0pt;line-height:174%;mso-bidi-language:FA'>

$category
  <o:p>&nbsp;</o:p></span></b></p>
  </td>
  <td width=154 style='width:115.55pt;border:none;border-bottom:solid white 1.5pt;
  background:#9E3A38;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><b><span lang=FA
  dir=RTL style='font-size:14.0pt;line-height:174%;font-family:\"inherit\";
  mso-ascii-font-family:inherit;mso-hansi-font-family:inherit;
  mso-bidi-language:FA'>&#1605;&#1608;&#1590;&#1608;&#1593;
  &#1575;&#1582;&#1576;&#1575;&#1585;<o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:1'>
  <td width=462 style='width:346.6pt;background:#CCCCCC;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:12.0pt;line-height:174%;mso-bidi-language:FA'>

$title




  <o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=154 style='width:115.55pt;background:#CCCCCC;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal dir=RTL style='text-align:right;direction:rtl;unicode-bidi:
  embed'><b><span lang=FA style='font-size:12.0pt;line-height:174%;font-family:
  \"inherit\";mso-ascii-font-family:inherit;mso-hansi-font-family:
  inherit;mso-bidi-language:FA'>&#1578;&#1740;&#1578;&#1585;
  &#1582;&#1576;&#1585;</span></b><span dir=LTR></span><b><span dir=LTR
  style='font-size:12.0pt;line-height:174%;mso-bidi-language:FA'><span
  dir=LTR></span>: <o:p></o:p></span></b></p>
  </td>
 </tr>
 <tr style='mso-yfti-irow:2;mso-yfti-lastrow:yes'>
  <td width=462 style='width:346.6pt;background:#E6E6E6;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal align=right style='text-align:right'><span
  style='font-size:12.0pt;line-height:174%;mso-bidi-language:FA'>

$text



  <o:p>&nbsp;</o:p></span></p>
  </td>
  <td width=154 style='width:115.55pt;background:#E6E6E6;padding:0in 5.4pt 0in 5.4pt'>
  <p class=MsoNormal dir=RTL style='text-align:right;direction:rtl;unicode-bidi:
  embed'><b><span lang=FA style='font-size:12.0pt;line-height:174%;font-family:
  \"inherit\";mso-ascii-font-family:inherit;mso-hansi-font-family:
  inherit;mso-bidi-language:FA'>&#1605;&#1578;&#1606;
  &#1582;&#1576;&#1585;</span></b><span dir=LTR></span><b><span dir=LTR
  style='font-size:12.0pt;line-height:174%;mso-bidi-language:FA'><span
  dir=LTR></span> : <o:p></o:p></span></b></p>
  </td>
 </tr>
</table>

<p class=MsoNormal align=center style='text-align:center'><b><span
style='font-size:12.0pt;line-height:174%;mso-bidi-language:FA'>


<o:p>&nbsp;</o:p></span></b></p>

</div>

</body>";
$content .= "</html>";
echo "$content";
header();
?>


