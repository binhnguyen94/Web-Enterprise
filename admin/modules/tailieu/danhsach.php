<div class="content-box-header">
	<h3>Danh sách tài liệu</h3>
</div>
<table>
	<tr>
		<td>STT</td>
		<td>Nhóm tài liệu</td>
		<td>Chuyên ngành</td>
		<td>Mã người dùng</td>
		<td>Tên tài liệu</td>
		<td>Hình ảnh</td>
		<td>Chức năng</td>
	</tr>
<?php
$magiaovien=$_SESSION['magiaovien'];
$sql="select NTL.ten as 'tennhomtailieu', CN.ten as 'tenchuyennganh', TL.* from tbl_tailieu TL inner join tbl_nhomtailieu NTL on TL.id_nhomtailieu=NTL.id inner join tbl_chuyennganh CN on TL.id_chuyennganh=CN.id where TL.magiaovien='$magiaovien' order by TL.id desc";
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[sogioihan]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['tennhomtailieu']."</td>";
		echo "<td>".$kq['tenchuyennganh']."</td>";
		echo "<td>".$kq['magiaovien']."</td>";
		echo "<td>".$kq['tentailieu']."</td>";
		echo "<td><img width='40px' height='40px' src='../upload/".$kq['hinhanh']."'></td>";
		echo "<td>[<a href='?act=tailieu&mod=sua&id=$kq[id]'>Sửa</a>] | [<a href='?act=tailieu&mod=xoa&id=$kq[id]' onclick='return checkXoa()'>Xóa</a>]</td>";
	echo "</tr>";
}
?>
</table>
<?php phantrang("select count(*) from tbl_tailieu where magiaovien='$magiaovien'"); ?>