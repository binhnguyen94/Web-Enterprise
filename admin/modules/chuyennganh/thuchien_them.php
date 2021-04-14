<?php
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="Insert into tbl_chuyennganh value(Null, '$ten')";
		mysql_query($sql);
		notice("Thêm thông tin thành công");
		redirect("?act=chuyennganh&mod=them");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>