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

	$sql = 'begin main_category_select(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$main_category_id=$_GET["main_category_id"];
	oci_bind_by_name($stmt, ':idx', $main_category_id);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);
?>

<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">등록메인카테고리</p>
  <p class="title_detail_text">등록메인카테고리상세 정보 보는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">메인카테고리정보 입력 관리</p>
 <p class="subject_detail_text">메인카테고리정보 입력 기본정보</p>
 </div>

<?php
	$data=oci_fetch_array($out);

?>

 <table id="admin_common_wirte_table">
  <tr>
   <th>메인카테고리번호</th>  
	<td><?=$data["MAIN_CATEGORY_ID"] ?></td>
  </tr>
  <tr>
   <th>메인카테고리명</th>
   <td><?=$data["MAIN_CATEGORY_NAME"] ?></td>
  </tr>  

  </table>
   <div id="admin_common_submit_wrap">
	<a class=bt_edit href="index.php?p=display/main_category_edit&main_category_id=<?=$data["MAIN_CATEGORY_ID"] ?>"></a>
	<a class=bt_calcel onclick=history.back();></a>
   </div> 

</body>
</html>
