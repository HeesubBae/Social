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
<link href="../css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>무제 문서</title>
<script  src="/ckeditor/ckeditor.js"></script>
<script  src="/ckfinder/ckfinder.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>
<link rel="Stylesheet" type="text/css" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/themes/smoothness/jquery-ui.css">


<script>
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

$product_id=$_GET["product_id"];
$product_type_id=$_GET["product_type_id"];

?>

<body>
 <form name="form" method="post"action="pop.php?p=product/product_edit_optioni_add_ok">
 <input type="hidden" name="product_id" value="<?=$product_id?>"/>
 <input type="hidden" name="product_type_id" value="<?=$product_type_id?>"/>
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
						if($product_type_id==1){ echo "<li><a href='#tabs-1'>일반상품</a></li>" ;}
						if($product_type_id==2){ echo "<li><a href='#tabs-2'>쿠폰</a></li>";}
						if($product_type_id==3){ echo "<li><a href='#tabs-3'>티켓</a></li>";}
						echo "</ul>";
						
				if($product_type_id==1){
						echo "<div id='tabs-1'>";
							echo "<table id='eadTable1'>";
								echo "<tr>";
										echo "<th width='40%'>옵션명</th>";
										echo "<th width='10%'>소비자가</th>";
										echo "<th width='10%'>판매가</th>";
										echo "<th width='10%'>할인율</th>";
										echo "<th width='10%'>수량</th>";
										echo "<th width='10%'>추가</th>";
										echo "<th width='10%'>삭제</th>";

									echo "</tr>";
									echo "<tr>";							
										 echo "<td><input type='text' name='nomal_name[]'  class='input_size90'></td>";
										 echo "<td><input type='text' name='nomal_price[]' class='input_size90' ></td>";
										 echo "<td><input type='text' name='nomal_sell_price[]' class='input_size90' ></td>";
										 echo "<td><input type='text' name='nomal_discount[]' class='input_size90' ></td>";
										 echo "<td><input type='text' name='nomal_count[]' class='input_size90' ></td>";
										 echo "<td><input type='button' class='bt18_add'onclick='javascript:addRow1(eadTable1);' ></td>";
										 echo "<td><input type='button' class='bt18_del'onclick='javascript:delRow(this);' ></td>";
									echo "</tr>";
								echo "</table>";
						     echo "</div>";
				}

				if($product_type_id==2){			
							 echo "<div id='tabs-2'>";
								echo "<table id='eadTable2'>";
									echo "<tr>";
										echo "<th width='40%'>옵션명</th>";
										echo "<th width='10%'>쿠폰 유효기간</th>";
										echo "<th width='10%'>판매가</th>";
										echo "<th width='10%'>수량</th>";
										echo "<th width='10%'>추가</th>";
										echo "<th width='10%'>삭제</th>";
									echo "</tr>";
									
									echo "<tr>";
										 echo "<td><input type='text' name='coupon_name[]'  class='input_size90' ></td>";
										 echo "<td><input type='text' name='coupon_expiry_day[]'  class='input_size90' ></td>";
										 echo "<td><input type='text' name='coupon_sell_price[]' class='input_size90' ></td>";
										 echo "<td><input type='text' name='coupon_count[]' class='input_size90' ></td>";
										 echo "<td><input type='button' class='bt18_add'onclick='javascript:addRow2(eadTable2);' ></td>";
										 echo "<td><input type='button' class='bt18_del'onclick='javascript:delRow(this);' ></td>";
									echo "</tr>";

								echo "</table>";
							 echo "</div>";
				}

				if($product_type_id==3){
							 echo "<div id='tabs-3'>";
								echo "<table id='eadTable3'>";
									echo "<tr>";
										echo "<th width='44%'>옵션명</th>";
										echo "<th width='10%'>티켓 사용일</th>";
										echo "<th width='10%'>티켓 사용시간</th>";
										echo "<th width='10%'>티켓 사용좌석</th>";
										echo "<th width='10%'>판매가</th>";
										echo "<th width='10%'>수량</th>";
										echo "<th width='3%'>추가</th>";
										echo "<th width='3%'>삭제</th>";
									echo "</tr>";
									echo "<tr>";
										 echo "<td><input type='text' name='ticket_name[]'  class='input_size90' ></td>";
										 echo "<td><input type='text' name='ticket_ava_day[]'  class='input_size90' ></td>";
										 echo "<td><input type='text' name='ticket_ava_time[]' class='input_size90' ></td>";
										 echo "<td><input type='text' name='ticket_ava_seat[]' class='input_size90' ></td>";
										 echo "<td><input type='text' name='ticket_sell_price[]' class='input_size90' ></td>";
										 echo "<td><input type='text' name='ticket_count[]' class='input_size90' ></td>";
										 echo "<td><input type='button' class='bt18_add'onclick='javascript:addRow3(eadTable3);' ></td>";
										 echo "<td><input type='button' class='bt18_del'onclick='javascript:delRow(this);'></td>";
									echo "</tr>";
								echo "</table>";
							echo "</div>";
				}
							echo"</div> <!-- <div id='tabs'> -->";
				?>
							<textarea id='templat1' style='display:none;'>
							<tr>
								 <td><input type="text" name="nomal_name[]"  class="input_size90" ></td>
								 <td><input type="text" name="nomal_price[]" class="input_size90" ></td>
								 <td><input type="text" name="nomal_sell_price[]" class="input_size90" ></td>
								 <td><input type="text" name="nomal_discount[]" class="input_size90" ></td>
								 <td><input type="text" name="nomal_count[]" class="input_size90" ></td>
								 <td><input type="button" class="bt18_add"onclick="javascript:addRow1(eadTable1);"></td>
								 <td><input type="button" class="bt18_del"onclick="javascript:delRow(this);"></td>
							</tr>
							</textarea>
							<textarea id='templat2' style='display:none;'>
							<tr>
								 <td><input type='text' name='coupon_name[]'  class='input_size90' ></td>
								 <td><input type='text' name='coupon_expiry_day[]'  class='input_size90' ></td>
								 <td><input type='text' name='coupon_sell_price[]' class='input_size90' ></td>
								 <td><input type='text' name='coupon_count[]' class='input_size90' ></td>
								 <td><input type='button' class='bt18_add'onclick='javascript:addRow2(eadTable2);'></td>
								 <td><input type='button' class='bt18_del'onclick='javascript:delRow(this);'></td>
							</tr>
							</textarea>
							<textarea id="templat3" style="display:none;">
							<tr>
								 <td><input type="text" name="ticket_name[]"  class="input_size90" ></td>
								 <td><input type="text" name="ticket_ava_day[]"  class="input_size90" ></td>
								 <td><input type="text" name="ticket_ava_time[]" class="input_size90" ></td>
								 <td><input type="text" name="ticket_ava_seat[]" class="input_size90" ></td>
								 <td><input type="text" name="ticket_sell_price[]" class="input_size90" ></td>
								 <td><input type="text" name="ticket_count[]" class="input_size90" ></td>
								 <td><input type="button" class="bt18_add"onclick="javascript:addRow3(eadTable3);"></td>
								 <td><input type="button" class="bt18_del"onclick="javascript:delRow(this);"></td>
							</tr>
							</textarea>

  </td>
  </tr>
  </table>

   <div id="admin_common_submit_wrap">
		<a class="bt_save" onclick="form.submit();">등록</a>
   	    <a class="bt_calcel" onclick="window.close();">취소</a>
   </div> 
</form>
  </body>
  </html>