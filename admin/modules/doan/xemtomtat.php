<?php
	$sql="select tendoan, tomtat from tbl_doan where id=$_GET[id]";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Tóm tắt tài liệu <?php echo $kq['tendoan']; ?></h3>
</div>
<table>
	<tr>
		<td><?php echo $kq['tomtat']; ?></td>
	</tr>	
</table>