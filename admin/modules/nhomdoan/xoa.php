<?php
	$id=(int)$_GET['id'];
	
	$sql="select id from tbl_doan where id_nhomdoan=$id";
	$qr=mysql_query($sql);
	$arr=mysql_fetch_array($qr);
	if($arr){
		notice("Phải xóa tài liệu của nhóm tài liệu này trước vì lý do lỗi ràng buộc dữ liệu!");
	}
	else{
		$sql="delete from tbl_nhomdoan where id=$id";
		mysql_query($sql);
	}
	redirect("?act=nhomdoan");
?>