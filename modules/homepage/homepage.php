<div id="mainContent">
	<?php
		
		echo "<div class='product'>";
			echo "<h3>New Document</h3>";
			echo "<ul class='list_product'>";
			ob_start();
			$sql1="Select * from tbl_document order by id desc limit 0, 16";
			$qr1=mysql_query($sql1);
			while ($kq=mysql_fetch_array($qr1)) {
				echo "<li>";
					echo "<a href='?act=documentDetail&id=$kq[id]'>
						<p class='bg_title'><img src='upload/$kq[image]'/></p>";
					echo "</a>";
					echo "<a href='?act=documentDetail&id=$kq[id]'><h2>$kq[title]</h2></a>";
				echo "</li>";
			}
			if(isset($_POST['Search'])){
				ob_end_clean();
				ob_start();
				$sf = trim($_POST['searchFile']);
				$qr = mysql_query("SELECT * FROM tbl_document where title like %sf%");
				while ($kq=mysql_fetch_array($qr)) {
					echo "<li>";
						echo "<a href='?act=documentDetail&id=$kq[id]'>
							<p class='bg_title'><img src='upload/$kq[image]'/></p>";
						echo "</a>";
						echo "<a href='?act=documentDetail&id=$kq[id]'><h2>$kq[title]</h2></a>";
					echo "</li>";
				}
			}
			echo "</ul>";
		echo "</div>";
	?>
</div>