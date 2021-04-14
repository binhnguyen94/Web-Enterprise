<?php
	$sql="select * from tbl_giaovien where magiaovien='$_GET[id]'";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Sửa người dùng</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td width="150px">Chuyên ngành(*) :</td>
		<td>
			<select name="id_chuyennganh">
			<?php
				$sql="select id, ten from tbl_chuyennganh";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($kq['id_chuyennganh']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tên đăng nhập(*) :</td>
		<td><input class="medium-input" readonly="1" name="tendangnhap" value="<?php echo $kq[magiaovien]; ?>" /></td>
	</tr>
	<tr>
		<td>Mật khẩu(*) :</td>
		<td><input class="medium-input" name="matkhau" value="" /></td>
	</tr>
	<tr>
		<td>Họ tên(*) :</td>
		<td><input class="medium-input" name="hoten" value="<?php echo $kq[hoten]; ?>" /></td>
	</tr>
	<tr>
		<td>Ngày sinh(*) :</td>
		<td><input class="medium-input" type="date" name="ngaysinh" value="<?php echo $kq[ngaysinh]; ?>" /></td>
	</tr>
	<tr>
		<td>Điện thoại(*) :</td>
		<td><input class="medium-input" name="dienthoai" value="<?php echo $kq[dienthoai]; ?>" /></td>
	</tr>
	<tr>
		<td>Email(*) :</td>
		<td><input class="medium-input" name="email" value="<?php echo $kq[email]; ?>" /></td>
	</tr>
	<tr>
		<td>Quyền sử dụng(*) :</td>
		<td>
			<select name="quyensudung">
			<?php
				echo "<option value='Giáo viên'>Giáo viên</option>".
				"<option value='Quản trị viên'".(($kq['quyensudung']=='Quản trị viên')?' selected':'').">Quản trị viên</option>";
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td><input type="hidden" name="suagiaovien" value="suagiaovien"/></td>
        <td><input class="button" type="submit" value=" Thực Hiện Sửa "/></td>
	</tr>
</table>
</form>