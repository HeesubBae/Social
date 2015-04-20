<?php 
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
	include 'common/search_pop.php';

 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>제목</title>
</head>
<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">노출상품등록</p>
  <p class="title_detail_text">노출상품등록 하는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">노출상품정보 입력 관리</p>
 <p class="subject_detail_text">노출상품정보 입력 기본정보</p>
 </div>
<?php  $product_id=$_GET["product_id"];
	echo $product_id; ?>
<form name="form" method="post" action="index.php?p=product/product_display_write_ok"> 
 <table id="admin_common_wirte_table">  
  <tr>
   <th>메인카테고리선택</th>
   <td>
	<?php pop_main_category_list(30,$main_category_id,$main_category_name) ?>
	</td>
  </tr>

  <tr>
   <th>상권선택</th>
   <td>
	<?php pop_business_area_list(30,$business_area_id,$business_area_name , $area_id, $area_name) ?>
	</td>
  </tr>

  <tr>
   <th>일반카테고리선택</th>
   <td>
	<?php pop_category_code02_list(30,$category_code02_id,$category_code02_name , $category_code01_id , $category_code01_name ) ?>
	</td>
  </tr>

  <tr>
   <th>지역카테고리선택</th>
   <td>
	<?php pop_ba_code_list(30,$ba_code_id,$ba_code_name) ?>
	</td>
  </tr>
	<input type=hidden name=product_id value="<?=$product_id ?>" />
  </table>
  
   <div id="admin_common_submit_wrap">
		<a class="bt_save" onclick="form.submit();">등록</a>
   	    <a class="bt_calcel" onclick="history.back();">취소</a>
   </div> 
</form>
</body>
</html>
