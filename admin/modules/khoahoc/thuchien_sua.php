<?php
	$id=(int)$_GET['id'];
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="update tbl_khoahoc set ten='$ten' where id=$id";
		mysql_query($sql);
		redirect("?act=khoahoc");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>