<?php
	if($_POST['thuchien_dangnhap']=="thuchien_dangnhap"){
		if($_POST['tendangnhap']!="" & $_POST['password']!=""){
			$password=md5($_POST['password']);
			$tv="select * from tbl_student where studentID='$_POST[tendangnhap]' and password='$password'";
			$qr=mysql_query($tv);
			$kq=mysql_fetch_array($qr);
			if($kq){
				$_SESSION['studentID']=$kq['studentID'];
				$_SESSION['hoten_sv']=$kq['fullname'];
				previousPage();
			} 
			else{
				notice("Đăng nhập thất bại, vui lòng kiểm tra lại tên đăng nhập và mật khẩu!");
				previousPage();
			}
		}
		else{
			notice("Không được bỏ trống tên đăng nhập hoặc mật khẩu!");
			previousPage();
		}
	}
?>
<?php if($_SESSION['studentID']!="" & $_SESSION['hoten_sv']!=""){ ?>
	<p style="margin-left:10px;"><b>
		<a href='?act=capnhattaikhoan'>Sinh viên: <?php echo $_SESSION['hoten_sv']; ?></a><br/>
		<a href='?act=dangxuat'>Đăng xuất</a>
	</b></p>
<?php } else{ ?>
<form method="post" action="">
<table>
	<tr>
		<td><input name="tendangnhap" placeholder='Tên đăng nhập' class='text-formlogin'></td>
	</tr>
	<tr>
		<td><input name="password" type="password" placeholder='mật khẩu' class='text-formlogin'></td>
	</tr>
	<tr>
		<td>
			<center><input type="hidden" name="thuchien_dangnhap" value="thuchien_dangnhap">
			<input type="submit" value="Đăng nhập" class='button-form'>
			</center>
		</td>
	</tr>
</table>
</form>
<?php } ?>