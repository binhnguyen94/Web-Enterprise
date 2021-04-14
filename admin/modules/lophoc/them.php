<div class="content-box-header">
	<h3>Thêm lớp học</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td width="150px">Hệ đào tạo(*) :</td>
		<td>
			<select name="id_hedaotao">
			<?php
				$sql="select id, ten from tbl_hedaotao";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($_SESSION['id_hedaotao']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Khóa học(*) :</td>
		<td>
			<select name="id_khoahoc">
			<?php
				$sql="select id, ten from tbl_khoahoc";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($_SESSION['id_khoahoc']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tên lớp học(*) :</td>
		<td>
			<input class="medium-input" name="ten">
		</td>
	</tr>
	<tr>
		<td><input type="hidden" name="themlophoc" value="themlophoc"/></td>
        <td><input class="button" type="submit" value=" Thực Hiện Thêm "/></td>
	</tr>
</table>
</form>