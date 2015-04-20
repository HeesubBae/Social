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
  <p class="title_text">2차카테고리등록</p>
  <p class="title_detail_text">2차카테고리등록 하는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">2차카테고리정보 입력 관리</p>
 <p class="subject_detail_text">2차카테고리정보 입력 기본정보</p>
 </div>
<form name="form" method="post" action="index.php?p=display/category_code02_write_ok"> 
 <table id="admin_common_wirte_table">
  <tr>
   <th>2차카테고리명</th>
   <td>
    <input type="text" class="input_size30" name="category_code02_name"/>
   </td>
  </tr>
  <tr>
   <th>1차카테고리명</th>
   <td>
	<?php pop_category_code01_list(30,$category_code01_id,$category_code01_name) ?>
  </tr>
  </table>
  
  
   <div id="admin_common_submit_wrap">
		<a class="bt_save" onclick="form.submit();">등록</a>
   	    <a class="bt_calcel" onclick="history.back();">취소</a>
   </div> 
</form>
</body>
</html>
