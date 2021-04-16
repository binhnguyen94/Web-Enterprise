<ul>
	<li>
		<a href="index.php">Trang chủ</a>
	</li>
	<li>
		<a href="#">Tài liệu theo chuyên ngành</a>
		<ul>
		<?php
			$sql="select * from tbl_falcuty order by id desc";
			$qr=mysql_query($sql);
			while ($kq=mysql_fetch_array($qr)) {
				echo "<li><a href='?act=tailieu&id_faculty=$kq[id]'>$kq[ten]</a></li>";
			}
		?>
		</ul>
	</li>
	<li>
		<a href="#">Nhóm tài liệu</a>
		<ul>
		<?php
			$sql="select * from tbl_nhomtailieu order by id desc";
			$qr=mysql_query($sql);
			while ($kq=mysql_fetch_array($qr)) {
				echo "<li><a href='?act=tailieu&id_nhomtailieu=$kq[id]'>$kq[ten]</a></li>";
			}
		?>
		</ul>
	</li>
	<li>
		<a href="?act=doan">Quản lý tài liệu</a>
	</li>
</ul>