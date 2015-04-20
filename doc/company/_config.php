<?php
// 플러그인 출력 순서
$PLUGIN_ORDER = 1;

// 플러그인 이름
$PLUGIN_NAME = '거래업체';

// 플러그인 기능 목록
$PLUGIN_SUB[0]['path'] = 'doc1';
$PLUGIN_SUB[0]['name'] = '업체통합관리';
$PLUGIN_SUB[1]['path'] = 'doc3';
$PLUGIN_SUB[1]['name'] = array(
						'통합업체 리스트'=>'company_list',
						'업체등록'=>'company_write',
						'업체승인대기 리스트'=>'company_waiting_list',
						'업체승인완료 리스트'=>'company_complete_list'
						);

$PLUGIN_SUB[2]['path'] = 'doc1';
$PLUGIN_SUB[2]['name'] = '분야별 업체관리';
$PLUGIN_SUB[3]['path'] = 'doc3';
$PLUGIN_SUB[3]['name'] = array(
						'업체유형등록'=>'company_type_write',
						'업체유형리스트'=>'company_type_list',
						'맛집/음식점'=>'doc4',
						'주점/술집'=>'doc4',
						'뷰티/서비스업'=>'doc4',
						'패션/쇼핑몰'=>'doc4',
						'교육/학원'=>'doc4',
						'건강/헬스'=>'doc4',
						'여가/레저'=>'doc4'
						);
$PLUGIN_SUB[4]['path'] = 'doc1';
$PLUGIN_SUB[4]['name'] = '지역별 업체관리';
$PLUGIN_SUB[5]['path'] = 'doc3';
$PLUGIN_SUB[5]['name'] = array(
						'서울'=>'doc4',
						'경기'=>'doc4',
						'인천'=>'doc4',
						'대전'=>'doc4',
						'충청'=>'doc4',
						'강원'=>'doc4',
						'부산'=>'doc4',
						'울산'=>'doc4',
						'대구'=>'doc4',
						'경상'=>'doc4',
						'전라'=>'doc4',
						'제주'=>'doc4',
						);
?>
