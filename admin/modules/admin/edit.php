<?php
	$sql="select * from tbl_admin where adminID='$_GET[id]'";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Edit User</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td width="150px">Faculty(*) :</td>
		<td>
			<select name="id_faculty">
			<?php
				$sql="select id,name from tbl_faculty";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($kq['id_faculty']==$arr['id'])?' selected':'').">$arr[name]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Username(*) :</td>
		<td><input class="medium-input" readonly="1" name="username" value="<?php echo $kq[adminID]; ?>" /></td>
	</tr>
	<tr>
		<td>Password(*) :</td>
		<td><input class="medium-input" name="password" value="" /></td>
	</tr>
	<tr>
		<td>Fullname(*) :</td>
		<td><input class="medium-input" name="fullname" value="<?php echo $kq[fullname]; ?>" /></td>
	</tr>
	<tr>
		<td>Birthday(*) :</td>
		<td><input class="medium-input" type="date" name="dob" value="<?php echo $kq[dob]; ?>" /></td>
	</tr>
	<tr>
		<td>Phone Number(*) :</td>
		<td><input class="medium-input" name="phoneNum" value="<?php echo $kq[phoneNum]; ?>" /></td>
	</tr>
	<tr>
		<td>Email(*) :</td>
		<td><input class="medium-input" name="email" value="<?php echo $kq[email]; ?>" /></td>
	</tr>
	<tr>
		<td>Roles(*) :</td>
		<td>
			<select name="roles">
			<?php
				echo "<option value='Coordinator'>Coordinator</option>".
				"<option value='Admin'".(($kq['roles']=='Admin')?' selected':'').">Admin</option>".
				"<option value='Marketing Manager'".(($kq['roles']=='Marketing Manager')?' selected':'').">Marketing Manager</option>";
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td><input type="hidden" name="editAdmin" value="editAdmin"/></td>
        <td><input class="button" type="submit" value="Accpet"/></td>
	</tr>
</table>
</form>