<?php
	$sql="select * from tbl_khoahoc where id=$_GET[id]";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Sửa khóa học</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td width="150px">Tên khóa học(*) :</td>
		<td><input class="medium-input" name="ten" value="<?php echo $kq['ten'] ?>"/></td>
	</tr>
	<tr>
		<td><input type="hidden" name="suakhoahoc" value="suakhoahoc"/></td>
        <td><input class="button" type="submit" value=" Thực Hiện Sửa "/></td>
	</tr>
</table>
</form>