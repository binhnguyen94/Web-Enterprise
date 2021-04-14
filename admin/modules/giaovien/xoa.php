<?php
	$id=$_GET['id'];

	$sql="select id from tbl_doan where magiaovien='$id'";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);
	if($arr){
		notice("Phải xóa tài liệu của người dùng trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql="delete from tbl_giaovien where magiaovien='$id'";
		mysql_query($sql);
	}
	redirect("?act=giaovien");
?>