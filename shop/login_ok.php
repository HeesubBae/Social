<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php include 'common/dbcon.php' ?>
<?php session_start();
					
				$member_id=$_REQUEST['member_id'];
				$member_pass=$_REQUEST['member_pass'];
			
				


				$sql = "select member_id from member where member_id='$member_id'";
				$stmt = oci_parse($conn, $sql);
				if (!$stmt)
				{
					$e = oci_error();
					trigger_error($e['message'], E_USER_ERROR);
				}
				oci_execute($stmt);

				list($rec)=oci_fetch_row($stmt);


				if($rec==''){
					echo "
						<script>
							window.alert(' 아이디가 없습니다.');
							location.href='login.php';
						</script>
						";
				}
				else{
					$sql2 = "select member_pass from member where member_id='$member_id'";
					$stmt2 = oci_parse($conn, $sql2);
						if (!$stmt2)
						{
							$e = oci_error();
							trigger_error($e['message'], E_USER_ERROR);
						}
					oci_execute($stmt2);

					list($rec2)=oci_fetch_row($stmt2);

					if($rec2!=$member_pass){
						echo "
							<script>
								window.alert(' 비밀번호를 확인해주세요.');
								location.href='login.php';
							</script>
							";
					}
					
				}
				$sql3 = "select member_idx from member where member_id='$member_id'";
				$stmt3 = oci_parse($conn, $sql3);
				if (!$stmt3)
				{
					$e = oci_error();
					trigger_error($e['message'], E_USER_ERROR);
				}
				oci_execute($stmt3);
				
				list($rec3)=oci_fetch_row($stmt3);

			//세션등록
			$_SESSION['member_idx']=$rec3;
			$_SESSION['member_id']=$rec1;

			
			echo "<script>
					location.href='index.php';
				</script>";
				
				oci_free_statement($stmt);
				oci_free_statement($stmt2);
				oci_free_statement($stmt3);

?>
