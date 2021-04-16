<?php
	$id_faculty=(int)$_POST['id_faculty'];
	$username=trim($_POST['username']);
	$password=trim($_POST['password']);
	$fullname=trim($_POST['fullname']);
	$dob=trim($_POST['dob']);
	$phoneNum=trim($_POST['phoneNum']);
	$email=trim($_POST['email']);
	$roles=trim($_POST['roles']);
	if($id_faculty!="" & $username!="" & $password!="" & $fullname!="" & $dob!="" & $phoneNum!="" & $email!="" & $roles!=""){
		$password=md5($password);
		$sql="Insert into tbl_admin value('$username', '$password', $id_faculty, '$fullname', '$dob', '$phoneNum', '$email', '$roles')";
		mysql_query($sql);
		$_SESSION['id_faculty']=$id_faculty;
		notice("Successfully added information");
		redirect("?act=admin&mod=add");
	}
	else{
		notice("Do not leave the data blank (*)!");
		previousPage();
	}
?>