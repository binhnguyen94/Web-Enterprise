<div class="content-box-header">
	<h3>Danh sách lớp học</h3>
</div>
<table>
	<tr>
		<td>STT</td>
		<td>Hệ đào tạo</td>
		<td>Khóa học</td>
		<td>Tên</td>
		<td>Chức năng</td>
	</tr>	

<?php
$sql="select HDT.ten as 'tenhedaotao', KH.ten as 'tenkhoahoc', LH.* from tbl_hedaotao HDT inner join tbl_lophoc LH on HDT.id=LH.id_hedaotao inner join tbl_khoahoc KH on KH.id=LH.id_khoahoc order by LH.id desc";
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[sogioihan]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['tenhedaotao']."</td>";
		echo "<td>".$kq['tenkhoahoc']."</td>";
		echo "<td>".$kq['ten']."</td>";
		echo "<td>[<a href='?act=lophoc&mod=sua&id=$kq[id]'>Sửa</a>] | [<a href='?act=lophoc&mod=xoa&id=$kq[id]' onclick='return checkDel()'>Xóa</a>]</td>";
	echo "</tr>";
}
?>
</table>
<?php pageDivider("select count(*) from tbl_lophoc"); ?>