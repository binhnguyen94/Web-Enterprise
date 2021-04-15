<div class="content-box-header">
	<h3>Thêm người dùng</h3>
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
					echo "<option value='$arr[id]'".(($_SESSION['id_chuyennganh']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tên đăng nhập(*) :</td>
		<td><input class="medium-input" name="tendangnhap" /></td>
	</tr>
	<tr>
		<td>Mật khẩu(*) :</td>
		<td><input class="medium-input" name="matkhau" /></td>
	</tr>
	<tr>
		<td>Họ tên(*) :</td>
		<td><input class="medium-input" name="hoten" /></td>
	</tr>
	<tr>
		<td>Ngày sinh(*) :</td>
		<td><input class="medium-input" type="date" name="ngaysinh" /></td>
	</tr>
	<tr>
		<td>Điện thoại(*) :</td>
		<td><input class="medium-input" name="dienthoai" /></td>
	</tr>
	<tr>
		<td>Email(*) :</td>
		<td><input class="medium-input" name="email" /></td>
	</tr>
	<tr>
		<td>Quyền sử dụng(*) :</td>
		<td>
			<select name="quyensudung">
				<option value='Điều phối viên tiếp thị'>Điều phối viên tiếp thị</option>
				<option value='Quản trị viên'>Quản trị viên</option>
				<option value='Giám đốc tiếp thị'>Giám đốc tiếp thị</option>
				
			</select>
		</td>
	</tr>
	<tr>
		<td><input type="hidden" name="themgiaovien" value="themgiaovien"/></td>
        <td><input class="button" type="submit" value=" Thực Hiện Thêm "/></td>
	</tr>
</table>
</form>