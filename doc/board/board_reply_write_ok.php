<?php 
	include 'common/dbcon.php';
	
	$board_id=$_REQUEST["board_id"];
	$reply_text=$_REQUEST["reply_text"];
	//상품이 테이블 완성되면 수정
	$member_idx=$_SESSION["member_idx"];
	

	echo $board_id;
	echo $reply_text;
	echo $member_idx;
?>
<?php

	$sql = 'begin board_reply_insert(:i_reply_text, :i_board_id , :i_member_session); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	
	
	oci_bind_by_name($stmt, ':i_reply_text', $reply_text);
	oci_bind_by_name($stmt, ':i_board_id', $board_id);
	oci_bind_by_name($stmt, ':i_member_session', $member_idx);

	oci_execute($stmt);
	oci_execute($out);
	header("Location:index.php?p=board/board_view&board_id=".$board_id);
	
?>

