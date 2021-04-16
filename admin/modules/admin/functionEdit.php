<?php
	$id=$_GET['id'];
	$id_faculty=(int)$_POST['id_faculty'];
	$password=trim($_POST['password']);
	$fullname=trim($_POST['fullname']);
	$dob=trim($_POST['dob']);
	$phoneNum=trim($_POST['phoneNum']);
	$email=trim($_POST['email']);
	$username=trim($_POST['username']);
	$roles=trim($_POST['roles']);
	if($id_faculty!="" & $fullname!="" & $dob!="" & $phoneNum!="" & $email!="" & $username!=""){
		if($password!=""){
			$password=md5($password);
			$sql="update tbl_admin set password='$password', id_faculty=$id_faculty, fullname='$fullname', dob='$dob', phoneNum='$phoneNum', email='$email', roles='$roles' where adminID='$id'";
		}
		else{
			$sql="update tbl_admin set id_faculty=$id_faculty, fullname='$fullname', dob='$dob', phoneNum='$phoneNum', email='$email', roles='$roles' where adminID='$id'";
		}
		mysql_query($sql);
		redirect("?act=admin");
	}
	else{
		notice("Do not leave the data blank (*)!");
		previousPage();
	}
?>