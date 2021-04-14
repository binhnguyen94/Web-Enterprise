<?php
	$id=(int)$_GET['id'];
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="update tbl_chuyennganh set ten='$ten' where id=$id";
		mysql_query($sql);
		chuyentrang("?act=chuyennganh");
	}
	else{
		thongbao("Không được bỏ trống dữ liệu (*)!");
		vetrangtruoc();
	}
?>