<div class="content-box-header">
	<h3>List Student</h3>
	
	<form>
		<input type="hidden" name="act" value="student" />
		<input placeholder='Enter Name Student' name="name" id="searchName"/>
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
		<td>Faculty</td>
		<td>Birthday</td>
		<td>Phone Number</td>
		<td>Email</td>
		<td>Functions</td>
	</tr>	

<?php
if($_GET['name']){
	$sql="select LH.name as 'nameFaculty', SV.* from tbl_student SV inner join tbl_faculty LH on SV.id_faculty=LH.id where SV.fullname like'%$_GET[name]%' ";
}
else $sql="select LH.name as 'nameFaculty', SV.* from tbl_student SV inner join tbl_faculty LH on SV.id_faculty=LH.id";
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['studentID']."</td>";
		echo "<td>".$kq['fullname']."</td>";
		echo "<td>".$kq['nameFaculty']."</td>";
		echo "<td>".$kq['dob']."</td>";
		echo "<td>".$kq['phoneNum']."</td>";
		echo "<td>".$kq['email']."</td>";
		echo "<td>[<a href='?act=student&mod=edit&id=$kq[studentID]'>Edit</a>] | [<a href='?act=student&mod=delete&id=$kq[studentID]' onclick='return checkDel()'>Delete</a>]</td>";
	echo "</tr>";
}
if(isset($_POST['name'])){
	ob_end_clean();
	ob_start();
	$sf = trim($_POST['searchName']);
	$qr = mysql_query("SELECT * FROM tbl_student where fullname like %sf%");
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
}
?>
</table>
