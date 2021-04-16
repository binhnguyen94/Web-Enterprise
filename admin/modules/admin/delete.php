<?php
	$id=$_GET['id'];

	$sql="select id from tbl_document where adminID='$id'";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);
	if($arr){
		notice("User documents must be deleted first because of a data binding error!");
	}
	else{
		$sql="delete from tbl_admin where adminID='$id'";
		mysql_query($sql);
	}
	redirect("?act=admin");
?>