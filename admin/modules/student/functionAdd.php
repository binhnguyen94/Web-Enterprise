<?php
$data = array();
function add_person($studentID, $password, $id_faculty, $fullname, $dob, $phoneNum, $email){
  global $data;
  $data[]=array('studentID'=>$studentID,'password'=>$password,'id_faculty'=>$id_faculty, 'fullname'=>$fullname, 'dob'=>$dob, 'phoneNum'=>$phoneNum, 'email'=>$email);
}
if( $_FILES['file']['tmp_name']){
  $dom = DOMDocument::load($_FILES['file']['tmp_name']);
  $rows = $dom->getElementsByTagName('Row');
  $first_row = true;
  foreach ($rows as $row){
   if(!$first_row){
     $studentID = "";
     $password = "";
     $id_faculty = "";
     $fullname = "";
     $dob = "";
     $phoneNum = "";
     $email = "";

     $index = 1;
     $cells = $row->getElementsByTagName('Cell');
     foreach( $cells as $cell ){
        $ind = $cell->getAttribute('Index');
        if ($ind != null ) $index = $ind;

        if ($index == 1) $studentID = $cell->nodeValue;
        elseif ($index == 2) $password = $cell->nodeValue;
        elseif ($index == 3) $id_faculty = $cell->nodeValue;
        elseif ($index == 4) $fullname = $cell->nodeValue;
        elseif ($index == 5) $dob = $cell->nodeValue;
        elseif ($index == 6) $phoneNum = $cell->nodeValue;
        elseif ($index == 7) $email = $cell->nodeValue;
        $index += 1;
     }
      add_person($studentID, $password, $id_faculty, $fullname, $dob, $phoneNum, $email);
   }
   $first_row = false;
  }
 foreach($data as $row)
 {
    $a1 =$row['studentID'];
    $a2 =$row['password'];
    $a3 =$row['id_faculty'];
    $a4 =$row['fullname'];
    $a5 =$row['dob'];
    $a6 =$row['phoneNum'];
    $a7 =$row['email'];
    if($a1!="" & $a2!="" & $a3!="" & $a4!="" & $a5!="" & $a6!="" & $a7!=""){
      $tv="select count(*) from tbl_student where studentID='$a1'";
      $tv1=mysql_query($tv);
      $tv2=mysql_fetch_array($tv1);
      if($tv2[0]==0){
        $password=md5($a2);
        $sql="Insert into tbl_student value('$a1', '$password', $a3, '$a4', '$a5', '$a6', '$a7')";
        mysql_query($sql);
      }
    }
  }
  redirect("?act=sinhvien&mod=them");
}
else{
	$id_lophocs=(int)$_POST['id_lophocs'];
  $tendangnhaps=trim($_POST['tendangnhaps']);
  $matkhaus=trim($_POST['matkhaus']);
  $hotens=trim($_POST['hotens']);
  $ngaysinhs=trim($_POST['ngaysinhs']);
  $dienthoais=trim($_POST['dienthoais']);
  $emails=trim($_POST['emails']);
  if($id_lophocs!="" & $tendangnhaps!="" & $matkhaus!="" & $hotens!="" & $ngaysinhs!="" & $dienthoais!="" & $emails!=""){
		$matkhaus=md5($matkhaus);
		$sql="Insert into tbl_student value('$tendangnhaps', '$matkhaus', $id_lophocs, '$hotens', '$ngaysinhs', '$dienthoais', '$emails')";
		mysql_query($sql);
		$_SESSION['id_faculty']=$id_lophocs;
		notice("Thêm thông tin thành công");
		redirect("?act=sinhvien&mod=them");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
}
?>