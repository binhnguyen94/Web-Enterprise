<?php
	$name=trim($_POST['name']);
	if($name!=""){
		$sql="Insert into tbl_faculty value(Null, '$name')";
		mysql_query($sql);
		notice("Successfully added information");
		redirect("?act=faculty&mod=add");
	}
	else{
		notice("Do not leave the data blank (*)!");
		previousPage();
	}
?>