<?php
// 플러그인 출력 순서
$PLUGIN_ORDER = 3;

// 플러그인 이름
$PLUGIN_NAME = '회원관리';

// 플러그인 기능 목록
$PLUGIN_SUB[0]['path'] = 'doc1';
$PLUGIN_SUB[0]['name'] = '회원관리';
$PLUGIN_SUB[1]['path'] = 'doc3';
$PLUGIN_SUB[1]['name'] = array(
						'회원리스트'=>'member_list',
						'회원수동등록'=>'member_write',
						'회원탈퇴/삭제내역'=>'doc4'
						);
$PLUGIN_SUB[2]['path'] = 'doc3';
$PLUGIN_SUB[2]['name'] = '업체회원관리';
$PLUGIN_SUB[3]['path'] = 'doc3';
$PLUGIN_SUB[3]['name'] = array(
						'업체회원리스트'=>'company_member_list',
						'업체회원등록'=>'company_member_write',
						'업체회원 승인대기'=>'company_member_waiting_list',
						'업체회원 승인완료'=>'company_member_complete_list'
						);
$PLUGIN_SUB[4]['path'] = 'doc3';
$PLUGIN_SUB[4]['name'] = '마일리지관리';
$PLUGIN_SUB[5]['path'] = 'doc3';
$PLUGIN_SUB[5]['name'] = array(
						'마일리지지급 리스트'=>'doc4',
						'마일리지사용 리스트'=>'doc4',
						'마일리지 수동처리'=>'doc4'
						);
?>
