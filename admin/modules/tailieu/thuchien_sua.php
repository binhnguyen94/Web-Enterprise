<?php
	$id=(int)$_GET['id'];
	$tentailieu=trim($_POST['tentailieu']);
	$id_nhomtailieu=(int)$_POST['id_nhomtailieu'];
	$id_faculty=(int)$_POST['id_faculty'];
	$hinhanh=$_FILES['hinhanh']['name'];
	$noidung=trim($_POST['noidung']);
	if($tentailieu!="" & $id_nhomtailieu!="" & $id_faculty!="" & $noidung!=""){
		if($hinhanh!=""){
			$link_upload="../upload/".$hinhanh;
			move_uploaded_file($_FILES['hinhanh']['tmp_name'],$link_upload);
		}
		else{
			$hinhanh=trim($_POST['hinhanh_hidden']);
		}
		$sql="update tbl_tailieu set id_nhomtailieu=$id_nhomtailieu, id_faculty=$id_faculty, tentailieu='$tentailieu', hinhanh='$hinhanh', noidung='$noidung' where id=$id";
		mysql_query($sql);
		redirect("?act=tailieu");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>