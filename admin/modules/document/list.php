<div class="content-box-header">
	<h3>List Document</h3>
	<form>
		<input type="hidden" name="act" value="document" />
		<input placeholder='Enter name document' name="name"/>
		<input type="submit" value="Search" class="button">
		<a target="_blank" href="printDocument.php?"><input type="button" value="Print" class="button"></a>
		<a target="_blank" href="downloadzip.php?<?php  echo 'id_hedaotao='.$_GET[id_hedaotao].'&id_khoahoc='.$_GET[id_khoahoc].'&id_lophoc='.$_GET[id_lophoc]; ?>"><input type="button" value="download zip" class="button"></a>
	</form>
</div>
<table>
	<tr>
		<td>No</td>
		<td>Group Document</td>
		<td>Faculty</td>
		<td>Student ID</td>
		<td>Name Student</td>
		<td>Name Document</td>
		<td>Upload date</td>
		<td>Status</td>
		<td>Function</td>
		<td>Evaluation</td>
	</tr>
<?php
$faculty_gv=$_SESSION['faculty_gv'];
if($_SESSION['roles']=="Admin"){$morong=" "; $morong1="";}
else {$morong="DA.id_faculty=$faculty_gv and"; $morong1="where DA.id_faculty=$faculty_gv";}
if($_GET['id_faculty']){
	$sql="select NDA.name as 'nameGroup', CN.name as 'nameFaculty', DA.*, SV.fullname from tbl_document DA inner join tbl_groupDoc NDA on DA.id_groupDoc=NDA.id inner join tbl_faculty CN on DA.id_faculty=CN.id inner join tbl_student SV on SV.studentID=DA.studentID where $morong DA.studentID in (select studentID from tbl_student where id_faculty=$_GET[id_faculty]) order by DA.id desc";
}
elseif($_GET['name']){
	$sql="select NDA.name as 'nameGroup', CN.name as 'nameFaculty', DA.*, SV.fullname from tbl_document DA inner join tbl_groupDoc NDA on DA.id_groupDoc=NDA.id inner join tbl_faculty CN on DA.id_faculty=CN.id inner join tbl_student SV on SV.studentID=DA.studentID where $morong DA.title like '%$_GET[name]%' order by DA.id desc";
}
else{
	$sql="select NDA.name as 'nameGroup', CN.name as 'nameFaculty', DA.*, SV.fullname from tbl_document DA inner join tbl_groupDoc NDA on DA.id_groupDoc=NDA.id inner join tbl_faculty CN on DA.id_faculty=CN.id inner join tbl_student SV on SV.studentID=DA.studentID $morong1 order by DA.id desc";
}
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['nameGroup']."</td>";
		echo "<td>".$kq['nameFaculty']."</td>";
		echo "<td>".$kq['studentID']."</td>";
		echo "<td>".$kq['fullname']."</td>";
		echo "<td><a href='../upload/$kq[document]' target='_blank'>".$kq['title']."</a></td>";
		echo "<td>".$kq['uploadDate']."</td>";
		echo "<td>".$kq['status'];
		if($kq['status']!="Unapproved"){
			$tv="select fullname from tbl_admin where adminID='$kq[adminID]'";
			$tv1=mysql_query($tv);
			$tv2=mysql_fetch_array($tv1);
			echo " ($tv2[fullname])</td><td>";
		}
		else{
			echo "</td>";
			echo "<td>[<a href='?act=document&mod=approvedDoc&id=$kq[id]&status=Approved'>Approved Document</a>] | [<a href='?act=document&mod=approvedDoc&id=$kq[id]&status=Not approved'>Not approved</a>] | ";
		}
			echo "[<a href='?act=document&mod=delete&id=$kq[id]' onclick='return checkDel()'>Delete</a>] | [<a href='?act=document&mod=seeSummary&id=$kq[id]'>See summary</a>]</td>";
			echo "<td><input name='evaluation".$kq[id]."' class='text-form'></td>";
	echo "</tr>";
}
?>
</table>
<?php 
	if($_GET['id_faculty']) pageDivider("select count(*) from tbl_document where $morong studentID in (select studentID from tbl_student where id_faculty=$_GET[id_faculty])"); 
	elseif($_GET['name']) pageDivider("select count(*) from tbl_document where $morong title like'%$_GET[name]%'"); 
	else pageDivider("select count(*) from tbl_document DA $morong1");
?>