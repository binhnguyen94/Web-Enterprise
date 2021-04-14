<?php
	$id=(int)$_GET['id'];
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="update tbl_nhomdoan set ten='$ten' where id=$id";
		mysql_query($sql);
		chuyentrang("?act=nhomdoan");
	}
	else{
		thongbao("Không được bỏ trống dữ liệu (*)!");
		vetrangtruoc();
	}
?>