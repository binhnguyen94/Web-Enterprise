<?php
	$id=$_GET['id'];
	$password=trim($_POST['password']);
	$fullname=trim($_POST['fullname']);
	$dob=trim($_POST['dob']);
	$phoneNum=trim($_POST['phoneNum']);
	$email=trim($_POST['email']);
	$username=trim($_POST['username']);
	if($fullname!="" & $dob!="" & $phoneNum!="" & $email!="" & $username!=""){
		if($password!=""){
			$password=md5($password);
			$sql="update tbl_student set password='$password', fullname='$fullname', dob='$dob', phoneNum='$phoneNum', email='$email' where studentID='$id'";
		}
		else{
			$sql="update tbl_student set fullname='$fullname', dob='$dob', phoneNum='$phoneNum', email='$email' where studentID='$id'";
		}
		mysql_query($sql);
		redirect("?act=student");
	}
	else{
		notice("Do not leave the data blank (*)!");
		previousPage();
	}
?>