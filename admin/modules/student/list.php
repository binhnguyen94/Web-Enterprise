<div class="content-box-header">
	<h3>List Student</h3>
	
	<form>
		<input type="hidden" name="act" value="student" />
		<input placeholder='Enter Name Student' name="name"/>
		<input type="submit" value="Search" class="button">
		<a target="_blank" href="printStudent.php?">
			<input type="button" value="Print" class="button">
		</a>
	</form>
	
</div>
<table>
	<tr>
		<td>No</td>
		<td>Username</td>
		<td>Fullname</td>
		<td>Birthday</td>
		<td>Phone Number</td>
		<td>Email</td>
		<td>Functions</td>
	</tr>	

<?php
$sql="select * from tbl_student order by studentID desc";
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
$i=0;
ob_start();
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['studentID']."</td>";
		echo "<td>".$kq['fullname']."</td>";
		echo "<td>".$kq['dob']."</td>";
		echo "<td>".$kq['phoneNum']."</td>";
		echo "<td>".$kq['email']."</td>";
		echo "<td>[<a href='?act=student&mod=edit&id=$kq[studentID]'>Edit</a>] | [<a href='?act=student&mod=delete&id=$kq[studentID]' onclick='return checkDel()'>Delete</a>]</td>";
	echo "</tr>";
}
if(isset($_POST['Search'])){
	ob_end_clean();
	ob_start();
	$sf = trim($_POST['searchName']);
	$qr = mysql_query("SELECT * FROM tbl_student where fullname like %sf%");
}
?>
</table>
