<?php
	if($_POST['thuchien_capnhat']=="thuchien_capnhat"){
		if($_POST['id_lophoc']!="" & $_POST['ngaysinh']!="" & $_POST['hoten']!="" & $_POST['dienthoai']!="" & $_POST['email']!=""){
			if($_POST['matkhau']==""){
				$tv="update tbl_sinhvien set hoten='$_POST[hoten]', ngaysinh='$_POST[ngaysinh]', id_lophoc=$_POST[id_lophoc], dienthoai='$_POST[dienthoai]', email='$_POST[email]' where masinhvien=$_SESSION[masinhvien]";
			}
			else{
				$matkhau=md5($_POST['matkhau']);
				$tv="update tbl_sinhvien set matkhau='$matkhau', hoten='$_POST[hoten]', ngaysinh='$_POST[ngaysinh]', id_lophoc=$_POST[id_lophoc], dienthoai='$_POST[dienthoai]', email='$_POST[email]' where masinhvien=$_SESSION[masinhvien]";
			}
			mysql_query($tv);
		}
		else{
			thongbao("Không được bổ trống dữ liệu (*)!");
		}
		chuyentrang("?act=capnhattaikhoan");
	}
?>
<div class='new_detail'>
	<h3><a href="index.php">Trang chủ</a><span class="next"></span> Cập nhật thông tin tài khoản</h3>
	<div class="content_new">
		<?php
			$tv="select * from tbl_sinhvien where masinhvien=$_SESSION[masinhvien]";
			$qr=mysql_query($tv);
			$kq=mysql_fetch_array($qr);
		?>
		<form method="post" action="">
		<table>
			<tr>
				<td width="150px">Lớp(*):</td>
				<td>
					<select class='text-form' name="id_lophoc">
						<?php
							$sql="select id, ten from tbl_lophoc where id=$kq[id_lophoc]";
							$qr=mysql_query($sql);
							while ($arr=mysql_fetch_array($qr)) {
								echo "<option value='$arr[id]' ".(($kq['id_lophoc']==$arr['id'])?'selected' : '').">$arr[ten]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tên đăng nhập(*):</td>
				<td><input name="tendangnhap" readonly="true" value="<?php echo $kq[masinhvien]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Mật khẩu:</td>
				<td><input name="matkhau" class='text-form'></td>
			</tr>
			<tr>
				<td>Họ tên(*):</td>
				<td><input name="hoten" value="<?php echo $kq[hoten]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Ngày sinh(*):</td>
				<td><input name="ngaysinh" type="date" value="<?php echo $kq[ngaysinh]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Điện thoại(*):</td>
				<td><input name="dienthoai" value="<?php echo $kq[dienthoai]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Email(*):</td>
				<td><input name="email" value="<?php echo $kq[email]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="thuchien_capnhat" value="thuchien_capnhat">
					<input type="reset" value=" Làm lại " class='button-form'>
					<input type="submit" value=" Cập nhật tài khoản " class='button-form'>
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>
<div class='list_productC'>
	<h3>Tài liệu mới nhất</h3>
	<ul class='productC'>
	<?php
		$sql="select * from tbl_tailieu order by id desc limit 0,3";
		$qr=mysql_query($sql);
		while ($arrt=mysql_fetch_array($qr)) {
			echo "<li>";
				echo "<a href='?act=chitiettintuc&id=$kq[id]'>
					<p class='bg_title'><img src='upload/$arrt[hinhanh]' alt='$arrt[tentintuc]'/></p></a>";
				echo "<a title='$arrt[tentintuc]' href='?act=chitiettintuc&id=$kq[id]'><h2>$arrt[tentintuc]</h2></a>";
			echo "</li>";
		}
	?>
	</ul>
</div>