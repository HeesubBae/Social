<?php
// 플러그인 출력 순서
$PLUGIN_ORDER = 7;

// 플러그인 이름
$PLUGIN_NAME = '운영관리';

// 플러그인 기능 목록
$PLUGIN_SUB[0]['path'] = 'doc1';
$PLUGIN_SUB[0]['name'] = '운영자관리';
$PLUGIN_SUB[1]['path'] = 'doc3';
$PLUGIN_SUB[1]['name'] = array(
						'운영자리스트'=>'admin_member_list',
						'운영자등록'=>'admin_member_write'
						);
$PLUGIN_SUB[2]['path'] = 'doc1';
$PLUGIN_SUB[2]['name'] = '부서관리';
$PLUGIN_SUB[3]['path'] = 'doc3';
$PLUGIN_SUB[3]['name'] = array(
						'부서 리스트'=>'department_list',
						'부서 등록'=>'department_write'
						);
$PLUGIN_SUB[4]['path'] = 'doc1';
$PLUGIN_SUB[4]['name'] = '직책관리';
$PLUGIN_SUB[5]['path'] = 'doc3';
$PLUGIN_SUB[5]['name'] = array(
						'직책 리스트'=>'position_list',
						'직책 등록'=>'position_write'
						);
?>
