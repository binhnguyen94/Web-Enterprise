<?php
	$id=(int)$_GET['id'];

	$sql="select id from tbl_student where id_faculty=$id";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);
	if($arr){
		notice("Phải xóa sinhviên của lớp học này trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql="delete from tbl_lophoc where id=$id";
		mysql_query($sql);
		redirect("?act=lophoc");
	}
?>