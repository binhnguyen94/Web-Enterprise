<?php
	$id_hedaotao=(int)$_POST['id_hedaotao'];
	$id_khoahoc=(int)$_POST['id_khoahoc'];
	$ten=trim($_POST['ten']);
	if($id_hedaotao!="" & $id_khoahoc!="" & $ten!=""){
		$sql="Insert into tbl_lophoc value(Null, $id_hedaotao, $id_khoahoc, '$ten')";
		mysql_query($sql);
		$_SESSION['id_hedaotao']=$id_hedaotao;
		$_SESSION['id_khoahoc']=$id_khoahoc;
		notice("Thêm thông tin thành công");
		redirect("?act=lophoc&mod=them");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>