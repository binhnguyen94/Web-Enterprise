<?php
	if($_POST['thuchien_capnhat']=="thuchien_capnhat"){
		if($_POST['id_faculty']!="" & $_POST['dob']!="" & $_POST['fullname']!="" & $_POST['phoneNum']!="" & $_POST['email']!=""){
			if($_POST['password']==""){
				$tv="update tbl_student set fullname='$_POST[fullname]', dob='$_POST[dob]', id_faculty=$_POST[id_faculty], phoneNum='$_POST[phoneNum]', email='$_POST[email]' where studentID=$_SESSION[studentID]";
			}
			else{
				$password=md5($_POST['password']);
				$tv="update tbl_student set password='$password', fullname='$_POST[fullname]', dob='$_POST[dob]', id_faculty=$_POST[id_faculty], phoneNum='$_POST[phoneNum]', email='$_POST[email]' where studentID=$_SESSION[studentID]";
			}
			mysql_query($tv);
		}
		else{
			notice("Không được bổ trống dữ liệu (*)!");
		}
		redirect("?act=capnhattaikhoan");
	}
?>
<div class='new_detail'>
	<h3><a href="index.php">Trang chủ</a><span class="next"></span> Cập nhật thông tin tài khoản</h3>
	<div class="content_new">
		<?php
			$tv="select * from tbl_student where studentID=$_SESSION[studentID]";
			$qr=mysql_query($tv);
			$kq=mysql_fetch_array($qr);
		?>
		<form method="post" action="">
		<table>
			<tr>
				<td width="150px">Lớp(*):</td>
				<td>
					<select class='text-form' name="id_faculty">
						<?php
							$sql="select id, ten from tbl_lophoc where id=$kq[id_faculty]";
							$qr=mysql_query($sql);
							while ($arr=mysql_fetch_array($qr)) {
								echo "<option value='$arr[id]' ".(($kq['id_faculty']==$arr['id'])?'selected' : '').">$arr[ten]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tên đăng nhập(*):</td>
				<td><input name="tendangnhap" readonly="true" value="<?php echo $kq[studentID]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Mật khẩu:</td>
				<td><input name="password" class='text-form'></td>
			</tr>
			<tr>
				<td>Họ tên(*):</td>
				<td><input name="fullname" value="<?php echo $kq[fullname]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Ngày sinh(*):</td>
				<td><input name="dob" type="date" value="<?php echo $kq[dob]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Điện thoại(*):</td>
				<td><input name="phoneNum" value="<?php echo $kq[phoneNum]; ?>" class='text-form'></td>
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