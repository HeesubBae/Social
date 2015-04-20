<?php
	include 'common/dbcon.php';
	include 'common/search_type.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>무제 문서</title>
</head>

<?php

	$sql = 'begin board_select(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$board_id=$_GET["board_id"];
	oci_bind_by_name($stmt, ':idx', $board_id);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);
?>

<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">게시글수정</p>
  <p class="title_detail_text">게시글 수정하는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">게시글정보 입력 관리</p>
 <p class="subject_detail_text">게시글정보 입력 기본정보</p>
 </div>

<?php
	$data=oci_fetch_array($out);

?>
<form name="form" method="post" action="index.php?p=board/board_edit_ok"> 
 <input type=hidden name=board_id value="<?=$data["BOARD_ID"]?>" />
 <table id="admin_common_wirte_table">
  <tr>
   <th>유형</th>  
	<td><?php get_board_type($data["BOARD_TYPE_ID"]) ?></td>
  </tr>
  <tr>
   <th>제목</th>
   <td>
	<input type=text clas=input_size30 name=board_title value="<?php echo $data["BOARD_TITLE"]?>" />
	</td>
  </tr>
  <tr>
   <th>내용</th>
   <td>
   <textarea name="board_text" rows="20" cols="140"><?php echo $data["BOARD_TEXT"]?></textarea>
   </td>
  </tr>
  </table>
    <div id="admin_common_submit_wrap">
		<a class="bt_save"  onclick="form.submit();">저장</a>
   	     <a class="bt_calcel" onclick="history.back();">취소</a>
   </div> 

</body>
</html>
