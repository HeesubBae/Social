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
	echo $board_id;
	
	$data=oci_fetch_array($out);
?>

<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">등록게시글</p>
  <p class="title_detail_text">등록게시글상세 정보 보는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">게시글정보 입력 관리</p>
 <p class="subject_detail_text">게시글정보 입력 기본정보</p>
 </div>

 <table id="admin_common_wirte_table">
  <tr>
   <th>유형</th>  
	<td><?=$data["BOARD_TYPE_ID"] ?></td>
  </tr>
  <tr>
   <th>작성자</th>
   <td><?=$data["MEMBER_IDX"] ?></td>
  </tr>  
  <tr>
   <th>제목</th>
   <td><?=$data["BOARD_TITLE"] ?></td>
  </tr>
  <tr>
   <th>내용</th>
   <td>
   <textarea name="board_text" rows="20" cols="140" readonly><?=$data["BOARD_TEXT"] ?></textarea>
   </td>
  </tr>
  </table>

<?php

	//댓글 리스트
	$sql = 'begin board_reply_select_list(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	oci_bind_by_name($stmt, ':idx', $board_id);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);
	
?>

<div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">댓글</p>
 </div>

<table id="admin_common_list_table">
  <tr>
   <th  style="width:5%">아이디</th>
   <th  style="width:5%">내용</th>
   <th  style="width:10%">등록날짜</th>
  </tr>

<?php
	while($data=oci_fetch_array($out)){
?>
<tr>
 <td><?=$data["MEMBER_IDX"]?></td>
 <td><?=$data["REPLY_TEXT"]?></td>
 <td><?=$data["REPLY_DATE"]?></td>
</tr>


<?php

	}
	oci_free_statement($stmt);
	oci_free_statement($out);
	oci_close($conn);
?>
</table>

 <!-- 댓글 등록 -->
<form name="form" method="post" action="index.php?p=board/board_reply_write_ok"> 
 <table>
  <tr>
   <td>
	<input type=hidden name=board_id value="<?php echo $board_id ?> "/>
    <textarea name="reply_text" rows="1" cols="100"></textarea>
   </td>
  </tr>
  </table>
  <a onclick="form.submit();">댓글등록</a>
</form>


   <div id="admin_common_submit_wrap">
	<a class=bt_edit href="index.php?p=board/board_edit&board_id=<?=$board_id ?>"></a>
	<a class=bt_calcel onclick=history.back();></a>
   </div> 

</body>
</html>
