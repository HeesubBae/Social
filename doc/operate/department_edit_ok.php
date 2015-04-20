<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin department_update(:i_department_id , :i_department_name , :i_department_location , :i_department_phone); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$department_id=$_REQUEST["department_id"];
	$department_name=$_REQUEST["department_name"];
	$department_location=$_REQUEST["department_location"];
	$department_phone=$_REQUEST["department_phone"];

	oci_bind_by_name($stmt, ':i_department_id', $department_id);
	oci_bind_by_name($stmt, ':i_department_name', $department_name);
	oci_bind_by_name($stmt, ':i_department_location', $department_location);
	oci_bind_by_name($stmt, ':i_department_phone', $department_phone);

	oci_execute($stmt);
	oci_execute($out);

	header("Location:index.php?p=operate/department_view&department_id=".$department_id);
?>

