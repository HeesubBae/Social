<?php
/**
 * 해당 기능을 불러오는 함수
 *
 * @name	get_plugin(string);
 * @param	(string) $plugin_path		: 확장자를 뺀 doc 폴더 기준 경로
 **/
function get_plugin($plugin_path)
{
	$skin_data = '';
	$rootPath = $GLOBALS['rootPath'];
	$plugin_path = strip_tags($plugin_path);
	$plugin_path = preg_replace('/\.\.\/|%00|&#x00/', '', $plugin_path);

	if (!empty($plugin_path))
	{
		// 해당 스킨파일 읽기
		$readURL = $rootPath.'/doc/'.$plugin_path.'.html';
		if (file_exists($readURL))
		{
			@ob_start();
			include $readURL;
			$skin_data = @ob_get_contents();
			@ob_end_clean();
		}
		else
		{
			$skin_data = '['.$readURL.'] 파일을 찾을 수 없습니다.';
		}
	}
	else
	{
		$skin_data = '<b>불러올 플러그인을 지정하여 주셔야 합니다.</b>';
	}

	echo $skin_data;
}
?>
