
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>In danh sách sinh viên</title>
</head>
<body onload="window.print();">
<?php
	ini_set('display_errors', 0);
	include("../includes/connection.php");
	$sql="select * from tbl_student order by studentID desc";
	$qr=mysql_query($sql);
?>
	<table border="0" width="100%">
		<tr>
			<td style="width:30%; text-align:left;"></td>
			<td style="width:40%; text-align:center;"><b>DANH SÁCH SINH VIÊN</b></td>
			<td style="width:30%; text-align:right;"><b>Ngày in:</b> <?php echo date('Y-m-d'); ?></td>
		</tr>
	</table><br>
	<table border="1" width="100%" cellspacing="0">
		<tr>
			<td style="width:5%; text-align:center; "><b>STT</b></td>
			<td style="width:20%; text-align:center;"><b>Mã sinh viên</b></td>
			<td style="width:20%; text-align:center;"><b>Họ tên</b></td>
			<td style="width:15%; text-align:center;"><b>Ngày sinh</b></td>
			<td style="width:10%; text-align:center;"><b>Điện thoại</b></td>
			<td style="width:10%; text-align:center;"><b>Email</b></td>
		</tr>
		<?php
			$i=0;
			while ($kq=mysql_fetch_array($qr)) {
				$i++;
				echo "
					<tr>
						<td style='text-align:center;'>$i</td>
						<td>$kq[studentID]</td>
						<td>$kq[fullname]</td>
						<td>$kq[dob]</td>
						<td>$kq[phoneNum]</td>
						<td>$kq[email]</td>
					</tr>
				";
			}
		?>
	</table>
</body>
</html>