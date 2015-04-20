<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin member_update(:i_member_idx , :i_member_pass , :i_member_addr1 , :i_member_addr2 , :i_member_zipcode , :i_member_mobile , :i_member_phone); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$member_idx=$_SESSION["member_idx"];
	$member_pass=$_REQUEST["member_pass"];
	$member_addr1=$_REQUEST["member_addr1"];
	$member_addr2=$_REQUEST["member_addr2"];
	$member_zipcode=$_REQUEST["member_zipcode"];
	$member_mobile=$_REQUEST["member_mobile"];
	$member_phone=$_REQUEST["member_phone"];
	

	
	oci_bind_by_name($stmt, ':i_member_idx', $member_idx);
	oci_bind_by_name($stmt, ':i_member_pass', $member_pass);
	oci_bind_by_name($stmt, ':i_member_addr1', $member_addr1);
	oci_bind_by_name($stmt, ':i_member_addr2', $member_addr2);
	oci_bind_by_name($stmt, ':i_member_zipcode', $member_zipcode);
	oci_bind_by_name($stmt, ':i_member_mobile', $member_mobile);
	oci_bind_by_name($stmt, ':i_member_phone', $member_phone);
	

	oci_execute($stmt);
	oci_execute($out);

	header("Location:member_edit.php");
?>

