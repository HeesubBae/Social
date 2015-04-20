<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include 'common/dbcon.php' ?>

<?php
 session_start();
ini_set('display_errors', 'On');
//**ORDER_PRODUCT

$product_id=$_REQUEST["product_id"];
// ---ORDER_ID
$product_type_id=$_REQUEST["product_type_id"];
$option_idx=$_REQUEST["option_idx"];
$option_price=$_REQUEST["option_price"];
$option_count=$_REQUEST["option_count"];

//**orders
$order_price=$_REQUEST["order_price"];
// ---order_data
$order_process_id=1;
$order_type_id=$_REQUEST["order_type_id"];
$order_point=$_REQUEST["order_point"];
$order_name=$_REQUEST["order_name"];
$order_zipcode=$_REQUEST["order_zipcode"];
$order_addr1=$_REQUEST["order_addr1"];
$order_addr2=$_REQUEST["order_addr2"];
$order_phone=$_REQUEST["order_phone"];
$order_mobile=$_REQUEST["order_mobile"];
$order_comment=$_REQUEST["order_comment"];
$O_ORDER_ID=0;


		$sql = 'begin ORDER_PACKAGE.ORDER_INSERT(:I_PRODUCT_ID , :I_PRODUCT_TYPE_IDX , :I_OPTION_IDX , :I_OPTION_PRICE , :I_OPTION_COUNT , :I_ORDER_PRICE , :I_MEMBER_IDX , :I_ORDER_TYPE_ID , :I_ORDER_POINT , :I_ORDER_NAME , :I_ORDER_ZIPCODE ,:I_ORDER_ADDR1 , :I_ORDER_ADDR2 , :I_ORDER_PHONE ,:I_ORDER_MOBILE ,:I_ORDER_COMMENT ,:I_ADMIN_SESSION ,:O_ORDER_ID ); end;';

		$stmt = oci_parse($conn, $sql);
		if (!$stmt)
		{
			$e = oci_error();
			trigger_error($e['message'], E_USER_ERROR);
		}

		oci_bind_by_name($stmt, ':I_PRODUCT_ID', $product_id);
		oci_bind_by_name($stmt, ':I_PRODUCT_TYPE_IDX', $product_type_id);
		oci_bind_array_by_name($stmt, ':I_OPTION_IDX', $option_idx,100,-1, SQLT_INT  );
		oci_bind_array_by_name($stmt, ':I_OPTION_PRICE', $option_price,100,-1, SQLT_INT  );
		oci_bind_array_by_name($stmt, ':I_OPTION_COUNT', $option_count,100,-1, SQLT_INT  );
		oci_bind_by_name($stmt, ':I_ORDER_PRICE', $order_price);
		oci_bind_by_name($stmt, ':I_MEMBER_IDX', $member_idx);
		oci_bind_by_name($stmt, ':I_ORDER_TYPE_ID', $order_type_id);
		oci_bind_by_name($stmt, ':I_ORDER_POINT', $order_point);
		oci_bind_by_name($stmt, ':I_ORDER_NAME', $order_name);
		oci_bind_by_name($stmt, ':I_ORDER_ZIPCODE', $order_zipcode);
		oci_bind_by_name($stmt, ':I_ORDER_ADDR1', $order_addr1);
		oci_bind_by_name($stmt, ':I_ORDER_ADDR2', $order_addr2);
		oci_bind_by_name($stmt, ':I_ORDER_PHONE', $order_phone);
		oci_bind_by_name($stmt, ':I_ORDER_MOBILE', $order_mobile);
		oci_bind_by_name($stmt, ':I_ORDER_COMMENT', $order_comment);
		oci_bind_by_name($stmt, ':I_ADMIN_SESSION', $_SESSION["member_idx"]);
		oci_bind_by_name($stmt, ':O_ORDER_ID', $O_ORDER_ID , 999);
		oci_execute($stmt);


ECHO $O_ORDER_ID;
header("Location:order_finish.php?order_id=".$O_ORDER_ID);
?>