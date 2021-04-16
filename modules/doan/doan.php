<div class='new_detail'>
	<h3><a href="index.php">Trang chủ</a><span class="next"></span> Quản lý tài liệu theo sinh viên</h3>
	<div class='content_new'>
		<?php
		if($_SESSION['studentID']==""){
			echo "<h2>Vui lòng đăng nhập để xem thông tin!</h2>";
		}
		else{
			if($_POST['thuchien_guidoan']=="thuchien_guidoan"){
				$groupDocID=$_POST['groupDocID'];
				$id_faculty=$_POST['id_faculty'];
				$studentID=$_SESSION['studentID'];
				$title=trim($_POST['title']);
				$checkdy=trim($_POST['checkdy']);
				$uploadDate=date('Y-m-d');
				$document=$_FILES['document']['name'];
				$description=trim($_POST['description']);
                
                
				if($groupDocID!="" & $id_faculty!="" & $studentID!="" & $title!="" & $uploadDate!="" & $document!="" & $description!=""){
					if($checkdy=="on")
					{
					$link_upload="upload/".$document;
					move_uploaded_file($_FILES['document']['tmp_name'],$link_upload);

					$sql="Insert into tbl_document value(NULL, $groupDocID, $id_faculty, '$studentID', '$title', '$uploadDate', '$document', 'Chưa duyệt', 0, '$description')";
					mysql_query($sql);
					redirect("?act=doan");
				 }else{
				 	notice("Bạn cần đồng ý điều khoản và điều kiện");
					previousPage();
				 }
				}
				else{
					notice("Không được bỏ trống dữ liệu (*)!");
					previousPage();
				}
			}
		?>
		<ul>
		<table border="1" width="100%" cellspacing="0">
			<tr>
				<td class='tieudeketqua'>STT</td>
				<td class='tieudeketqua'>Nhóm tài liệu</td>
				<td class='tieudeketqua'>Chuyên ngành</td>
				<td class='tieudeketqua'>Tên tài liệu</td>
				<td class='tieudeketqua'>Ngày upload</td>
				<td class='tieudeketqua'>Trạng thái</td>
			</tr>
		<?php
			$sql="select NDA.ten as 'tennhomdoan', CN.ten as 'tenchuyennganh', DA.* from tbl_document DA inner join tbl_groupDoc NDA on DA.groupDocID=NDA.id inner join tbl_falcuty CN on DA.id_faculty=CN.id where DA.studentID='$_SESSION[studentID]' order by DA.id desc ";
			$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
			$i=0;
			while ($arr=mysql_fetch_array($qr)) {
				$i++;
				echo "<tr>
					<td><center>$i</center></td>
					<td>$arr[tennhomdoan]</td>
					<td>$arr[tenchuyennganh]</td>
					<td><a href='upload/$arr[document]' target='_blank'><u>$arr[title]</u></a></td>
					<td>$arr[uploadDate]</td>
					<td>$arr[status]</td>
				</tr>";
			}
		?>
		</table>
		</ul>
	</div>
	<?php pageDivider("select count(*) from tbl_document where studentID='$_SESSION[studentID]'");?>
	<div class="list_newP">
		<form method="post" action="" enctype="multipart/form-data">
		<table>
			<tr>
				<td width="150px">Nhóm tài liệu(*):</td>
				<td>
					<select class='text-form' name="groupDocID">
						<?php
							$sql="select id, ten from tbl_groupDoc";
							$qr=mysql_query($sql);
							while ($arr=mysql_fetch_array($qr)) {
								echo "<option value='$arr[id]'>$arr[ten]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
			<td>Chuyên ngành(*):</td>
				<td>
					<select class='text-form' name="id_faculty">
						<?php
							$sql="select id, ten from tbl_falcuty";
							$qr=mysql_query($sql);
							while ($arr=mysql_fetch_array($qr)) {
								echo "<option value='$arr[id]'>$arr[ten]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>File tài liệu(*):</td>
				<td><input name="document" type="file" class='text-form'></td>
			</tr>
			<tr>
				<td>Tên tài liệu(*):</td>
				<td><input name="title" class='text-form'></td>
			</tr>
			<tr>
				<td>Tóm tắt(*):</td>
				<td><textarea name="description" rows="10" cols="80"></textarea></td>
			</tr>
			<tr>
				<td> </td>
				<td>
					<input type="checkbox" class="form-check-input" name="checkdy" id="checkdy"> Tôi đồng ý với các Điều khoản và Điều kiện
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<input type="hidden" name="thuchien_guidoan" value="thuchien_guidoan">
					<input type="submit" value="Gửi tài liệu " class='button-form'>
				</td>
			</tr>
		</table>
		</form>
		<?php } ?>
	</div>
</div>
<div class='list_productC'>
	<h3>Tài liệu mới nhất</h3>
	<ul class='productC'>
	<?php
		$sql="select * from tbl_tailieu order by id desc limit 0,3";
		$qr=mysql_query($sql);
		while ($arrt=mysql_fetch_array($qr)) {
			echo "<li>";
				echo "<a href='?act=chitiettailieu&id=$arrt[id]'>
					<p class='bg_title'><img src='upload/$arrt[hinhanh]'/></p></a>";
				echo "<a href='?act=chitiettailieu&id=$arrt[id]'><h2>$arrt[tentailieu]</h2></a>";
			echo "</li>";
		}
	?>
	</ul>
</div>