<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin main_category_update(:i_main_category_id , :i_main_category_name); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$main_category_id=$_REQUEST["main_category_id"];
	$main_category_name=$_REQUEST["main_category_name"];
	
	oci_bind_by_name($stmt, ':i_main_category_id', $main_category_id);
	oci_bind_by_name($stmt, ':i_main_category_name', $main_category_name);

	oci_execute($stmt);
	oci_execute($out);

	header("Location:index.php?p=display/main_category_view&main_category_id=".$main_category_id);
?>

