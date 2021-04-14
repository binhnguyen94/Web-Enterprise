<?php
	if($_POST['matkhau']!=""){
		$tendangnhap=$_SESSION['magiaovien'];
		$matkhau=md5($_POST["matkhau"]);

		$sql="update tbl_giaovien set matkhau='$matkhau' where magiaovien='$tendangnhap'";
		$qr=mysql_query($sql);
		notice("Đổi mật khẩu thành công");
		redirect("index.php");
	}
	else notice("Không được để trống mật khẩu!");
?>