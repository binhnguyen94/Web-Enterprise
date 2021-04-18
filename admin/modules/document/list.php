<div class="content-box-header">
	<?php if($_SESSION['roles']=="Admin" || $_SESSION['roles']=="Coordinator"){ ?>
	<h3>List Document</h3>
	<?php } ?>
	<form>
		<?php if($_SESSION['roles']=="Admin" || $_SESSION['roles']=="Coordinator"){ ?>
		<input type="hidden" name="act" value="document" />
		<input placeholder='Enter name document' name="name" id="searchFile"/>
		<input type="submit" value="Search" class="button">
		<?php } ?>
		<a target="_blank" href="printDocument.php?"><input type="button" value="Print" class="button"></a>
		<a target="_blank" href="downloadzip.php?"><input type="button" value="download zip" class="button"></a>
	</form>
</div>
<?php if($_SESSION['roles']=="Admin" || $_SESSION['roles']=="Coordinator"){ ?>
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
	<?php } ?>
<?php
$faculty_gv=$_SESSION['faculty_gv'];
if($_SESSION['roles']=="Admin" || $_SESSION['roles']=="Coordinator"){$morong=" "; $morong1="";}
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
$document = $_SESSION['image'];
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
$i=0;
ob_start();
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
		if($kq['status']!="Waiting"){
			$tv="select fullname from tbl_admin where adminID='$kq[adminID]'";
			$tv1=mysql_query($tv);
			$tv2=mysql_fetch_array($tv1);
			echo " ($tv2[fullname])</td><td>";
		}
		else{
			echo "</td>";
			echo "<td>[<a href='?act=document&mod=approvedDoc&id=$kq[id]&status=Approved'>Approved</a>] | [<a href='?act=document&mod=approvedDoc&id=$kq[id]&status=Unapproved'>Unapproved</a>] | ";
		}
			echo "[<a href='?act=document&mod=delete&id=$kq[id]' onclick='return checkDel()'>Delete</a>] | [<a href='?act=document&mod=seeSummary&id=$kq[id]'>View</a>]</td>";
			echo "<td><input name='evaluation".$kq[id]."' class='text-form'></td>";
	echo "</tr>";
}

	if(isset($_POST['Search'])){
		ob_end_clean();
		ob_start();
		$sf = trim($_POST['searchFile']);
		$qr = mysql_query("SELECT * FROM tbl_document where document like %sf%");
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
				if($kq['status']!="Waiting"){
					$tv="select fullname from tbl_admin where adminID='$kq[adminID]'";
					$tv1=mysql_query($tv);
					$tv2=mysql_fetch_array($tv1);
					echo " ($tv2[fullname])</td><td>";
				}
				else{
					echo "</td>";
					echo "<td>[<a href='?act=document&mod=approvedDoc&id=$kq[id]&status=Approved'>Approved</a>] | [<a href='?act=document&mod=approvedDoc&id=$kq[id]&status=Unapproved'>Unapproved</a>] | ";
				}
					echo "[<a href='?act=document&mod=delete&id=$kq[id]' onclick='return checkDel()'>Delete</a>] | [<a href='?act=document&mod=seeSummary&id=$kq[id]'>View</a>]</td>";
					echo "<td><input name='evaluation".$kq[id]."' class='text-form'></td>";
			echo "</tr>";
		}
	}
?>

</table>
<?php 
	if($_GET['id_faculty']) pageDivider("select count(*) from tbl_document where $morong studentID in (select studentID from tbl_student where id_faculty=$_GET[id_faculty])"); 
	elseif($_GET['name']) pageDivider("select count(*) from tbl_document where $morong title like'%$_GET[name]%'"); 
	else pageDivider("select count(*) from tbl_document DA $morong1");
?>