<?php
	include 'common/dbcon.php';
	include 'common/search_type.php';
	include 'common/search_pop.php';
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>무제문서</title>
</head>
<?php
	$sql = 'begin category_code02_select(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$category_code02_id=$_GET["category_code02_id"];
	oci_bind_by_name($stmt, ':idx', $category_code02_id);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);

	$data=oci_fetch_array($out);
?>

<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">업체수정</p>
  <p class="title_detail_text">업체정보 수정하는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">업체정보 입력 관리</p>
 <p class="subject_detail_text">업체정보 입력 기본정보</p>
 </div>
 
<form name="form" method="post" action="index.php?p=display/category_code02_edit_ok"> 
 <table id="admin_common_wirte_table">
  <tr>
   <th>2차카테고리번호</th>
   <td>
		<input type=text class=input_size30 name=category_code02_id value="<?php echo $data["CATEGORY_CODE02_ID"]?>" readonly/>
   </td>
  </tr>
  <tr>
   <th>1차카테고리명</th>
   <td>
		<?php pop_category_code01_list(30,$data["CATEGORY_CODE01_ID"],$data["CATEGORY_CODE01_NAME"]) ?>
   </td>
  </tr>  
  <tr>
   <th>2차카테고리명</th>
   <td>
    <input type=text class=input_size30 name=category_code02_name value="<?php echo $data["CATEGORY_CODE02_NAME"]?>" />
   </td>
  </tr>
  </table>
       
  
   <div id="admin_common_submit_wrap">
		<a class="bt_save"  onclick="form.submit();">저장</a>
   	     <a class="bt_calcel" onclick="history.back();">취소</a>
   </div> 
</form>
</body>
</html>
