<div class="content-box-header">
	<h3>Danh sách nhóm tài liệu</h3>
</div>
<table>
	<tr>
		<td>STT</td>
		<td>Tên</td>
		<td>Chức năng</td>
	</tr>	

<?php
$sql="select * from tbl_nhomdoan order by id desc";
$qr=mysql_query($sql);
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$kq['ten']."</td>";
		echo "<td>[<a href='?act=nhomdoan&mod=sua&id=$kq[id]'>Sửa</a>] | [<a href='?act=nhomdoan&mod=xoa&id=$kq[id]' onclick='return checkXoa()'>Xóa</a>]</td>";
	echo "</tr>";
}
?>
</table>