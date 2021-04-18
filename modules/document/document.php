<div class='new_detail'>
	<h3><a href="index.php">Homepage</a><span class="next"></span>Student's Document Management</h3>
	<div class='content_new'>
		<?php
		if($_SESSION['studentID']==""){
			echo "<h2>Please Login!</h2>";
		}
		else{
			if($_POST['functionSendDoc']=="functionSendDoc"){
				$id_groupDoc=$_POST['id_groupDoc'];
				$id_faculty=$_POST['id_faculty'];
				$studentID=$_SESSION['studentID'];
				$title=trim($_POST['title']);
				$checkdy=trim($_POST['checkdy']);
				$uploadDate=date('Y-m-d');
				$document=$_FILES['document']['name'];
				$image=$_FILES['image']['name'];
				$description=trim($_POST['description']);
                
                
				if($id_groupDoc!="" & $id_faculty!="" & $studentID!="" & $title!="" & $uploadDate!="" & $image!="" & $document!="" & $description!=""){
					if($checkdy=="on")
					{
						
					$link_upload="upload/".$image;
					move_uploaded_file($_FILES['image']['tmp_name'],$link_upload);
					$link_upload="upload/".$document;
					move_uploaded_file($_FILES['document']['tmp_name'],$link_upload);

					$sql="Insert into tbl_document value(NULL, $id_groupDoc, $id_faculty, '$studentID', '$title', '$uploadDate','$image', '$document', 'Waiting', 0, '$description')";
					mysql_query($sql);
					redirect("?act=document");
				 }else{
				 	notice("Agree to the terms and conditions");
					previousPage();
				 }
				}
				else{
					notice("Cannot be blank (*)!");
					previousPage();
				}
			}
		?>
		<ul>
		<table border="1" width="100%" cellspacing="0">
			<tr>
				<td class='titleResult'>No</td>
				<td class='titleResult'>Group Document</td>
				<td class='titleResult'>Faculty</td>
				<td class='titleResult'>Title</td>
				<td class='titleResult'>Upload date</td>
				<td class='titleResult'>Status</td>
			</tr>
		<?php
			$sql="select NDA.name as 'nameGroup', CN.name as 'nameFaculty', DA.* from tbl_document DA inner join tbl_groupDoc NDA on DA.id_groupDoc=NDA.id inner join tbl_faculty CN on DA.id_faculty=CN.id where DA.studentID='$_SESSION[studentID]' order by DA.id desc ";
			$qr=mysql_query($sql." limit $GLOBALS[vtbd], $GLOBALS[limit]");
			$i=0;
			while ($arr=mysql_fetch_array($qr)) {
				$i++;
				echo "<tr>
					<td><center>$i</center></td>
					<td>$arr[nameGroup]</td>
					<td>$arr[nameFaculty]</td>
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
				<td width="200px">Group Document(*):</td>
				<td>
					<select class='text-form' name="id_groupDoc">
						<?php
							$sql="select id, name from tbl_groupDoc";
							$qr=mysql_query($sql);
							while ($arr=mysql_fetch_array($qr)) {
								echo "<option value='$arr[id]'>$arr[name]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
			<td>Faculty(*):</td>
				<td>
					<select class='text-form' name="id_faculty">
						<?php
							$sql="select id, name from tbl_faculty";
							$qr=mysql_query($sql);
							while ($arr=mysql_fetch_array($qr)) {
								echo "<option value='$arr[id]'>$arr[name]</option>";
							}
						?>
					</select>
				</td>
			</tr>
			<tr>
				<td>Image(*):</td>
				<td><input name="document" type="file" class='text-form'></td>
			</tr>
			<tr>
				<td>File Document(*):</td>
				<td><input name="image" type="file" class='text-form'></td>
			</tr>
			
			<tr>
				<td>Title(*):</td>
				<td><input name="title" class='text-form'></td>
			</tr>
			<tr>
				<td>Description(*):</td>
				<td><textarea name="description" rows="10" cols="80"></textarea></td>
			</tr>
			<tr>
				<td> </td>
				<td>
					<input type="checkbox" class="form-check-input" name="checkdy" id="checkdy"> I agree to the terms and conditions
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
				<?php
					if(array_key_exists('submit',$_POST)){
						$msg= $studentID+"has submit file";
						$sql = "SELECT email FROM tbl_admin where roles='Coordinator'";
						$qr=mysql_query($sql);
						foreach ($q as $qr){
							mail($q,"New submition",$msg);
						}
					}
				?>
					<input type="hidden" name="functionSendDoc" value="functionSendDoc">
					<input type="submit" name='submit' value="Send Document " class='button-form'>
				</td>
			</tr>
		</table>
		</form>
		<?php } ?>
	</div>
</div>
