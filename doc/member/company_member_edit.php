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

	$sql = 'begin admin_select(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$admin_id=$_GET["admin_id"];
	oci_bind_by_name($stmt, ':idx', $admin_id);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);
?>

<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">업체회원수정</p>
  <p class="title_detail_text">업체회원정보 수정하는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">업체정보 입력 관리</p>
 <p class="subject_detail_text">업체정보 입력 기본정보</p>
 </div>
 
<?php
	$data=oci_fetch_array($out);

?>

<form name="form" method="post" action="index.php?p=member/company_member_edit_ok"> 
 <input type=hidden name=admin_id value="<?=$data["ADMIN_ID"]?>" />
 <table id="admin_common_wirte_table">
  <tr>
   <th>관리자유형</th>
   <td>
		<?php get_admin_type($data["ADMIN_TYPE"]) ?>
   </td>
  </tr>
  <tr>
   <th>부서</th>
   <td>
		<?php pop_department_list(30,$data["DEPARTMENT_ID"],$data["DEPARTMENT_NAME"]) ?>
	</td>
  </tr>  
  <tr>
   <th>직책</th>
   <td>
     <?php pop_position_list(30,$data["POSITION_ID"],$data["POSITION_NAME"]) ?>
   </td>
  </tr>
  <tr>
   <th>관리자상태</th>
   <td>
		<?php get_admin_process($data["ADMIN_PROCESS_ID"]) ?>
   </td>
  </tr>
  <tr>
   <th>업체</th>
   <td>
    <?php pop_company_list(30,$data["COMPANY_ID"],$data["COMPANY_NAME"]) ?>
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
