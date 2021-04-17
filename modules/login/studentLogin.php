<?php
	if($_POST['functionLogin']=="functionLogin"){
		if($_POST['username']!="" & $_POST['password']!=""){
			$password=md5($_POST['password']);
			$tv="select * from tbl_student where studentID='$_POST[username]' and password='$password'";
			$qr=mysql_query($tv);
			$kq=mysql_fetch_array($qr);
			if($kq){
				$_SESSION['studentID']=$kq['studentID'];
				$_SESSION['fullname_stu']=$kq['fullname'];
				previousPage();
			} 
			else{
				notice("Login failed, Please check your username and password!");
				previousPage();
			}
		}
		else{
			notice("Username and password cannot be blank!");
			previousPage();
		}
	}
?>
<?php if($_SESSION['studentID']!="" & $_SESSION['fullname_stu']!=""){ ?>
	<p style="margin-left:10px;"><b>
		<a href='?act=updateAccount'>Student: <?php echo $_SESSION['fullname_stu']; ?></a><br/>
		<a href='?act=logout'>Logout</a>
	</b></p>
<?php } else{ ?>
<form method="post" action="">
<table>
	<tr>
		<td><input name="username" placeholder='Username' class='text-formlogin'></td>
	</tr>
	<tr>
		<td><input name="password" type="password" placeholder='Password' class='text-formlogin'></td>
	</tr>
	<tr>
		<td>
			<center><input type="hidden" name="functionLogin" value="functionLogin">
			<input type="submit" value="Login" class='button-form'>
			</center>
		</td>
	</tr>
</table>
</form>
<?php } ?>