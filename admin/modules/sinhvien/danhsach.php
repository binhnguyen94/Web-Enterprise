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
			if(id) window.location="?act=sinhvien&id_hedaotao=<?php echo $_GET[id_hedaotao]; ?>&id_khoahoc=<?php echo $_GET[id_khoahoc]; ?>&id_lophoc="+id;
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
					echo "<option value='$arr[id]'".(($_GET['id_lophoc']==$arr['id'])?' selected':'').">$arr[ten]</option>";
				}
			?>
		</select>
		<a target="_blank" href="indanhsachsv.php?<?php echo 'id_hedaotao='.$_GET[id_hedaotao].'&id_khoahoc='.$_GET[id_khoahoc].'&id_lophoc='.$_GET[id_lophoc]; ?>"><input type="button" value="In danh sách" class="button"></a>
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
if($_GET['id_lophoc']){
	$sql="select LH.ten as 'tenlophoc', SV.* from tbl_sinhvien SV inner join tbl_lophoc LH on SV.id_lophoc=LH.id where LH.id=$_GET[id_lophoc]";
}
elseif($_GET['name']){
	$sql="select LH.ten as 'tenlophoc', SV.* from tbl_sinhvien SV inner join tbl_lophoc LH on SV.id_lophoc=LH.id where SV.hoten like'%$_GET[name]%' ";
}
else $sql="select LH.ten as 'tenlophoc', SV.* from tbl_sinhvien SV inner join tbl_lophoc LH on SV.id_lophoc=LH.id";
$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[sogioihan]");
$i=0;
while ($kq=mysql_fetch_array($qr)) {
	$i++;
	echo "<tr>";
		echo "<td>$i</td>";
		echo "<td>".$kq['masinhvien']."</td>";
		echo "<td>".$kq['tenlophoc']."</td>";
		echo "<td>".$kq['hoten']."</td>";
		echo "<td>".$kq['ngaysinh']."</td>";
		echo "<td>".$kq['dienthoai']."</td>";
		echo "<td>".$kq['email']."</td>";
		echo "<td>[<a href='?act=sinhvien&mod=sua&id=$kq[masinhvien]'>Sửa</a>] | [<a href='?act=sinhvien&mod=xoa&id=$kq[masinhvien]' onclick='return checkXoa()'>Xóa</a>]</td>";
	echo "</tr>";
}
?>
</table>
<?php 
	if($_GET['id_lophoc']){
		phantrang("select count(*) from tbl_sinhvien where id_lophoc=$_GET[id_lophoc]"); 
	}
	elseif($_GET['name']){
		phantrang("select count(*) from tbl_sinhvien where hoten like'%$_GET[name]%'"); 
	}
	else{
		phantrang("select count(*) from tbl_sinhvien"); 
	}
?>