<?php
	$id=(int)$_GET['id'];
	$trangthai=$_GET['trangthai'];
	$giaovien=$_SESSION['tendangnhap'];
	$sql="update tbl_doan set trangthai='$trangthai', magiaovien='$giaovien' where id=$id";
	mysql_query($sql);
	notice("Duyệt tài liệu thành công!");
	previousPage();
?>