<?php 
session_start();

$conn = oci_connect('social', 'social', 'ORCL' , 'AL32UTF8');
 if (!$conn) {
         $e = oci_error();
         echo "ERROR : ".$e['message'];
         exit();
 }

	ini_set('error_reporting', E_ALL ^ E_NOTICE);
	if(!isset($_SESSION['admin_id'])){
		header("Location:login.php");
	}else{
		$admin_id=$_SESSION['admin_id'];
		$member_idx=$_SESSION['member_idx'];
		$company_id=$_SESSION['company_id'];
	}
?>
