<div id="mainContent">
	<?php
		echo "<div class='product'>";
			echo "<h3>New Document</h3>";
			echo "<ul class='list_product'>";
			$sql1="Select * from tbl_document order by id desc limit 0, 16";
			$qr1=mysql_query($sql1);
			while ($kq=mysql_fetch_array($qr1)) {
				echo "<li>";
					echo "<a href='?act=detailDoc&id=$kq[id]'>
						<p class='bg_title'><img src='upload/$kq[image]'/></p>";
					echo "</a>";
					echo "<a href='?act=detailDoc&id=$kq[id]'><h2>$kq[title]</h2></a>";
				echo "</li>";
			}
			echo "</ul>";
		echo "</div>";
	?>
</div>