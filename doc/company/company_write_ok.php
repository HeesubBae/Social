<?php 
	include 'common/dbcon.php';
	
	$company_name=$_REQUEST["company_name"];
	$company_ceo=$_REQUEST["company_ceo"];
	$company_addr=$_REQUEST["company_addr"];
	$company_phone=$_REQUEST["company_phone"];
	$company_url=$_REQUEST["company_url"];
	$company_licence=$_REQUEST["company_licence"];
	$company_type_id=$_REQUEST["company_type_id"];

?>
<?php

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
	header("Location:index.php?p=company/company_list");
	
?>

