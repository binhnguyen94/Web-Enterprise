<?php
	$id=(int)$_GET['id'];

	$sql="select id from tbl_document where id_faculty=$id";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);

	if($arr){
		notice("Documentation of this discipline must be deleted first because of data binding errors!");
	}
	else{
		$sql1="delete from tbl_faculty where id=$id";
		mysql_query($sql1);
	}
	redirect("?act=faculty");
?>