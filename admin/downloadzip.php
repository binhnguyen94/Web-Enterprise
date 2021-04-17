<?php
session_start();
ini_set('display_errors', 0);
include("../includes/connection.php");
include("../includes/zip.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>download zip</title>
</head>
<body>

<?php
$sql="select document from tbl_document";
$qr=mysql_query($sql);
    $result = mysql_fetch_array($qr);
    include_once('zip.php');
    $zip_file = "download.zip"; // name for downloaded zip file

    $ziper = new zipfile();
    $ziper->prefix_name = "download"; // here you create folder which will contain downloaded files
    $ziper->addFiles($result["FilePath"]);  // array of files
    $ziper->output($zip_file); 
    $ziper->forceDownload($zip_file);
    @unlink($zip_file);
?>
</body>