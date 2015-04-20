<?php
// 플러그인 출력 순서
$PLUGIN_ORDER = 6;

// 플러그인 이름
$PLUGIN_NAME = '통계관리';

// 플러그인 기능 목록
$PLUGIN_SUB[0]['path'] = 'doc1';
$PLUGIN_SUB[0]['name'] = '매출분석';
$PLUGIN_SUB[1]['path'] = 'doc3';
$PLUGIN_SUB[1]['name'] = array(
						'일별 매출통계'=>'doc4',
						'월별 매출통계'=>'doc4',
						'업체별 매출통계'=>'doc4',
						'결제수단별 매출통계'=>'doc4'
						);
// 플러그인 기능 목록
$PLUGIN_SUB[2]['path'] = 'doc1';
$PLUGIN_SUB[2]['name'] = '주문분석';
$PLUGIN_SUB[3]['path'] = 'doc3';
$PLUGIN_SUB[3]['name'] = array(
						'일별 주문통계'=>'doc4',
						'월별 주문통계'=>'doc4',
						'상푸별 주문통계'=>'doc4',
						'연령별 주문분석'=>'doc4',
						'지역별 주문분석'=>'doc4',
						'성별 매출통계'=>'doc4'
						);
// 플러그인 기능 목록
$PLUGIN_SUB[4]['path'] = 'doc1';
$PLUGIN_SUB[4]['name'] = '상품분석';
$PLUGIN_SUB[5]['path'] = 'doc3';
$PLUGIN_SUB[5]['name'] = array(
						'카테고리 분석'=>'doc4',
						'판매순위 분석'=>'doc4'
						);
?>
