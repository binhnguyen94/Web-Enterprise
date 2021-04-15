<?php
	//khai báo thông tin kết nối csdl
	mysql_connect("localhost","root","") or die("Loi ket noi toi sever!");
	mysql_select_db("quanlydoan_tailieu") or die("Loi ket noi toi database!");
	mysql_query('SET NAMES "UTF8"');
?>