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
		Hello, <a href="?act=login&mod=doimatkhau" title="Đổi mật khẩu"><?php echo $_SESSION['magiaovien']; ?></a> | <a href="?act=login&mod=thoat" title="Đăng xuất">Logout</a>
	</div>
	<ul id="main-nav">
		<li>
			<a href="index.php" class="nav-top-item no-submenu <?php echo check_current_act('');?>">
				Homepage
			</a>       
		</li>
		<?php if($_SESSION['quyensudung']=="Quản trị viên"){ ?>
		<li>
			<a href="#" class="nav-top-item <?php echo check_current_act('khoahoc').check_current_act('hedaotao').check_current_act('chuyennganh').check_current_act('lophoc').check_current_act('giaovien').check_current_act('sinhvien'); ?>">
			General Management</a>
			<ul>
				<li><a class="<?php echo check_current_mod('khoahoc','them'); ?>" href="?act=khoahoc&mod=them">Thêm khóa học</a></li>
				<li><a class="<?php echo check_current_mod('khoahoc',''); ?>" href="?act=khoahoc
				">Danh sách khóa học</a></li>
				<li><a class="<?php echo check_current_mod('hedaotao','them'); ?>" href="?act=hedaotao&mod=them">Thêm hệ đào tạo</a></li>
				<li><a class="<?php echo check_current_mod('hedaotao',''); ?>" href="?act=hedaotao
				">Danh sách hệ đào tạo</a></li>
				<li><a class="<?php echo check_current_mod('chuyennganh','them'); ?>" href="?act=chuyennganh&mod=them">Thêm chuyên ngành</a></li>
				<li><a class="<?php echo check_current_mod('chuyennganh',''); ?>" href="?act=chuyennganh
				">Danh sách chuyên ngành</a></li>
				<li><a class="<?php echo check_current_mod('lophoc','them'); ?>" href="?act=lophoc&mod=them">Thêm lớp học</a></li>
				<li><a class="<?php echo check_current_mod('lophoc',''); ?>" href="?act=lophoc
				">Danh sách lớp học</a></li>
				<li><a class="<?php echo check_current_mod('giaovien','them'); ?>" href="?act=giaovien&mod=them">Thêm người dùng</a></li>
				<li><a class="<?php echo check_current_mod('giaovien',''); ?>" href="?act=giaovien
				">Danh sách người dùng</a></li>
				<li><a class="<?php echo check_current_mod('sinhvien','them'); ?>" href="?act=sinhvien&mod=them">Thêm sinh viên</a></li>
				<li><a class="<?php echo check_current_mod('sinhvien',''); ?>" href="?act=sinhvien
				">Danh sách sinh viên</a></li>
			</ul>
		</li>
		<?php } ?>
		<li>
			<a href="#" class="nav-top-item <?php echo check_current_act('nhomdoan'). check_current_act('doan'); ?>">
			Document Group Management</a>
			<ul>
				<?php if($_SESSION['quyensudung']=="Quản trị viên"){ ?>
				<li><a class="<?php echo check_current_mod('nhomdoan','them'); ?>" href="?act=nhomdoan&mod=them">Thêm nhóm tài liệu</a></li>
				<li><a class="<?php echo check_current_mod('nhomdoan',''); ?>" href="?act=nhomdoan
				">Danh sách nhóm tài liệu</a></li>
				<?php } ?>
				<li>
					<a href="?act=doan" class="<?php echo check_current_mod('doan',''); ?>">
					Danh sách tài liệu</a>
				</li>
			</ul>
		</li>
		<?php if($_SESSION['quyensudung']=="Quản trị viên" || $_SESSION['quyensudung']=="Điều phối viên tiếp thị" ){ ?>
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