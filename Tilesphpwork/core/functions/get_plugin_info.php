<?php
/**
 * 실행중인 플러그인 기능의 정보를 리턴
 *
 * @name	get_plugin_info(string);
 * @param	(string) $plugin_path		: 확장자를 뺀 doc 폴더 기준 경로
 * @return	Array	: 메뉴 정보를 배열로 반환
 **/
function get_plugin_info($plugin_path)
{
	$rootPath = $GLOBALS['rootPath'];

	$infoArray = array();

	if (!empty($plugin_path))
	{
		// 플러그인 이름
		$plugin_path_array = explode('/', $plugin_path);
		$plugin_root_path = $plugin_path_array[0];

		unset($plugin_path_array[0]);
		$plugin_play_path = implode('/', $plugin_path_array);

		// 해당 스킨파일 읽기
		$readURL = $rootPath.'/doc/';

		$pluginConfigPath = $readURL.$plugin_root_path.'/_config.php';

		if (file_exists($pluginConfigPath))
		{
			// 설정파일 포함
			include $pluginConfigPath;

			foreach ($PLUGIN_SUB as $k => $v)
			{
				if ($v['path'] == $plugin_play_path)
				{
					$infoArray = $v;
					$infoArray['order'] = $k;
					break;
				}
			}

			// 해당 플러그인 관련 정보
			$infoArray['p']['path'] = $plugin_root_path;
			$infoArray['p']['name'] = $PLUGIN_NAME;
			$infoArray['p']['order'] = $PLUGIN_ORDER;
		}
	}

	return $infoArray;
}
?>
