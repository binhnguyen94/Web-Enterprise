<?php
	$sql="select * from tbl_groupDoc where id=$_GET[id]";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Edit Group Document</a></h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td width="150px">Name Group Document(*) :</td>
		<td><input class="medium-input" name="name" value="<?php echo $kq['name']; ?>" /></td>
	</tr>
	<tr>
		<td><input type="hidden" name="editGroupDoc" value="editGroupDoc"></td>
        <td><input class="button" type="submit" value=" Edit "></td>
	</tr>
</table>
</form>