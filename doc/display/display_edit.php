<?php
	include 'common/dbcon.php';
	include 'common/search_type.php';
	include 'common/search_pop.php';
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>무제문서</title>
</head>
<?php

	$display_id=$_GET['display_id'];
	
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

	$data=oci_fetch_array($out);
	
	$display_id=$data["DISPLAY_ID"];
	$main_category_id=$data["MAIN_CATEGORY_ID"];
	$main_category_name=$data["MAIN_CATEGORY_NAME"];
	$area_id=$data["AREA_ID"];
	$area_name=$data["AREA_NAME"];
	$business_area_id=$data["BUSINESS_AREA_ID"];
	$business_area_name=$data["BUSINESS_AREA_NAME"];
	$category_code01_id=$data["CATEGORY_CODE01_ID"];
	$category_code01_name=$data["CATEGORY_CODE01_NAME"];
	$category_code02_id=$data["CATEGORY_CODE02_ID"];
	$category_code02_name=$data["CATEGORY_CODE02_NAME"];
	$display_process=$data["DISPLAY_PROCESS_ID"];
	$ba_code_id=$data["BA_CODE_ID"];
	$ba_code_name=$data["BA_CODE_NAME"];
	
	

?>

<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">노출상품수정</p>
  <p class="title_detail_text">노출상품 수정하는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">노출상품 입력 관리</p>
 <p class="subject_detail_text">업체정보 입력 기본정보</p>
 </div>
 
<form name="form" method="post" action="index.php?p=display/display_edit_ok"> 
 <table id="admin_common_wirte_table">
  <tr>
   <th>노출상품번호</th>
   <td>
		<input type=text class=input_size30 name=display_id value="<?php echo $data["DISPLAY_ID"]?>" readonly/>
   </td>
  </tr>
  <tr>
   <th>메인카테고리명</th>
   <td>
		<?php pop_main_category_list(10,$main_category_id,$main_category_name); ?>
   </td>
  </tr>
  <tr>
 <th>상권</th>
   <td>
		<?php pop_business_area_list(10,$business_area_id,$business_area_name,$area_id , $area_name); ?>
   </td>
  </tr>
  <tr>
  <th>2차카테고리명</th>
   <td>
		<?php pop_category_code02_list(10,$category_code02_id,$category_code02_name, $category_code01_id, $category_code01_name); ?>
   </td>
   </tr>
  <tr>
  <th>지역카테고리명</th>
   <td>
		<?php pop_ba_code_list(10,$ba_code_id,$ba_code_name); ?>
   </td>
  </tr> 
  </tr>
  <tr>
  <th>노출상태</th>
   <td>
		<?php get_display_process($display_process); ?>
   </td>
  </tr> 
  </table>
       
  
   <div id="admin_common_submit_wrap">
		<a class="bt_save"  onclick="form.submit();">저장</a>
   	     <a class="bt_calcel" onclick="history.back();">취소</a>
   </div> 
</form>
</body>
</html>
