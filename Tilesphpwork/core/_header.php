<?php
@ob_start();
@session_start();

// 설정 관련 변수 초기화
$config = array(array());

// 루트 경로 구하기
$rootPath = str_replace("\\", "/", dirname(dirname(__FILE__)));
$webrootPath = str_replace(getenv('DOCUMENT_ROOT'), '.', dirname($rootPath));

// 기본 lib파일 설정
include $rootPath.'/core/lib.php';

// 기본 설정 포함
import($rootPath.'/core/config');
// 각종 class파일 및 함수 파일 포함
import($rootPath.'/core/classes');
import($rootPath.'/core/functions');

// php.ini 설정
setIni();

// PHP 해더 설정
setHeader($config['encoding'][0]);

// mysql 연결
$cmysql = auto_connect(	$config['mysql']['h'],
						$config['mysql']['u'],
						$config['mysql']['p'],
						$config['mysql']['d']);
// mysql charset 설정
setCreateConnector(	$cmysql,
					$config['mysql']['d'],
					$config['encoding'][1]);
?>
