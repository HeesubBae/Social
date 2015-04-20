<?php
/**
 * Mysql 버젼에 따라 다른 클래스 객체 생성
 * @name	auto_connect();
 * @return	classObject
 **/
function auto_connect($h, $u, $p, $d)
{
	$link = mysql_connect($h, $u, $p);

	if ( !$link )
	{
		die('데이터베이스 연결 실패!!');
		return false;
	}
	else
	{
		if( substr(mysql_get_server_info(), 0, 1) > 4)
		{
			// mysql 5 이상
			return new Cmysqli($h, $u, $p, $d);
		}
		else
		{
			// mysql 4 이하
			return new Cmysql($h, $u, $p, $d);
		}
	}
}
?>
