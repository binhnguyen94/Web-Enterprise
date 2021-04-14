<?php
	$id=(int)$_GET['id'];

	$sql="select id from tbl_lophoc where id_hedaotao=$id";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);

	if($arr){
		notice("Phải xóa lớp học của khóa học này trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql1="delete from tbl_hedaotao where id=$id";
		mysql_query($sql1);
	}
	redirect("?act=hedaotao");
?>