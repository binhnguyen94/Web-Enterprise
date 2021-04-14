<div class="content-box-header">
	<h3>Thêm tài liệu</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td width="150px">Tên tài liệu(*) :</td>
		<td><input class="medium-input" name="tentailieu" /></td>
	</tr>
	<tr>
		<td>Nhóm tài liệu(*) :</td>
		<td>
			<select name="id_nhomtailieu">
			<?php
				$sql="select id, ten from tbl_nhomtailieu";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($_SESSION['id_nhomtailieu']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Chuyên ngành(*) :</td>
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
		<td>Hình ảnh(*) :</td>
		<td><input class="medium-input" type="file" name="hinhanh"/></td>
	</tr>
	<tr>
		<td>Nội dung :</td>
		<td>
			<textarea id="content" name="noidung"></textarea>
			<script type="text/javascript">CKEDITOR.replace('content'); </script>
		</td>
	</tr>
	<tr>
		<td><input type="hidden" name="themtailieu" value="themtailieu"/></td>
        <td><input class="button" type="submit" value=" Thực Hiện Thêm "/></td>
	</tr>
</table>
</form>