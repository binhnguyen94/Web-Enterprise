<?php
	function check_current_act($act)
	{
		if($_GET['act']==$act)
		{
			return "current";
		}
	}

	function check_current_mod($act,$mod)
	{
		if($_GET['act']==$act and $_GET['mod']==$mod)
		{
			return "current";
		}
	}
?>
<div id="sidebar-wrapper">
	<a href="#"><img id="logo" src="teamplates/images/logo.png" alt="CONTROL PANEL" style="
    width: 112px;
"></a>
	<div id="profile-links">
		Hello, <a href="?act=login&mod=changePassword" title="Change Password"><?php echo $_SESSION['adminID']; ?></a> | <a href="?act=login&mod=logout" title="Logout">Logout</a>
	</div>
	<ul id="main-nav">
		<li>
			<a href="index.php" class="nav-top-item no-submenu <?php echo check_current_act('');?>">
				Homepage
			</a>       
		</li>
		<?php if($_SESSION['roles']=="Admin"){ ?>
		<li>
			<a href="#" class="nav-top-item <?php echo check_current_act('faculty').check_current_act('admin').check_current_act('student'); ?>">
			General Management</a>
			<ul>
				<li><a class="<?php echo check_current_mod('faculty','add'); ?>" href="?act=faculty&mod=add">Add Faculty</a></li>
				<li><a class="<?php echo check_current_mod('faculty',''); ?>" href="?act=faculty
				">List Faculty</a></li>
				<li><a class="<?php echo check_current_mod('admin','add'); ?>" href="?act=admin&mod=add">Add User</a></li>
				<li><a class="<?php echo check_current_mod('admin',''); ?>" href="?act=admin
				">List User</a></li>
				<li><a class="<?php echo check_current_mod('student','add'); ?>" href="?act=student&mod=add">Add Student</a></li>
				<li><a class="<?php echo check_current_mod('student',''); ?>" href="?act=student
				">List Student</a></li>
			</ul>
		</li>
		<?php } ?>
		<li>
			<a href="#" class="nav-top-item <?php echo check_current_act('groupDoc'). check_current_act('document'); ?>">
			Document Management</a>
			<ul>
				<?php if($_SESSION['roles']=="Admin"){ ?>
				<li><a class="<?php echo check_current_mod('groupDoc','add'); ?>" href="?act=groupDoc&mod=add">Add Group Document</a></li>
				<li><a class="<?php echo check_current_mod('groupDoc',''); ?>" href="?act=groupDoc
				">List Group Document</a></li>
				<?php } ?>
				<li>
					<a href="?act=document" class="<?php echo check_current_mod('document',''); ?>">
					List Document</a>
				</li>
			</ul>
		</li>
		<?php if($_SESSION['roles']=="Admin" || $_SESSION['roles']=="Coordinator" ){ ?>
		<li>
			<a href="#" class="nav-top-item <?php echo check_current_act('nhomtailieu').check_current_act('tailieu'); ?>">
			Document Source Management</a>
			<ul>
				<li><a class="<?php echo check_current_mod('nhomtailieu','them'); ?>" href="?act=nhomtailieu&mod=them">Thêm nhóm tài liệu</a></li>
				<li><a class="<?php echo check_current_mod('nhomtailieu',''); ?>" href="?act=nhomtailieu
				">Danh sách nhóm tài liệu</a></li>
				<li><a class="<?php echo check_current_mod('tailieu','them'); ?>" href="?act=tailieu&mod=them">Thêm tài liệu</a></li>
				<li><a class="<?php echo check_current_mod('tailieu',''); ?>" href="?act=tailieu
				">Danh sách tài liệu</a></li>
			</ul>
		</li>
		<?php } ?>
	</ul>
</div>