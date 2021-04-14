<?php
	$id=(int)$_GET['id'];
	$id_hedaotao=(int)$_POST['id_hedaotao'];
	$id_khoahoc=(int)$_POST['id_khoahoc'];
	$ten=trim($_POST['ten']);
	if($id_hedaotao!="" & $id_khoahoc!="" & $ten!=""){
		$sql="update tbl_lophoc set id_hedaotao=$id_hedaotao, id_khoahoc=$id_khoahoc, ten='$ten' where id=$id";
		mysql_query($sql);
		redirect("?act=lophoc");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>