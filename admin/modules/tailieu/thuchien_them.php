<?php
	$id=(int)$_GET['id'];
	$adminID=$_SESSION['adminID'];
	$tentailieu=trim($_POST['tentailieu']);
	$id_nhomtailieu=(int)$_POST['id_nhomtailieu'];
	$id_faculty=(int)$_POST['id_faculty'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$noidung=trim($_POST['noidung']);
	if($adminID!="" & $noidung!="" & $tentailieu!="" & $id_nhomtailieu!="" & $id_faculty!="" & $hinhanh!=""){
		$link_upload="../upload/".$hinhanh;
		move_uploaded_file($_FILES['hinhanh']['tmp_name'],$link_upload);
		$sql="Insert into tbl_tailieu value(Null, $id_nhomtailieu, $id_faculty, '$adminID', '$tentailieu', '$hinhanh', '$noidung')";
		mysql_query($sql);
		$_SESSION['id_nhomtailieu']=$id_nhomtailieu;
		$_SESSION['id_faculty']=$id_faculty;
		notice("Thêm thông tin thành công");
		redirect("?act=tailieu&mod=them");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>