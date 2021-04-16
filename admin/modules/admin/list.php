<div class="content-box-header">
	<h3>List User</h3>
</div>
<table>
	<tr>
		<td>No</td>
		<td>Username</td>
		<td>Faculty</td>
		<td>Fullname</td>
		<td>Birthday</td>
		<td>Phone Number</td>
		<td>Email</td>
		<td>Roles</td>
		<td>Functions</td>
	</tr>	

<?php
$sql="select FA.name as 'nameFaculty', AD.* from tbl_admin AD inner join tbl_faculty FA on AD.id_faculty=FA.id";
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['adminID']."</td>";
		echo "<td>".$kq['nameFaculty']."</td>";
		echo "<td>".$kq['fullname']."</td>";
		echo "<td>".$kq['dob']."</td>";
		echo "<td>".$kq['phoneNum']."</td>";
		echo "<td>".$kq['email']."</td>";
		echo "<td>".$kq['roles']."</td>";
		echo "<td>[<a href='?act=admin&mod=edit&id=$kq[adminID]'>Edit</a>] | [<a href='?act=admin&mod=delete&id=$kq[adminID]' onclick='return checkDel()'>Delete</a>]</td>";
	echo "</tr>";
}
?>
</table>
<?php pageDivider("select count(*) from tbl_admin"); ?>