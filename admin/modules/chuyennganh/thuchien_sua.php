<?php
	$id=(int)$_GET['id'];
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="update tbl_chuyennganh set ten='$ten' where id=$id";
		mysql_query($sql);
		redirect("?act=chuyennganh");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>