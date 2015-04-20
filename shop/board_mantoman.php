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

<?php
	$session_member_idx=$_SESSION['member_idx'];
	echo $session_member_idx;
	$sql = 'begin board_select_list(:i_txt, :i_nowpage, :i_pagesize, :v_out, :i_search_type ,:i_board_type_id ,:i_session_member_idx); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}

	
	$board_type=2;
	

	oci_bind_by_name($stmt, ':i_txt', $board_search_txt);
	oci_bind_by_name($stmt, ':i_nowpage', $nowpage);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':i_pagesize', $pagesize);//paging 에서 받아줌
	oci_bind_by_name($stmt, ':v_out', $out, -1, OCI_B_CURSOR);
	oci_bind_by_name($stmt, ':i_search_type', $board_search_type);
	oci_bind_by_name($stmt, ':i_board_type_id', $board_type);
	oci_bind_by_name($stmt, ':i_session_member_idx', $session_member_idx);

	

	oci_execute($stmt);
	oci_execute($out);
?>
<div class="middle_bar"><img src="css/img_shop/middle_bar_01.jpg"></div>
<ul class="in_category_bar">
	<li><a href="member_order_list.php"><img src="css/img_shop/mypage_tab01.jpg"/></a><li>
	<li><a href="member_point_list.php"><img src="css/img_shop/mypage_tab02.jpg"/></a><li>
	<li><a href="board_my_review.php"><img src="css/img_shop/mypage_tab03.jpg"/></a><li>
	<li><a href="board_mantoman.php"><img src="css/img_shop/mypage_tab04_on.jpg"/></a><li>
	<li><a href="member_edit.php"><img src="css/img_shop/mypage_tab06.jpg"/></a><li>
</ul>
<div class="indiv">
<!-- 상단이미지 || 현재위치 -->
<TABLE class="old_design_table" width=100% cellpadding=0 cellspacing=0 border=0>
<tr>
	<td><img src="css/img/common/title_mantoman.gif" border=0></td>
</tr>
<TR>
	<td class="path">HOME > 마이페이지 > <B>1:1상품문의</B></td>
</TR>
</TABLE>


<table width=100%  cellpadding=0 cellspacing=0><tr><td>

<form name="form" method="post" action="" >

<table width=100% border=0 cellpadding=0 cellspacing=0>
<tr>
	<td>

	<table width=100% cellpadding=0 cellspacing=0>
	<tr>
		<td colspan=10 align=right class=eng height=20>
		</td>
	</tr>
	<tr>
		<td align=center height=30 background="css/img/boardimg/board_bg.gif"><img src="css/img/boardimg/board_field_01.gif"></td>
		<td align=center background="css/img/boardimg/board_bg.gif"><img src="css/img/boardimg/board_field_02.gif"></td>
		<td align=center background="css/img/boardimg/board_bg.gif"></td>
		<td align=center background="css/img/boardimg/board_bg.gif"><img src="css/img/boardimg/board_field_03.gif"></td>
		
		<td align=center background="css/img/boardimg/board_bg.gif"><img src="css/img/boardimg/board_field_04.gif"></td>
		<td align=center background="css/img/boardimg/board_bg.gif"><img src="css/img/boardimg/board_field_05.gif"></td>
		<td align=center background="css/img/boardimg/board_bg.gif"><img src="css/img/boardimg/board_field_06.gif"></td>
	</tr>
<?php
	while($data=oci_fetch_array($out)){
	$TOTCNT=$data["TOT_CNT"];
?>
		<tr height=27 onmouseover=this.style.backgroundColor="#FAFAFA" onmouseout=this.style.backgroundColor="">

		<td width=20 nowrap align=center>&nbsp;</td>
		<td width=50 nowrap align=center class=eng>
			<?=$data["BOARD_ID"]?>
		</td>
			<td width=50>&nbsp;</td>
		<td width=100% style="padding-left:10px"><?=$data["BOARD_TITLE"]?>&nbsp;</td>
		<td width=100 nowrap align=center><?=$data["MEMBER_ID"]?></td>

		<td width=100 nowrap align=center class=eng><?=$data["BOARD_DATE"]?></td>

		</tr>
	
<?php
	}
	oci_free_statement($stmt);
	oci_free_statement($out);
	oci_close($conn);
?>
	<tr><td colspan=10 height=1 bgcolor=#E0DFDF></td></tr>
	
	</table>

	</td>
</tr>
<tr>
	<td height=40 bgcolor="#F7F7F7">

	<table width="300px">
	
	<tr>
		<td class=eng>
		</td>
		<td align=right>
		<table align="right" stlye="width:300px;" cellpadding=0 cellspacing=0>
		<tr>
			<td align="right">
				<div style="width:300px">
				<select name="search_type">
                	<option value="1">글제목</option>
                    <option value="2">작성자</option>
                </select>
                <input name="search[word]" value="" style="background-color:#FFFFFF;border:1px solid #DFDFDF;width:140" required>
                <input type="submit" class="search_btn" value="검색">
                </div>
			</td>
		</tr>
		</table>
		</td>
	</tr>

	</table>

	</td>
</tr>

<!--
<tr>
	<td align=right style="padding-top:30px;">
	<div style="width:300px">
		<img src="css/img/boardimg/board_btn_delete.gif">
		<img src="css/img/boardimg/board_btn_view.gif">
		<img src="css/img/boardimg/board_btn_list.gif">
		<img src="css/img/boardimg/board_btn_write.gif">
	</div>
	</td>
</tr>
-->
</table><p>

</form>

</td></tr></table>

		
<!-- Hidden Form -->
	<form name="request_form" method="post" action="">
		<input type="hidden" id="nowpage" name="nowpage" value="<?php echo $nowpage; ?>">
	</form> 
<!-- Hidden Form -->


<div class="page_no_wrap">
 <?php getPage($TOTCNT,$pagesize,10,$nowpage); ?>
</div>


</div>
</body>
</html>

