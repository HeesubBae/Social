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
	<li><a href="member_order_list.php"><img src="css/img_shop/mypage_tab01.jpg"/></a><li>
	<li><a href="member_point_list.php"><img src="css/img_shop/mypage_tab02_on.jpg"/></a><li>
	<li><a href="board_my_review.php"><img src="css/img_shop/mypage_tab03.jpg"/></a><li>
	<li><a href="board_mantoman.php"><img src="css/img_shop/mypage_tab04.jpg"/></a><li>
	<li><a href="member_edit.php"><img src="css/img_shop/mypage_tab06.jpg"/></a><li>
</ul>
<div class="indiv">
<!-- 상단이미지 || 현재위치 -->
<TABLE class="old_design_table" width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
	<td><img src="css/img/common/title_point.gif" border=0></td>
</tr>
<TR>
	<td class="path">HOME > 마이페이지 > <B>적립금내역</B></td>
</TR>
</TABLE>


<div class="indiv2"><!-- Start indiv -->

<div style="width:100%; text-align:left"><img src="css/img/common/mypoint_01.gif"></div>
<div style="width:100%; border:1px solid #DEDEDE;">
<table width=100% cellpadding=10 cellspacing=0 border=0>
<tr>
	<td style="border:5px solid #F3F3F3;">
	<div style="width:100%; text-align:center">
	현재 <strong>${bean.member_name}</strong>님의 적립금은 <strong><FONT COLOR="#007FC8">${bean.member_point} point</font></strong>입니다
	</div>
	</td>
</tr>
</table>
</div>


<div style="width:100%; text-align:left; padding-top:20"><img src="css/img/common/mypoint_02.gif"></div>
<table width="100%" border="0" cellspacing="0" cellpadding="5" style="clear:both;border-top-style:solid;border-top-color:#303030;border-top-width:2;border-bottom-style:solid;border-bottom-color:#D6D6D6;border-bottom-width:1;">
<tr height="23" bgcolor="#F0F0F0" class=input_txt>
	<th width=10%>번호</th>
	<th width=20%>발생일시</th>
	<th>정보</th>
	<th>분류</th>
	<th width=15%>금액</th>
	<th>보기</th>
</tr>

<tr><td colspan=5 height=1 bgcolor="#D6D6D6" style="padding:0px;"></td></tr>
<c:forEach var="i" items="${datas}">
<tr height=25 onmouseover=this.style.background="#F7F7F7" onmouseout=this.style.background="" style="border-bottom-style:solid;border-bottom-color:#E6E6E6;border-bottom-width:1;">
	<td align="center">${i.member_point_log_idx}</td>
	<td align="center">${i.member_point_log_hiredate}</td>
	<td align="center">${i.member_point_log_memo }</td>
	<td align="center"><img src="/shoesholic/admin/css/img_admin/member_point_log_type_idx/${i.member_point_log_type_idx}.jpg"></td>
	<td align="center">${i.member_point_log_point}</td>
	<td align=center><a href="shop_member_order_view.do?order_idx=${i.order_idx}"><img src="css/img/common/btn_detailview.gif"></a></td>
</tr>
<tr><td colspan=5 height=1 bgcolor="#EEEEEE" style="padding:0px;"></td></tr>
</c:forEach>
</table>

<div class="page_no_wrap">${paging}</div>

</div><!-- End indiv2 -->


</body>
</html>
