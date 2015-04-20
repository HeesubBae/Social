<?php
/**
 * 해당 플러그인 기능목록을 불러오는 함수
 *
 * @name	get_plugin_list();
 * @return	Array	: 메뉴 형식을 배열로 반환
 **/
function get_plugin_list()
{
	$rootPath = $GLOBALS['rootPath'];

	$infoArray = array();

	// 해당 스킨파일 읽기
	$readURL = $rootPath.'/doc/';

	$pluginArray = getFolderArray($readURL, 2);
	foreach ($pluginArray as $name)
	{
		$pluginConfigPath = $readURL.$name.'/_config.php';
		// 설정파일 포함
		include $pluginConfigPath;

		$infoArray[$PLUGIN_ORDER]['path'] = $name;
		$infoArray[$PLUGIN_ORDER]['name'] = $PLUGIN_NAME;
		$infoArray[$PLUGIN_ORDER]['list'] = $PLUGIN_SUB;
	}

	return $infoArray;
}
?>
