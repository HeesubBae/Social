<?php 
	include 'common/dbcon.php';
	
	$board_type=$_REQUEST["board_type"];
	$board_title=$_REQUEST["board_title"];
	$board_text=$_REQUEST["board_text"];
	//상품이 테이블 완성되면 수정
	$member_idx=$_SESSION["member_idx"];
	$product_id=0;

?>
<?php

	$sql = 'begin board_insert(:i_board_title, :i_board_text, :i_board_type_id, :i_member_idx , :i_product_id); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	
	
	oci_bind_by_name($stmt, ':i_board_title', $board_title);
	oci_bind_by_name($stmt, ':i_board_text', $board_text);
	oci_bind_by_name($stmt, ':i_board_type_id', $board_type);
	oci_bind_by_name($stmt, ':i_member_idx', $member_idx);
	oci_bind_by_name($stmt, ':i_product_id', $product_id);

	oci_execute($stmt);
	oci_execute($out);
	header("Location:index.php?p=board/board_list");
	
?>

