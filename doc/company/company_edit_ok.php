<?php 
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
?>
<?php

	$sql = 'begin company_update(:i_company_id , :i_company_name , :i_company_ceo , :i_company_addr , :i_company_phone , :i_company_url , :i_company_licence , :i_company_type_id ,:i_company_process_id , :i_admin_session); end;';
	$stmt = oci_parse($conn, $sql);
	//$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$company_id=$_REQUEST["company_id"];
	$company_name=$_REQUEST["company_name"];
	$company_ceo=$_REQUEST["company_ceo"];
	$company_addr=$_REQUEST["company_aadr"];
	$company_phone=$_REQUEST["company_phone"];
	$company_url=$_REQUEST["company_url"];
	$company_licence=$_REQUEST["company_licence"];
	$company_type_id=$_REQUEST["company_type_id"];
	$company_process=$_REQUEST["company_process"];
	
	
	echo "session=".$admin_id."</br>";
	echo "company_name=".$company_name."</br>";
	echo "company_id=".$company_id."</br>";
	echo "ceo=".$company_ceo."</br>";
	echo "addr=".$company_addr."</br>";
	echo "phone=".$company_phone."</br>";
	echo "url=".$company_url."</br>";
	echo "licence=".$company_licence."</br>";
	echo "typeid=".$company_type_id."</br>";
	echo "process=".$company_process."</br>";


	oci_bind_by_name($stmt, ':i_company_id', $company_id);
	oci_bind_by_name($stmt, ':i_company_name', $company_name);
	oci_bind_by_name($stmt, ':i_company_ceo', $company_ceo);
	oci_bind_by_name($stmt, ':i_company_addr', $company_addr);
	oci_bind_by_name($stmt, ':i_company_phone', $company_phone);
	oci_bind_by_name($stmt, ':i_company_url', $company_url);
	oci_bind_by_name($stmt, ':i_company_licence', $company_licence);
	oci_bind_by_name($stmt, ':i_company_type_id', $company_type_id);
	oci_bind_by_name($stmt, ':i_company_process_id', $company_process);
	oci_bind_by_name($stmt, ':i_admin_session', $admin_id);
	

	oci_execute($stmt);
	//oci_execute($out);

	header("Location:index.php?p=company/company_view&company_id=".$company_id);
?>

