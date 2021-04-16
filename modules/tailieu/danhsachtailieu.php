<?php
echo "<div class='product'>";
	echo "<h3><a href='index.php'>Trang chủ</a><span class='next'></span>Tài liệu</h3>";
	//danh sách tài liệu
	echo "<ul class='list_product'>";
	if($_GET['id_faculty']){
		$tv="select * from tbl_tailieu where id_faculty=$_GET[id_faculty] order by id desc";
		$phantrang="select count(*) from tbl_tailieu where id_faculty=$_GET[id_faculty]";
	}
	elseif($_GET['id_nhomtailieu']){
		$tv="select * from tbl_tailieu where id_nhomtailieu=$_GET[id_nhomtailieu] order by id desc";
		$phantrang="select count(*) from tbl_tailieu where id_nhomtailieu=$_GET[id_nhomtailieu]";
	}
	elseif($_GET['key']){
		$tv="select * from tbl_tailieu where tentailieu like '%$_GET[key]%' order by id desc";
		$phantrang="select count(*) from tbl_tailieu where tentailieu like '%$_GET[key]%'";
	}
	$qr=mysql_query($tv." limit $GLOBALS[vtbd], $GLOBALS[limit]");
	while ($kq=mysql_fetch_array($qr)) {
		echo "<li>";
			echo "<a href='?act=chitiettailieu&id=$kq[id]'>
				<p class='bg_title'><img src='upload/$kq[hinhanh]' alt='$kq[tentailieu]'/></p>";
			echo "</a>";
			echo "<a title='$kq[tentailieu]' href='?act=chitiettailieu&id=$kq[id]'><h2>$kq[tentailieu]</h2></a>";
		echo "</li>";
	}
	echo "</ul>";
echo "</div>";
pageDivider($phantrang);
?>