<?php
	$sql="select * from tbl_student where studentID='$_GET[id]'";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Sửa sinh viên</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td width="150px">Lớp học(*) :</td>
		<td>
			<select name="id_faculty">
			<?php
				$sql="select id, ten from tbl_lophoc";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($kq['id_faculty']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tên đăng nhập(*) :</td>
		<td><input class="medium-input" readonly="1" name="tendangnhap" value="<?php echo $kq[studentID]; ?>" /></td>
	</tr>
	<tr>
		<td>Mật khẩu(*) :</td>
		<td><input class="medium-input" name="password" value="" /></td>
	</tr>
	<tr>
		<td>Họ tên(*) :</td>
		<td><input class="medium-input" name="fullname" value="<?php echo $kq[fullname]; ?>" /></td>
	</tr>
	<tr>
		<td>Ngày sinh(*) :</td>
		<td><input class="medium-input" type="date" name="dob" value="<?php echo $kq[dob]; ?>" /></td>
	</tr>
	<tr>
		<td>Điện thoại(*) :</td>
		<td><input class="medium-input" name="phoneNum" value="<?php echo $kq[phoneNum]; ?>" /></td>
	</tr>
	<tr>
		<td>Email(*) :</td>
		<td><input class="medium-input" name="email" value="<?php echo $kq[email]; ?>" /></td>
	</tr>
	<tr>
		<td><input type="hidden" name="suasinhvien" value="suasinhvien"/></td>
        <td><input class="button" type="submit" value=" Thực Hiện Sửa "/></td>
	</tr>
</table>
</form>