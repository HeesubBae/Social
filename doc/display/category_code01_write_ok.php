<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin category_code01_insert(:i_category_code01_name); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$category_code01_name=$_REQUEST["category_code01_name"];
	
	oci_bind_by_name($stmt, ':i_category_code01_name', $category_code01_name);

	oci_execute($stmt);
	oci_execute($out);
	header("Location:index.php?p=display/category_code01_list");
?>

