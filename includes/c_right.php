<div id="mainContent">
	<div class="main">
	<?php
		switch ($_GET['act']) {
			case 'tailieu':
				require_once("modules/tailieu/danhsachtailieu.php");
				break;
			case 'chitiettailieu':
				require_once("modules/tailieu/chitiettailieu.php");
				break;
			case 'capnhattaikhoan':
				require_once("modules/dangnhap/capnhattaikhoan.php");
				break;
			case 'dangxuat':
				require_once("modules/dangnhap/dangxuat.php");
				break;
			case 'dangky':
				require_once("modules/dangnhap/dangky.php");
				break;
			case 'doan':
				require_once("modules/doan/doan.php");
				break;
			default:
				require_once("modules/trangchu/trangchu.php");
				break;
		}
	?>
	</div>
</div>