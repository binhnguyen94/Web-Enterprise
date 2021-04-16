<?php
	$id=$_GET['id'];

	$sql="select id from tbl_document where adminID='$id'";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);
	if($arr){
		notice("Phải xóa tài liệu của người dùng trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql="delete from tbl_admin where adminID='$id'";
		mysql_query($sql);
	}
	redirect("?act=giaovien");
?>