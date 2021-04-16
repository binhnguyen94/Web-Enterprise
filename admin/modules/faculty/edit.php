<?php
	$sql="select * from tbl_faculty where id=$_GET[id]";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Edit Faculty</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td width="150px">Name Faculty(*) :</td>
		<td><input class="medium-input" name="name" value="<?php echo $kq['name'] ?>"/></td>
	</tr>
	<tr>
		<td><input type="hidden" name="editFaculty" value="editFaculty"/></td>
        <td><input class="button" type="submit" value=" Edit "/></td>
	</tr>
</table>
</form>