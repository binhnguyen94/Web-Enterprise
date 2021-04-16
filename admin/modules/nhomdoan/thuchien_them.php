<?php
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="Insert into tbl_groupDoc value(Null, '$ten')";
		mysql_query($sql);
		notice("Thêm thông tin thành công");
		redirect("?act=nhomdoan&mod=them");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>