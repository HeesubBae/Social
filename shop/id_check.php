<?php include 'common/dbcon.php'?>

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



<TABLE class="old_design_table" width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
	<td><img src="css/img/common/title_join.gif" border=0></td>
</tr>
<TR>
	<td class="path">HOME > 회원가입 > <B>아이디중복확인</B></td>
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

<form id=form name=frmMember method=post action="/shoesholic/shop_member_write.do" onsubmit="return chkForm(this)">

<div><img src="css/img/common/join_txt_04.gif" border=0 align=absmiddle><font color=FF6000 >* </font><font class=small><b>아이디중복확인</b></font></div>
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
	<input type=text name="member_id" id="member_id" size="20" maxlength="20" required option=regId label="아이디" />
	<img src="css/img/common/btn_idcheck.gif" border=0 align=absmiddle />
	<span class="falsespan" id="falseid"></span>
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

</div>
</body>
</html>
