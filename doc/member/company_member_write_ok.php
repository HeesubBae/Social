<?php 
	include 'common/dbcon.php';
	ini_set('error_reporting', E_ALL ^ E_NOTICE);
	
	//$admin_type=$_REQUEST["admin_type"];
	//어차피 업체회원만 들어가야 되기때문에
	$admin_type=2;
	$member_idx=$_REQUEST["member_idx"];
	$company_id=$_REQUEST["company_id"];
	$department_id=$_REQUEST["department_id"];
	$position_id=$_REQUEST["position_id"];

?>
<?php

	$sql = 'begin admin_insert(:i_admin_type , :i_member_idx , :i_department_id , :i_position_id , :i_company_id , :i_admin_session); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	
	
	
	oci_bind_by_name($stmt, ':i_admin_type', $admin_type);
	oci_bind_by_name($stmt, ':i_member_idx', $member_idx);
	oci_bind_by_name($stmt, ':i_department_id', $department_id);
	oci_bind_by_name($stmt, ':i_position_id', $position_id);
	oci_bind_by_name($stmt, ':i_company_id', $company_id);
	oci_bind_by_name($stmt, ':i_admin_session', $_SESSION["admin_id"]);

	oci_execute($stmt);
	oci_execute($out);
	
	header("Location:index.php?p=member/company_member_list");
	
?>

