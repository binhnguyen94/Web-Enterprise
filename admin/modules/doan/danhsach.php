<div class="content-box-header">
	<h3>Danh sách tài liệu</h3>
	<script type="text/javascript">
		function chuyen_link_hdt(id)
		{
			if(id) window.location="?act=doan&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>&id_hedaotao="+id;
			else window.location="?act=doan&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>";
		}
		function chuyen_link_kh(id)
		{
			if(id) window.location="?act=doan&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>&id_khoahoc="+id;
			else window.location="?act=doan&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>";
		}
		function chuyen_link_lh(id)
		{
			if(id) window.location="?act=doan&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>&id_faculty="+id;
			else window.location="?act=doan&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>";
		}
	</script>
	<form>
		<input type="hidden" name="act" value="doan" />
		<input placeholder='Nhập tên tài liệu' name="name"/>
		<input type="submit" value="Tìm kiếm" class="button">
		Hệ đào tạo: <select onchange='chuyen_link_hdt(this.value)'>
			<option value="">Toàn bộ</option>
			<?php
				$sql="select id, ten from tbl_hedaotao order by id desc";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($_GET['id_hedaotao']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
		</select>
		<select onchange='chuyen_link_kh(this.value)'>
			Khóa học: <option value="">Toàn bộ</option>
			<?php
				$sql="select id, ten from tbl_khoahoc order by id desc";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($_GET['id_khoahoc']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
		</select>
		<select onchange='chuyen_link_lh(this.value)'>
			Lớp học: <option value="">Toàn bộ</option>
			<?php
				$sql="select id, ten from tbl_lophoc where id_hedaotao=$_GET[id_hedaotao] and id_khoahoc=$_GET[id_khoahoc]";
				$qr=mysql_query($sql);
				while ($arr=mysql_fetch_array($qr)) {
					echo "<option value='$arr[id]'".(($_GET['id_faculty']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
		</select>
		<a target="_blank" href="indanhsachda.php?<?php echo 'id_hedaotao='.$_GET[id_hedaotao].'&id_khoahoc='.$_GET[id_khoahoc].'&id_faculty='.$_GET[id_faculty]; ?>"><input type="button" value="In danh sách" class="button"></a>
	</form>
</div>
<table>
	<tr>
		<td>STT</td>
		<td>Nhóm tài liệu</td>
		<td>Chuyên ngành</td>
		<td>Mã sinh viên</td>
		<td>Tên sinh viên</td>
		<td>Tên tài liệu</td>
		<td>Ngày upload</td>
		<td>Trạng thái</td>
		<td>Chức năng</td>
		<td>Đánh giá</td>
	</tr>
<?php
$chuyenganh_gv=$_SESSION['chuyenganh_gv'];
if($_SESSION['role']=="Quản trị viên"){$morong=" "; $morong1="";}
else {$morong="DA.id_faculty=$chuyenganh_gv and"; $morong1="where DA.id_faculty=$chuyenganh_gv";}
if($_GET['id_faculty']){
	$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.*, SV.fullname from tbl_document DA inner join tbl_groupDoc NDA on DA.groupDocID=NDA.id inner join tbl_falcuty CN on DA.id_faculty=CN.id inner join tbl_student SV on SV.studentID=DA.studentID where $morong DA.studentID in (select studentID from tbl_student where id_faculty=$_GET[id_faculty]) order by DA.id desc";
}
elseif($_GET['name']){
	$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.*, SV.fullname from tbl_document DA inner join tbl_groupDoc NDA on DA.groupDocID=NDA.id inner join tbl_falcuty CN on DA.id_faculty=CN.id inner join tbl_student SV on SV.studentID=DA.studentID where $morong DA.title like '%$_GET[name]%' order by DA.id desc";
}
else{
	$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.*, SV.fullname from tbl_document DA inner join tbl_groupDoc NDA on DA.groupDocID=NDA.id inner join tbl_falcuty CN on DA.id_faculty=CN.id inner join tbl_student SV on SV.studentID=DA.studentID $morong1 order by DA.id desc";
}
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['tennhomdoan']."</td>";
		echo "<td>".$kq['tenchuyennganh']."</td>";
		echo "<td>".$kq['studentID']."</td>";
		echo "<td>".$kq['fullname']."</td>";
		echo "<td><a href='../upload/$kq[document]' target='_blank'>".$kq['title']."</a></td>";
		echo "<td>".$kq['uploadDate']."</td>";
		echo "<td>".$kq['status'];
		if($kq['status']!="Chưa duyệt"){
			$tv="select fullname from tbl_admin where adminID='$kq[adminID]'";
			$tv1=mysql_query($tv);
			$tv2=mysql_fetch_array($tv1);
			echo " ($tv2[fullname])</td><td>";
		}
		else{
			echo "</td>";
			echo "<td>[<a href='?act=doan&mod=duyetdoan&id=$kq[id]&status=Đã duyệt'>Duyệt tài liệu</a>] | [<a href='?act=doan&mod=duyetdoan&id=$kq[id]&status=Không được duyệt'>Không duyệt</a>] | ";
		}
			echo "[<a href='?act=doan&mod=xoa&id=$kq[id]' onclick='return checkDel()'>Xóa</a>] | [<a href='?act=doan&mod=xemtomtat&id=$kq[id]'>Xem tóm tắt</a>]</td>";
			echo "<td><input name='danhgia".$kq[id]."' class='text-form'></td>";
	echo "</tr>";
}
?>
</table>
<?php 
	if($_GET['id_faculty']) pageDivider("select count(*) from tbl_document where $morong studentID in (select studentID from tbl_student where id_faculty=$_GET[id_faculty])"); 
	elseif($_GET['name']) pageDivider("select count(*) from tbl_document where $morong title like'%$_GET[name]%'"); 
	else pageDivider("select count(*) from tbl_document DA $morong1");
?>