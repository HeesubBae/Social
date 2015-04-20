<?php
// 플러그인 출력 순서
$PLUGIN_ORDER = 0;

// 플러그인 이름
$PLUGIN_NAME = '기본설정';

// 플러그인 기능 목록
$PLUGIN_SUB[0]['path'] = 'doc1';
$PLUGIN_SUB[0]['name'] = '기본관리';
$PLUGIN_SUB[1]['path'] = 'doc3';
$PLUGIN_SUB[1]['name'] = array(
						'지역분류 관리'=>'doc4&k=1',
						'분야분류 관리'=>'doc4'
						);
$PLUGIN_SUB[2]['path'] = 'doc1';
$PLUGIN_SUB[2]['name'] = '거래업체 관리';
$PLUGIN_SUB[3]['path'] = 'doc3';
$PLUGIN_SUB[3]['name'] = array(
						'업체승인단계 관리'=>'doc4',
						);
$PLUGIN_SUB[4]['path'] = 'doc1';
$PLUGIN_SUB[4]['name'] = '상품설정 관리';
$PLUGIN_SUB[5]['path'] = 'doc3';
$PLUGIN_SUB[5]['name'] = array(
						'상품승인단계 관리'=>'doc4',
						'상품[카테고리] 관리'=>'doc4'
						);
$PLUGIN_SUB[6]['path'] = 'doc1';
$PLUGIN_SUB[6]['name'] = '회원설정 관리';
$PLUGIN_SUB[7]['path'] = 'doc3';
$PLUGIN_SUB[7]['name'] = array(
						'회원등급단계 관리'=>'doc4',
						'회원승인단계 관리'=>'doc4'
						);
$PLUGIN_SUB[8]['path'] = 'doc1';
$PLUGIN_SUB[8]['name'] = '주문설정 관리';
$PLUGIN_SUB[9]['path'] = 'doc3';
$PLUGIN_SUB[9]['name'] = array(
						'주문처리단계 관리'=>'doc4',
						'주문설정'=>'doc4'
						);
$PLUGIN_SUB[10]['path'] = 'doc1';
$PLUGIN_SUB[10]['name'] = '게시판설정 관리';
$PLUGIN_SUB[11]['path'] = 'doc3';
$PLUGIN_SUB[11]['name'] = array(
						'...'=>'doc4',
						);
$PLUGIN_SUB[12]['path'] = 'doc1';
$PLUGIN_SUB[12]['name'] = '통계설정 관리';
$PLUGIN_SUB[13]['path'] = 'doc3';
$PLUGIN_SUB[13]['name'] = array(
						'...'=>'doc4',
						);
$PLUGIN_SUB[14]['path'] = 'doc1';
$PLUGIN_SUB[14]['name'] = '운영설정 관리';
$PLUGIN_SUB[15]['path'] = 'doc3';
$PLUGIN_SUB[15]['name'] = array(
						'부서 관리'=>'doc4',
						'직책 관리'=>'doc4',
						'권한 관리'=>'doc4'
						);

?>
