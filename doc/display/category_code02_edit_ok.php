<?php 
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
?>
<?php

	$sql = 'begin category_code02_update(:i_category_code02_id , :i_category_code01_id , :i_category_code02_name); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$category_code02_id=$_REQUEST["category_code02_id"];
	$category_code01_id=$_REQUEST["category_code01_id"];
	$category_code02_name=$_REQUEST["category_code02_name"];



	oci_bind_by_name($stmt, ':i_category_code02_id', $category_code02_id);
	oci_bind_by_name($stmt, ':i_category_code01_id', $category_code01_id);
	oci_bind_by_name($stmt, ':i_category_code02_name', $category_code02_name);
	

	oci_execute($stmt);
	oci_execute($out);
	
	header("Location:index.php?p=display/category_code02_view&category_code02_id=".$category_code02_id);
?>

