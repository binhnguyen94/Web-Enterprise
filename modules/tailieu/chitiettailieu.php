<div class='new_detail'>
<?php
	$tv="select TL.*, CN.ten as tenchuyennganh, NTL.ten as tennhomtailieu from tbl_tailieu TL inner join tbl_chuyennganh CN on TL.id_chuyennganh=CN.id inner join tbl_nhomtailieu NTL on TL.id_nhomtailieu=NTL.id where TL.id=$_GET[id]";
	$qr=mysql_query($tv);
	$kq=mysql_fetch_array($qr);
	echo "<h3><a href='index.php'>Trang chủ</a><span class='next'></span><a href='?act=tailieu&id_chuyennganh=$kq[id_chuyennganh]'>$kq[tenchuyennganh]</a><span class='next'></span><a href='?act=tailieu&id_nhomtailieu=$kq[id_nhomtailieu]'>$kq[tennhomtailieu]</a><span class='next'></span>$kq[tentailieu]</h3>";
	echo "<div class='content_new'>";
		echo "<h2>$kq[tentailieu]</h2>";
		echo "<p>$kq[noidung]</p>";
	echo "</div>";
	echo "<div class='list_newP'>";
		echo "<h2>Tài liệu cũ hơn</h2>";
		echo "<ul>";
		$tv="Select id, tentailieu from tbl_tailieu where id<$_GET[id] order by id desc limit 0,5";
		$qr=mysql_query($tv);
		while ($arr=mysql_fetch_array($qr)) {
			echo "<li><a href='?act=chitiettailieu&id=$arr[id]'>$arr[tentailieu]</a></li>";
		}
		echo "</ul>";
	echo "</div>";
?>
</div>
<div class='list_productC'>
	<h3>Tài liệu mới nhất</h3>
		<ul class='productC'>
		<?php
			$sql="select * from tbl_tailieu order by id desc limit 0,3";
			$qr=mysql_query($sql);
			while ($arrt=mysql_fetch_array($qr)) {
				echo "<li>";
					echo "<a href='?act=chitiettailieu&id=$arrt[id]'>
						<p class='bg_title'><img src='upload/$arrt[hinhanh]' alt='$arrt[tentailieu]'/></p></a>";
					echo "<a title='$arrt[tentailieu]' href='?act=chitiettailieu&id=$arrt[id]'><h2>$arrt[tentailieu]</h2></a>";
				echo "</li>";
			}
		?>
		</ul>
</div>