<?php
	$id=(int)$_GET['id'];

	$sql="select id from tbl_lophoc where id_khoahoc=$id";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);

	if($arr){
		thongbao("Phải xóa lớp học của khóa học này trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql1="delete from tbl_khoahoc where id=$id";
		mysql_query($sql1);
	}
	chuyentrang("?act=khoahoc");
?>