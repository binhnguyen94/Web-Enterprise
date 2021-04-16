<?php
	$id=(int)$_GET['id'];
	$status=$_GET['status'];
	$giaovien=$_SESSION['tendangnhap'];
	$sql="update tbl_document set status='$status', adminID='$giaovien' where id=$id";
	mysql_query($sql);
	notice("Duyệt tài liệu thành công!");
	previousPage();
?>