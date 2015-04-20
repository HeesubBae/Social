<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin business_area_update(:i_business_area_id , :i_area_id, :i_business_area_name); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$business_area_id=$_REQUEST["business_area_id"];
	$area_id=$_REQUEST["area"];
	$business_area_name=$_REQUEST["business_area_name"];

	oci_bind_by_name($stmt, ':i_business_area_id', $business_area_id);
	oci_bind_by_name($stmt, ':i_area_id', $area_id);
	oci_bind_by_name($stmt, ':i_business_area_name', $business_area_name);

	oci_execute($stmt);
	oci_execute($out);

	header("Location:index.php?p=display/business_area_view&business_area_id=".$business_area_id);
?>

