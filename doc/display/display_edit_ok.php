<?php 
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
?>
<?php

	$sql = 'begin display_update(:i_display_id, :i_main_category_id , :i_area_id , :i_business_area_id , :i_category_code01_id , :i_category_code02_id , :i_display_process_id , :i_ba_code_id ); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}

	$display_id=$_REQUEST["display_id"];
	$main_category_id=$_REQUEST["main_category_id"];
	$area_id=$_REQUEST["area_id"];
	$business_area_id=$_REQUEST["business_area_id"];
	$category_code01_id=$_REQUEST["category_code01_id"];
	$category_code02_id=$_REQUEST["category_code02_id"];
	$display_process=$_REQUEST["display_process"];
	$ba_code_id=$_REQUEST["ba_code_id"];
	/*
	echo $display_id."<br>";23
	echo $main_category_id."<br>";2
	echo $area_id."<br>";7
	echo $business_area_id."<br>";5
	echo $category_code01_id."<br>";5
	echo $category_code02_id."<br>";2
	echo $display_process."<br>";1
	echo $ba_code_id."<br>";1
*/
		


	oci_bind_by_name($stmt, ':i_display_id', $display_id);
	oci_bind_by_name($stmt, ':i_main_category_id', $main_category_id);
	oci_bind_by_name($stmt, ':i_area_id', $area_id);
	oci_bind_by_name($stmt, ':i_business_area_id', $business_area_id);
	oci_bind_by_name($stmt, ':i_category_code01_id', $category_code01_id);
	oci_bind_by_name($stmt, ':i_category_code02_id', $category_code02_id);
	oci_bind_by_name($stmt, ':i_display_process_id', $display_process);
	oci_bind_by_name($stmt, ':i_ba_code_id', $ba_code_id);
	

	oci_execute($stmt);
	oci_execute($out);
	
	header("Location:index.php?p=display/display_view&display_id=".$display_id);
	
?>

