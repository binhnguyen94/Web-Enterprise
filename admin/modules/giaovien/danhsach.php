<div class="content-box-header">
	<h3>Danh sách người dùng</h3>
</div>
<table>
	<tr>
		<td>STT</td>
		<td>Tên đăng nhập</td>
		<td>Chuyên ngành</td>
		<td>Họ tên</td>
		<td>Ngày sinh</td>
		<td>Điện thoại</td>
		<td>Email</td>
		<td>Quyền sử dụng</td>
		<td>Chức năng</td>
	</tr>	

<?php
$sql="select CN.ten as 'tenchuyennganh', GV.* from tbl_giaovien GV inner join tbl_chuyennganh CN on GV.id_chuyennganh=CN.id";
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['adminID']."</td>";
		echo "<td>".$kq['tenchuyennganh']."</td>";
		echo "<td>".$kq['fullname']."</td>";
		echo "<td>".$kq['dob']."</td>";
		echo "<td>".$kq['phoneNum']."</td>";
		echo "<td>".$kq['email']."</td>";
		echo "<td>".$kq['role']."</td>";
		echo "<td>[<a href='?act=giaovien&mod=sua&id=$kq[adminID]'>Sửa</a>] | [<a href='?act=giaovien&mod=xoa&id=$kq[adminID]' onclick='return checkDel()'>Xóa</a>]</td>";
	echo "</tr>";
}
?>
</table>
<?php pageDivider("select count(*) from tbl_admin"); ?>