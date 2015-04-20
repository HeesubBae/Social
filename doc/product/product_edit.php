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
<link href="/admin/css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>무제 문서</title>
<script  src="/ckeditor/ckeditor.js"></script>
<script  src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
<link rel="Stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/smoothness/jquery-ui.css">
<script type="text/javascript" src="/admin/js/tabs.js"></script>

<script>

function BrowseServer( startupPath, functionData )
{
	// You can use the "CKFinder" class to render CKFinder in a page:
	var finder = new CKFinder();

	// The path for the installation of CKFinder (default = "/ckfinder/").
	finder.basePath = '../';

	//Startup path in a form: "Type:/path/to/directory/"
	finder.startupPath = startupPath;

	// Name of a function which is called when a file is selected in CKFinder.
	finder.selectActionFunction = SetFileField;

	// Additional data to be passed to the selectActionFunction in a second argument.
	// We'll use this feature to pass the Id of a field that will be updated.
	finder.selectActionData = functionData;

	// Name of a function which is called when a thumbnail is selected in CKFinder.
	finder.selectThumbnailActionFunction = ShowThumbnails;

	// Launch CKFinder
	finder.popup();
}

// This is a sample function which is called when a file is selected in CKFinder.
function SetFileField( fileUrl, data )
{
	document.getElementById( data["selectActionData"] ).value = fileUrl;
}

// This is a sample function which is called when a thumbnail is selected in CKFinder.
function ShowThumbnails( fileUrl, data )
{
	// this = CKFinderAPI
	var sFileName = this.getSelectedFile().name;
	document.getElementById( 'thumbnails' ).innerHTML +=
			'<div class="thumb">' +
				'<img src="' + fileUrl + '" />' +
				'<div class="caption">' +
					'<a href="' + data["fileUrl"] + '" target="_blank">' + sFileName + '</a> (' + data["fileSize"] + 'KB)' +
				'</div>' +
			'</div>';

	document.getElementById( 'preview' ).style.display = "";
	// It is not required to return any value.
	// When false is returned, CKFinder will not close automatically.
	return false;
}
//*************************//

	$(function(){
		$('#tabs').tabs();
		// $("#tabs").tabs().tabs("select", 1); 
		$("#tabs" ).tabs({                                                                  
		select:function(event,ui){                                                       
						//alert(ui.index); 
				$('#product_type_id').val(ui.index);							
				}                                                                          
		});

	});
  //Row 추가
  function addRow1(table){
    var row = $("#templat1").val();
    $(row).appendTo(table);
  }
  
  //Row 추가
  function addRow2(table){
    var row = $("#templat2").val();
    $(row).appendTo(table);
  }

  //Row 추가
  function addRow3(table){
    var row = $("#templat3").val();
    $(row).appendTo(table);
  }

  //마지막 Row 삭제
  function deleteRow(){
   
  if(jQuery("#eadTable1 tr").length < 3){
    alert("더이상 삭제 할 수 없습니다.");
    return false;
   }
   
   jQuery("#eadTable1 tr").last().remove();
  }
  
  //선택한 Row 삭제
  function delRow(obj){

	   if(confirm("행을 삭제 하시겠습니까?")){
		jQuery(obj).parent().parent().remove();
	   }
	}
</script>
</head>

<?php

	$sql = 'begin products.product_select(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$product_id=$_GET["product_id"];
	oci_bind_by_name($stmt, ':idx', $product_id);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);

	$data=oci_fetch_array($out);
							 

	$sql2 = 'begin products.product_option_select_list(:idx ,:product_type, :v_out); end;';
	$stmt2 = oci_parse($conn, $sql2);
	$out2 = oci_new_cursor($conn);
	if (!$stmt2)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	oci_bind_by_name($stmt2, ':idx', $product_id);
	oci_bind_by_name($stmt2, ':product_type', $data["PRODUCT_TYPE_ID"]);
	oci_bind_by_name($stmt2, ':v_out', $out2, -1, OCI_B_CURSOR);

	oci_execute($stmt2);
	oci_execute($out2);


?>

<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">상품등록</p>
  <p class="title_detail_text">상품을 등록하는 페이지 입니다.</p>
 </div>
