<?php
	$id=(int)$_GET['id'];
	$magiaovien=$_SESSION['magiaovien'];
	$tentailieu=trim($_POST['tentailieu']);
	$id_nhomtailieu=(int)$_POST['id_nhomtailieu'];
	$id_chuyennganh=(int)$_POST['id_chuyennganh'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$noidung=trim($_POST['noidung']);
	if($magiaovien!="" & $noidung!="" & $tentailieu!="" & $id_nhomtailieu!="" & $id_chuyennganh!="" & $hinhanh!=""){
		$link_upload="../upload/".$hinhanh;
		move_uploaded_file($_FILES['hinhanh']['tmp_name'],$link_upload);
		$sql="Insert into tbl_tailieu value(Null, $id_nhomtailieu, $id_chuyennganh, '$magiaovien', '$tentailieu', '$hinhanh', '$noidung')";
		mysql_query($sql);
		$_SESSION['id_nhomtailieu']=$id_nhomtailieu;
		$_SESSION['id_chuyennganh']=$id_chuyennganh;
		thongbao("Thêm thông tin thành công");
		chuyentrang("?act=tailieu&mod=them");
	}
	else{
		thongbao("Không được bỏ trống dữ liệu (*)!");
		vetrangtruoc();
	}
?>