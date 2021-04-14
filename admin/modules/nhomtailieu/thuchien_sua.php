<?php
	$id=(int)$_GET['id'];
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="update tbl_nhomtailieu set ten='$ten' where id=$id";
		mysql_query($sql);
		chuyentrang("?act=nhomtailieu");
	}
	else{
		thongbao("Không được bỏ trống dữ liệu (*)!");
		vetrangtruoc();
	}
?>