<?php
	$id=$_GET['id'];
	$id_chuyennganh=(int)$_POST['id_chuyennganh'];
	$matkhau=trim($_POST['matkhau']);
	$hoten=trim($_POST['hoten']);
	$ngaysinh=trim($_POST['ngaysinh']);
	$dienthoai=trim($_POST['dienthoai']);
	$email=trim($_POST['email']);
	$tendangnhap=trim($_POST['tendangnhap']);
	$quyensudung=trim($_POST['quyensudung']);
	if($id_chuyennganh!="" & $hoten!="" & $ngaysinh!="" & $dienthoai!="" & $email!="" & $tendangnhap!=""){
		if($matkhau!=""){
			$matkhau=md5($matkhau);
			$sql="update tbl_giaovien set matkhau='$matkhau', id_chuyennganh=$id_chuyennganh, hoten='$hoten', ngaysinh='$ngaysinh', dienthoai='$dienthoai', email='$email', quyensudung='$quyensudung' where magiaovien='$id'";
		}
		else{
			$sql="update tbl_giaovien set id_chuyennganh=$id_chuyennganh, hoten='$hoten', ngaysinh='$ngaysinh', dienthoai='$dienthoai', email='$email', quyensudung='$quyensudung' where magiaovien='$id'";
		}
		mysql_query($sql);
		chuyentrang("?act=giaovien");
	}
	else{
		thongbao("Không được bỏ trống dữ liệu (*)!");
		vetrangtruoc();
	}
?>