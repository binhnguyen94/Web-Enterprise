<?php
	$id=$_GET['id'];

	$sql="select id from tbl_document where studentID='$id'";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);
	if($arr){
		notice("Student documents must be deleted first due to data binding error!");
	}
	else{
		$sql="delete from tbl_student where studentID='$id'";
		mysql_query($sql);
	}
	redirect("?act=student");
?>