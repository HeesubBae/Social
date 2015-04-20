<?php
// 플러그인 출력 순서
$PLUGIN_ORDER = 4;

// 플러그인 이름
$PLUGIN_NAME = '주문관리';

// 플러그인 기능 목록
$PLUGIN_SUB[0]['path'] = 'doc1';
$PLUGIN_SUB[0]['name'] = '주문통합관리';
$PLUGIN_SUB[1]['path'] = 'doc3';
$PLUGIN_SUB[1]['name'] = array(
						'주문통합리스트'=>'doc4'
						);
$PLUGIN_SUB[2]['path'] = 'doc1';
$PLUGIN_SUB[2]['name'] = '쿠폰 주문관리';
$PLUGIN_SUB[3]['path'] = 'doc3';
$PLUGIN_SUB[3]['name'] = array(
						'[티켓]입금대기 리스트'=>'doc4',
						'[티켓]발행준비 리스트'=>'doc4',
						'[티켓]발행완료 리스트'=>'doc4',
						'[티켓]사용완료 리스트'=>'doc4'
						);
$PLUGIN_SUB[4]['path'] = 'doc1';
$PLUGIN_SUB[4]['name'] = '단계별 주문관리';
$PLUGIN_SUB[5]['path'] = 'doc3';
$PLUGIN_SUB[5]['name'] = array(
						'입금대기 리스트'=>'doc4',
						'입금확인 리스트'=>'doc4',
						'배송준비중 리스트'=>'doc4',
						'배송중 리스트'=>'doc4',
						'배송완료 리스트'=>'doc4'
						);
$PLUGIN_SUB[6]['path'] = 'doc1';
$PLUGIN_SUB[6]['name'] = '주문취소 관리';
$PLUGIN_SUB[7]['path'] = 'doc3';
$PLUGIN_SUB[7]['name'] = array(
						'주문취소신청 리스트'=>'doc4',
						'주문취소완료 리스트'=>'doc4'
						);
$PLUGIN_SUB[8]['path'] = 'doc1';
$PLUGIN_SUB[8]['name'] = '교환/환불 관리';
$PLUGIN_SUB[9]['path'] = 'doc3';
$PLUGIN_SUB[9]['name'] = array(
						'교환신청 리스트'=>'doc4',
						'교환완료 리스트'=>'doc4',
						'환불신청 리스트'=>'doc4',
						'환불완료 리스트'=>'doc4',
						);
?>
