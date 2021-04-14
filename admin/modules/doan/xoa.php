<?php
	$id=(int)$_GET['id'];
	$tv="select filedoan from tbl_doan where id=$id";
	$tv1=mysql_query($tv);
	$tv2=mysql_fetch_array($tv1);
	unlink("../upload/".$tv2['filedoan']);
	$sql="delete from tbl_doan where id=$id";
	mysql_query($sql);
	redirect("?act=doan");
?>