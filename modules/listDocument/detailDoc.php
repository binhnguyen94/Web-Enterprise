<div class='new_detail'>
<?php
	$tv="select TL.*, CN.name as nameFaculty, NTL.name as nameGroup from tbl_document TL inner join tbl_faculty CN on TL.id_faculty=CN.id inner join tbl_groupDoc NTL on TL.id_groupDoc=NTL.id where TL.id=$_GET[id]";
	$qr=mysql_query($tv);
	$kq=mysql_fetch_array($qr);
	echo "<h3><a href='index.php'>Homepage</a><span class='next'></span><a href='?act=document&id_faculty=$kq[id_faculty]'>$kq[nameFaculty]</a><span class='next'></span><a href='?act=document&id_groupDoc=$kq[id_groupDoc]'>$kq[nameGroup]</a><span class='next'></span>$kq[title]</h3>";
	echo "<div class='content_new'>";
		echo "<h2>$kq[title]</h2>";
		echo "<p>$kq[content]</p>";
	echo "</div>";
	echo "<div class='list_newP'>";
		echo "<h2>Recent Document</h2>";
		echo "<ul>";
		$tv="Select id, title from tbl_document where id<$_GET[id] order by id desc limit 0,5";
		$qr=mysql_query($tv);
		while ($arr=mysql_fetch_array($qr)) {
			echo "<li><a href='?act=documentDetail&id=$arr[id]'>$arr[title]</a></li>";
		}
		echo "</ul>";
	echo "</div>";
?>
</div>
<div class='list_productC'>
	<h3>New Document</h3>
		<ul class='productC'>
		<?php
			$sql="select * from tbl_document order by id desc limit 0,3";
			$qr=mysql_query($sql);
			while ($arrt=mysql_fetch_array($qr)) {
				echo "<li>";
					echo "<a href='?act=documentDetail&id=$arrt[id]'>
						<p class='bg_title'><img src='upload/$arrt[image]' alt='$arrt[title]'/></p></a>";
					echo "<a title='$arrt[title]' href='?act=documentDetail&id=$arrt[id]'><h2>$arrt[title]</h2></a>";
				echo "</li>";
			}
		?>
		</ul>
</div>