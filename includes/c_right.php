<div id="mainContent">
	<div class="main">
	<?php
		switch ($_GET['act']) {
			case 'detailDoc':
				require_once("modules/listDocument/detailDoc.php");
				break;
			case 'updateAccount':
				require_once("modules/login/updateAccount.php");
				break;
			case 'logout':
				require_once("modules/login/logout.php");
				break;
			case 'document':
				require_once("modules/document/document.php");
				break;
			default:
				require_once("modules/homepage/homepage.php");
				break;
		}
	?>
	</div>
</div>