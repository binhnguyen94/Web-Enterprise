<?php
	$id=(int)$_GET['id'];
	$status=$_GET['status'];	
	$user=$_SESSION['username'];
	$sql="update tbl_document set status='$status', adminID='$user' where id=$id";
	mysql_query($sql);
	notice("Successful Approved Document!");
	previousPage();
?>