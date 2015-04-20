<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
금오 소셜커머스::매일 매일 핫 딜!~
</title>
<script src="js/order_start.js"  charset='utf-8'></script>
<link href="css/layout_shop.css" type="text/css" rel="stylesheet"/>
</head>
<body>
     
        
<style>
#orderbox {border:5px solid #F3F3F3; height:100%;}
#orderbox div {float:left; width:150; height:100%; background-color:#F3F3F3; text-align:right;}
#orderbox table {float:left; margin:10px 0px 10px 20px; }
#orderbox table th {width:100; text-align:left; font-weight:normal; height:25;}
#orderbox table td {padding-left:10px}
</style>


<?php include 'common/shop_top.php' ?> 
<?php
ini_set('display_errors', 'On');
		if($_SESSION["member_idx"]==""){
			echo "<script language='javascript'>";
			echo "alert('로그인을 해주세요.');";
			echo "location.href='login.php'";
			echo "</script>";
			}
?>


<div class="middle_bar"><img src="css/img_shop/middle_bar_03.jpg"></div>
<div class="indiv"><!-- Start indiv -->

	<TABLE class="old_design_table" width=100% cellpadding=0 cellspacing=0 border=0>
	<tr>
		<td><img src="css/img/common/title_order_01.gif" border=0></td>
	</tr>
	<TR>
		<td class="path">HOME > <B>주문하기</B></td>
	</TR>
	</TABLE>

	<div><img src="css/img/common/order_txt_01.gif" border=0></div>
<!-- form -->
<form method="post" name="form" action="order_ok.php">
<!-- form -->
		<table width=100% cellpadding=0 cellspacing=0 border=0>
			<tr>
				<td height=2 bgcolor="#303030" colspan=10></td>
			</tr>
			<tr bgcolor=#F0F0F0 height=23>
				<th colspan=2 class="input_txt">상품정보</th>
				<th class="input_txt">물품</th>
				<th class="input_txt">판매가</th>
				<th class="input_txt">적립금</th>
				<th class="input_txt" width="10px">수량</th>
				<th class="input_txt">합계</th>
			</tr>

			<tr>
				<td height=1 bgcolor="#D6D6D6" colspan=10></td>
			</tr>
				<col width=60><col><col width=60>
				<col width=80><col width=50>
				<col width=80><col width=50>
			<?php

			$product_thum_photo=$_REQUEST["product_thum_photo"];
			$product_name=$_REQUEST["product_name"];

			$product_id=$_REQUEST["product_id"];
			$product_type_id=$_REQUEST["product_type_id"];
			$option_id=$_REQUEST["option_id"];
			$itemcount=$_REQUEST["itemcount"];
			
			$total_price=0;
			$total_point=0;
			
			
			for($j=0; $j<=(int)count($option_id)-1; $j++)
			{

				
				$sql2 = 'begin products.product_option_select(:idx ,:product_type, :v_out); end;';
				$stmt2 = oci_parse($conn, $sql2);
				$out2 = oci_new_cursor($conn);
				if (!$stmt2)
				{
					$e = oci_error();
					trigger_error($e['message'], E_USER_ERROR);
				}
				
				oci_bind_by_name($stmt2, ':idx', $option_id[$j]);
				oci_bind_by_name($stmt2, ':product_type', $product_type_id);
				oci_bind_by_name($stmt2, ':v_out', $out2, -1, OCI_B_CURSOR);

				oci_execute($stmt2);
				oci_execute($out2);				
				
				$data2=oci_fetch_array($out2)
			
			?>		
			<tr>
				<td height=60 align=center>
					<img width="56px" height="82px" src="<?php echo $product_thum_photo; ?>">
				</td>
				<td>

				</td> 
					<td align=center><?php echo $product_name;?> &nbsp;[ <?php echo $data2['OPTION_NAME'];?> ]</td>
					<td align=center style="padding-right:10"><?php echo $data2['OPTION_SELL_PRICE']?> &nbsp;원</td>
					<td align=center style="padding-right:10"><?php echo (int)$data2['OPTION_SELL_PRICE']/10 ;?>&nbsp;원</td>
					<td align=center>

						<table cellpadding=0 cellspacing=0 border=0>
							<tr>
								<td align="right">
<!-- OPTION PARAMETER -->
	<input type="TEXT" name="option_idx[]" size=2 value="<?php echo $data2['OPTION_ID'];?>" class=line style="text-align:right;" onkeydown="onlynumber()" readonly>
	<input type="text" name="option_price[]" size=2 value="<?php echo $data2['OPTION_SELL_PRICE'];?>" class=line style="text-align:right;" onkeydown="onlynumber()" readonly>
	<input type="text" name="option_count[]" size=2 value="<?php echo $itemcount[$j];?>" class=line style="text-align:right;" onkeydown="onlynumber()" readonly>
	
<!-- OPTION PARAMETER -->
								</td>
								<td>
									<div style="padding-bottom:2px"></td>
								<td>
								
								</td>
							</tr>
						</table>

					</td>
					<td align=center style="padding-right:10">
					<?php  
						$total_price=$total_price+$data2['OPTION_SELL_PRICE']*$itemcount[$j];
						$middle_price=$data2['OPTION_SELL_PRICE']*$itemcount[$j];
						echo  Number_Format($middle_price);
					?>원</td>
			</tr>
			<?php
				oci_free_statement($stmt2);
				oci_free_statement($out2);
			}
			?>


				<tr>
					<td colspan=10 height=1 bgcolor=#DEDEDE></td>
				</tr>

				<tr>
					<td colspan=10 height=60 bgcolor=#f7f7f7 align=right>

					<table>
					<tr>
						<td align="right" width="80%" nowrap>상품합계금액</td>
						<td align=right style="font-weight:bold;padding-left:25px" class=red>
						<?php echo  Number_Format($total_price);?>원&nbsp;
						</td>
					</tr>
					<tr>
						<td align=right>받으실적립금</td>
						<td align=right style="font-weight:bold;padding-left:25px">
						<?php 
							$total_point=(int)($total_price/10);
							echo  Number_Format($total_point); 
						?>원&nbsp;
						</td> 
					</tr>
					</table>

					</td>
				</tr>
				<tr><td colspan=10 height=1 bgcolor=#efefef></td></tr>

				</table>

				<div style="margin-top:50px"><img src="css/img/common/order_txt_02.gif" border=0></div>
