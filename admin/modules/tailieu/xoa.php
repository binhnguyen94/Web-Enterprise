<?php
	$id=(int)$_GET['id'];
	$tv="select hinhanh from tbl_tailieu where id=$id";
	$tv1=mysql_query($tv);
	$tv2=mysql_fetch_array($tv1);
	unlink("../upload/".$tv2['hinhanh']);
	$sql="delete from tbl_tailieu where id=$id";
	mysql_query($sql);
	chuyentrang("?act=tailieu");
?>