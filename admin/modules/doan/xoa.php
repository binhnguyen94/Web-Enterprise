<?php
	$id=(int)$_GET['id'];
	$tv="select document from tbl_document where id=$id";
	$tv1=mysql_query($tv);
	$tv2=mysql_fetch_array($tv1);
	unlink("../upload/".$tv2['document']);
	$sql="delete from tbl_document where id=$id";
	mysql_query($sql);
	redirect("?act=doan");
?>