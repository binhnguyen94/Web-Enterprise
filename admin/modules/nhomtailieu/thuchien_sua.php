<?php
	$id=(int)$_GET['id'];
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="update tbl_nhomtailieu set ten='$ten' where id=$id";
		mysql_query($sql);
		redirect("?act=nhomtailieu");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>