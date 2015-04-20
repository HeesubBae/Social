<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin member_insert(:member_id , :member_pass , :member_name , :member_email , :member_addr1 , :member_addr2 , :member_zipcode , :member_mobile , :member_phone , :member_birthday , :member_hiredate , :member_point ,:member_sex); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$member_id=$_REQUEST["member_id"];
	$member_pass=$_REQUEST["member_pass"];
	$member_name=$_REQUEST["member_name"];
	$member_email=$_REQUEST["member_email"];
	$member_addr1=$_REQUEST["member_addr1"];
	$member_addr2=$_REQUEST["member_addr2"];
	$member_zipcode=$_REQUEST["member_zipcode"];
	$member_mobile=$_REQUEST["member_mobile"];
	$member_phone=$_REQUEST["member_phone"];
	$member_birthday=$_REQUEST["member_birthday"];
	$member_sex=$_REQUEST["member_sex"];
	
	
	oci_bind_by_name($stmt, ':member_id', $member_id);
	oci_bind_by_name($stmt, ':member_pass', $member_pass);
	oci_bind_by_name($stmt, ':member_name', $member_name);
	oci_bind_by_name($stmt, ':member_email', $member_email);
	oci_bind_by_name($stmt, ':member_addr1', $member_addr1);
	oci_bind_by_name($stmt, ':member_addr2', $member_addr2);
	oci_bind_by_name($stmt, ':member_zipcode', $member_zipcode);
	oci_bind_by_name($stmt, ':member_mobile', $member_mobile);
	oci_bind_by_name($stmt, ':member_phone', $member_phone);
	oci_bind_by_name($stmt, ':member_birthday', $member_birthday);
	oci_bind_by_name($stmt, ':member_hiredate', $member_hiredate);
	oci_bind_by_name($stmt, ':member_point', $member_point);
	oci_bind_by_name($stmt, ':member_sex', $member_sex);

	oci_execute($stmt);
	oci_execute($out);
	header("Location:index.php?p=member/member_list");
?>

