<?php
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="Insert into tbl_khoahoc value(Null, '$ten')";
		mysql_query($sql);
		notice("Thêm thông tin thành công");
		redirect("?act=khoahoc&mod=them");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>