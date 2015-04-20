<?php
// 플러그인 출력 순서
$PLUGIN_ORDER = 2;

// 플러그인 이름
$PLUGIN_NAME = '상품노출';

// 플러그인 기능 목록
$PLUGIN_SUB[0]['path'] = 'doc1';
$PLUGIN_SUB[0]['name'] = '상권관리';
$PLUGIN_SUB[1]['path'] = 'doc3';
$PLUGIN_SUB[1]['name'] = array(
						'상권리스트'=>'business_area_list',
						'상권등록'=>'business_area_write'
						);
$PLUGIN_SUB[2]['path'] = 'doc1';
$PLUGIN_SUB[2]['name'] = '카테고리 관리';
$PLUGIN_SUB[3]['path'] = 'doc3';
$PLUGIN_SUB[3]['name'] = array(
						'메인 카테고리 리스트'=>'main_category_list',
						'1차 카테고리 리스트'=>'category_code01_list',
						'2차 카테고리 리스트'=>'category_code02_list',
						'지역 카테고리 리스트'=>'business_area_code_list',
						'메인 카테고리 등록'=>'main_category_write',
						'1차 카테고리 등록'=>'category_code01_write',
						'2차 카테고리 등록'=>'category_code02_write',
						'지역 카테고리 등록'=>'business_area_code_write'
						);
$PLUGIN_SUB[4]['path'] = 'doc1';
$PLUGIN_SUB[4]['name'] = '노출상품관리';
$PLUGIN_SUB[5]['path'] = 'doc3';
$PLUGIN_SUB[5]['name'] = array(
						'노출상품통합리스트'=>'display_list',
						'노출미승인상품리스트'=>'display_disapproved_list',
						'노출승인상품리스트'=>'display_approved_list',
						'노출대기상품리스트'=>'display_waiting_list',					
						'노출금지상품리스트'=>'display_ban_list'
						);
$PLUGIN_SUB[6]['path'] = 'doc1';
$PLUGIN_SUB[6]['name'] = '상품(카테고리)관리';
$PLUGIN_SUB[7]['path'] = 'doc3';
$PLUGIN_SUB[7]['name'] = array(
						'상품분류 [카테고리]관리'=>'doc4'
						);
?>
