<?php
	if($_POST['functionUpdate']=="functionUpdate"){
		if($_POST['id_faculty']!="" & $_POST['dob']!="" & $_POST['fullname']!="" & $_POST['phoneNum']!="" & $_POST['email']!=""){
			if($_POST['password']==""){
				$tv="update tbl_student set fullname='$_POST[fullname]', dob='$_POST[dob]', id_faculty=$_POST[id_faculty], phoneNum='$_POST[phoneNum]', email='$_POST[email]' where studentID=$_SESSION[studentID]";
			}
			else{
				$password=md5($_POST['password']);
				$tv="update tbl_student set password='$password', fullname='$_POST[fullname]', dob='$_POST[dob]', id_faculty=$_POST[id_faculty], phoneNum='$_POST[phoneNum]', email='$_POST[email]' where studentID=$_SESSION[studentID]";
			}
			mysql_query($tv);
		}
		else{
			notice("Information cannot be blank (*)!");
		}
		redirect("?act=updateAccount");
	}
?>
<div class='new_detail'>
	<h3><a href="index.php">Homepage</a><span class="next"></span> Update Account</h3>
	<div class="content_new">
		<?php
			$tv="select * from tbl_student where studentID=$_SESSION[studentID]";
			$qr=mysql_query($tv);
			$kq=mysql_fetch_array($qr);
		?>
		<form method="post" action="">
		<table>
			<tr>
				<td width="150px">Faculty(*):</td>
				<td>
					<select class='text-form' name="id_faculty">
						<?php
							$sql="select * from tbl_faculty";
							$qr=mysql_query($sql);
							while ($arr=mysql_fetch_array($qr)) {
								echo "<option value='$arr[id]' ".(($kq['id_faculty']==$arr['id'])?'selected' : '').">$arr[name]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Username(*):</td>
				<td><input name="username" readonly="true" value="<?php echo $kq[studentID]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Password:</td>
				<td><input name="password" class='text-form'></td>
			</tr>
			<tr>
				<td>Fullname(*):</td>
				<td><input name="fullname" value="<?php echo $kq[fullname]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Birthday(*):</td>
				<td><input name="dob" type="date" value="<?php echo $kq[dob]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Phone Number(*):</td>
				<td><input name="phoneNum" value="<?php echo $kq[phoneNum]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td>Email(*):</td>
				<td><input name="email" value="<?php echo $kq[email]; ?>" class='text-form'></td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="functionUpdate" value="functionUpdate">
					<input type="reset" value=" Reset " class='button-form'>
					<input type="submit" value=" Update " class='button-form'>
				</td>
			</tr>
		</table>
		</form>
	</div>
</div>
