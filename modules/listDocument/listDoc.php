<?php
// echo "<div class='product'>";
// 	echo "<h3><a href='index.php'>Homepage</a><span class='next'></span>Document</h3>";
// 	//danh sách tài liệu
// 	echo "<ul class='list_product'>";
// 	if($_GET['key']){
// 		$tv="select * from tbl_document where title like '%$_GET[key]%' order by id desc";
// 		$pageDivider="select count(*) from tbl_document where title like '%$_GET[key]%'";
// 	}
// 	$qr=mysql_query($tv." limit $GLOBALS[vtbd], $GLOBALS[limit]");
// 	while ($kq=mysql_fetch_array($qr)) {
// 		echo "<li>";
// 			echo "<a href='?act=detailDoc&id=$kq[id]'>
// 				<p class='bg_title'><img src='upload/$kq[image]' alt='$kq[title]'/></p>";
// 			echo "</a>";
// 			echo "<a title='$kq[title]' href='?act=detailDoc&id=$kq[id]'><h2>$kq[title]</h2></a>";
// 		echo "</li>";
// 	}
// 	echo "</ul>";
// echo "</div>";
// pageDivider($pageDivider);
?>