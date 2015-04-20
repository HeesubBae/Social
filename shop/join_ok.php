<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include 'common/dbcon.php' ?>

<?php
	$member_id=$_REQUEST['member_id'];
	$member_pass=$_REQUEST['member_pass'];
	$member_name=$_REQUEST['member_name'];
	$member_sex=$_REQUEST['member_sex'];
	$member_birth_day01=$_REQUEST['member_birth_day01'];
	$member_birth_day02=$_REQUEST['member_birth_day02'];
	$member_birth_day03=$_REQUEST['member_birth_day03'];
	$member_birth_day=$member_birth_day01.$member_birth_day02.$member_birth_day03;
	$member_email=$_REQUEST['member_email'];
	$member_zipcode=$_REQUEST['member_zipcode'];
	$member_addr1=$_REQUEST['member_addr1'];
	$member_addr2=$_REQUEST['member_addr2'];
	$member_mobile=$_REQUEST['member_mobile'];
	$member_phone=$_REQUEST['member_phone'];

	echo $member_id."<br>";
	echo $member_pass."<br>";
	echo $member_name."<br>";
	echo $member_sex."<br>";
	echo $member_birth_day."<br>";
	echo $member_email."<br>";
	echo $member_zipcode."<br>";
	echo $member_addr1."<br>";
	echo $member_addr2."<br>";
	echo $member_mobile."<br>";
	echo $member_phone."<br>";
	
	$sql = 'begin member_insert(:member_id , :member_pass , :member_name , :member_email , :member_addr1 , :member_addr2 , :member_zipcode , :member_mobile , :member_phone , :member_birthday , :member_hiredate , :member_point ,:member_sex); end;';
	$stmt = oci_parse($conn, $sql);
	$out = oci_new_cursor($conn);
	if (!$stmt)
	{
		$e = oci_error();
		trigger_error($e['message'], E_USER_ERROR);
	}
	$member_id=$_REQUEST["member_id"];
	$member_pass=$_REQUEST["member_pass"];
	$member_name=$_REQUEST["member_name"];
	$member_email=$_REQUEST["member_email"];
	$member_addr1=$_REQUEST["member_addr1"];
	$member_addr2=$_REQUEST["member_addr2"];
	$member_zipcode=$_REQUEST["member_zipcode"];
	$member_mobile=$_REQUEST["member_mobile"];
	$member_phone=$_REQUEST["member_phone"];
	$member_birthday=$_REQUEST["member_birthday"];
	$member_sex=$_REQUEST["member_sex"];
	
	
	oci_bind_by_name($stmt, ':member_id', $member_id);
	oci_bind_by_name($stmt, ':member_pass', $member_pass);
	oci_bind_by_name($stmt, ':member_name', $member_name);
	oci_bind_by_name($stmt, ':member_email', $member_email);
	oci_bind_by_name($stmt, ':member_addr1', $member_addr1);
	oci_bind_by_name($stmt, ':member_addr2', $member_addr2);
	oci_bind_by_name($stmt, ':member_zipcode', $member_zipcode);
	oci_bind_by_name($stmt, ':member_mobile', $member_mobile);
	oci_bind_by_name($stmt, ':member_phone', $member_phone);
	oci_bind_by_name($stmt, ':member_birthday', $member_birth_day);
	oci_bind_by_name($stmt, ':member_hiredate', $member_hiredate);
	oci_bind_by_name($stmt, ':member_point', $member_point);
	oci_bind_by_name($stmt, ':member_sex', $member_sex);

	oci_execute($stmt);
	oci_execute($out);
	header("Location:login.php");
	
?>	
