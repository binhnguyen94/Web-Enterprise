<div class="content-box-header">
	<h3>Add New Student</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<!-- <tr>
		<td>Import a list from excel :</td>
		<td><input type="file" class="medium-input" name="file" /></td>
	</tr> -->
	<tr>
		<td>Username(*) :</td>
		<td><input class="medium-input" name="username" /></td>
	</tr>
	<tr>
		<td>Password(*) :</td>
		<td><input class="medium-input" name="password" /></td>
	</tr>
	<tr>
		<td>Fullname(*) :</td>
		<td><input class="medium-input" name="fullname" /></td>
	</tr>
	<tr>
		<td width="150px">Faculty(*) :</td>
		<td>
			<select name="id_faculty">
			<?php
				$sql="select id, name from tbl_faculty";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($_SESSION['id_faculty']==$arr['id'])?' selected':'').">$arr[name]</option>";
				}
			?>
			</select>
		</td>
	</tr>
	<tr>
		<td>Birthday(*) :</td>
		<td><input class="medium-input" type="date" name="dob" /></td>
	</tr>
	<tr>
		<td>Phone Number(*) :</td>
		<td><input class="medium-input" name="phoneNum" /></td>
	</tr>
	<tr>
		<td>Email(*) :</td>
		<td><input class="medium-input" name="email" /></td>
	</tr>
	<tr>
		<td><input type="hidden" name="addStudent" value="addStudent"/></td>
        <td><input class="button" type="submit" value=" Add New "/></td>
	</tr>
</table>
</form>