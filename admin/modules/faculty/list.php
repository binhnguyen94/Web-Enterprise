<div class="content-box-header">
	<h3>List Faculty</h3>
</div>
<table>
	<tr style="font-size: 15px">
		<td><b>No</b></td>
		<td><b>Name Faculty</b></td>
		<td><b>Functions</b></td>
	</tr>	

<?php
$sql="select * from tbl_faculty order by id desc";
$qr=mysql_query($sql);
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['name']."</td>";
		echo "<td>[<a href='?act=faculty&mod=edit&id=$kq[id]'>Edit</a>] | [<a href='?act=faculty&mod=delete&id=$kq[id]' onclick='return checkDel()'>Delete</a>]</td>";
	echo "</tr>";
}
?>
</table>