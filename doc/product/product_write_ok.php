<?php 
	include 'common/dbcon.php';
	
	$product_name=$_REQUEST["product_name"];
	$product_thum_info=$_REQUEST["product_thum_info"];
	$company_id=$_REQUEST["company_id"];
	$product_main_price=$_REQUEST["product_main_price"];
	$product_delivery_price=$_REQUEST["product_delivery_price"];
	$product_thum_photo=$_REQUEST["product_thum_photo"];
	$product_detail_photo=$_REQUEST["product_detail_photo"];
	$product_type_id=$_REQUEST["product_type_id"];
	$product_detail_info=$_REQUEST["editor"];
	$product_type_id=$product_type_id+1;
	$product_discount=$_REQUEST["product_discount"];
	$product_origin_price=$_REQUEST["product_origin_price"];
	$product_sell_count=$_REQUEST["product_sell_count"];
	$product_img_text01=$_REQUEST["product_img_text01"];
	$product_img_text02=$_REQUEST["product_img_text02"];

?>
<?php

	echo	"product_name=0".$product_name ."<br>";
	echo	"product_thum_info=0".$product_thum_info."<br>";
	echo	"company_id=0".$company_id."<br>";
	echo	"product_main_price=0".$product_main_price."<br>";
	echo	"product_delivery_price=0".$product_delivery_price."<br>";
	echo	"product_thum_photo=0".$product_thum_photo."<br>";
	echo	"product_detail_photo0=".$product_detail_photo."<br>";
	echo	"product_type_id=0".$product_type_id."<br>";
	echo	"product_detail_info=0".$product_detail_info."<br>";

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



	$sql = 'begin PRODUCTS.PRODUCT_INSERT_NORMAL(:I_PRODUCT_NAME , :I_PRODUCT_MAIN_PRICE , :I_PRODUCT_DELIVERY_PRICE , :I_PRODUCT_DETAIL_INFO , :I_PRODUCT_THUM_INFO , :I_PRODUCT_THUM_PHOTO , :I_PRODUCT_DETAIL_PHOTO , :I_COMPANY_ID , :I_PRODUCT_TYPE_ID , :I_ADMIN_SESSION , :I_OPTION_NAME ,:I_OPTION_PRICE , :I_OPTION_SELL_PRICE , :I_OPTION_DISCOUNT ,:I_OPTION_COUNT ,:I_PRODUCT_DISCOUNT ,:I_PRODUCT_ORIGIN_PRICE ,:I_PRODUCT_SELL_COUNT ,:I_PRODUCT_IMG_TEXT01 ,:I_PRODUCT_IMG_TEXT02 ); end;';
	$stmt = oci_parse($conn, $sql); 
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$array = array("one", "two", "three", "four", "five");

	echo "<br>price =";
	var_dump($nomal_price);

	oci_bind_by_name($stmt, ':I_PRODUCT_NAME', $product_name);
	oci_bind_by_name($stmt, ':I_PRODUCT_MAIN_PRICE', $product_main_price);
	oci_bind_by_name($stmt, ':I_PRODUCT_DELIVERY_PRICE', $product_delivery_price);
	oci_bind_by_name($stmt, ':I_PRODUCT_DETAIL_INFO', $product_detail_info);
	oci_bind_by_name($stmt, ':I_PRODUCT_THUM_INFO', $product_thum_info);
	oci_bind_by_name($stmt, ':I_PRODUCT_THUM_PHOTO', $product_thum_photo);
	oci_bind_by_name($stmt, ':I_PRODUCT_DETAIL_PHOTO', $product_detail_photo);
	oci_bind_by_name($stmt, ':I_COMPANY_ID', $company_id);
	oci_bind_by_name($stmt, ':I_PRODUCT_TYPE_ID', $product_type_id);
	oci_bind_by_name($stmt, ':I_ADMIN_SESSION', $_SESSION["admin_id"]);
	oci_bind_array_by_name($stmt, ':I_OPTION_NAME', $nomal_name, 100, -1, SQLT_CHR);
	oci_bind_array_by_name($stmt, ':I_OPTION_PRICE', $nomal_price,100,-1, SQLT_INT  );
	oci_bind_array_by_name($stmt, ':I_OPTION_SELL_PRICE', $nomal_sell_price,100,-1, SQLT_INT  );
	oci_bind_array_by_name($stmt, ':I_OPTION_DISCOUNT', $nomal_discount,100,-1,  SQLT_INT  );
	oci_bind_array_by_name($stmt, ':I_OPTION_COUNT', $nomal_count,100,-1, SQLT_INT  );
	oci_bind_by_name($stmt, ':I_PRODUCT_DISCOUNT', $product_discount);
	oci_bind_by_name($stmt, ':I_PRODUCT_ORIGIN_PRICE', $product_origin_price);
	oci_bind_by_name($stmt, ':I_PRODUCT_SELL_COUNT', $product_sell_count);
	oci_bind_by_name($stmt, ':I_PRODUCT_IMG_TEXT01', $product_img_text01);
	oci_bind_by_name($stmt, ':I_PRODUCT_IMG_TEXT02', $product_img_text02);



	echo $stmt;
	oci_execute($stmt);
	echo "<br>";
		var_dump($array);
			echo "<br>";
	var_dump($nomal_name);
	echo "<br>";
	var_dump($nomal_price);
	echo "<br>";
	var_dump($nomal_sell_price);
	echo "<br>";
	var_dump($nomal_discount);
	echo "<br>";
	var_dump($nomal_count);
	var_dump($stmt);	
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


		$sql = 'begin PRODUCTS.PRODUCT_INSERT_COUPON(:I_PRODUCT_NAME , :I_PRODUCT_MAIN_PRICE , :I_PRODUCT_DELIVERY_PRICE , :I_PRODUCT_DETAIL_INFO , :I_PRODUCT_THUM_INFO , :I_PRODUCT_THUM_PHOTO , :I_PRODUCT_DETAIL_PHOTO , :I_COMPANY_ID , :I_PRODUCT_TYPE_ID , :I_ADMIN_SESSION , :I_OPTION_NAME , :I_OPTION_EXPIRY_DATE , :I_OPTION_SELL_PRICE , :I_OPTION_COUNT ,:I_PRODUCT_DISCOUNT ,:I_PRODUCT_ORIGIN_PRICE ,:I_PRODUCT_SELL_COUNT ,:I_PRODUCT_IMG_TEXT01 ,:I_PRODUCT_IMG_TEXT02); end;';

		$stmt = oci_parse($conn, $sql);
		if (!$stmt)
		{
			$e = oci_error();
			trigger_error($e['message'], E_USER_ERROR);
		}


		oci_bind_by_name($stmt, ':I_PRODUCT_NAME', $product_name);
		oci_bind_by_name($stmt, ':I_PRODUCT_MAIN_PRICE', $product_main_price);
		oci_bind_by_name($stmt, ':I_PRODUCT_DELIVERY_PRICE', $product_delivery_price);
		oci_bind_by_name($stmt, ':I_PRODUCT_DETAIL_INFO', $product_detail_info);
		oci_bind_by_name($stmt, ':I_PRODUCT_THUM_INFO', $product_thum_info);
		oci_bind_by_name($stmt, ':I_PRODUCT_THUM_PHOTO', $product_thum_photo);
		oci_bind_by_name($stmt, ':I_PRODUCT_DETAIL_PHOTO', $product_detail_photo);
		oci_bind_by_name($stmt, ':I_COMPANY_ID', $company_id);
		oci_bind_by_name($stmt, ':I_PRODUCT_TYPE_ID', $product_type_id);
		oci_bind_by_name($stmt, ':I_ADMIN_SESSION', $_SESSION["admin_id"]);
		oci_bind_array_by_name($stmt, ':I_OPTION_NAME', $coupon_name, 100, -1, SQLT_CHR);
		oci_bind_array_by_name($stmt, ':I_OPTION_EXPIRY_DATE', $coupon_expiry_day,100,-1, SQLT_CHR  );
		oci_bind_array_by_name($stmt, ':I_OPTION_SELL_PRICE', $coupon_sell_price,100,-1, SQLT_INT  );
		oci_bind_array_by_name($stmt, ':I_OPTION_COUNT', $coupon_count,100,-1, SQLT_INT  );
		oci_bind_by_name($stmt, ':I_PRODUCT_DISCOUNT', $product_discount);
		oci_bind_by_name($stmt, ':I_PRODUCT_ORIGIN_PRICE', $product_origin_price);
		oci_bind_by_name($stmt, ':I_PRODUCT_SELL_COUNT', $product_sell_count);
		oci_bind_by_name($stmt, ':I_PRODUCT_IMG_TEXT01', $product_img_text01);
		oci_bind_by_name($stmt, ':I_PRODUCT_IMG_TEXT02', $product_img_text02);

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


		$sql = 'begin PRODUCTS.PRODUCT_INSERT_TICKET(:I_PRODUCT_NAME , :I_PRODUCT_MAIN_PRICE , :I_PRODUCT_DELIVERY_PRICE , :I_PRODUCT_DETAIL_INFO , :I_PRODUCT_THUM_INFO , :I_PRODUCT_THUM_PHOTO , :I_PRODUCT_DETAIL_PHOTO , :I_COMPANY_ID , :I_PRODUCT_TYPE_ID , :I_ADMIN_SESSION , :I_OPTION_NAME ,:I_OPTION_AVA_DAY , :I_OPTION_AVA_TIME , :I_OPTION_AVA_SEAT ,:I_OPTION_SELL_PRICE ,:I_OPTION_COUNT ,:I_PRODUCT_DISCOUNT ,:I_PRODUCT_ORIGIN_PRICE ,:I_PRODUCT_SELL_COUNT ,:I_PRODUCT_IMG_TEXT01 ,:I_PRODUCT_IMG_TEXT02); end;';

		$stmt = oci_parse($conn, $sql);
		if (!$stmt)
		{
			$e = oci_error();
			trigger_error($e['message'], E_USER_ERROR);
		}

		oci_bind_by_name($stmt, ':I_PRODUCT_NAME', $product_name);
		oci_bind_by_name($stmt, ':I_PRODUCT_MAIN_PRICE', $product_main_price);
		oci_bind_by_name($stmt, ':I_PRODUCT_DELIVERY_PRICE', $product_delivery_price);
		oci_bind_by_name($stmt, ':I_PRODUCT_DETAIL_INFO', $product_detail_info);
		oci_bind_by_name($stmt, ':I_PRODUCT_THUM_INFO', $product_thum_info);
		oci_bind_by_name($stmt, ':I_PRODUCT_THUM_PHOTO', $product_thum_photo);
		oci_bind_by_name($stmt, ':I_PRODUCT_DETAIL_PHOTO', $product_detail_photo);
		oci_bind_by_name($stmt, ':I_COMPANY_ID', $company_id);
		oci_bind_by_name($stmt, ':I_PRODUCT_TYPE_ID', $product_type_id);
		oci_bind_by_name($stmt, ':I_ADMIN_SESSION', $_SESSION["admin_id"]);
		oci_bind_array_by_name($stmt, ':I_OPTION_NAME', $ticket_name, 100, -1, SQLT_CHR);
		oci_bind_array_by_name($stmt, ':I_OPTION_AVA_DAY', $ticket_ava_day,100,-1, SQLT_CHR  );
		oci_bind_array_by_name($stmt, ':I_OPTION_AVA_TIME', $ticket_ava_time,100,-1, SQLT_CHR  );
		oci_bind_array_by_name($stmt, ':I_OPTION_AVA_SEAT', $ticket_ava_seat,100,-1, SQLT_CHR  );
		oci_bind_array_by_name($stmt, ':I_OPTION_SELL_PRICE', $ticket_sell_price,100,-1, SQLT_INT  );
		oci_bind_array_by_name($stmt, ':I_OPTION_COUNT', $ticket_count,100,-1, SQLT_INT  );
		oci_bind_by_name($stmt, ':I_PRODUCT_DISCOUNT', $product_discount);
		oci_bind_by_name($stmt, ':I_PRODUCT_ORIGIN_PRICE', $product_origin_price);
		oci_bind_by_name($stmt, ':I_PRODUCT_SELL_COUNT', $product_sell_count);
		oci_bind_by_name($stmt, ':I_PRODUCT_IMG_TEXT01', $product_img_text01);
		oci_bind_by_name($stmt, ':I_PRODUCT_IMG_TEXT02', $product_img_text02);

		oci_execute($stmt);
		
	}



/*
	$sql = 'begin company_insert(:i_company_name , :i_company_ceo , :i_company_addr , :i_company_phone , :i_company_url , :i_company_licence , :i_company_type_id , :i_admin_session ); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	
	
	oci_bind_by_name($stmt, ':i_company_name', $company_name);
	oci_bind_by_name($stmt, ':i_company_ceo', $company_ceo);
	oci_bind_by_name($stmt, ':i_company_addr', $company_addr);
	oci_bind_by_name($stmt, ':i_company_phone', $company_phone);
	oci_bind_by_name($stmt, ':i_company_url', $company_url);
	oci_bind_by_name($stmt, ':i_company_licence', $company_licence);
	oci_bind_by_name($stmt, ':i_company_type_id', $company_type_id);
	oci_bind_by_name($stmt, ':i_admin_session', $_SESSION["admin_id"]);

	oci_execute($stmt);
	oci_execute($out);
	
*/	

header("Location:index.php?p=product/product_select_list");
?>

