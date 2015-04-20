<?php
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
	include 'common/search_pop.php';
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
  <p class="title_text">노출금지상품정보</p>
  <p class="title_detail_text">등록된 노출금지상품정보 리스트페이지입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>
 <p class="subject_text">노출금지상품 기본정보리스트</p>
 <p class="subject_detail_text">기본정보를 기준으로 선택합니다.</p>
 </div>

 <div id="admin_common_list_select2">
 <form name="form" method="get" action="">
 <!-- <?php get_display_process($display_process); ?> -->
  &nbsp; 메인카테고리 
  <?php pop_main_category_list(5,$main_category_id,$main_category_name); ?>
  &nbsp; 2차카테고리
  <?php pop_category_code02_list(5,$category_code02_id,$category_code02_name,$category_code01_id, $category_code01_name); ?>
  &nbsp; 지역카테고리	
  <?php pop_ba_code_list(5,$ba_code_id,$ba_code_name); ?><br>
  &nbsp; 상권
  <?php pop_business_area_list(5,$business_area_id,$business_area_name, $area_id, $area_name); ?>

  &nbsp; 통합검색
  <?php get_product_list_search_type($product_search_type); ?>
  <input type="hidden" name="p" value="<?php echo $_GET['p'] ?>" />
  <input class="input_size10" name="product_search_txt" value="<?=$_GET['product_search_txt']?>"/> 
  <input type="submit" class="search_btn" value="검색"  />
  
</form>
 </div>

<?php
	$display_process=4;

	$sql = 'begin display_select_list(:i_txt, :i_nowpage, :i_pagesize, :v_out, :i_search_type ,:i_display_process , :i_main_category , :i_area,:i_business_area , :i_category_code01, :i_category_code02 , :i_ba_code ); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	$product_search_txt=$_GET['product_search_txt'];

	oci_bind_by_name($stmt, ':i_txt', $product_search_txt);
	oci_bind_by_name($stmt, ':i_nowpage', $nowpage);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':i_pagesize', $pagesize);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);
	oci_bind_by_name($stmt, ':i_search_type', $product_search_type);
	oci_bind_by_name($stmt, ':i_display_process', $display_process);

	oci_bind_by_name($stmt, ':i_main_category', $main_category_id);
	oci_bind_by_name($stmt, ':i_area', $area_id);
	oci_bind_by_name($stmt, ':i_business_area', $business_area_id);
	oci_bind_by_name($stmt, ':i_category_code01', $category_code01_id);
	oci_bind_by_name($stmt, ':i_category_code02', $category_code02_id);
	oci_bind_by_name($stmt, ':i_ba_code', $ba_code_id);

	oci_execute($stmt);
	oci_execute($out);
?>


 <table id="admin_common_list_table">
  <tr>
   <th  style="width:5%">노출상태</th>
   <th  style="width:5%">노출번호</th>
   <th  style="width:5%">상품번호</th>
   <th  style="width:5%">상품명</th>
   <th  style="width:5%">상품가격</th>
  </tr>
 
 <?php
	while($data=oci_fetch_array($out)){
	$TOTCNT=$data["TOT_CNT"];
?>
			<tr>
			<td><?=$data["DISPLAY_PROCESS_ID"]?></td>
			<td><b><a href=index.php?p=display/display_view&display_id=<?=$data["DISPLAY_ID"]?>><?=$data["DISPLAY_ID"]?></a></b></td>
			<td><?=$data["PRODUCT_ID"]?></td>
			<td><?=$data["PRODUCT_NAME"]?></td>
			<td><?=$data["PRODUCT_MAIN_PRICE"]?></td>
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
