<ul>
	<li>
		<a href="index.php">Homepage</a>
	</li>
	<li>
		<a href="#">Faculty's Document</a>
		<ul>
		<?php
			$sql="select * from tbl_faculty order by id desc";
			$qr=mysql_query($sql);
			while ($kq=mysql_fetch_array($qr)) {
				echo "<li><a href='?act=listDoc&id_faculty=$kq[id]'>$kq[name]</a></li>";
			}
		?>
		</ul>
	</li>
	<li>
		<a href="#">Group Document</a>
		<ul>
		<?php
			$sql="select * from tbl_groupDoc order by id desc";
			$qr=mysql_query($sql);
			while ($kq=mysql_fetch_array($qr)) {
				echo "<li><a href='?act=listDoc&id_groupDoc=$kq[id]'>$kq[name]</a></li>";
			}
		?>
		</ul>
	</li>
	<li>
		<a href="?act=document">Document Management</a>
	</li>
</ul>