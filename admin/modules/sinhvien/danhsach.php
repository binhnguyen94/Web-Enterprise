<div class="content-box-header">
	<h3>Danh sách sinh viên</h3>
	<script type="text/javascript">
		function chuyen_link_hdt(id)
		{
			if(id) window.location="?act=sinhvien&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>&id_hedaotao="+id;
			else window.location="?act=sinhvien&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>";
		}
		function chuyen_link_kh(id)
		{
			if(id) window.location="?act=sinhvien&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>&id_khoahoc="+id;
			else window.location="?act=sinhvien&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>";
		}
		function chuyen_link_lh(id)
		{
			if(id) window.location="?act=sinhvien&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>&id_faculty="+id;
			else window.location="?act=sinhvien&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>";
		}
	</script>
	<form>
		<input type="hidden" name="act" value="sinhvien" />
		<input placeholder='Nhập tên sinh viên' name="name"/>
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
		<a target="_blank" href="indanhsachsv.php?<?php echo 'id_hedaotao='.$_GET[id_hedaotao].'&id_khoahoc='.$_GET[id_khoahoc].'&id_faculty='.$_GET[id_faculty]; ?>"><input type="button" value="In danh sách" class="button"></a>
	</form>
</div>
<table>
	<tr>
		<td>STT</td>
		<td>Tên đăng nhập</td>
		<td>Lớp học</td>
		<td>Họ tên</td>
		<td>Ngày sinh</td>
		<td>Điện thoại</td>
		<td>Email</td>
		<td>Chức năng</td>
	</tr>	

<?php
if($_GET['id_faculty']){
	$sql="select LH.ten as 'tenlophoc', SV.* from tbl_student SV inner join tbl_lophoc LH on SV.id_faculty=LH.id where LH.id=$_GET[id_faculty]";
}
elseif($_GET['name']){
	$sql="select LH.ten as 'tenlophoc', SV.* from tbl_student SV inner join tbl_lophoc LH on SV.id_faculty=LH.id where SV.fullname like'%$_GET[name]%' ";
}
else $sql="select LH.ten as 'tenlophoc', SV.* from tbl_student SV inner join tbl_lophoc LH on SV.id_faculty=LH.id";
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['studentID']."</td>";
		echo "<td>".$kq['tenlophoc']."</td>";
		echo "<td>".$kq['fullname']."</td>";
		echo "<td>".$kq['dob']."</td>";
		echo "<td>".$kq['phoneNum']."</td>";
		echo "<td>".$kq['email']."</td>";
		echo "<td>[<a href='?act=sinhvien&mod=sua&id=$kq[studentID]'>Sửa</a>] | [<a href='?act=sinhvien&mod=xoa&id=$kq[studentID]' onclick='return checkDel()'>Xóa</a>]</td>";
	echo "</tr>";
}
?>
</table>
<?php 
	if($_GET['id_faculty']){
		pageDivider("select count(*) from tbl_student where id_faculty=$_GET[id_faculty]"); 
	}
	elseif($_GET['name']){
		pageDivider("select count(*) from tbl_student where fullname like'%$_GET[name]%'"); 
	}
	else{
		pageDivider("select count(*) from tbl_student"); 
	}
?>