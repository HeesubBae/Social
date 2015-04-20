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
  <p class="title_text">상품정보</p>
  <p class="title_detail_text">등록된 상품정보 리스트페이지입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>
 <p class="subject_text">상품 기본정보리스트</p>
 <p class="subject_detail_text">기본정보를 기준으로 선택합니다.</p>
 </div>

 <div id="admin_common_list_select">
 <form name="form" method="get" action="index.php">
  &nbsp; 상태
  <?php get_product_process($product_process); ?>

  &nbsp; 타입
  <?php get_product_type($product_type); ?>

  &nbsp; 업체
  <?php pop_company_list(10,$company_id,$company_name);    ?>
<!--
  &nbsp; 업체
  <?php pop_company_list(10,$company_id,$company_name);    ?>
-->
  &nbsp; 통합검색
  <?php get_product_list_search_type($product_search_type); ?>
  <input type="hidden" name="p" value="<?php echo $_GET['p'] ?>" />
  <input class="input_size10" name="product_search_txt" value="<?=$_GET['product_search_txt']?>"/> 
  <input type="submit" class="search_btn" value="검색"  />
  <input type="reset" value="초기화" />
</form>
 </div>

<?php
	//소셜커머스직원
	$admin_type=1;
	$sql = 'begin products.product_select_list(:i_txt, :i_nowpage, :i_pagesize, :v_out, :i_search_type , :i_company , :i_product_type_id ,:i_product_process_id); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	oci_bind_by_name($stmt, ':i_txt', $product_search_txt);
	oci_bind_by_name($stmt, ':i_nowpage', $nowpage);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':i_pagesize', $pagesize);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);
	oci_bind_by_name($stmt, ':i_search_type', $product_search_type);
	
	oci_bind_by_name($stmt, 'i_company' , $company_id);
	oci_bind_by_name($stmt, 'i_product_type_id' , $product_type);
	oci_bind_by_name($stmt, 'i_product_process_id' , $product_process);

	oci_execute($stmt);
	oci_execute($out);
?>

 <table id="admin_common_list_table">
  <tr>
   <th  style="width:5%">상품번호</th>
   <th  style="width:5%">사진</th>
   <th  style="width:20%">상품명</th>
   <th  style="width:40%; text-align:left;">간략정보</th>
   <th  style="width:10%">타입</th>
   <th  style="width:10%">가격</th>
   <th  style="width:10%">상태</th>
  </tr>
 
<?php
	while($data=oci_fetch_array($out)){
	$TOTCNT=$data["TOT_CNT"];
?>
		<tr onClick=reback_product_list('<?=$data["PRODUCT_ID"]?>','<?=$data["PRODUCT_NAME"]?>')>
			<td><b><a href=index.php?p=product/product_view&product_id=<?=$data["PRODUCT_ID"]?>><?=$data["PRODUCT_ID"]?></a></b></td>
			<td><img src="<?=$data["PRODUCT_THUM_PHOTO"]?>" width="50px" height="50px"></td>
			<td><?=$data["PRODUCT_NAME"]?></td>
			<td style="width:40%; text-align:left;"><?=$data["PRODUCT_THUM_INFO"]?></td>
			<td><?=$data["PRODUCT_TYPE_ID"]?></td>
			<td><?=$data["PRODUCT_MAIN_PRICE"]?></td>
			<td><?=$data["PRODUCT_PROCESS_ID"]?></td>
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
