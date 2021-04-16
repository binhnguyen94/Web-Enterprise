<?php
	$id=$_GET['id'];

	$sql="select id from tbl_document where studentID='$id'";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);
	if($arr){
		notice("Phải xóa tài liệu của sinh viên trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql="delete from tbl_student where studentID='$id'";
		mysql_query($sql);
	}
	redirect("?act=sinhvien");
?>