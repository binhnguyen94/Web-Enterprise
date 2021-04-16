<?php
	session_start();
	ini_set('display_errors', 0);
	include("../includes/connection.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>In danh sách tài liệu</title>
</head>
<body onload="window.print();">
<?php
	$chuyenganh_gv=$_SESSION['chuyenganh_gv'];
	if($_SESSION['role']=="Quản trị viên"){$morong=" "; $morong1="";}
	else {$morong="DA.id_faculty=$chuyenganh_gv and"; $morong1="where DA.id_faculty=$chuyenganh_gv";}
	if($_GET['id_faculty']){
		$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.*, SV.fullname from tbl_document DA inner join tbl_groupDoc NDA on DA.groupDocID=NDA.id inner join tbl_falcuty CN on DA.id_faculty=CN.id inner join tbl_student SV on SV.studentID=DA.studentID where $morong DA.studentID in (select studentID from tbl_student where id_faculty=$_GET[id_faculty]) order by DA.id desc";
	}
	elseif($_GET['name']){
		$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.*, SV.fullname from tbl_document DA inner join tbl_groupDoc NDA on DA.groupDocID=NDA.id inner join tbl_falcuty CN on DA.id_faculty=CN.id inner join tbl_student SV on SV.studentID=DA.studentID where $morong DA.title like '%$_GET[name]%' order by DA.id desc";
	}
	else{
		$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.*, SV.fullname from tbl_document DA inner join tbl_groupDoc NDA on DA.groupDocID=NDA.id inner join tbl_falcuty CN on DA.id_faculty=CN.id inner join tbl_student SV on SV.studentID=DA.studentID $morong1 order by DA.id desc";
	}
	$qr=mysql_query($sql);
?>
	<table border="0" width="100%">
		<tr>
			<td style="width:30%; text-align:left;"></td>
			<td style="width:40%; text-align:center;"><b>DANH SÁCH TÀI LIỆU</b></td>
			<td style="width:30%; text-align:right;"><b>Ngày in:</b> <?php echo date('Y-m-d'); ?></td>
		</tr>
	</table><br>
	<table border="1" width="100%" cellspacing="0">
		<tr>
			<td style="width:5%; text-align:center; "><b>STT</b></td>
			<td style="width:15%; text-align:center;"><b>Nhóm tài liệu</b></td>
			<td style="width:15%; text-align:center;"><b>Chuyên ngành</b></td>
			<td style="width:10%; text-align:center;"><b>Mã sinh viên</b></td>
			<td style="width:15%; text-align:center;"><b>Tên sinh viên</b></td>
			<td style="width:20%; text-align:center;"><b>Tên tài liệu</b></td>
			<td style="width:10%; text-align:center;"><b>Ngày upload</b></td>
			<td style="width:10%; text-align:center;"><b>Trạng thái</b></td>
		</tr>
		<?php
			$i=0;
			while ($kq=mysql_fetch_array($qr)) {
				$i++;
				echo "
					<tr>
						<td style='text-align:center;'>$i</td>
						<td>$kq[tennhomdoan]</td>
						<td>$kq[tenchuyennganh]</td>
						<td>$kq[studentID]</td>
						<td>$kq[fullname]</td>
						<td>$kq[title]</td>
						<td>$kq[uploadDate]</td>
						<td>$kq[status]</td>
					</tr>
				";
			}
		?>
	</table>
</body>
</html>