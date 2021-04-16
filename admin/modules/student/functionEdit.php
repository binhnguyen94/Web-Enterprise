<?php
	$id=$_GET['id'];
	$id_faculty=(int)$_POST['id_faculty'];
	$password=trim($_POST['password']);
	$fullname=trim($_POST['fullname']);
	$dob=trim($_POST['dob']);
	$phoneNum=trim($_POST['phoneNum']);
	$email=trim($_POST['email']);
	$tendangnhap=trim($_POST['tendangnhap']);
	if($id_faculty!="" & $fullname!="" & $dob!="" & $phoneNum!="" & $email!="" & $tendangnhap!=""){
		if($password!=""){
			$password=md5($password);
			$sql="update tbl_student set password='$password', id_faculty=$id_faculty, fullname='$fullname', dob='$dob', phoneNum='$phoneNum', email='$email' where studentID='$id'";
		}
		else{
			$sql="update tbl_student set id_faculty=$id_faculty, fullname='$fullname', dob='$dob', phoneNum='$phoneNum', email='$email' where studentID='$id'";
		}
		mysql_query($sql);
		redirect("?act=sinhvien");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
?>