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

		
<?php include 'common/shop_top.php' ?>
<div class="middle_bar"><img src="css/img_shop/middle_bar_03.jpg"></div>
<div class="indiv"><!-- Start indiv -->

<table class="old_design_table" width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
	<td><img src="css/img/common/title_order_finish.gif" border=0></td>
</tr>
<tr>
	<td class="path">home > <b>주문완료</b></td>
</tr>
<tr>
	<td align=center style="padding:10 0 10 0"><img src="css/img/common/order_complete.gif" border=0></td>
</tr>
</table>

<?php
	$order_id=$_REQUEST['order_id'];


	$sql = 'begin ORDER_PACKAGE.ORDER_SELECT(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	oci_bind_by_name($stmt, ':idx', $order_id);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);

	$data=oci_fetch_array($out);


?>


<table width=100% style="border:1px solid #DEDEDE" cellpadding=0 cellspacing=0>
<tr>
	<td width=150 valign=top align=right bgcolor="#F3F3F3" style="padding-top:5px"><img src="css/img/common/order_step_end.gif"></td>
	<td style="border:5px solid #F3F3F3; padding:5px 10px;">

	<table width=100% cellpadding=2>
	<col width=100>

	<tr>
		<td height="20px">입금은행</td>
		<td>국민은행</td>
	</tr>
	<tr>
		<td height="20px">입금계좌</td>
		<td>255-07-001870-2</td>
	</tr>
	<tr>
		<td height="20px">예금주명</td>
		<td>비전 쇼핑몰</td>
	</tr>
	<tr>
		<td height="20px">입금금액</td>
		<td><b><?=Number_Format($data["ORDER_PRICE"])?>원</b></td>
	</tr>

	<!--{ / }-->
	<tr><td height=3></td></tr>
	<tr><td height=1 bgcolor=#efefef colspan=2 style="font-size:0px;"></td></tr>
	<tr><td height=3></td></tr>
	<tr>
		<td height="20px">주문자명</td>
		<td><?=$data["ORDER_NAME"]?></td>
	</tr>
	<tr>
		<td height="20px">주문금액</td>
		<td><b><?=Number_Format($data["ORDER_PRICE"])?>원</b></td>
	</tr>
	<tr>
		<td height="20px">받으실 포인트</td>
		<td><b><?=Number_Format($data["ORDER_POINT"])?>원</b></td>
	</tr>	
	<tr>
		<td height="20px">우편번호</td>
		<td><?=$data["ORDER_ZIPCODE"]?></td>
	</tr>
	<tr>
		<td height="20px">받으실곳</td>
		<td><?=$data["ORDER_ADDR1"]?> &nbsp; <?=$data["ORDER_ADDR2"]?></td>
	</tr>
	<tr>
		<td height="20px">휴대폰번호</td>
		<td><?=$data["ORDER_MOBILE"]?></td>
	</tr>
	<tr>
		<td height="20px">집전화</td>
		<td><?=$data["ORDER_ZIPCODE"]?></td>
	</tr>
	<tr>
		<td height="20px">요청사항</td>
		<td><?=$data["ORDER_COMMENT"]?></td>
	</tr>		
	</table>

	</td>
</tr>
</table><p>

<div style="940px; text-align:center; padding:30px;">
<A HREF="index.php"><img src="css/img/common/btn_confirm.gif" border=0></A>
</div>

</div><!-- End indiv -->


</p>
</div>
