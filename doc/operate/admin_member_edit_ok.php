<?php 
	include 'common/dbcon.php';
	include 'common/paging.php';
	include 'common/search_type.php';
?>
<?php

	$sql = 'begin admin_update(:i_admin_id, :i_admin_type, :i_department_id, :i_position_id ,:i_admin_process_id, :i_company_id , :i_admin_session); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$admin_id=$_REQUEST["admin_id"];
	$admin_type=$_REQUEST["admin_type"];
	$department_id=$_REQUEST["department_id"];
	$position_id=$_REQUEST["position_id"];
	$admin_process_id=$_REQUEST["admin_process"];
	$company_id=$_REQUEST["company_id"];



	echo "session=".$_SESSION['admin_id']."</br>";
	echo $admin_member_id."</br>";
	echo $admin_type."</br>";
	echo $department_id."</br>";
	echo $position_id."</br>";
	echo $company_process."</br>";
	echo $company_id."</br>";

	oci_bind_by_name($stmt, ':i_admin_id', $admin_id);
	oci_bind_by_name($stmt, ':i_admin_type', $admin_type);
	oci_bind_by_name($stmt, ':i_department_id', $department_id);
	oci_bind_by_name($stmt, ':i_position_id', $position_id);
	oci_bind_by_name($stmt, ':i_admin_process_id', $admin_process_id);
	oci_bind_by_name($stmt, ':i_company_id', $company_id);
	oci_bind_by_name($stmt, ':i_admin_session', $_REQUEST["admin_id"]);
	

	oci_execute($stmt);
	oci_execute($out);
	
	header("Location:index.php?p=operate/admin_member_view&admin_id=".$admin_id);
?>

