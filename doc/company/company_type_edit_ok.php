<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin company_type_update(:i_company_type_id , :i_company_type_name ); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$company_type_id=$_REQUEST["company_type_id"];
	$company_type_name=$_REQUEST["company_type_name"];

	oci_bind_by_name($stmt, ':i_company_type_id', $company_type_id);
	oci_bind_by_name($stmt, ':i_company_type_name', $company_type_name);
	

	oci_execute($stmt);
	oci_execute($out);

	header("Location:index.php?p=company/company_type_view&company_type_id=".$company_type_id);
?>

