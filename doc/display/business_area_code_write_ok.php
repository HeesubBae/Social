<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin business_area_code_insert(:i_ba_code_name); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$ba_code_name=$_REQUEST["ba_code_name"];
	
	oci_bind_by_name($stmt, ':i_ba_code_name', $ba_code_name);

	oci_execute($stmt);
	oci_execute($out);
	header("Location:index.php?p=display/business_area_code_list");
?>

