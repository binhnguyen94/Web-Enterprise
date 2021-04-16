<?php
	$id=(int)$_GET['id'];
	$name=trim($_POST['name']);
	if($name!=""){
		$sql="update tbl_faculty set name='$name' where id=$id";
		mysql_query($sql);
		redirect("?act=faculty");
	}
	else{
		notice("Do not leave the data blank (*)!");
		previousPage();
	}
?>