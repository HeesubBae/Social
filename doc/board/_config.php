<?php
// 플러그인 출력 순서
$PLUGIN_ORDER = 5;

// 플러그인 이름
$PLUGIN_NAME = '게시판관리';

// 플러그인 기능 목록
$PLUGIN_SUB[0]['path'] = 'doc1';
$PLUGIN_SUB[0]['name'] = '게시판관리';
$PLUGIN_SUB[1]['path'] = 'doc3';
$PLUGIN_SUB[1]['name'] = array(
						'게시글 통합관리'=>'board_list',
						'게시글 등록'=>'board_write'
						);
$PLUGIN_SUB[2]['path'] = 'doc1';
$PLUGIN_SUB[2]['name'] = '문의/후기관리';
$PLUGIN_SUB[3]['path'] = 'doc3';
$PLUGIN_SUB[3]['name'] = array(
						'공지사항관리'=>'board_notice_list',
						'상품문의관리'=>'board_inquiry_list',
						'상품후기관리'=>'board_review_list',
						'F&Q 관리'=>'board_faq_list'
						);
?>
