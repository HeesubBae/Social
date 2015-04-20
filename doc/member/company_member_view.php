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
  <p class="title_text">등록업체회원</p>
  <p class="title_detail_text">등록업체회원상세 정보 보는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">업체회원정보 입력 관리</p>
 <p class="subject_detail_text">업체회원정보 입력 기본정보</p>
 </div>

<?php
	$data=oci_fetch_array($out);

?>
 <table id="admin_common_wirte_table">
  <tr>
   <th>아이디</th>  
	<td><?=$data["MEMBER_ID"] ?></td>
  </tr>
  <tr>
   <th>비밀번호</th>
   <td><?=$data["MEMBER_PASS"] ?></td>

  </tr>  
  <tr>
   <th>이름</th>
   <td><?=$data["MEMBER_NAME"] ?></td>
  </tr>
  <tr>
   <th>이메일</th>
   <td><?=$data["MEMBER_EMAIL"] ?></td>
  </tr>
  <tr>
	<th>우편번호</th>
   <td><?=$data["MEMBER_ZIPCODE"] ?></td>
  <tr>
	<th>주소</th>
	<td><?=$data["MEMBER_ADDR1"].$data["MEMBER_ADDR2"] ?></td>
  <tr>
   <th>휴대폰번호</th>
   <td><?=$data["MEMBER_MOBILE"] ?></td>
  </tr>
  <tr>
   <th>전화번호</th>
   <td><?=$data["MEMBER_PHONE"] ?></td>
  </tr>
  <tr>
   <th>생년월일</th>
   <td><?=$data["MEMBER_BIRTHDAY"] ?></td>
  </tr> 

  </table>

<div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">업체회원상세정보 입력 관리</p>
 <p class="subject_detail_text">업체회원상세정보 입력 기본정보</p>
 </div>

 <table id="admin_common_wirte_table">
  <tr>
   <th>관리자유형</th>  
	<td><?=$data["ADMIN_TYPE"] ?></td>
  </tr>
  <tr>
   <th>부서</th>
   <td><?=$data["DEPARTMENT_NAME"] ?></td>
	
  </tr>  
  <tr>
   <th>직책</th>
   <td><?=$data["POSITION_NAME"] ?></td>
  </tr>
  <tr>
   <th>관리자상태</th>
   <td><?=$data["ADMIN_PROCESS_ID"] ?></td>
  </tr>
  <tr>
	<th>업체</th>
   <td><?=$data["COMPANY_NAME"] ?></td>
  </tr>
  </table>
   <div id="admin_common_submit_wrap">
	<a class=bt_edit href="index.php?p=member/company_member_edit&admin_id=<?=$data["ADMIN_ID"] ?>"></a>
	<a class=bt_calcel onclick=history.back();></a>
   </div> 

</body>
</html>
