<?php
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
	include 'common/search_pop.php';

	$option_id = $_GET['option_id'];
	$product_type_id =$_GET['product_type_id'];
echo $option_id;
echo "<br>";
echo $product_type_id;
	$sql = 'begin PRODUCTS.PRODUCT_OPTION_DELETE(:I_OPTION_ID , :I_PRODUCT_TYPE); end;';

		$stmt = oci_parse($conn, $sql);
		if (!$stmt)
		{
			$e = oci_error();
			trigger_error($e['message'], E_USER_ERROR);
		}

		oci_bind_by_name($stmt, ':I_OPTION_ID', $option_id);
		oci_bind_by_name($stmt, ':I_PRODUCT_TYPE', $product_type_id);
		
		oci_execute($stmt);
		
	



?>

<script language="javascript">
opener.location.reload();
window.close();
</script>

