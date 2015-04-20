<?php 
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
	include 'common/search_pop.php'
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
  <p class="title_text">2차카테고리정보</p>
  <p class="title_detail_text">등록된 2차카테고리정보 리스트페이지입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>
 <p class="subject_text">2차카테고리 기본정보리스트</p>
 <p class="subject_detail_text">2차카테고리정보를 기준으로 선택합니다.</p>
 </div>

 <div id="admin_common_list_select">
 <form name="form" method="get" action="">
  &nbsp; 통합검색
  <?php get_category_code02_list_search_type($category_code02_search_type); ?>
  <input type="hidden" name="p" value="<?php echo $_GET['p'] ?>" />
  <input class="input_size10" name="category_code02_search_txt" value="<?=$_GET['category_code02_search_txt']?>"/> 
  <input type="submit" class="search_btn" value="검색"  />
  &nbsp; 1차카테고리
  <?php pop_category_code01_list(10,$category_code01_id , $category_code01_name); ?>


</form>
 </div>

<?php

	$sql = 'begin category_code02_select_list(:i_txt, :i_nowpage, :i_pagesize, :v_out, :i_search_type , :i_category_code01_id); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	$category_code02_search_txt=$_GET['category_code02_search_txt'];
	$category_code01_id=$_GET['category_code01_id'];
	$category_code01_name=$_GET['category_code01_name'];
	oci_bind_by_name($stmt, ':i_txt', $category_code02_search_txt);
	oci_bind_by_name($stmt, ':i_nowpage', $nowpage);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':i_pagesize', $pagesize);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);
	oci_bind_by_name($stmt, ':i_search_type', $category_code02_search_type);
	oci_bind_by_name($stmt, ':i_category_code01_id', $category_code01_id);

	oci_execute($stmt);
	oci_execute($out);
?>
 
 <table id="admin_common_list_table">
  <tr>
  <th  style="width:5%">2차카테고리번호</th>
   <th  style="width:10%">1차카테고리명</th>
   <th  style="width:10%">2차카테고리명</th> 
  </tr>
 

<?php
	while($data=oci_fetch_array($out)){
	$TOTCNT=$data["TOT_CNT"];
?>
		<tr onClick=reback_category_code02_list('<?=$data["CATEGORY_CODE02_ID"]?>','<?=$data["CATEGORY_CODE02_NAME"]?>','<?=$data["CATEGORY_CODE01_ID"]?>','<?=$data["CATEGORY_CODE01_NAME"]?>')>
			<td><b><a href=index.php?p=display/category_code02_view&category_code02_id=<?=$data["CATEGORY_CODE02_ID"]?>><?=$data["CATEGORY_CODE02_ID"]?></a></b></td>
			<td><?=$data["CATEGORY_CODE01_NAME"]?></td>
			<td><?=$data["CATEGORY_CODE02_NAME"]?></td>
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
