<?php
	$id=(int)$_GET['id'];

	$sql="select id from tbl_doan where id_chuyennganh=$id";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);

	if($arr){
		thongbao("Phải xóa tài liệu của chuyên ngành này trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql1="delete from tbl_chuyennganh where id=$id";
		mysql_query($sql1);
	}
	chuyentrang("?act=chuyennganh");
?>