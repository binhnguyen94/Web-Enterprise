<?php
	$id=(int)$_GET['id'];
	
	$sql="select id from tbl_document where id_groupDoc=$id";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);
	if($arr){
		notice("Student documents must be deleted first due to data binding error!");
	}
	else{
		$sql="delete from tbl_groupDoc where id=$id";
		mysql_query($sql);
	}
	redirect("?act=groupDoc");
?>