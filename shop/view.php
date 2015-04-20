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
<script src="js/calculate.js"></script><!-- 상품 뷰페이지 계산 -->
<link href="css/layout_shop.css" type="text/css" rel="stylesheet"/>
</head>

<body>

<?php include 'common/shop_top.php' ?>



<?php include 'common/view.php' ?>

			
	<div class="detail_info_area">
		<div class="detail_photo">
			<ul class="view_tap">
				<li><a href="view.php?product_id=<?=$data["PRODUCT_ID"]?>"><img src="css/img_shop/view_tab01_on.jpg"></a></li>
				<li><a href="view_board.php?product_id=<?=$data["PRODUCT_ID"]?>"><img src="css/img_shop/view_tab02.jpg"></a></li>
			</ul>
			<?=$data["PRODUCT_DETAIL_INFO"]?>
		</div>

		<!-- 뜨는 상품 -->
<?php include 'common/view_hot_item.php' ?>
		<!-- 뜨는 상품 -->
	</div>

</div><!-- <div class="view_area"> -->



</body>
</html>
