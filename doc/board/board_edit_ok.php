<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin board_update(:i_board_id , :i_board_type_id ,:i_board_title , :i_board_text , :i_member_session); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$board_id=$_REQUEST["board_id"];
	$board_type_id=$_REQUEST["board_type"];
	$board_title=$_REQUEST["board_title"];
	$board_text=$_REQUEST["board_text"];
	$member_idx=$_SESSION["member_idx"];
	echo $board_type_id;
	echo $board_title;
	echo $board_text;
	echo $member_idx;
	oci_bind_by_name($stmt, ':i_board_id', $board_id);
	oci_bind_by_name($stmt, ':i_board_type_id', $board_type_id);
	oci_bind_by_name($stmt, ':i_board_title', $board_title);
	oci_bind_by_name($stmt, ':i_board_text', $board_text);
	oci_bind_by_name($stmt, ':i_member_session', $member_idx);
	

	oci_execute($stmt);
	oci_execute($out);

	header("Location:index.php?p=board/board_view&board_id=".$board_id);
?>