<form name="form" method="post" action="index.php?p=product/product_edit_ok"> 
<input type="hidden" name="product_type_id" value="<?=$data["PRODUCT_TYPE_ID"]?>"/>
<input type="hidden" name="product_id" value="<?=$product_id?>"/>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">상품정보 입력 관리</p>
 <p class="subject_detail_text">상품정보 입력 기본정보</p>
 </div>


 <table id="admin_common_wirte_table">
  <tr>
   <th>상품명</th>
   <td><input type="text" class="input_size30" name="product_name" value="<?=$data["PRODUCT_NAME"]?>"></td>
  </tr>
  <tr>
   <th>상품 간략정보</th>
   <td><input type="text" class="input_size30" name="product_thum_info" value="<?=$data["PRODUCT_THUM_INFO"]?>"></td>
  </tr>
  <tr>
   <th>상품 판매업체</th>
   <td><?php pop_company_list(30,$data["COMPANY_ID"],$data["COMPANY_NAME"]) ?></td>
  </tr>
  <tr>
   <th>상품 대표가격</th>
   <td><input type="text" class="input_size30" name="product_main_price" value="<?=$data["PRODUCT_MAIN_PRICE"]?>"></td>
  </tr>  
  <tr>
   <th>상품 할인율</th>
   <td><input type="text" class="input_size30" name="product_discount" value="<?=$data["PRODUCT_DISCOUNT"]?>"/></td>
  </tr>  
  <tr>
   <th>상품 원가격</th>
   <td><input type="text" class="input_size30" name="product_origin_price"value="<?=$data["PRODUCT_ORIGIN_PRICE"]?>"/></td>
  </tr>  
  <tr>
   <th>상품 배송료</th>
   <td><input type="text" class="input_size30" name="product_delivery_price" value="<?=$data["PRODUCT_DELIVERY_PRICE"]?>"></td>
  </tr>
  <tr>
   <th>상품 메인이미지( 322 * 330 )</th>
   <td><input type="text" class="input_size30" id="product_thum_photo" name="product_thum_photo" value="<?=$data["PRODUCT_THUM_PHOTO"]?>"/><input type="button" class="bt18_add_s"  onclick="BrowseServer( 'Images:/', 'product_thum_photo' );" /></td>
  </tr>
  <tr>
   <th>상품 뷰페이지 [간략설명] 이미지</th>
   <td><input type="text" class="input_size30" id="product_img_text01" name="product_img_text01" value="<?=$data["PRODUCT_IMG_TEXT01"]?>"/><input type="button" class="bt18_add_s"  onclick="BrowseServer( 'Images:/', 'product_img_text01' );" /></td>
  </tr>  
  <tr>
   <th>상품 뷰페이지 [상품이름] 이미지</th>
   <td><input type="text" class="input_size30" id="product_img_text02" name="product_img_text02" value="<?=$data["PRODUCT_IMG_TEXT02"]?>"/><input type="button" class="bt18_add_s"  onclick="BrowseServer( 'Images:/', 'product_img_text02' );" /></td>
  </tr> 
  <tr>
   <th>상품 상세이미지( 533 * 530 )</th>
   <td><input type="text" class="input_size30" id="product_detail_photo" name="product_detail_photo" value="<?=$data["PRODUCT_DETAIL_PHOTO"]?>" /><input type="button"  class="bt18_add_s" onclick="BrowseServer( 'Images:/', 'product_detail_photo' );" /></td>
  </tr>
  <tr>
   <th>상품상태</th>
   <td><?php get_product_process($data["PRODUCT_PROCESS_ID"])?></td>
  </tr>
  </table>

 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">상품별 추가정보관리</p>
 <p class="subject_detail_text">상품타입을 선택후 옵션을 입력하세요.</p>
 </div>
 <table id="admin_common_wirte_table2">
  <tr>
   <td>
				<?php

						echo "<div id='tabs'>";
						echo "<ul>";
						if($data["PRODUCT_TYPE_ID"]==1){ echo "<li><a href='#tabs-1'>일반상품</a></li>" ;}
						if($data["PRODUCT_TYPE_ID"]==2){ echo "<li><a href='#tabs-2'>쿠폰</a></li>";}
						if($data["PRODUCT_TYPE_ID"]==3){ echo "<li><a href='#tabs-3'>티켓</a></li>";}
						echo "</ul>";
						
				if($data["PRODUCT_TYPE_ID"]==1){
						echo "<div id='tabs-1'>";
							echo "<table id='eadTable1'>";
								echo "<tr>";
										echo "<th width='40%'>옵션명</th>";
										echo "<th width='10%'>소비자가</th>";
										echo "<th width='10%'>판매가</th>";
										echo "<th width='10%'>할인율</th>";
										echo "<th width='10%'>수량</th>";
										echo "<th width='3%'>수정</th>";
										echo "<th width='3%'>삭제</th>";
										echo "<th width='3%'>추가</th>";
									echo "</tr>";
									while($data2=oci_fetch_array($out2)){
									echo "<tr>";							
										 echo "<td><input type='text' name='nomal_name[]'  class='input_size90' value='".$data2['OPTION_NAME']."'></td>";
										 echo "<td><input type='text' name='nomal_price[]' class='input_size90' value='".$data2["OPTION_PRICE"]."'></td>";
										 echo "<td><input type='text' name='nomal_sell_price[]' class='input_size90' value='".$data2["OPTION_SELL_PRICE"]."'></td>";
										 echo "<td><input type='text' name='nomal_discount[]' class='input_size90' value='".$data2["OPTION_DISCOUNT"]."'></td>";
										 echo "<td><input type='text' name='nomal_count[]' class='input_size90' value='".$data2["OPTION_COUNT"]."'></td>";
										 echo "<td><input type='button' class='bt18_update'onclick='javascript:pop_product_edit_option_edit(".$data2["OPTION_ID"].",".$data["PRODUCT_TYPE_ID"].");'></td>";
										 echo "<td><input type='button' class='bt18_del'onclick='javascript:pop_product_edit_option_del(".$data2["OPTION_ID"].",".$data["PRODUCT_TYPE_ID"].");'></td>";
 									     echo "<td><input type='button' class='bt18_add'onclick='javascript:pop_product_edit_option_add(".$product_id.",".$data["PRODUCT_TYPE_ID"].");'></td>";
									echo "</tr>";
									}
								echo "</table>";
						     echo "</div>";
				}

				if($data["PRODUCT_TYPE_ID"]==2){			
							 echo "<div id='tabs-2'>";
								echo "<table id='eadTable2'>";
									echo "<tr>";
										echo "<th width='40%'>옵션명</th>";
										echo "<th width='10%'>쿠폰 유효기간</th>";
										echo "<th width='10%'>판매가</th>";
										echo "<th width='10%'>수량</th>";
										echo "<th width='3%'>수정</th>";
										echo "<th width='3%'>삭제</th>";
										echo "<th width='3%'>추가</th>";
									echo "</tr>";
									while($data2=oci_fetch_array($out2)){
									echo "<tr>";
										 echo "<td><input type='text' name='coupon_name[]'  class='input_size90' value='".$data2["OPTION_NAME"]."'></td>";
										 echo "<td><input type='text' name='coupon_expiry_day[]'  class='input_size90' value='".$data2["OPTION_EXPIRY_DATE"]."'></td>";
										 echo "<td><input type='text' name='coupon_sell_price[]' class='input_size90' value='".$data2["OPTION_SELL_PRICE"]."'></td>";
										 echo "<td><input type='text' name='coupon_count[]' class='input_size90' value='".$data2["OPTION_COUNT"]."'></td>";
										 echo "<td><input type='button' class='bt18_update'onclick='javascript:pop_product_edit_option_edit(".$data2["OPTION_ID"].",".$data["PRODUCT_TYPE_ID"].");'></td>";
										 echo "<td><input type='button' class='bt18_del'onclick='javascript:pop_product_edit_option_del(".$data2["OPTION_ID"].",".$data["PRODUCT_TYPE_ID"].");'></td>";
 									     echo "<td><input type='button' class='bt18_add'onclick='javascript:pop_product_edit_option_add(".$product_id.",".$data["PRODUCT_TYPE_ID"].");'></td>";
									echo "</tr>";
									}
								echo "</table>";
							 echo "</div>";
				}

				if($data["PRODUCT_TYPE_ID"]==3){
							 echo "<div id='tabs-3'>";
								echo "<table id='eadTable3'>";
									echo "<tr>";
										echo "<th width='40%'>옵션명</th>";
										echo "<th width='10%'>티켓 사용일</th>";
										echo "<th width='10%'>티켓 사용시간</th>";
										echo "<th width='10%'>티켓 사용좌석</th>";
										echo "<th width='10%'>판매가</th>";
										echo "<th width='10%'>수량</th>";
										echo "<th width='3%'>수정</th>";
										echo "<th width='3%'>삭제</th>";
										echo "<th width='3%'>추가</th>";
									echo "</tr>";
									while($data2=oci_fetch_array($out2)){
									echo "<tr>";
										 echo "<td><input type='text' name='ticket_name[]'  class='input_size90' value='".$data2['OPTION_NAME']."'></td>";
										 echo "<td><input type='text' name='ticket_ava_day[]'  class='input_size90' value='".$data2["OPTION_AVA_DAY"]."'></td>";
										 echo "<td><input type='text' name='ticket_ava_time[]' class='input_size90' value='".$data2["OPTION_AVA_TIME"]."'></td>";
										 echo "<td><input type='text' name='ticket_ava_seat[]' class='input_size90' value='".$data2["OPTION_AVA_SEAT"]."'></td>";
										 echo "<td><input type='text' name='ticket_sell_price[]' class='input_size90' value='".$data2["OPTION_SELL_PRICE"]."'></td>";
										 echo "<td><input type='text' name='ticket_count[]' class='input_size90' value='".$data2["OPTION_COUNT"]."'></td>";
										 echo "<td><input type='button' class='bt18_update'onclick='javascript:pop_product_edit_option_edit(".$data2["OPTION_ID"].",".$data["PRODUCT_TYPE_ID"].");'></td>";
										 echo "<td><input type='button' class='bt18_del'onclick='javascript:pop_product_edit_option_del(".$data2["OPTION_ID"].",".$data["PRODUCT_TYPE_ID"].");'></td>";
 									     echo "<td><input type='button' class='bt18_add'onclick='javascript:pop_product_edit_option_add(".$product_id.",".$data["PRODUCT_TYPE_ID"].");'></td>";
									echo "</tr>";
									}
								echo "</table>";
							echo "</div>";
				}
							echo"</div> <!-- <div id='tabs'> -->";
				?>
							<textarea id='templat1' style='display:none;'>
							<tr>
								 <td><input type='text' name='coupon_name[]'  class='input_size90' ></td>
								 <td><input type='text' name='coupon_expiry_day[]'  class='input_size90' ></td>
								 <td><input type='text' name='coupon_sell_price[]' class='input_size90' ></td>
								 <td><input type='text' name='coupon_count[]' class='input_size90' ></td>
								 <td><input type='button' class='bt18_update'onclick='javascript:addRow1(eadTable1);'></td>
								 <td><input type='button' class='bt18_del'onclick='javascript:delRow(this);'></td>
								 <td><input type='button' class='bt18_add'onclick='javascript:delRow(this);'></td>
							</tr>
							</textarea>
							<textarea id='templat2' style='display:none;'>
							<tr>
								 <td><input type='text' name='coupon_name[]'  class='input_size90' ></td>
								 <td><input type='text' name='coupon_expiry_day[]'  class='input_size90' ></td>
								 <td><input type='text' name='coupon_sell_price[]' class='input_size90' ></td>
								 <td><input type='text' name='coupon_count[]' class='input_size90' ></td>
								 <td><input type='button' class='bt18_update'onclick='javascript:addRow2(eadTable2);'></td>
								 <td><input type='button' class='bt18_del'onclick='javascript:delRow(this);'></td>
								 <td><input type='button' class='bt18_add'onclick='javascript:delRow(this);'></td>
							</tr>
							</textarea>
							<textarea id='templat3' style='display:none;'>
							<tr>
								 <td><input type='text' name='ticket_name[]'  class='input_size90' ></td>
								 <td><input type='text' name='ticket_ava_day[]'  class='input_size90' ></td>
								 <td><input type='text' name='ticket_ava_time[]' class='input_size90' ></td>
								 <td><input type='text' name='ticket_ava_seat[]' class='input_size90' ></td>
								 <td><input type='text' name='ticket_sell_price[]' class='input_size90' ></td>
								 <td><input type='text' name='ticket_count[]' class='input_size90' ></td>
								 <td><input type='button' class='bt18_update'onclick='javascript:addRow3(eadTable3);'></td>
								 <td><input type='button' class='bt18_del'onclick='javascript:delRow(this);'></td>
								 <td><input type='button' class='bt18_add'onclick='javascript:delRow(this);'></td>
							</tr>
							</textarea>

  </td>
  </tr>
  </table>

 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">상품 상세정보</p>
 <p class="subject_detail_text">에디터를 이용한 간편한 입력관리</p>
 </div>
 <table id="admin_common_wirte_table">
  <tr>
   <td>
	<textarea id="editor" name="editor"><?=$data["PRODUCT_DETAIL_INFO"]?></textarea>
	<script type="text/javascript">
	//<![CDATA[
	   CKEDITOR.replace('editor',{
		   filebrowserBrowseUrl       : '/ckfinder/ckfinder.html',
		   filebrowserImageBrowseUrl  : '/ckfinder/ckfinder.html?Type=Images',
		   filebrowserFlashBrowseUrl  : '/ckfinder/ckfinder.html?Type=Flash',
		   filebrowserUploadUrl       : "/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files",
		   filebrowserImageUploadUrl  : "/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images",
		   filebrowserFlashUploadUrl  : "/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash" ,
		   language : 'ko'
		   
	   });
	//]]
	</script>
  </td>
  </tr>
  </table>

   <div id="admin_common_submit_wrap">
	<a class=bt_edit onclick="form.submit();"></a>
	<a class=bt_calcel onclick=history.back();></a>
   </div> 
</form>
</body>
</html>
