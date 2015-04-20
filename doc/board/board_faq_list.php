<?php 
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
	//ini_set('error_reporting', E_ALL ^ E_NOTICE);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>제목</title>
			<script language="javascript">
			function paging(nowpage){
				 document.getElementById("nowpage").value = nowpage;
				 request_form.submit();
			}
			</script>
</head>
<body>


 <div id="admin_common_include_title">
 <span class="title_icon"></span>
  <p class="title_text">게시글정보</p>
  <p class="title_detail_text">등록된 게시글정보 리스트페이지입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>
 <p class="subject_text">게시글 기본정보리스트</p>
 <p class="subject_detail_text">기본정보를 기준으로 선택합니다.</p>
 </div>

 <div id="admin_common_list_select">
 <form name="form" method="get" action="">
  &nbsp; 통합검색
  <?php get_board_list_search_type($board_search_type); ?>
  <input type="hidden" name="p" value="<?php echo $_GET['p'] ?>" />
  <input class="input_size10" name="board_search_txt" value="<?=$_GET['board_search_txt']?>"/> 
  <input type="submit" class="search_btn" value="검색"  />
  
</form>
 </div>

<?php

	$sql = 'begin board_select_list(:i_txt, :i_nowpage, :i_pagesize, :v_out, :i_search_type ,:i_board_type_id, :i_session_member_idx); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	//FAQ관리
	$board_type=4;

	oci_bind_by_name($stmt, ':i_txt', $board_search_txt);
	oci_bind_by_name($stmt, ':i_nowpage', $nowpage);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':i_pagesize', $pagesize);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);
	oci_bind_by_name($stmt, ':i_search_type', $board_search_type);
	oci_bind_by_name($stmt, ':i_board_type_id', $board_type);
	oci_bind_by_name($stmt, ':i_session_member_idx', $session_member_idx);

	oci_execute($stmt);
	oci_execute($out);
?>
 
 <table id="admin_common_list_table">
  <tr>
   <th  style="width:5%">게시글번호</th>
   <th  style="width:5%">유형</th>
   <th  style="width:5%">작성자</th>
   <th  style="width:25%">제목</th>
   <th  style="width:10%">작성일</th>
  </tr>
 
<?php
	while($data=oci_fetch_array($out)){
	$TOTCNT=$data["TOT_CNT"];
?>
		<tr>
			<td><b><a href=index.php?p=board/board_view&board_id=<?=$data["BOARD_ID"]?>><?=$data["BOARD_ID"]?></a></b></td>
			<td><?=$data["BOARD_TYPE_ID"]?></td>
			<td><?=$data["MEMBER_ID"]?></td>
			<td><?=$data["BOARD_TITLE"]?></td>
			<td><?=$data["BOARD_DATE"]?></td>
			</tr>
	
<?php
	}
	oci_free_statement($stmt);
	oci_free_statement($out);
	oci_close($conn);
?>

 </table> 

<!-- Hidden Form -->
	<form name="request_form" method="post" action="">
		<input type="hidden" id="nowpage" name="nowpage" value="<?php echo $nowpage; ?>">
	</form> 
<!-- Hidden Form -->


<div class="page_no_wrap">
 <?php getPage($TOTCNT,$pagesize,10,$nowpage); ?>
</div>

</body>
</html>
