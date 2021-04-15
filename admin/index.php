<?php
	session_start();
	ini_set('display_errors', 0);
	include("../includes/connection.php");
	include("../includes/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Document Student Management</title>
<link rel="stylesheet" href="teamplates/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="teamplates/css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="teamplates/css/invalid.css" type="text/css" media="screen" />	
<script type="text/javascript" src="teamplates/scripts/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="teamplates/scripts/simpla.jquery.configuration.js"></script>
<script type="text/javascript" src="teamplates/ckeditor/ckeditor.js"></script>
</head>
<?php
	include("includes/xl_post_get.php");
	if($_SESSION['quyensudung']=="" & $_SESSION['magiaovien']==""){
		include("modules/login/dangnhap.php");
	}
?>
<body>
	<div id="body-wrapper">
		<div id="sidebar">
			<?php include("includes/c_trai.php"); ?>
		</div>
		<div id="main-content">
			<div class="content-box">
				<?php include("includes/c_phai.php"); ?>
			</div>
		</div>
	</div>
</body>
</html>