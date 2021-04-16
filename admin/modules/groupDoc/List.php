<div class="content-box-header">
	<h3>List Group Document</h3>
</div>
<table>
	<tr>
		<td>No</td>
		<td>Name Group</td>
		<td>Functions</td>
	</tr>	

<?php
$sql="select * from tbl_groupDoc order by id desc";
$qr=mysql_query($sql);
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>".$i."</td>";
		echo "<td>".$kq['name']."</td>";
		echo "<td>[<a href='?act=groupDoc&mod=edit&id=$kq[id]'>Edit</a>] | [<a href='?act=groupDoc&mod=delete&id=$kq[id]' onclick='return checkDel()'>Delete</a>]</td>";
	echo "</tr>";
}
?>
</table>