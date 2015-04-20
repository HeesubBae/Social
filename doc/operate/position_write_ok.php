<?php
	include 'common/dbcon.php';
?>

<?php

	$sql = 'begin position_insert(:i_position_name ); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$position_name=$_REQUEST["position_name"];
	
	
	oci_bind_by_name($stmt, ':i_position_name', $position_name);
	

	oci_execute($stmt);
	oci_execute($out);
	header("Location:index.php?p=operate/position_list");
?>

