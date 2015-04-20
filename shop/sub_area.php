<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
금오 소셜커머스::매일 매일 핫 딜!~
</title>

<script src="http://static2.tmon.kr/static/js/jquery-1.8.3.min.js"></script>
<script src="http://static1.tmon.kr/static/js/jquery.slides.min.js?v=201305071600"></script>
<script src="http://static2.tmon.kr/static/common.js?v=21f7cda5ed3ff88c768e3dff16bb8e19b24322cb"></script>
<script src="js/today_hot.js"></script>
<link href="css/layout_shop.css" type="text/css" rel="stylesheet"/>
</head>

<body>

<?php include 'common/shop_top.php' ?>

<div class="container_wrap">

	<!-- 지역 -->
	<?php include 'common/drop_down.php' ?>

	<h3 class="title_type1"><strong>서울 강동/천호/길동</strong> 모든 상품</h3>
	<div class="menu_type1">
		<ul>
			<li class="selected"><a href="#">전체</a></li>
			<li><a href="?main_category_id=<?=$_GET['main_category_id']?>&area_id=<?=$_GET['area_id']?>&ba_code_id=1">맛집</a></li>
			
			<li><a href="?main_category_id=<?=$_GET['main_category_id']?>&area_id=<?=$_GET['area_id']?>&ba_code_id=2">주점</a></li>
			
			<li><a href="?main_category_id=<?=$_GET['main_category_id']?>&area_id=<?=$_GET['area_id']?>&ba_code_id=3">카페</a></li>
			
			<li><a href="?main_category_id=<?=$_GET['main_category_id']?>&area_id=<?=$_GET['area_id']?>&ba_code_id=4">뷰티</a></li>
			
			<li><a href="?main_category_id=<?=$_GET['main_category_id']?>&area_id=<?=$_GET['area_id']?>&ba_code_id=5">패션</a></li>
			
			<li><a href="?main_category_id=<?=$_GET['main_category_id']?>&area_id=<?=$_GET['area_id']?>&ba_code_id=6">교육</a></li>
	
			<li><a href="?main_category_id=<?=$_GET['main_category_id']?>&area_id=<?=$_GET['area_id']?>&ba_code_id=7">건강</a></li>
			
			<li><a href="?main_category_id=<?=$_GET['main_category_id']?>&area_id=<?=$_GET['area_id']?>&ba_code_id=8">여가</a></li>
			
		</ul>
	</div>
</div>


<?php include 'common/item_list.php' ?>



</body>
</html>
