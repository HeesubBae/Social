<?php 
	include 'common/dbcon.php';
	$product_id=$_REQUEST["product_id"];
	$product_name=$_REQUEST["product_name"];
	$product_thum_info=$_REQUEST["product_thum_info"];
	$company_id=$_REQUEST["company_id"];
	$product_main_price=$_REQUEST["product_main_price"];
	$product_delivery_price=$_REQUEST["product_delivery_price"];
	$product_thum_photo=$_REQUEST["product_thum_photo"];
	$product_detail_photo=$_REQUEST["product_detail_photo"];
	$product_type_id=$_REQUEST["product_type_id"];
	$product_process=$_REQUEST["product_process"];
	$product_detail_info=$_REQUEST["editor"];

	$product_discount=$_REQUEST["product_discount"];
	$product_origin_price=$_REQUEST["product_origin_price"];
	$product_sell_count=$_REQUEST["product_sell_count"];
	$product_img_text01=$_REQUEST["product_img_text01"];
	$product_img_text02=$_REQUEST["product_img_text02"];


echo "process=".$product_process;



$sql = 'begin PRODUCTS.PRODUCT_UPDATE(:I_PRODUCT_ID , :I_PRODUCT_NAME , :I_PRODUCT_MAIN_PRICE , :I_PRODUCT_DELIVERY_PRICE , :I_PRODUCT_DETAIL_INFO , :I_PRODUCT_THUM_INFO , :I_PRODUCT_THUM_PHOTO , :I_PRODUCT_DETAIL_PHOTO , :I_COMPANY_ID , :I_PRODUCT_TYPE_ID ,:I_PRODUCT_PROCESS_ID, :I_ADMIN_SESSION, :I_PRODUCT_DISCOUNT ,:I_PRODUCT_ORIGIN_PRICE ,:I_PRODUCT_SELL_COUNT ,:I_PRODUCT_IMG_TEXT01 ,:I_PRODUCT_IMG_TEXT02); end;';
	$stmt = oci_parse($conn, $sql);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}

	oci_bind_by_name($stmt, ':I_PRODUCT_ID', $product_id);
	oci_bind_by_name($stmt, ':I_PRODUCT_NAME', $product_name);
	oci_bind_by_name($stmt, ':I_PRODUCT_MAIN_PRICE', $product_main_price);
	oci_bind_by_name($stmt, ':I_PRODUCT_DELIVERY_PRICE', $product_delivery_price);
	oci_bind_by_name($stmt, ':I_PRODUCT_DETAIL_INFO', $product_detail_info);
	oci_bind_by_name($stmt, ':I_PRODUCT_THUM_INFO', $product_thum_info);
	oci_bind_by_name($stmt, ':I_PRODUCT_THUM_PHOTO', $product_thum_photo);
	oci_bind_by_name($stmt, ':I_PRODUCT_DETAIL_PHOTO', $product_detail_photo);
	oci_bind_by_name($stmt, ':I_COMPANY_ID', $company_id);
	oci_bind_by_name($stmt, ':I_PRODUCT_TYPE_ID', $product_type_id);
	oci_bind_by_name($stmt, ':I_PRODUCT_PROCESS_ID', $product_process);
	oci_bind_by_name($stmt, ':I_ADMIN_SESSION', $_SESSION["admin_id"]);
	oci_bind_by_name($stmt, ':I_PRODUCT_DISCOUNT', $product_discount);
	oci_bind_by_name($stmt, ':I_PRODUCT_ORIGIN_PRICE', $product_origin_price);
	oci_bind_by_name($stmt, ':I_PRODUCT_SELL_COUNT', $product_sell_count);
	oci_bind_by_name($stmt, ':I_PRODUCT_IMG_TEXT01', $product_img_text01);
	oci_bind_by_name($stmt, ':I_PRODUCT_IMG_TEXT02', $product_img_text02);	

	echo $stmt;
	oci_execute($stmt);

header("Location:index.php?p=product/product_view&product_id=".$product_id);
?>