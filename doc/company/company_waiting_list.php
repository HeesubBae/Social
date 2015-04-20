<?php 
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
//	ini_set('error_reporting', E_ALL ^ E_NOTICE);
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
  <p class="title_text">업체정보</p>
  <p class="title_detail_text">등록된 업체정보 리스트페이지입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>
 <p class="subject_text">업체 기본정보리스트</p>
 <p class="subject_detail_text">업체정보를 기준으로 선택합니다.</p>
 </div>

 <div id="admin_common_list_select">
 <form name="form" method="get" action="">
  &nbsp; 통합검색
  <?php get_company_list_search_type($company_search_type); ?>
  <input type="hidden" name="p" value="<?php echo $_GET['p'] ?>" />
  <input class="input_size10" name="company_search_txt" value="<?=$_GET['company_search_txt']?>"/> 
  <input type="submit" class="search_btn" value="검색"  />
</form>
 </div>

<?php

	$sql = 'begin company_select_list(:i_txt, :i_nowpage, :i_pagesize, :v_out, :i_search_type ,:i_company_process_id); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	$company_search_txt=$_GET['company_search_txt'];
	$company_process=1;
	oci_bind_by_name($stmt, ':i_txt', $company_search_txt);
	oci_bind_by_name($stmt, ':i_nowpage', $nowpage);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':i_pagesize', $pagesize);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);
	oci_bind_by_name($stmt, ':i_search_type', $company_search_type);
	oci_bind_by_name($stmt, ':i_company_process_id', $company_process);
	oci_execute($stmt);
	oci_execute($out);
?>
 
 <table id="admin_common_list_table">
  <tr>
  <th  style="width:15%">업체명</th>
   <th  style="width:5%">업체대표</th>
   <th  style="width:25%">업체주소</th>
   <th  style="width:10%">업체전화번호</th>
   <th  style="width:10%">업체URL</th>
   <th  style="width:10%">사업자등록번호</th>
  </tr>
 

<?php
	while($data=oci_fetch_array($out)){
	$TOTCNT=$data["TOT_CNT"];
?>
		<tr onClick=reback_company_list('<?=$data["COMPANY_ID"]?>','<?=$data["COMPANY_NAME"]?>')>
			<td><b><a href=index.php?p=company/company_view&company_id=<?=$data["COMPANY_ID"]?>><?=$data["COMPANY_NAME"]?></a></b></td>
			<td><?=$data["COMPANY_CEO"]?></td>
			<td><?=$data["COMPANY_ADDR"]?></td>
			<td><?=$data["COMPANY_PHONE"]?></td>
			<td><?=$data["COMPANY_URL"]?></td>
			<td><?=$data["COMPANY_LICENCE"]?></td>
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
