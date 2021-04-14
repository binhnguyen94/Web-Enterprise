<?php
$data = array();
function add_person($masinhvien, $matkhau, $id_lophoc, $hoten, $ngaysinh, $dienthoai, $email){
  global $data;
  $data[]=array('masinhvien'=>$masinhvien,'matkhau'=>$matkhau,'id_lophoc'=>$id_lophoc, 'hoten'=>$hoten, 'ngaysinh'=>$ngaysinh, 'dienthoai'=>$dienthoai, 'email'=>$email);
}
if( $_FILES['file']['tmp_name']){
  $dom = DOMDocument::load($_FILES['file']['tmp_name']);
  $rows = $dom->getElementsByTagName('Row');
  $first_row = true;
  foreach ($rows as $row){
   if(!$first_row){
     $masinhvien = "";
     $matkhau = "";
     $id_lophoc = "";
     $hoten = "";
     $ngaysinh = "";
     $dienthoai = "";
     $email = "";

     $index = 1;
     $cells = $row->getElementsByTagName('Cell');
     foreach( $cells as $cell ){
        $ind = $cell->getAttribute('Index');
        if ($ind != null ) $index = $ind;

        if ($index == 1) $masinhvien = $cell->nodeValue;
        elseif ($index == 2) $matkhau = $cell->nodeValue;
        elseif ($index == 3) $id_lophoc = $cell->nodeValue;
        elseif ($index == 4) $hoten = $cell->nodeValue;
        elseif ($index == 5) $ngaysinh = $cell->nodeValue;
        elseif ($index == 6) $dienthoai = $cell->nodeValue;
        elseif ($index == 7) $email = $cell->nodeValue;
        $index += 1;
     }
      add_person($masinhvien, $matkhau, $id_lophoc, $hoten, $ngaysinh, $dienthoai, $email);
   }
   $first_row = false;
  }
 foreach($data as $row)
 {
    $a1 =$row['masinhvien'];
    $a2 =$row['matkhau'];
    $a3 =$row['id_lophoc'];
    $a4 =$row['hoten'];
    $a5 =$row['ngaysinh'];
    $a6 =$row['dienthoai'];
    $a7 =$row['email'];
    if($a1!="" & $a2!="" & $a3!="" & $a4!="" & $a5!="" & $a6!="" & $a7!=""){
      $tv="select count(*) from tbl_sinhvien where masinhvien='$a1'";
      $tv1=mysql_query($tv);
      $tv2=mysql_fetch_array($tv1);
      if($tv2[0]==0){
        $matkhau=md5($a2);
        $sql="Insert into tbl_sinhvien value('$a1', '$matkhau', $a3, '$a4', '$a5', '$a6', '$a7')";
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
		$sql="Insert into tbl_sinhvien value('$tendangnhaps', '$matkhaus', $id_lophocs, '$hotens', '$ngaysinhs', '$dienthoais', '$emails')";
		mysql_query($sql);
		$_SESSION['id_lophoc']=$id_lophocs;
		notice("Thêm thông tin thành công");
		redirect("?act=sinhvien&mod=them");
	}
	else{
		notice("Không được bỏ trống dữ liệu (*)!");
		previousPage();
	}
}
?>