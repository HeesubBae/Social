<?php
// ���
include_once './core/_header.php';

$p = isset_v('_GET', 'p');
?>




<div style='color:red;  width:500px; height:500px;'>
	<div style='width:100%; height:100px; float:left; background:red;'>
		<?php
		$mulist = get_plugin_list();
		$mulen = count($mulist);
		for ($i = 0; $i < $mulen; $i++)
		{
			$sublist = $mulist[$i]['list'];
			$sublen = count($sublist);
			echo '플러그인 이름 : '.$mulist[$i]['path'].'<br />';
			for ($j = 0; $j < $sublen; $j++)
			{
				if ($j == 0)
				{
					echo '플러그인 제목 : <a href="index2.php?p='.($mulist[$i]['path'].'/'.$sublist[$j]['path']).'">'.$mulist[$i]['name'].'</a><br />';
				}
			}
		}
		?>
	</div>

	<div style='width:100px; height:500px;float:left;'>
		<?php
		$info = get_plugin_info($p);
		$pInfo = isset_v('info', 'p');
		$i= $pInfo['order'];
		
			$sublist = $mulist[$i]['list'];
			$sublen = count($sublist);
			for ($j = 0; $j < $sublen; $j++)
			{
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;기능 이름 : '.$sublist[$j]['path'].'<br />';
				echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;기능 제목 : <a href="index2.php?p='.($mulist[$i]['path'].'/'.$sublist[$j]['path']).'">'.$sublist[$j]['name'].'</a><br />';
			}
		?>		
	</div>
	<div style='width:400px; height:500px; float:left; background:green;'>
		<h1>실행중인 플러그인 정보</h1>
		<?php
		//$info = get_plugin_info($p);
		//$pInfo = isset_v('info', 'p');
		?>
		플러그인 순서 : <?php echo $pInfo['order']; ?><br />
		플러그인 이름 : <?php echo $pInfo['path']; ?><br />
		플러그인 제목 : <?php echo $pInfo['name']; ?><br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;기능 순서 : <?php echo isset_v('info', 'order'); ?><br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;기능 이름 : <?php echo isset_v('info', 'path'); ?><br />
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;기능 제목 : <?php echo isset_v('info', 'name'); ?><br />

		<!--
		###################################################################################
		# 플러그인 실행 결과
		###################################################################################
		-->
		<h1>플러그인 실행 결과</h1>
		<?php
		echo get_plugin($p);
		?>
	</div>
</div>

<?php
// ǲ��
include_once './core/_footer.php';
?>