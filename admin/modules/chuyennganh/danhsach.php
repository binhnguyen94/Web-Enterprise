<div class="content-box-header">
	<h3>Danh sách chuyên ngành</h3>
</div>
<table>
	<tr>
		<td>STT</td>
		<td>Tên chuyên ngành</td>
		<td>Chức năng</td>
	</tr>	

<?php
$sql="select * from tbl_chuyennganh order by id desc";
$qr=mysql_query($sql);
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['ten']."</td>";
		echo "<td>[<a href='?act=chuyennganh&mod=sua&id=$kq[id]'>Sửa</a>] | [<a href='?act=chuyennganh&mod=xoa&id=$kq[id]' onclick='return checkDel()'>Xóa</a>]</td>";
	echo "</tr>";
}
?>
</table>