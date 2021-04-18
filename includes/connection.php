<?php
	mysql_connect("localhost","root","") or die("Internet connection error!");
	mysql_select_db("database1") or die("Database connection error!");
	mysql_query('SET NAMES "UTF8"');
?>