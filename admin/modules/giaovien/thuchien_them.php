<?php
	$id_chuyennganh=(int)$_POST['id_chuyennganh'];
	$tendangnhap=trim($_POST['tendangnhap']);
	$matkhau=trim($_POST['matkhau']);
	$hoten=trim($_POST['hoten']);
	$ngaysinh=trim($_POST['ngaysinh']);
	$dienthoai=trim($_POST['dienthoai']);
	$email=trim($_POST['email']);
	$quyensudung=trim($_POST['quyensudung']);
	if($id_chuyennganh!="" & $tendangnhap!="" & $matkhau!="" & $hoten!="" & $ngaysinh!="" & $dienthoai!="" & $email!="" & $quyensudung!=""){
		$matkhau=md5($matkhau);
		$sql="Insert into tbl_giaovien value('$tendangnhap', '$matkhau', $id_chuyennganh, '$hoten', '$ngaysinh', '$dienthoai', '$email', '$quyensudung')";
		mysql_query($sql);
		$_SESSION['id_chuyennganh']=$id_chuyennganh;
		thongbao("Thêm thông tin thành công");
		chuyentrang("?act=giaovien&mod=them");
	}
	else{
		thongbao("Không được bỏ trống dữ liệu (*)!");
		vetrangtruoc();
	}
?>