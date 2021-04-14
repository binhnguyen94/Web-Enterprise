<?php
	$id=$_GET['id'];
	$id_lophoc=(int)$_POST['id_lophoc'];
	$matkhau=trim($_POST['matkhau']);
	$hoten=trim($_POST['hoten']);
	$ngaysinh=trim($_POST['ngaysinh']);
	$dienthoai=trim($_POST['dienthoai']);
	$email=trim($_POST['email']);
	$tendangnhap=trim($_POST['tendangnhap']);
	if($id_lophoc!="" & $hoten!="" & $ngaysinh!="" & $dienthoai!="" & $email!="" & $tendangnhap!=""){
		if($matkhau!=""){
			$matkhau=md5($matkhau);
			$sql="update tbl_sinhvien set matkhau='$matkhau', id_lophoc=$id_lophoc, hoten='$hoten', ngaysinh='$ngaysinh', dienthoai='$dienthoai', email='$email' where masinhvien='$id'";
		}
		else{
			$sql="update tbl_sinhvien set id_lophoc=$id_lophoc, hoten='$hoten', ngaysinh='$ngaysinh', dienthoai='$dienthoai', email='$email' where masinhvien='$id'";
		}
		mysql_query($sql);
		chuyentrang("?act=sinhvien");
	}
	else{
		thongbao("Không được bỏ trống dữ liệu (*)!");
		vetrangtruoc();
	}
?>