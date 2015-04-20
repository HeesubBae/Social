<?php
	include 'common/dbcon.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>무제 문서</title>
</head>

<?php
	$display_id=$_GET["display_id"];
	echo $display_id;
	$sql = 'begin display_select(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	oci_bind_by_name($stmt, ':idx', $display_id);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);
?>

<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">등록노출상품</p>
  <p class="title_detail_text">등록노출상품 정보 보는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">노출상품 입력 관리</p>
 <p class="subject_detail_text">노출상품 입력 기본정보</p>
 </div>

<?php
	$data=oci_fetch_array($out);
	
?>

 <table id="admin_common_wirte_table">
  <tr>
   <th>상품번호</th>  
	<td><?=$data["PRODUCT_ID"] ?></td>
  </tr>
  <tr>
   <th>상품명</th>
   <td><?=$data["PRODUCT_NAME"] ?></td>
  </tr>  
  <tr>
   <th>상품가격</th>
   <td><?=$data["PRODUCT_DELIVERY_PRICE"] ?></td>
  </tr>
  <tr>
   <th>상품간략정보</th>
   <td><?=$data["PRODUCT_THUM_INFO"] ?></td>
  </tr>
  
  <tr>
   <th>상품메인이미지</th>
   <td><?=$data["PRODUCT_THUM_PHOTO"] ?></td>
  </tr>
  <tr>
   <th>상품상세이미지</th>
   <td><?=$data["PRODUCT_DETAIL_PHOTO"] ?></td>
  </tr>
  </table>

  <div id="admin_common_include_subject">
	<span class="subject_icon"></span>    
	<p class="subject_text">노출상품상세정보 입력 관리</p>
	<p class="subject_detail_text">노출상품상세정보 입력 기본정보</p>
  </div>
	<table id="admin_common_wirte_table">
  <tr>
   <th>노출번호</th>  
	<td><?=$data["DISPLAY_ID"] ?></td>
  </tr>
  <tr>
   <th>메인카테고리명</th>
   <td><?=$data["MAIN_CATEGORY_NAME"] ?></td>
  </tr>  
  <tr>
   <th>지역명</th>
   <td><?=$data["AREA_NAME"] ?></td>
  </tr>
  <tr>
   <th>상권명</th>
   <td><?=$data["BUSINESS_AREA_NAME"] ?></td>
  </tr>
  
  <tr>
   <th>1차카테고리명</th>
   <td><?=$data["CATEGORY_CODE01_NAME"] ?></td>
  </tr>
  <tr>
   <th>2차카테고리명</th>
   <td><?=$data["CATEGORY_CODE02_NAME"] ?></td>
  </tr>
  <tr>
   <th>노출상태</th>
   <td><?=$data["DISPLAY_PROCESS_NAME"] ?></td>
  </tr>
  <tr>
   <th>지역카테고리명</th>
   <td><?=$data["BA_CODE_NAME"] ?></td>
  </tr>
  </table>
	 

   <div id="admin_common_submit_wrap">
	<a class=bt_edit href="index.php?p=display/display_edit&display_id=<?=$display_id ?>"></a>
	<a class=bt_calcel onclick=history.back();></a>
   </div> 

</body>
</html>
