<?php
	if($_POST['password']!=""){
		$username=$_SESSION['adminID'];
		$password=md5($_POST["password"]);

		$sql="update tbl_admin set password='$password' where adminID='$username'";
		$qr=mysql_query($sql);
		notice("Change Password Success");
		redirect("index.php");
	}
	else notice("Do not leave the password blank!");
?>