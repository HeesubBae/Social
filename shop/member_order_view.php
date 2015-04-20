<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
금오 소셜커머스::매일 매일 핫 딜!~
</title>
<link href="css/layout_shop.css" type="text/css" rel="stylesheet"/>
		<style>
		#orderbox {border:5px solid #F3F3F3; height:100%;}
		#orderbox div {float:left; width:150; height:100%; background-color:#F3F3F3; text-align:right;}
		#orderbox table {float:left; margin:10px 0px 10px 20px; }
		#orderbox table th {width:100; text-align:left; font-weight:normal; height:25;}
		#orderbox table td {padding-left:10px}
		.shop_member_order_view_table td {height:25px;}
		</style>
</head>
<body>

<?php include 'common/shop_top.php'?>
<div class="middle_bar"><img src="css/img_shop/middle_bar_01.jpg"></div>
<ul class="in_category_bar">
	<li><a href="member_order_list.php"><img src="css/img_shop/mypage_tab01_on.jpg"/></a><li>
	<li><a href="member_point_list.php"><img src="css/img_shop/mypage_tab02.jpg"/></a><li>
	<li><a href="board_my_review.php"><img src="css/img_shop/mypage_tab03.jpg"/></a><li>
	<li><a href="board_mantoman.php"><img src="css/img_shop/mypage_tab04.jpg"/></a><li>
	<li><a href="member_edit.php"><img src="css/img_shop/mypage_tab06.jpg"/></a><li>
</ul>
<div class="indiv">
<!-- 상단이미지 || 현재위치 -->
<TABLE class="old_design_table" width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
	<td><img src="css/img/common/title_orderlist.gif" border=0></td>
</tr>
<TR>
	<td class="path">HOME > 마이페이지 > <B>주문내역/배송조회</B></td>
</TR>
</TABLE>


<div class="indiv2"><!-- Start indiv -->



<div ><img src="css/img/common/order_txt_01.gif" border=0></div>
<form name="form" method="post" action="css_order_ok.do" >
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td height=2 bgcolor="#303030" colspan=10></td></tr>
<tr bgcolor=#F0F0F0 height=23>
	<th colspan=2 class="input_txt">상품정보</th>
	<th class="input_txt">상품번호</th>
	<th class="input_txt">판매가</th>
	<th class="input_txt">적립금</th>
	<th class="input_txt" width="10px">수량</th>
	<th class="input_txt">합계</th>
</tr>

<tr>
<td height=1 bgcolor="#D6D6D6" colspan=10></td></tr>
<col width=60><col><col width=60>
<col width=80><col width=50>
<col width=80><col width=50>
<c:set var="sum" value="0"/>
<c:set var="point" value="0"/>
<c:set var="idx" value="0"/>
<c:forEach var="i" items="${opBeans}" varStatus="status"> 
<tr>
	<td height=60 align=center>
		<img width="56px" height="82px" src="/shoesholic/data/product_img/${i.product_idx}.jpg">
	</td>
	<td>

	</td> 
	<td align=center>상품번호: ${i.product_idx} <input type="hidden" name="product_idx" value="${i.product_idx}"/></td>
	<td align=center style="padding-right:10">${i.order_product_sell_price}원 <input type="hidden" name="order_product_sell_price" value="${i.order_product_sell_price}"/></td>
	<td align=center style="padding-right:10">${i.order_product_point}원<input type="hidden" name="order_product_point" value="${i.order_product_point}"/></td>
	<td align=center>
	
		<table cellpadding=0 cellspacing=0 border=0>
		<tr>
			<td align="right"><input type="text" name="order_product_count" size=2 value="${i.order_product_count}" class=line style="text-align:right;" onkeydown="onlynumber()" readonly></td>
			<td><div style="padding-bottom:2px"></td>
			<td></td>
		</tr>
		</table>
	
	</td>
	<td align=center style="padding-right:10">${i.order_product_sell_price*i.order_product_count}원</td>
</tr>

<c:set var="idx" value="${idx+1}"/>
<c:set var="sum" value="${sum+i.order_product_sell_price*i.order_product_count}"/>
<c:set var="point" value="${point+i.order_product_point*i.order_product_count}"/>
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

