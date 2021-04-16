<?php
	$username=$_POST["username"];
	$password=md5($_POST["password"]);

	$sql="select id_faculty,roles from tbl_admin where adminID='$username' and password='$password'";
	$qr=mysql_query($sql);
	$kq = mysql_fetch_array($qr);
	if($kq){
		$_SESSION['adminID']=$username;
		$_SESSION['roles']=$kq['roles'];
		$_SESSION['falcuty_gv']=$kq['id_faculty'];
	}
?>