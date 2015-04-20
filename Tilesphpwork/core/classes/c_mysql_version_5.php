<?php
/******************************************************************/
//	2008.10.8 9:11 - 김병욱 - quddnr145@naver.com
//	Mysql 연결 클래스
//	- Cmysql Class -
/******************************************************************/
class Cmysqli
{
	var $server;
	var $client;

	var $dbconn;

	var $result;
	var $rows;
	var $config;

	// Mysql 연결
	// 설명 : Mysql에 연결합니다.
	function Cmysqli($h, $u, $p, $d='')
	{
		$this->connect($h, $u, $p, $d);
	}

	// DB 연결
	// 설명 : Mysql 서버와 연결합니다.
	function connect($h, $u, $p, $d=''){
		$this->dbconn = new mysqli($h, $u, $p, $d);
	}

	// DB 교체
	// 설명 : 다른 DB를 읽습니다.
	function select_db($dbname){
		$this->dbconn->select_db($dbname);
	}

	// 쿼리문 실행
	// 설명 : 쿼리문을 실행합니다.
	function sql($sql){
		return $this->dbconn->query($sql);
	}

	// 쿼리결과 출력
	// 설명 : 실행된 쿼리 결과를 출력 합니다.
	function res($res){
		return $res->fetch_array();
	}

	// 쿼리결과 개수를 출력
	// 설명 : 실행된 쿼리 결과의 개수를 출력 합니다.
	function rows($table_name)
	{
		$res = $this->dbconn->query('select COUNT(*) from '.$table_name);
		$data = $res->fetch_array();
		return $data[0];
	}

	// 쿼리 오류를 출력
	// 설명 : 쿼리문을 실행하던 도중에 일어난 오류를 출력합니다.
	function error(){
		if ( $this->dbconn->connect_error )
			return $this->dbconn->connect_error;
		else
			return $this->dbconn->error;
	}

	// 해당 문자열을 삽입이 가능한 쿼리문으로 변경
	function escape_string($str){
		return mysql_real_escape_string($str);
	}

	// 해당 문자열을 MySQL password() 함수로 암호화
	function password($str)
	{
		$sql = $this->sql('select password("'.$str.'")');
		$res = $this->res($sql);
		if ( isset($res[0]) )
		{
			return $res[0];
		}
		else
		{
			return false;
		}
	}

	// mysql 연결 끊기
	// 설명 : Mysql 연결 끊기
	function close()
	{
		@$this->server->close();
		@$this->client->close();
		unset($this->dbconn);
	}
}
?>