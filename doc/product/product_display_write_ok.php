<?php 
	include 'common/dbcon.php';


?>

<?php
$product_id=$_REQUEST['product_id'];
$main_category_id=$_REQUEST['main_category_id'];
$area_id=$_REQUEST['area_id'];
$business_area_id=$_REQUEST['business_area_id'];
$category_code01_id=$_REQUEST['category_code01_id'];
$category_code02_id=$_REQUEST['category_code02_id'];
$ba_code_id=$_REQUEST['ba_code_id'];

//display process 디폴트 1로 프로시져처리

echo $product_id."<br>";
echo $main_category_id."<br>";
echo $area_id."<br>";
echo $business_area_id."<br>";
echo $category_code01_id."<br>";
echo $category_code02_id."<br>";
echo $ba_code_id."<br>";

	$sql = 'begin display_insert(:i_product_id , :i_main_category_id, :i_area_id, :i_business_area_id , :i_category_code01_id , :i_category_code02_id , :i_ba_code_id); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	
	oci_bind_by_name($stmt, ':i_product_id', $product_id);
	oci_bind_by_name($stmt, ':i_main_category_id', $main_category_id);
	oci_bind_by_name($stmt, ':i_area_id', $area_id);
	oci_bind_by_name($stmt, ':i_business_area_id', $business_area_id);
	oci_bind_by_name($stmt, ':i_category_code01_id', $category_code01_id);
	oci_bind_by_name($stmt, ':i_category_code02_id', $category_code02_id);
	oci_bind_by_name($stmt, ':i_ba_code_id', $ba_code_id);

	oci_execute($stmt);
	oci_execute($out);
	header("Location:index.php?p=display/display_list");

?>