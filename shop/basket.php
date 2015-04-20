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

<!-- 상단이미지 || 현재위치 -->
<TABLE class="old_design_table" width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
<td><img src="css/img/common/title_cart.gif" border=0></td>
</tr>
<TR>
<td class="path">HOME > <B>장바구니</B></td>
</TR>
</TABLE>

<form name="form" method="post" action="/">

<input type=hidden name=mode value=modItem>
<br>


<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td height=2 bgcolor="#303030" colspan=10></td></tr>
<tr bgcolor=#F0F0F0 height=23>
	<th colspan=2 class="input_txt">상품정보</th>
	<th class="input_txt">물품</th>
	<th class="input_txt">판매가</th>
	<th class="input_txt">적립금</th>
	<th class="input_txt" width="10px">수량</th>
	<th class="input_txt">합계</th>
	<th class="input_txt">삭제</th>
</tr>

<tr>
<td height=1 bgcolor="#D6D6D6" colspan=10></td></tr>
<col width=60><col><col width=60>
<col width=80><col width=50>
<col width=80><col width=50>
<c:set var="sum" value="0"/>
<c:set var="point" value="0"/>
<c:set var="idx" value="0"/>
<c:forEach var="i" items="${sessionScope.basket}" varStatus="status"> 
<tr>
	<td height=60 align=center>
		<img width="56px" height="82px" src="/shoesholic/data/product_img/${i.product_idx}.jpg">
	</td>
	<td>

	</td> 
	<td align=center>${i.product_name}</td>
	<td align=center style="padding-right:10">${i.product_sell_price}원</td>
	<td align=center style="padding-right:10">${i.product_point}원</td>
	<td align=center>
	
		<table cellpadding=0 cellspacing=0 border=0>
		<tr>
			<td align="right"><input type=text name=ea[] size=2 value="${i.product_count}" class=line style="text-align:right;" onkeydown="onlynumber()"></td>
			<td><div style="padding-bottom:2px"><img src="css/img/common/btn_plus.gif" onClick="chg_cart_ea(frmCart['ea[]'],'up',{.index_})" style="cursor:pointer"></div><img src="css/img/common/btn_minus.gif" onClick="chg_cart_ea(frmCart['ea[]'],'dn',{.index_})" style="cursor:pointer"></td>
			<td><input type=image src="css/img/common/sbtn_mod.gif"></td>
		</tr>
		</table>
	
	</td>
	<td align=center style="padding-right:10">${i.product_sell_price*i.product_count}원</td>
	<td align=center>
		<a href="css_basket_del.do?array_list_idx=${idx}">
			<img src="css/img/common/sbtn_del.gif">
		</a>
	</td>

</tr>

<c:set var="idx" value="${idx+1}"/>
<c:set var="sum" value="${sum+i.product_sell_price*i.product_count}"/>
<c:set var="point" value="${point+i.product_point*i.product_count}"/>
</c:forEach>


<tr><td colspan=10 height=1 bgcolor=#DEDEDE></td></tr>

<tr>
	<td colspan=10 height=60 bgcolor=#f7f7f7 align=right>

	<table>
	<tr>
		<td align="right" width="80%" nowrap>상품합계금액</td>
		<td align=right style="font-weight:bold;padding-left:25px" class=red>
		${sum}원&nbsp;
		</td>
	</tr>
	<tr>
		<td align=right>받으실적립금</td>
		<td align=right style="font-weight:bold;padding-left:25px">${point}원&nbsp;</td> 
	</tr>
	</table>

	</td>
</tr>
<tr><td colspan=10 height=1 bgcolor=#efefef></td></tr>

</table>


<br>
<TABLE width=100% cellpadding=0 cellspacing=0 border=0 style="margin-top:50px;">
<tr>
<td align=center>
<a href="css_order_start.do" onFocus="blur()"><img src="css/img/common/btn_order.gif" border=0></a>&nbsp;
<a href="javascript:history.back();"onFocus="blur()"><img src="css/img/common/btn_back.gif" border=0></a>&nbsp;
<a href="/shoesholic/" onFocus="blur()"><img src="css/img/common/btn_continue.gif" border=0></a></td>
</tr>
</TABLE>

</form>
</div><!-- End indiv -->

</div>
</body>
</html>        
