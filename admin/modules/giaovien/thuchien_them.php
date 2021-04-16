<?php
	$id_faculty=(int)$_POST['id_faculty'];
	$tendangnhap=trim($_POST['tendangnhap']);
	$password=trim($_POST['password']);
	$fullname=trim($_POST['fullname']);
	$dob=trim($_POST['dob']);
	$phoneNum=trim($_POST['phoneNum']);
	$email=trim($_POST['email']);
	$role=trim($_POST['role']);
	if($id_faculty!="" & $tendangnhap!="" & $password!="" & $fullname!="" & $dob!="" & $phoneNum!="" & $email!="" & $role!=""){
		$password=md5($password);
		$sql="Insert into tbl_admin value('$tendangnhap', '$password', $id_faculty, '$fullname', '$dob', '$phoneNum', '$email', '$role')";
		mysql_query($sql);
		$_SESSION['id_faculty']=$id_faculty;
		notice("Thêm thông tin thành công");
		redirect("?act=giaovien&mod=them");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>