<?php
	include 'common/dbcon.php';
	include 'common/search_type.php';
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>무제문서</title>
</head>
<?php

	$sql = 'begin company_select(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$company_id=$_GET["company_id"];
	oci_bind_by_name($stmt, ':idx', $company_id);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);

	$data=oci_fetch_array($out);
	$company_process=$data["COMPANY_PROCESS_ID"];
?>

<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">업체수정</p>
  <p class="title_detail_text">업체정보 수정하는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">업체정보 입력 관리</p>
 <p class="subject_detail_text">업체정보 입력 기본정보</p>
 </div>
 
<form name="form" method="post" action="index.php?p=company/company_edit_ok"> 
 <input type=hidden name=company_id value="<?=$data["COMPANY_ID"]?>" />
 <table id="admin_common_wirte_table">
  <tr>
   <th>업체명</th>
   <td>
		<input type=text class=input_size30 name=company_name value="<?php echo $data["COMPANY_NAME"]?>" />
   </td>
  </tr>
  <tr>
   <th>업체유형</th>
   <td><input type=text class=input_size30  name="company_type_id" onclick="company_type_list()" value="<?php echo $data["COMPANY_TYPE_ID"]?>" />
   </td>
  </tr>  
  <tr>
   <th>업체대표</th>
   <td>
    <input type=text class=input_size30 name=company_ceo value="<?php echo $data["COMPANY_CEO"]?>" />
   </td>
  </tr>
  <tr>
   <th>업체주소</th>
   <td>
    <input type=text class=input_size30 name=company_aadr value="<?php echo $data["COMPANY_ADDR"]?>" />
   </td>
  </tr>
  <tr>
   <th>업체전화번호</th>
   <td>
   <input type=text class=input_size30 name=company_phone value="<?php echo $data["COMPANY_PHONE"]?>" />
   </td>
  </tr>
  <tr>
   <th>업체URL</th>
   <td>
   <input type=text class=input_size30 name=company_url value="<?php echo $data["COMPANY_URL"]?>" />
   </td>
  </tr>
  <tr>
   <th>사업자등록번호</th>
   <td>
   <input type=text class=input_size30 name=company_licence value="<?php echo $data["COMPANY_LICENCE"]?>" />
   </td>
  </tr>
  <tr>
	<th>업체상태</th>
	<td>
	<?php get_company_process($company_process) ?>
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
