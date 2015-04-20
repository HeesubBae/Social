<?php
// only one plugin list
$mulist = get_plugin_one_list($p);
$info = get_plugin_info($p);
$pInfo = isset_v('info', 'p');
$i= $pInfo['order'];


	if (isset($mulist[$i]['list']))
	{
		$sublist = $mulist[$i]['list'];
		$sublen = count($sublist);
	
		echo ' <div id="admin_section_leftmenu_title">';
		echo '  <div id="admin_section_leftmenu_title_text">'.$pInfo['name'].'</div>';
		echo ' </div>';
	
		for ($j = 0; $j < $sublen; $j++)
		{	
			if (is_array($mulist[$i]['list'][$j]['name']))
			{
				echo '<ul id="admin_section_leftmenu_ul">';
				foreach($sublist[$j]['name'] as $key => $value) 
				{
					echo '<li><a href="index.php?p='.($mulist[$i]['path'].'/'.$value).'">'.$key.'</a></li>';
				}
				echo '</ul>';
			}
			else
			{
				echo '<h3 id="admin_section_leftmenu_subtitle">';
				echo '<div id="admin_section_leftmenu_subtitle_text">'.$sublist[$j]['name'].'</div>';
				echo '</h3>';
			}
		}
	}
?>		
