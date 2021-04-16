<?php
	$sql="select title, description from tbl_document where id=$_GET[id]";
	$qr=mysql_query($sql);
	$kq=mysql_fetch_array($qr);
?>
<div class="content-box-header">
	<h3>Tóm tắt tài liệu <?php echo $kq['title']; ?></h3>
</div>
<table>
	<tr>
		<td><?php echo $kq['description']; ?></td>
	</tr>	
</table>