<!-- OPTION PARAMETER -->
<input type="text" name="product_id" size=2 value="<?php echo $product_id;?>" class=line style="text-align:right;" onkeydown="onlynumber()" readonly>
<input type="text" name="product_type_id" size=2 value="<?php echo $product_type_id;?>" class=line style="text-align:right;" onkeydown="onlynumber()" readonly>
<!-- OPTION PARAMETER -->


<!-- ORDER PARAMETER -->
<input type="TEXT" name="order_price" value="<?=$total_price?>">
<input type="TEXT" name="order_point" value="<?=$total_point?>"/>
<!-- ORDER PARAMETER -->

				<?php

					$sql = 'begin member_select(:idx , :v_out); end;';
					$stmt = oci_parse($conn, $sql);
					$out = oci_new_cursor($conn);
					if (!$stmt)
					{
						$e = oci_error();
						trigger_error($e['message'], E_USER_ERROR);
					}
					$member_idx=$_GET["member_idx"];
					oci_bind_by_name($stmt, ':idx', $_SESSION["member_idx"]);
					oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

					oci_execute($stmt);
					oci_execute($out);

					$data=oci_fetch_array($out);
				?>

				<!-- 01 주문자정보 -->
				<table width=100% style="border:1px solid #DEDEDE" cellpadding=0 cellspacing=0>
				<tr>
					<td width=150 valign=top align=right bgcolor="#F3F3F3"><img src="css/img/common/order_step_01.gif"></td>
					<td style="padding:10px">

					<table>
					<col width=100>
					<tr>
						<td>주문하시는분</td>
						<td>
						<input type=text name="member_name" id="member_name" size="20" maxlength="20" value="<?=$data["MEMBER_NAME"] ?>" style="font-weight:bold" {_style_member} required msgR="주문하시는분의 이름을 적어주세요">
						<span class="falsespan" id="falsename"></span>
						</td>
					</tr>
					<!--{ ? _sess }-->
					<tr>
						<td>우편번호</td>
						<td>
						<input tpye="text" name="member_zipcode" id="member_zipcode1" value="<?=$data["MEMBER_ZIPCODE"] ?>" size="7" maxlength="7"><span class="falsespan" id="falsezipcode1"></span>
					</tr>
					<!--{ / }-->
					<!--{ ? _sess }-->
					<tr>
						<td>주소</td>
						<td>
						<input tpye="text" name="member_addr1" id="member_addr11" value="<?=$data["MEMBER_ADDR1"] ?>" size="100" maxlength="100"><span class="falsespan" id="falseaddr11"></span><br>
						<input type="text" name="member_addr2" id="member_addr12" value="<?=$data["MEMBER_ADDR2"] ?>" size="100" maxlength="100"><span class="falsespan" id="falseaddr12"></span></td>
					</tr>
					<!--{ / }-->
					<tr>
						<td>전화번호</td>
						<td>
						<input type=text name=member_phone id="member_phone" value="<?=$data["MEMBER_PHONE"] ?>" size="20" maxlength="20" required><span class="falsespan" id="falsephone"></span>
						</td>
					</tr>
					<tr>
						<td>핸드폰번호</td>
						<td>
						<input type=text name=member_mobile id="member_mobile" value="<?=$data["MEMBER_MOBILE"] ?>" size="20" maxlength="20" required><span class="falsespan" id="falsemobile"></span>
						</td>
					</tr>
					<tr>
						<td>이메일</td>
						<td><input type=text name=member_email id="member_email" value="<?=$data["MEMBER_EMAIL"] ?>" size="30" maxlength="30" required option=regEmail><span class="falsespan" id="falseemail"></span></td>
					</tr>
					</table>

					</td>
				</tr>
				</table><div style="font-size:0;height:5px"></div>

				<!-- 02 배송정보 -->
				<table width=100% style="border:1px solid #DEDEDE" cellpadding=0 cellspacing=0>
					<tr>
						<td width=150 valign=top align=right bgcolor="#F3F3F3"><img src="css/img/common/order_step_02.gif"></td>
						<td style="padding:10px">

						<table>
						<col width=100>
						<tr>
							<td>배송지 확인</td>
							<td class=noline>
							<input type=checkbox name="copy" id="copy" OnClick="javascript:ShipToBillPerson(this.form);"> 주문고객 정보와 동일합니다
							</td>
						</tr>
						<tr>
							<td>받으실분</td>
							<td><input type=text id="order_name" name="order_name" size="20" maxlength="20" value="" required>
							<span class="falsespan" id="falsename2"></span>
							</td>
						</tr>
						<tr>
							<td>받으실곳</td>
							<td>
							<input type=text name=order_zipcode id="order_zipcode" size="7" maxlength="7" class=line  value="">
							<img src="css/img/common/btn_zipcode.gif" align=absmiddle onclick="window.open('/shoesholic/pop_zipcode.do?reback=2','popup','scrollbars=no,width=500,height=676,left=800,top=100')">
							<span class="falsespan" id="falsezipcode"></span>  
							</td>
						</tr>
						<tr>
							<td></td>
							<td><input type=text name=order_addr1 id="order_addr1" class=lineBig  value="" size="100" maxlength="100" required>
							<span class="falsespan" id="falseaddr1"></span>
							</td>
						</tr>
						<tr>  
							<td></td>
							<td><input type=text name=order_addr2 id="order_addr2" class=lineBig value="" size="100" maxlength="100" required>
							<span class="falsespan" id="falseaddr2"></span>
							</td>
						</tr>
						<tr>
							<td>전화번호</td>
							<td>
							<input type=text name="order_phone" id="order_phone" value="" size="20" maxlength="20" required>
							<span class="falsespan" id="falsephone2"></span>
							</td>
						</tr>
						<tr>
							<td>핸드폰번호</td>
							<td>
							<input type=text name="order_mobile" id="order_mobile" value="" size="20" maxlength="20" required>
							<span class="falsespan" id="falsemobile2"></span> 
							</td>
						</tr>
						<tr>
							<td>남기실 말씀</td>
							<td><input type=text name="order_comment"  size="100" maxlength="100"></td>
						</tr>
						</table>

						</td>
					</tr>
				</table><div style="font-size:0;height:5px"></div>

				<!-- 03 결제금액 -->
				<table width=100% style="border:1px solid #DEDEDE" cellpadding=0 cellspacing=0>
				<tr>
					<td width=150 valign=top align=right bgcolor="#F3F3F3"><img src="css/img/common/order_step_03.gif"></td>
					<td style="padding:10px">

					<table>
					<col width=100>
					<tr>
						<td>총 결제금액</td>
						<td><span id=paper_settlement style="width:146px;text-align:right;font:bold 14px tahoma; color:FF6C68;"><?=Number_Format($total_price)?></span> 원</td>
					</tr>
					</table>

					</td>
				</tr>
				</table><div style="font-size:0;height:5px"></div>

				<table width=100% style="border:1px solid #DEDEDE" cellpadding=0 cellspacing=0>
				<tr>
					<td width=150 valign=top align=right bgcolor="#F3F3F3"><img src="css/img/common/order_step_04.gif"></td>
					<td style="padding:10px">

					
					<table>
					<col width=100>
					<tr>
						<td>결제방식</td>
						<td class=noline>
						<input type=radio name="order_type_id" value="1" checked > 무통장입금
						<input type=radio name="order_type_id" value="2" > 신용카드
						<input type=radio name="order_type_id" value="3" > 계좌이체
						<input type=radio name="order_type_id" value="4" > 가상계좌
						<input type=radio name="order_type_id" value="5" > 핸드폰
						<input type=radio name="order_type_id" value="6" > 포인트
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
						<td class=noline>
						&nbsp;
						</td>
					</tr>
					</table>

					</td>
				</tr>
				</table><div style="font-size:0;height:5px"></div>

				<div style="padding:20px" align=center class="noline">
				<img src="css/img/common/btn_payment.gif" onclick="return validate();">
				<img src="css/img/common/btn_cancel.gif" onclick="history.back()" style="cursor:pointer">
				</div>



</form>
</div><!-- End indiv -->
<div id=dynamic></div>


</body>
</html>        