<?php
	if($_POST['dangnhap']=="dangnhap"){
		include("modules/login/thuchien_dangnhap.php");
	}
	if($_POST['doimatkhau']=="doimatkhau"){
		include("modules/login/thuchien_doimatkhau.php");
	}
	if($_POST['themchuyennganh']=="themchuyennganh"){
		include("modules/chuyennganh/thuchien_them.php");
	}
	if($_POST['suachuyennganh']=="suachuyennganh"){
		include("modules/chuyennganh/thuchien_sua.php");
	}
	if($_POST['themgiaovien']=="themgiaovien"){
		include("modules/giaovien/thuchien_them.php");
	}
	if($_POST['suagiaovien']=="suagiaovien"){
		include("modules/giaovien/thuchien_sua.php");
	}
	if($_POST['themhedaotao']=="themhedaotao"){
		include("modules/hedaotao/thuchien_them.php");
	}
	if($_POST['suahedaotao']=="suahedaotao"){
		include("modules/hedaotao/thuchien_sua.php");
	}
	if($_POST['themkhoahoc']=="themkhoahoc"){
		include("modules/khoahoc/thuchien_them.php");
	}
	if($_POST['suakhoahoc']=="suakhoahoc"){
		include("modules/khoahoc/thuchien_sua.php");
	}
	if($_POST['themlophoc']=="themlophoc"){
		include("modules/lophoc/thuchien_them.php");
	}
	if($_POST['sualophoc']=="sualophoc"){
		include("modules/lophoc/thuchien_sua.php");
	}
	if($_POST['themnhomdoan']=="themnhomdoan"){
		include("modules/nhomdoan/thuchien_them.php");
	}
	if($_POST['suanhomdoan']=="suanhomdoan"){
		include("modules/nhomdoan/thuchien_sua.php");
	}
	if($_POST['themsinhvien']=="themsinhvien"){
		include("modules/sinhvien/thuchien_them.php");
	}
	if($_POST['suasinhvien']=="suasinhvien"){
		include("modules/sinhvien/thuchien_sua.php");
	}
	if($_POST['themnhomtailieu']=="themnhomtailieu"){
		include("modules/nhomtailieu/thuchien_them.php");
	}
	if($_POST['suanhomtailieu']=="suanhomtailieu"){
		include("modules/nhomtailieu/thuchien_sua.php");
	}
	if($_POST['themtailieu']=="themtailieu"){
		include("modules/tailieu/thuchien_them.php");
	}
	if($_POST['suatailieu']=="suatailieu"){
		include("modules/tailieu/thuchien_sua.php");
	}
?>