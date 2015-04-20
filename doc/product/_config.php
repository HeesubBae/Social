<?php
// 플러그인 출력 순서
$PLUGIN_ORDER = 2;

// 플러그인 이름
$PLUGIN_NAME = '상품관리';

// 플러그인 기능 목록
$PLUGIN_SUB[0]['path'] = 'doc1';
$PLUGIN_SUB[0]['name'] = '통합상품관리';
$PLUGIN_SUB[1]['path'] = 'doc3';
$PLUGIN_SUB[1]['name'] = array(
						'상품리스트'=>'product_select_list',
						'상품등록'=>'product_write'
						);
$PLUGIN_SUB[2]['path'] = 'doc1';
$PLUGIN_SUB[2]['name'] = '분류별 상품관리';
$PLUGIN_SUB[3]['path'] = 'doc3';
$PLUGIN_SUB[3]['name'] = array(
						'쿠폰상품 리스트'=>'doc4',
						'일반상품 리스트'=>'doc4'
						);
$PLUGIN_SUB[4]['path'] = 'doc1';
$PLUGIN_SUB[4]['name'] = '상품일괄관리';
$PLUGIN_SUB[5]['path'] = 'doc3';
$PLUGIN_SUB[5]['name'] = array(
						'가격/적립금/재고수정'=>'doc4',
						'빠른 판매가격 수정'=>'doc4'
						);
$PLUGIN_SUB[6]['path'] = 'doc1';
$PLUGIN_SUB[6]['name'] = '상품(카테고리)관리';
$PLUGIN_SUB[7]['path'] = 'doc3';
$PLUGIN_SUB[7]['name'] = array(
						'상품분류 [카테고리]관리'=>'doc4'
						);
?>
