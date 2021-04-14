<?php
	$sql="select * from tbl_lophoc where id=$_GET[id]";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Sửa lớp học</h3>
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
					echo "<option value='$arr[id]'".(($kq['id_hedaotao']==$arr['id'])?' selected':'').">$arr[ten]</option>";
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
					echo "<option value='$arr[id]'".(($kq['id_khoahoc']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Tên lớp học(*) :</td>
		<td>
			<input class="medium-input" value="<?php echo $kq[ten]; ?>" name="ten">
		</td>
	</tr>
	<tr>
		<td><input type="hidden" name="sualophoc" value="sualophoc"/></td>
        <td><input class="button" type="submit" value=" Thực Hiện Sửa "/></td>
	</tr>
</table>
</form>