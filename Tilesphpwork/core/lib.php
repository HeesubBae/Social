<?php
/**
 * Header 설정하는 함수
 *
 * @name	setHeader(sting);
 * @param	$encoding		: 인코딩
 **/
function setHeader($encoding='utf-8')
{
	@header('Content-Type: text/html; charset='.$encoding);
	// Browser Cache 사용하지 않기
	@header('Cache-Control: no-cache, must-revalidate');
	@header('Pragma: no-cache');
	@header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
	// HTTP/1.1
	@header("Cache-Control: no-store, no-cache, must-revalidate");
	@header("Cache-Control: post-check=0, pre-check=0", false);
	// HTTP/1.0
	@header("Pragma: no-cache");
	// W3C P3P 규약설정
	@header('P3P : CP="ALL CURa ADMa DEVa TAIa OUR BUS IND PHY ONL UNI PUR FIN COM NAV INT DEM CNT STA POL HEA PRE LOC OTC"');
}

/**
 * Database에 연결하는 함수
 *
 * @name	setCreateConnector( classObject, string, string);
 * @param	$obj			: SQL Class 객체
 * @param	$dbname			: SQL Database 이름
 * @param	$encoding		: 인코딩
 **/
function setCreateConnector(&$obj, $dbname, $encoding)
{
	// DB 읽기
	$obj->select_db($dbname);
	// 5.x 이상의 버젼인 경우 charset 설정
	if( substr(mysql_get_server_info(), 0, 1) > 4)
	{
		// charset 설정
		$obj->sql('set names '.$encoding);
	}
}

/**
 * php.ini 설정을 수정하는 함수
 *
 * @name	setIni(void);
 **/
function setIni()
{
	ini_set('error_reporting', E_ALL);
	ini_set('register_globals', 'Off');
	ini_set('display_errors', 'On');
	ini_set('log_errors', 'Off');
}

/**
 * POST, GET, SESSION, COOKIE 변수 필터링 함수
 *
 * @name	isset_v(string, string, bool);
 * @param	$t			: 변수 속성 [POST, GET]
 * @param	$k			: 키값
 * @param	$filter		: 변수의 HTML태그 필터링 여부 [기본값 : true]
 **/
function isset_v($t, $k, $filter=true)
{
	if ( isset($GLOBALS[$t][$k]) )
	{
		if ( $filter == true && !is_array($GLOBALS[$t][$k]))
		{
			return htmlspecialchars($GLOBALS[$t][$k]);
		}

		return $GLOBALS[$t][$k];
	}

	return false;
}

/**
 * 해당 폴더안의 모든 파일 구하는 함수
 *
 * @name	getFolderArray(string, int);
 * @param	$path		파일목록을 구할 폴더의 경로
 * @param	$mode		1 : 전부 구함, 2: 폴더만 구함, 3 : 파일만 구함
 **/
function getFolderArray($path, $mode=1)
{
	$dirArray = array();
	$filename = null;

	$dir = dir($path);
	$dir->rewind();
	while( false !== ( $filename = $dir->read() ) )
	{
		if ( $mode == 1 )
		{
			if ( $filename != '.' && $filename != '..' )
			{
				$dirArray[] = $filename;
			}
		}
		else if ( $mode == 2 )
		{
			if ( is_dir( $path.'/'.$filename ) && $filename != '.' && $filename != '..' )
			{
				$dirArray[] = $filename;
			}
		}
		else if ( $mode == 3 )
		{
			if ( is_file( $path.'/'.$filename ) && $filename != '.' && $filename != '..' )
			{
				$dirArray[] = $filename;
			}
		}
	}
	$dir->close();

	// 파일의 이름을 내림차순으로 정렬
	asort($dirArray);

	return $dirArray;
}

/**
 * 해당 폴더안의 파일을 포함하는 함수
 *
 * @name	getFolderArray(string);
 * @param	$dir		폴더 경로
 **/
function import($dir)
{
	// $config 변수 적용
	$config = &$GLOBALS['config'];

	$funcFileList = getFolderArray($dir);
	$funcFileCount = count($funcFileList);
	for ( $i = 0; $i < $funcFileCount; $i++ )
	{
		// Class Files		- c_*.php
		// Function Files	- f_*.php
		//if ( preg_match('/f_[a-zA-Z0-9\.\-_]+\.php/', $funcFileList[$i]) == true || preg_match('/c_[a-zA-Z0-9\.\-_]+\.php/', $funcFileList[$i]) == true )
		//{
			include $dir.'/'.$funcFileList[$i];
		//}
	}
}
?>
