<div class="content-box-header">
	<h3>Thêm sinh viên</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td>Nhập danh sách từ excel :</td>
		<td><input type="file" class="medium-input" name="file" /></td>
	</tr>
	<tr>
		<td width="150px">Lớp học(*) :</td>
		<td>
			<select name="id_lophocs">
			<?php
				$sql="select id, ten from tbl_lophoc";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($_SESSION['id_lophoc']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tên đăng nhập(*) :</td>
		<td><input class="medium-input" name="tendangnhaps" /></td>
	</tr>
	<tr>
		<td>Mật khẩu(*) :</td>
		<td><input class="medium-input" name="matkhaus" /></td>
	</tr>
	<tr>
		<td>Họ tên(*) :</td>
		<td><input class="medium-input" name="hotens" /></td>
	</tr>
	<tr>
		<td>Ngày sinh(*) :</td>
		<td><input class="medium-input" type="date" name="ngaysinhs" /></td>
	</tr>
	<tr>
		<td>Điện thoại(*) :</td>
		<td><input class="medium-input" name="dienthoais" /></td>
	</tr>
	<tr>
		<td>Email(*) :</td>
		<td><input class="medium-input" name="emails" /></td>
	</tr>
	<tr>
		<td><input type="hidden" name="themsinhvien" value="themsinhvien"/></td>
        <td><input class="button" type="submit" value=" Thực Hiện Thêm "/></td>
	</tr>
</table>
</form>