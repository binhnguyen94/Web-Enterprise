<?php
	$id=(int)$_GET['id'];

	$sql="select id from tbl_document where id_faculty=$id";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);

	if($arr){
		notice("Phải xóa tài liệu của chuyên ngành này trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql1="delete from tbl_falcuty where id=$id";
		mysql_query($sql1);
	}
	redirect("?act=chuyennganh");
?>