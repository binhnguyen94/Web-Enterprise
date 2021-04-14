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
			if(id) window.location="?act=doan&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>&id_lophoc="+id;
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
					echo "<option value='$arr[id]'".(($_GET['id_lophoc']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
		</select>
		<a target="_blank" href="indanhsachda.php?<?php echo 'id_hedaotao='.$_GET[id_hedaotao].'&id_khoahoc='.$_GET[id_khoahoc].'&id_lophoc='.$_GET[id_lophoc]; ?>"><input type="button" value="In danh sách" class="button"></a>
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
if($_SESSION['quyensudung']=="Quản trị viên"){$morong=" "; $morong1="";}
else {$morong="DA.id_chuyennganh=$chuyenganh_gv and"; $morong1="where DA.id_chuyennganh=$chuyenganh_gv";}
if($_GET['id_lophoc']){
	$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.*, SV.hoten from tbl_doan DA inner join tbl_nhomdoan NDA on DA.id_nhomdoan=NDA.id inner join tbl_chuyennganh CN on DA.id_chuyennganh=CN.id inner join tbl_sinhvien SV on SV.masinhvien=DA.masinhvien where $morong DA.masinhvien in (select masinhvien from tbl_sinhvien where id_lophoc=$_GET[id_lophoc]) order by DA.id desc";
}
elseif($_GET['name']){
	$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.*, SV.hoten from tbl_doan DA inner join tbl_nhomdoan NDA on DA.id_nhomdoan=NDA.id inner join tbl_chuyennganh CN on DA.id_chuyennganh=CN.id inner join tbl_sinhvien SV on SV.masinhvien=DA.masinhvien where $morong DA.tendoan like '%$_GET[name]%' order by DA.id desc";
}
else{
	$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.*, SV.hoten from tbl_doan DA inner join tbl_nhomdoan NDA on DA.id_nhomdoan=NDA.id inner join tbl_chuyennganh CN on DA.id_chuyennganh=CN.id inner join tbl_sinhvien SV on SV.masinhvien=DA.masinhvien $morong1 order by DA.id desc";
}
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[sogioihan]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['tennhomdoan']."</td>";
		echo "<td>".$kq['tenchuyennganh']."</td>";
		echo "<td>".$kq['masinhvien']."</td>";
		echo "<td>".$kq['hoten']."</td>";
		echo "<td><a href='../upload/$kq[filedoan]' target='_blank'>".$kq['tendoan']."</a></td>";
		echo "<td>".$kq['ngayupload']."</td>";
		echo "<td>".$kq['trangthai'];
		if($kq['trangthai']!="Chưa duyệt"){
			$tv="select hoten from tbl_giaovien where magiaovien='$kq[magiaovien]'";
			$tv1=mysql_query($tv);
			$tv2=mysql_fetch_array($tv1);
			echo " ($tv2[hoten])</td><td>";
		}
		else{
			echo "</td>";
			echo "<td>[<a href='?act=doan&mod=duyetdoan&id=$kq[id]&trangthai=Đã duyệt'>Duyệt tài liệu</a>] | [<a href='?act=doan&mod=duyetdoan&id=$kq[id]&trangthai=Không được duyệt'>Không duyệt</a>] | ";
		}
			echo "[<a href='?act=doan&mod=xoa&id=$kq[id]' onclick='return checkDel()'>Xóa</a>] | [<a href='?act=doan&mod=xemtomtat&id=$kq[id]'>Xem tóm tắt</a>]</td>";
			echo "<td><input name='danhgia".$kq[id]."' class='text-form'></td>";
	echo "</tr>";
}
?>
</table>
<?php 
	if($_GET['id_lophoc']) pageDivider("select count(*) from tbl_doan where $morong masinhvien in (select masinhvien from tbl_sinhvien where id_lophoc=$_GET[id_lophoc])"); 
	elseif($_GET['name']) pageDivider("select count(*) from tbl_doan where $morong tendoan like'%$_GET[name]%'"); 
	else pageDivider("select count(*) from tbl_doan DA $morong1");
?>