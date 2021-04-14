<?php
	$ten=trim($_POST['ten']);
	if($ten!=""){
		$sql="Insert into tbl_nhomtailieu value(Null, '$ten')";
		mysql_query($sql);
		thongbao("Thêm thông tin thành công");
		chuyentrang("?act=nhomtailieu&mod=them");
	}
	else{
		thongbao("Không được bỏ trống dữ liệu (*)!");
		vetrangtruoc();
	}
?>