<?php
	switch ($_GET['act']) {
		case 'login':
			if($_GET['mod']=="changePassword"){
				include("modules/login/changePassword.php");
			}
			else if($_GET['mod']=="logout"){
				include("modules/login/logout.php");
			}
			break;
		case 'faculty':
			if($_GET['mod']=="add"){
				include("modules/faculty/add.php");
			}
			elseif($_GET['mod']=="edit"){
				include("modules/faculty/edit.php");
			}
			elseif($_GET['mod']=="delete"){
				include("modules/faculty/delete.php");
			}
			else{
				include("modules/faculty/list.php");
			}
			break;
		case 'document':
			if($_GET['mod']=="delete"){
				include("modules/document/delete.php");
			}
			elseif($_GET['mod']=="approvedDoc"){
				include("modules/document/approvedDoc.php");
			}
			elseif($_GET['mod']=="seeSummary"){
				include("modules/document/seeSummary.php");
			}
			else{
				include("modules/document/list.php");
			}
			break;
		case 'admin':
			if($_GET['mod']=="add"){
				include("modules/admin/add.php");
			}
			elseif($_GET['mod']=="edit"){
				include("modules/admin/edit.php");
			}
			elseif($_GET['mod']=="delete"){
				include("modules/admin/delete.php");
			}
			else{
				include("modules/admin/list.php");
			}
			break;
		case 'groupDoc':
			if($_GET['mod']=="add"){
				include("modules/groupDoc/add.php");
			}
			elseif($_GET['mod']=="edit"){
				include("modules/groupDoc/edit.php");
			}
			elseif($_GET['mod']=="delete"){
				include("modules/groupDoc/delete.php");
			}
			else{	
				include("modules/groupDoc/list.php");
			}
			break;
		case 'student':
			if($_GET['mod']=="add"){
				include("modules/student/add.php");
			}
			elseif($_GET['mod']=="edit"){
				include("modules/student/edit.php");
			}
			elseif($_GET['mod']=="delete"){
				include("modules/student/delete.php");
			}
			else{	
				include("modules/student/list.php");
			}
			break;
		case 'nhomtailieu':
			if($_GET['mod']=="them"){
				include("modules/nhomtailieu/them.php");
			}
			elseif($_GET['mod']=="sua"){
				include("modules/nhomtailieu/sua.php");
			}
			elseif($_GET['mod']=="xoa"){
				include("modules/nhomtailieu/xoa.php");
			}
			else{	
				include("modules/nhomtailieu/danhsach.php");
			}
			break;
		case 'tailieu':
			if($_GET['mod']=="them"){
				include("modules/tailieu/them.php");
			}
			elseif($_GET['mod']=="sua"){
				include("modules/tailieu/sua.php");
			}
			elseif($_GET['mod']=="xoa"){
				include("modules/tailieu/xoa.php");
			}
			else{	
				include("modules/tailieu/danhsach.php");
			}
			break;
		default:
			echo "<br/><center><b>WELCOME YOU LOGIN TO THE SYSTEM</b></center></br>";
			break;
	}
?>