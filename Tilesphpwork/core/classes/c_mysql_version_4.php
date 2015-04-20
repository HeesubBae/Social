<?php
/******************************************************************/
//	2008.10.8 9:11 - 김병욱 - quddnr145@naver.com
//	Mysql 연결 클래스
//	- Cmysql Class -
/******************************************************************/
class Cmysql{
	var $dbconn;
	var $result;
	var $rows;

	// Mysql 연결
	// 설명 : Mysql에 연결합니다.
	function Cmysql($host, $id, $pw, $dbname){
		$this->dbconn = mysql_connect($host, $id, $pw);
		$this->select_db($dbname);
	}

	// DB 교체
	// 설명 : 다른 DB를 읽습니다.
	function select_db($dbname){
		mysql_select_db($dbname);
	}

	// 쿼리문 실행
	// 설명 : 쿼리문을 실행합니다.
	function sql($sql){
		return mysql_query($sql, $this->dbconn);
	}

	// 쿼리결과 출력
	// 설명 : 실행된 쿼리 결과를 출력 합니다.
	function res($res){
		return mysql_fetch_array($res);
	}

	// 쿼리결과 개수를 출력
	// 설명 : 실행된 쿼리 결과의 개수를 출력 합니다.
	function rows($table_name)
	{
		$res = $this->sql('select COUNT(*) from '.$table_name);
		return $this->res($res);
	}

	// 쿼리 오류를 출력
	// 설명 : 쿼리문을 실행하던 도중에 일어난 오류를 출력합니다.
	function error(){
		return mysql_error();
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
	function close(){
		mysql_close($this->dbconn);
	}
}
?>