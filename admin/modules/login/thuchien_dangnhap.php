<?php
	$tendangnhap=$_POST["tendangnhap"];
	$matkhau=md5($_POST["matkhau"]);

	$sql="select id_chuyennganh,quyensudung from tbl_giaovien where magiaovien='$tendangnhap' and matkhau='$matkhau'";
	$qr=mysql_query($sql);
	$kq = mysql_fetch_array($qr);
	if($kq){
		$_SESSION['magiaovien']=$tendangnhap;
		$_SESSION['quyensudung']=$kq['quyensudung'];
		$_SESSION['chuyenganh_gv']=$kq['id_chuyennganh'];
	}
?>