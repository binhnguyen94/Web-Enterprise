<?php
	$id=$_GET['id'];

	$sql="select id from tbl_doan where masinhvien='$id'";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);
	if($arr){
		thongbao("Phải xóa tài liệu của sinh viên trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql="delete from tbl_sinhvien where masinhvien='$id'";
		mysql_query($sql);
	}
	chuyentrang("?act=sinhvien");
?>