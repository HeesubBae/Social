<?php 
	include 'common/dbcon.php';
	
	$product_id=$_REQUEST["product_id"];
	$product_type_id=$_POST["product_type_id"];

echo $product_id;
echo "type=".$product_type_id;
?>
<?php

	if($product_type_id==1){
		$nomal_name = $_POST['nomal_name'];
		(int)$nomal_price =$_POST['nomal_price'];
		(int)$nomal_sell_price =$_POST['nomal_sell_price'];
		(int)$nomal_discount = $_POST['nomal_discount'];
		(int)$nomal_count =$_POST['nomal_count'];
		$size=count($_POST['nomal_name']);

		print_r($nomal_name);
		print_r($nomal_price);
		print_r($nomal_sell_price);
		print_r($nomal_discount);
		print_r($nomal_count);
		echo $size;



	$sql = 'begin PRODUCTS.PRODUCT_OPTION_INSERT_NORMAL(:I_PRODUCT_IDX, :I_OPTION_NAME ,:I_OPTION_PRICE , :I_OPTION_SELL_PRICE , :I_OPTION_DISCOUNT ,:I_OPTION_COUNT ); end;';
	$stmt = oci_parse($conn, $sql);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}

	oci_bind_by_name($stmt, ':I_PRODUCT_IDX', $product_id);
	oci_bind_array_by_name($stmt, ':I_OPTION_NAME', $nomal_name, 100, -1, SQLT_CHR);
	oci_bind_array_by_name($stmt, ':I_OPTION_PRICE', $nomal_price,100,-1, SQLT_INT  );
	oci_bind_array_by_name($stmt, ':I_OPTION_SELL_PRICE', $nomal_sell_price,100,-1, SQLT_INT  );
	oci_bind_array_by_name($stmt, ':I_OPTION_DISCOUNT', $nomal_discount,100,-1,  SQLT_INT  );
	oci_bind_array_by_name($stmt, ':I_OPTION_COUNT', $nomal_count,100,-1, SQLT_INT  );

	oci_execute($stmt);
	}
	
	else if($product_type_id==2){
		$coupon_name = $_POST['coupon_name'];
		$coupon_expiry_day =$_POST['coupon_expiry_day'];
		(int)$coupon_sell_price =$_POST['coupon_sell_price'];
		(int)$coupon_count =$_POST['coupon_count'];
		

		print_r($coupon_name);
		echo "<br>";
		print_r($coupon_expiry_day);
		echo "<br>";
		print_r($coupon_sell_price);
		echo "<br>";
		print_r($coupon_count);
		echo "<br>";


		$sql = 'begin PRODUCTS.PRODUCT_OPTION_INSERT_COUPON(:I_PRODUCT_IDX , :I_OPTION_NAME , :I_OPTION_EXPIRY_DATE , :I_OPTION_SELL_PRICE , :I_OPTION_COUNT ); end;';

		$stmt = oci_parse($conn, $sql);
		if (!$stmt)
		{
			$e = oci_error();
			trigger_error($e['message'], E_USER_ERROR);
		}


		oci_bind_by_name($stmt, ':I_PRODUCT_IDX', $product_id);
		oci_bind_array_by_name($stmt, ':I_OPTION_NAME', $coupon_name, 100, -1, SQLT_CHR);
		oci_bind_array_by_name($stmt, ':I_OPTION_EXPIRY_DATE', $coupon_expiry_day,100,-1, SQLT_CHR  );
		oci_bind_array_by_name($stmt, ':I_OPTION_SELL_PRICE', $coupon_sell_price,100,-1, SQLT_INT  );
		oci_bind_array_by_name($stmt, ':I_OPTION_COUNT', $coupon_count,100,-1, SQLT_INT  );

		oci_execute($stmt);
		
	}

	else if($product_type_id==3){
		$ticket_name = $_POST['ticket_name'];
		$ticket_ava_day =$_POST['ticket_ava_day'];
		$ticket_ava_time =$_POST['ticket_ava_time'];
		$ticket_ava_seat =$_POST['ticket_ava_seat'];
		(int)$ticket_sell_price =$_POST['ticket_sell_price'];
		(int)$ticket_count =$_POST['ticket_count'];
		

		print_r($ticket_name);
		echo "<br>";
		print_r($ticket_ava_day);
		echo "<br>";
		print_r($ticket_ava_time);
		echo "<br>";
		print_r($ticket_ava_seat);
		echo "<br>";
		print_r($ticket_sell_price);
		echo "<br>";
		print_r($ticket_count);


		$sql = 'begin PRODUCTS.PRODUCT_OPTION_INSERT_TICKET(:I_PRODUCT_IDX , :I_OPTION_NAME ,:I_OPTION_AVA_DAY , :I_OPTION_AVA_TIME , :I_OPTION_AVA_SEAT ,:I_OPTION_SELL_PRICE ,:I_OPTION_COUNT); end;';

		$stmt = oci_parse($conn, $sql);
		if (!$stmt)
		{
			$e = oci_error();
			trigger_error($e['message'], E_USER_ERROR);
		}

		oci_bind_by_name($stmt, ':I_PRODUCT_IDX', $product_id);
		oci_bind_array_by_name($stmt, ':I_OPTION_NAME', $ticket_name, 100, -1, SQLT_CHR);
		oci_bind_array_by_name($stmt, ':I_OPTION_AVA_DAY', $ticket_ava_day,100,-1, SQLT_CHR  );
		oci_bind_array_by_name($stmt, ':I_OPTION_AVA_TIME', $ticket_ava_time,100,-1, SQLT_CHR  );
		oci_bind_array_by_name($stmt, ':I_OPTION_AVA_SEAT', $ticket_ava_seat,100,-1, SQLT_CHR  );
		oci_bind_array_by_name($stmt, ':I_OPTION_SELL_PRICE', $ticket_sell_price,100,-1, SQLT_INT  );
		oci_bind_array_by_name($stmt, ':I_OPTION_COUNT', $ticket_count,100,-1, SQLT_INT  );

		oci_execute($stmt);
		
	}



?>

<script language="javascript">
opener.location.reload();
window.close();
</script>