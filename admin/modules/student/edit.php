<?php
	$sql="select * from tbl_student where studentID='$_GET[id]'";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Edit Student</h3>
</div>
<form method="post" action="" enctype="multipart/form-data">
<table>
	<tr>
		<td>Username(*) :</td>
		<td><input class="medium-input" readonly="1" name="username" value="<?php echo $kq[studentID]; ?>" /></td>
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
		<td><input type="hidden" name="editStudent" value="editStudent"/></td>
        <td><input class="button" type="submit" value=" Edit "/></td>
	</tr>
</table>
</form>