<div style="margin-top:50px; margin-bottom:10px;"><img src="css/img/common/order_txt_02.gif" border=0></div>

<input type="hidden" name="order_price" value="${sum}">
<input type="hidden" name="order_point" value="${point}"/>

<!-- 01 주문자정보 -->
<table  width=100% style="border:1px solid #DEDEDE" cellpadding=0 cellspacing=0>
<tr>
	<td width=150 valign=top align=right bgcolor="#F3F3F3"><img src="css/img/common/order_step_01.gif"></td>
	<td style="padding:10px">

	<table class="shop_member_order_view_table">
	<col width=100>
	<tr>
		<td>주문번호</td>
		<td>
		${beans2.order_idx}
		<span class="falsespan" id="falsename"></span>
		</td>
	</tr>
	<tr>
		<td>주문하시는분</td>
		<td>
		${bean.member_name}
		<span class="falsespan" id="falsename"></span>
		</td>
	</tr>
	<!--{ ? _sess }-->
	<tr>
		<td>우편번호</td>
		<td>
		${bean.member_zipcode}
	</tr>
	<!--{ / }-->
	<!--{ ? _sess }-->
	<tr>
		<td>주소</td>
		<td>
		${bean.member_addr1}
		${bean.member_addr2}
	</tr>
	<!--{ / }-->
	<tr>
		<td>전화번호</td>
		<td>
		${bean.member_phone}
		</td>
	</tr>
	<tr>
		<td>핸드폰번호</td>
		<td>
		${bean.member_mobile}
		</td>
	</tr>
	<tr>
		<td>이메일</td>
		<td>
		${bean.member_email}
		</td>
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

	<table class="shop_member_order_view_table">
	<col width=100>
	<tr>
		<td>받으실분</td>
		<td>${beans2.order_name}
		<span class="falsespan" id="falsename2"></span>
		</td>
	</tr>
	<tr>
		<td>받으실곳</td>
		<td>
		${beans2.order_zipcode}
		<span class="falsespan" id="falsezipcode"></span>  
		</td>
	</tr>
	<tr>
		<td></td>
		<td>${beans2.order_addr1}
		<span class="falsespan" id="falseaddr1"></span>
		</td>
	</tr>
	<tr>  
		<td></td>
		<td>${beans2.order_addr2}
		<span class="falsespan" id="falseaddr2"></span>
		</td>
	</tr>
	<tr>
		<td>전화번호</td>
		<td>
		${beans2.order_phone}
		<span class="falsespan" id="falsephone2"></span>
		</td>
	</tr>
	<tr>
		<td>핸드폰번호</td>
		<td>
		${beans2.order_mobile}
		<span class="falsespan" id="falsemobile2"></span> 
		</td>
	</tr>
	<tr>
		<td>남기실 말씀</td>
		<td>${beans2.order_comment}
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

	<table class="shop_member_order_view_table">
	<col width=100>
	<tr>
		<td>총 결제금액</td>
		<td><span id=paper_settlement style="width:146px;text-align:right;font:bold 14px tahoma; color:FF6C68;">${sum}</span> 원</td>
	</tr>
	<tr>
		<td>받으실 적립금</td>
		<td><span id=paper_settlement style="width:146px;text-align:right;font:bold 14px tahoma; color:FF6C68;">${point}</span> 원</td>
	</tr>	
	</table>

	</td>
</tr>
</table><div style="font-size:0;height:5px"></div>

<table width=100% style="border:1px solid #DEDEDE" cellpadding=0 cellspacing=0>
<tr>
	<td width=150 valign=top align=right bgcolor="#F3F3F3"><img src="css/img/common/order_step_04.gif"></td>
	<td style="padding:10px">

	
	<table class="shop_member_order_view_table">
	<col width=100>
	<tr>
		<td>일반결제</td>
		<td><img src="/shoesholic/admin/css/img_admin/order_type_idx/${beans2.order_type_idx}.png"></td>
	</tr>
	</table>

	</td>
</tr>
</table><div style="font-size:0;height:5px"></div>

<div style="padding:20px" align=center class="noline">
<img src="css/img/common/btn_back.gif" onclick="history.back()" style="cursor:pointer">
</div>



</form>

</div><!-- End indiv -->
<div id=dynamic></div>


</body>
</html>        
