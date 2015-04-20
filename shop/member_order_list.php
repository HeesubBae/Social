<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
금오 소셜커머스::매일 매일 핫 딜!~
</title>
<link href="css/layout_shop.css" type="text/css" rel="stylesheet"/>
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


<form name=frmOrderList method=post>
<input type=hidden name=mode>
<input type=hidden name=ordno>

<br><table width=100% cellpadding=0 cellspacing=0 border=0>
<tr><td height=2 bgcolor="#303030" colspan=10></td></tr>
<tr bgcolor=#F0F0F0 height=23 class=input_txt>
	<th>주문번호</th>
	<th>주문일시</th>	
	<th>결제방법</th>
	<th>주문금액</th>
	<th>송장번호</th>
	<th>주문상태</th>
	<th>상세보기</th>

</tr>
<tr><td height=1 bgcolor="#D6D6D6" colspan=10></td></tr>
<c:forEach var="i" items="${datas}">
<tr>
	<td height=30 align=center>${i.order_idx}</td>
	<td align=center>${i.order_hiredate}</td>
	<td align=center><img src="/shoesholic/admin/css/img_admin/order_type_idx/${i.order_type_idx}.png"></td>
	<td align=center>${i.order_price}</td>
	<td align=center><a onclick="window.open('http://nplus.doortodoor.co.kr/web/info.jsp?slipno=800157081234','popup','scrollbars=no,width=825,height=520,left=800,top=100')">${i.order_delivery_code}</a></td>
	<td align=center><img src="/shoesholic/admin/css/img_admin/order_process_idx/${i.order_process_idx}.png"></td>
	<td align=center><a href="shop_member_order_view.do?order_idx=${i.order_idx}"><img src="css/img/common/btn_detailview.gif"></a></td>
	
</tr>
</c:forEach>
<tr><td colspan=10 height=1 bgcolor="#ECECEC"></td></tr>

</table>



</form>
		<div class="page_no_wrap">${paging}</div>
</div><!-- End indiv -->

</body>
</html>
