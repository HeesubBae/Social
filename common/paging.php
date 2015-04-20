<?php
	if(isset($_REQUEST['nowpage'])==''){
			$nowpage="1";
	}else{
		$nowpage=$_REQUEST['nowpage'];
	}

	if(isset($_REQUEST['pagesize'])==''){
			$pagesize="10";
	}else{
		$pagesize=$_REQUEST['pagesize'];
	}
?>


<?php
	function getPage($b,$pagesize,$blockpage,$nowpage){
		$totalpage=ceil($b/$pagesize);
		
		$temp=(int)(($nowpage-1)/$blockpage) * $blockpage +1;
		
		if($temp==1){
			echo "&nbsp;<a href='#'><<</a>";
			echo "&nbsp;<a href='#'><</a>";
		}
		else{
			echo "&nbsp;<a href=javascript:paging('1')><<</a>";
			echo "&nbsp;<a href=javascript:paging('".(int)($temp-$blockpage)."')><</a>";
		}
		
		$loop;
		
		for($loop=0; $loop<$blockpage; $loop++){
			if($temp==$nowpage){
				echo "&nbsp;<a href=javascript:paging('".$temp."') class='on'>".$temp."</a>";
			}
			else{
				echo "&nbsp;<a href=javascript:paging('".$temp."')>".$temp."</a>" ;	
			}
			$temp = $temp+1;
			
			if($temp==$totalpage+1||$temp==1){	break; 		}
			
		}
		
		if($temp>$totalpage){
			echo "&nbsp;<a href='#'>></a>";
		}
		else{
			echo "&nbsp;<a href=javascript:paging('".$temp."')>></a>";
		}
		echo "&nbsp;<a href=javascript:paging('".$totalpage."')>>></a>"; 
	
	}
?>