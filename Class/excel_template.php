<?php
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

header('Content-Description: File Transfer');
header('Content-Type: application/excel');
header("Content-Disposition: attachment; filename=nullbyte-ir.xls");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');

$content = "<?xml version=\"1.0\"?>";
$content .= "<?mso-application progid=\"Excel.Sheet\"?>
<Workbook xmlns=\"urn:schemas-microsoft-com:office:spreadsheet\"
 xmlns:o=\"urn:schemas-microsoft-com:office:office\"
 xmlns:x=\"urn:schemas-microsoft-com:office:excel\"
 xmlns:ss=\"urn:schemas-microsoft-com:office:spreadsheet\"
 xmlns:html=\"http://www.w3.org/TR/REC-html40\">
 <DocumentProperties xmlns=\"urn:schemas-microsoft-com:office:office\">
  <Author>Windows User</Author>
  <LastAuthor>Windows User</LastAuthor>
  <LastPrinted>2017-12-06T08:59:01Z</LastPrinted>
  <Created>2017-12-06T08:54:51Z</Created>
  <LastSaved>2017-12-06T08:57:01Z</LastSaved>
  <Version>14.00</Version>
 </DocumentProperties>
 <OfficeDocumentSettings xmlns=\"urn:schemas-microsoft-com:office:office\">
  <AllowPNG/>
 </OfficeDocumentSettings>
 <ExcelWorkbook xmlns=\"urn:schemas-microsoft-com:office:excel\">
  <WindowHeight>10815</WindowHeight>
  <WindowWidth>26835</WindowWidth>
  <WindowTopX>480</WindowTopX>
  <WindowTopY>75</WindowTopY>
  <ProtectStructure>False</ProtectStructure>
  <ProtectWindows>False</ProtectWindows>
 </ExcelWorkbook>
 <Styles>
  <Style ss:ID=\"Default\" ss:Name=\"Normal\">
   <Alignment ss:Vertical=\"Bottom\"/>
   <Borders/>
   <Font ss:FontName=\"Calibri\" x:Family=\"Swiss\" ss:Size=\"11\" ss:Color=\"#000000\"/>
   <Interior/>
   <NumberFormat/>
   <Protection/>
  </Style>
  <Style ss:ID=\"s62\">
   <Alignment ss:Vertical=\"Bottom\" ss:ReadingOrder=\"LeftToRight\"/>
  </Style>
 </Styles>
 <Worksheet ss:Name=\"Sheet1\" ss:RightToLeft=\"1\">
  <Table ss:ExpandedColumnCount=\"3\" ss:ExpandedRowCount=\"35\" x:FullColumns=\"1\"
   x:FullRows=\"1\" ss:DefaultRowHeight=\"15\">
   <Row ss:Index=\"18\">
    <Cell><Data ss:Type=\"String\">بخش خبری</Data></Cell>
    <Cell><Data ss:Type=\"String\">عنوان خبر</Data></Cell>
    <Cell><Data ss:Type=\"String\">متن خبر</Data></Cell>
   </Row>
   <Row>
    <Cell><Data ss:Type=\"String\">$category</Data></Cell>
    <Cell><Data ss:Type=\"String\">$title</Data></Cell>
    <Cell><Data ss:Type=\"String\">$text</Data></Cell>
   </Row>
   <Row ss:Index=\"35\">
    <Cell ss:Index=\"3\" ss:StyleID=\"s62\"/>
   </Row>
  </Table>
  <WorksheetOptions xmlns=\"urn:schemas-microsoft-com:office:excel\">
   <PageSetup>
    <Header x:Margin=\"0.3\"/>
    <Footer x:Margin=\"0.3\"/>
    <PageMargins x:Bottom=\"0.75\" x:Left=\"0.7\" x:Right=\"0.7\" x:Top=\"0.75\"/>
   </PageSetup>
   <Print>
    <ValidPrinterInfo/>
    <HorizontalResolution>601</HorizontalResolution>
    <VerticalResolution>600</VerticalResolution>
   </Print>
   <Selected/>
   <DisplayRightToLeft/>
   <TopRowVisible>17</TopRowVisible>
   <Panes>
    <Pane>
     <Number>3</Number>
     <ActiveRow>19</ActiveRow>
     <ActiveCol>2</ActiveCol>
    </Pane>
   </Panes>
   <ProtectObjects>False</ProtectObjects>
   <ProtectScenarios>False</ProtectScenarios>
  </WorksheetOptions>
 </Worksheet>
</Workbook>";

echo "$content";
header();
?>

