<div class="content-box-header">
	<h3>Danh sách hệ đào tạo</h3>
</div>
<table>
	<tr>
		<td>STT</td>
		<td>Tên hệ đào tạo</td>
		<td>Chức năng</td>
	</tr>	

<?php
$sql="select * from tbl_hedaotao order by id desc";
$qr=mysql_query($sql);
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['ten']."</td>";
		echo "<td>[<a href='?act=hedaotao&mod=sua&id=$kq[id]'>Sửa</a>] | [<a href='?act=hedaotao&mod=xoa&id=$kq[id]' onclick='return checkDel()'>Xóa</a>]</td>";
	echo "</tr>";
}
?>
</table>