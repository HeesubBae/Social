<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
금오 소셜커머스::매일 매일 핫 딜!~
</title>
<link href="css/layout_shop.css" type="text/css" rel="stylesheet"/>
<script src="js/shop_member_edit.js" type="text/javascript"></script>
</head>
<body>

<?php include 'common/shop_top.php'?>


<?php
$sql = 'begin member_select(:idx , :v_out); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$member_idx=$_SESSION['member_idx'];
	oci_bind_by_name($stmt, ':idx', $member_idx);
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);

	oci_execute($stmt);
	oci_execute($out);

	$data=oci_fetch_array($out);
?>
<div class="middle_bar"><img src="css/img_shop/middle_bar_01.jpg"></div>
<ul class="in_category_bar">
	<li><a href="member_order_list.php"><img src="css/img_shop/mypage_tab01.jpg"/></a><li>
	<li><a href="member_point_list.php"><img src="css/img_shop/mypage_tab02.jpg"/></a><li>
	<li><a href="board_my_review.php"><img src="css/img_shop/mypage_tab03.jpg"/></a><li>
	<li><a href="board_mantoman.php"><img src="css/img_shop/mypage_tab04.jpg"/></a><li>
	<li><a href="member_edit.php"><img src="css/img_shop/mypage_tab06_on.jpg"/></a><li>
</ul>
<div class="indiv">
<!-- 상단이미지 || 현재위치 -->
<TABLE class="old_design_table" width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
<td><img src="css/img/common/title_modifyinfo.gif" border=0></td>
</tr>
<TR>
<td class="path">HOME > MYPAGE ><B>회원정보수정</B></td>
</TR>
</TABLE>  




        <style>
.memberCols1 {
width:100px;
height:26px;   
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
<div class="indiv2">
<form id=form name=frmMember method=post action="member_edit_ok.php" onsubmit="return chkForm(this)">

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
	<?php echo $data["MEMBER_ID"]; ?>
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
	<?php echo $data["MEMBER_NAME"]; ?>
	<span class="falsespan" id="falsename"></span>
	</td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font>성별</td>
	<td class=memberCols2><span class=noline>
	
	 <?php echo $data["MEMBER_SEX"]; ?>
	
	</span></td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font>생년월일</td>
	<td class=memberCols2>
	<?php echo $data["MEMBER_BIRTHDAY"]; ?>
	</td>
</tr>
  
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font>이메일</td>
	<td class=memberCols2>
	<?php echo $data["MEMBER_EMAIL"]; ?>
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
		<input type=text name="member_zipcode" id="member_zipcode" size=7 maxlength="7" value="<?php echo $data["MEMBER_ZIPCODE"]; ?>" class=line  label="우편번호" readonly onclick="window.open('/shoesholic/pop_zipcode.do?reback=1','popup','scrollbars=no,width=500,height=676,left=800,top=100')">
		<img src="css/img/common/btn_zipcode.gif" border=0 align="absmiddle" onclick="window.open('/shoesholic/pop_zipcode.do?reback=1','popup','scrollbars=no,width=500,height=676,left=800,top=100')">	
		<span class="falsespan" id="falsezipcode"></span>
		-->
		<input type=text name="member_zipcode" id="member_zipcode" size=7 maxlength="7" value="<?php echo $data["MEMBER_ZIPCODE"]; ?>" class=line  label="우편번호" />
		<img src="css/img/common/btn_zipcode.gif" border=0 align="absmiddle" onclick="window.open('/shoesholic/pop_zipcode.do?reback=1','popup','scrollbars=no,width=500,height=676,left=800,top=100')">	
		<span class="falsespan" id="falsezipcode"></span>

		</td>
	</tr>
	<tr>
		<td>
		<input type=text name="member_addr1" id="member_addr1" value="<?php echo $data["MEMBER_ADDR1"]; ?>"  size=100 maxlength="100" label="주소"><span class="falsespan" id="falseaddr1"></span><br>
		<input type=text name="member_addr2" id="member_addr2" value="<?php echo $data["MEMBER_ADDR2"]; ?>" size=100 maxlength="100" label="세부주소"><span class="falsespan" id="falseaddr2"></span>
		</td>
	</tr>
	</table>

	</td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font> <!--{ / }-->핸드폰</td>
	<td class=memberCols2>
	<input type=text name="member_mobile" id="member_mobile" value="<?php echo $data["MEMBER_MOBILE"]; ?>" size=20 maxlength=20 {_required.mobile} option=regNum label="핸드폰"> 
	<span class="falsespan" id="falsemobile"></span>
	</td>
</tr>
<tr><td colspan=2 height=1 bgcolor="#DEDEDE" style="padding:0px;"></td></tr>
<tr>
	<td class=memberCols1><font color=FF6000>*</font> <!--{ / }-->집전화</td>
	<td class=memberCols2>
	<input type=text name="member_phone" id="member_phone" value="<?php echo $data["MEMBER_PHONE"]; ?>" size=20 maxlength=20 {_required.mobile} option=regNum label="집전화">
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
<img src="css/img/common/btn_modify3.gif" onclick="return validate();">
 <img src="css/img/common/btn_back.gif" border=0 onClick="history.back()" style="cursor:pointer;"></div>
</td>
</tr>
</table>
</form>


 

   
</div>


</body>
</html>
