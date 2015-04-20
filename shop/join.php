<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
금오 소셜커머스::매일 매일 핫 딜!~
</title>
<link href="css/layout_shop.css" type="text/css" rel="stylesheet"/>
<script src="js/join_ck.js" type="text/javascript"></script>
</head>
<body>


<?php include 'common/shop_top.php' ?>
<div class="middle_bar"><img src="css/img_shop/middle_bar_04.jpg"></div>
<div class="indiv"><!-- Start indiv -->
<TABLE class="old_design_table" width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
	<td><img src="css/img/common/title_join.gif" border=0></td>
</tr>
<TR>
	<td class="path">HOME > 회원가입 > <B>가입폼작성</B></td>
</TR>
</TABLE>


     
<style>
.memberCols1 {
width:100px;
text-align:right;
padding-right:10px;
font:bold 8pt 돋움;
color:#5D5D5D;
letter-spacing:-1;
}
.memberCols2 {
text-align:left;
padding-left:10px;
}
.scroll	{
scrollbar-face-color: #FFFFFF;
scrollbar-shadow-color: #AFAFAF;
scrollbar-highlight-color: #AFAFAF;
scrollbar-3dlight-color: #FFFFFF;
scrollbar-darkshadow-color: #FFFFFF;
scrollbar-track-color: #F7F7F7;
scrollbar-arrow-color: #838383;
}
#boxScroll{width:96%; height:130px; overflow: auto; BACKGROUND: #ffffff; COLOR: #585858; font:9pt 돋움;border:1px #dddddd solid; overflow-x:hidden;text-align:left; }
</style>

<form id=form name=frmMember method=post action="/shop/join_ok.php" onsubmit="return chkForm(this)">

<div><img src="css/img/common/join_txt_04.gif" border=0 align=absmiddle><font color=FF6000 >* </font><font class=small><b>필수입력사항</b></font></div>
<div style="border:1px solid #DEDEDE;" class="hundred">
<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
<td style="border:5px solid #F3F3F3;">

<table width=100% cellpadding=0 cellspacing=0>
<tr>
<td style="padding:10px 0" align=center>

<table width=97% cellpadding=5 cellspacing=0 border=0>
<tr>
	<td class=memberCols1><font color=FF6000>*</font> 아이디</td>
	<td class=memberCols2>
	<!--
	<input type=text name="member_id" id="member_id" size="20" maxlength="20" required option=regId label="아이디" readonly  onclick="window.open('/shoesholic/pop/idck.jsp','popup','scrollbars=no,width=430,height=270,left=800,top=100')" >
	<img src="css/img/common/btn_idcheck.gif" border=0 align=absmiddle onclick="window.open('/shoesholic/pop/idck.jsp','popup','scrollbars=no,width=430,height=270,left=800,top=100')">
	<span class="falsespan" id="falseid"></span>
	-->
	<input type=text name="member_id" id="member_id" size="20" maxlength="20" required option=regId label="아이디" />
	<img src="css/img/common/btn_idcheck.gif" border=0 align=absmiddle onclick="window.open('/shoesholic/pop/idck.jsp','popup','scrollbars=no,width=430,height=270,left=800,top=100')">
	<span class="falsespan" id="falseid"></span>
	</td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font> 비밀번호</td>
	<td class=memberCols2>
	<input type=password name="member_pass" id="member_pass" size="20" maxlength="20" required option=regPass label="비밀번호">
	<span class="falsespan" id="falsepass"></span><span style="padding:0 10px 0 30px; font:bold 8pt 돋움; color:#5D5D5D; letter-spacing:-1" >
    <font color=FF6000>*</font> 비밀번호확인</span>
	<input type=password name="member_pass1" id="member_pass1" size="20" maxlength="20" required option=regPass label="비밀번호">
	<span class="falsespan" id="falsepass1"></span>
	</td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font> 이름</td>
	<td class=memberCols2>
	<input type=text name="member_name" id="member_name" size="20" maxlength="20" value="" required label="이름">
	<span class="falsespan" id="falsename"></span>
	</td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font>성별</td>
	<td class=memberCols2><span class=noline>
	<input type=radio name="member_sex" value="0" checked> 남자
	<input type=radio name="member_sex" value="1" > 여자
	</span></td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font>생년월일</td>
	<td class=memberCols2>
	<input type=text name="member_birth_day01" id="member_birth_day01" value=""label="생년월일" size=4 maxlength=4>년
	<input type=text name="member_birth_day02" id="member_birth_day02" value=""label="생년월일" size=2 maxlength=2>월
	<input type=text name="member_birth_day03" id="member_birth_day03" value=""label="생년월일" size=2 maxlength=2>일
	<span class="falsespan" id="falsebirthday"></span>
	</td>
</tr>
  
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font>이메일</td>
	<td class=memberCols2>
	<input type=text name="member_email" id="member_email" value="" size=30 maxlength="30" label="이메일">
	<span class="falsespan" id="falseemail"></span>
	</td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font>주소</td>
	<td class=memberCols2>

	<table>
	<tr>
		<td>
		<!--
		<input type=text name="member_zipcode" id="member_zipcode" size=7 maxlength="7" value="${member_zipcode1}" class=line  label="우편번호" readonly onclick="window.open('/shoesholic/pop_zipcode.do?reback=1','popup','scrollbars=no,width=500,height=676,left=800,top=100')">
		<img src="css/img/common/btn_zipcode.gif" border=0 align="absmiddle" onclick="window.open('/shoesholic/pop_zipcode.do?reback=1','popup','scrollbars=no,width=500,height=676,left=800,top=100')">	
		<span class="falsespan" id="falsezipcode"></span>
		-->
		<input type=text name="member_zipcode" id="member_zipcode" size=7 maxlength="7" value="" class=line  label="우편번호" />
		<img src="css/img/common/btn_zipcode.gif" border=0 align="absmiddle" onclick="window.open('/shoesholic/pop_zipcode.do?reback=1','popup','scrollbars=no,width=500,height=676,left=800,top=100')">	
		<span class="falsespan" id="falsezipcode"></span>
		</td>
	</tr>
	<tr>
		<td>
		<input type=text name="member_addr1" id="member_addr1" value=""  size=100 maxlength="100" label="주소"/><span class="falsespan" id="falseaddr1"></span><br>
		<input type=text name="member_addr2" id="member_addr2" value="" size=100 maxlength="100" label="세부주소"/><span class="falsespan" id="falseaddr2"></span>
		</td>
	</tr>
	</table>

	</td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font> <!--{ / }-->핸드폰</td>
	<td class=memberCols2>
	<input type=text name="member_mobile" id="member_mobile" size=20 maxlength=20 {_required.mobile} option=regNum label="핸드폰"/> 
	<span class="falsespan" id="falsemobile"></span>
	</td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font> <!--{ / }-->집전화</td>
	<td class=memberCols2>
	<input type=text name="member_phone" id="member_phone" size=20 maxlength=20 {_required.mobile} option=regNum label="집전화">
	<span class="falsespan" id="falsephone"></span> 
	</td>
</tr>
</table>

</td>
</tr>
</table>

</td>
</tr>
</table>
</div>

<table width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
<td id=avoidDbl align=center height=100>
<div style="width:100%" class=noline>
<img src="css/img/common/btn_join.gif" onclick="return validate();">
 <img src="css/img/common/btn_back.gif" border=0 onClick="history.back()" style="cursor:pointer;"></div>
</td>
</tr>
</table>
</form>


</div><!-- End indiv -->
</div>
</body>
</html>
