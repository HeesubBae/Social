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
				<li><a href="view.php?product_id=<?=$data["PRODUCT_ID"]?>"><img src="css/img_shop/view_tab01.jpg"></a></li>
				<li><a href="view_board.php?product_id=<?=$data["PRODUCT_ID"]?>"><img src="css/img_shop/view_tab02_on.jpg"></a></li>
			</ul>
			
			<div class="notice">
                    <div class="noti_txt noti_txt2">
						<img src="css/img_shop/view_qna.jpg"/>
                    </div>  
			</div>
			<form name="talk_form">
                    <div class="box_write">
                        <label id="write_talk_warn" onclick="$('#'+this.id).hide();$('textarea[name=write_talk]').focus();" for="qnatalk" style="display: block;">교환/환불 및 배송관련 문의는 1:1게시판을 이용해주세요.</label>
                        <textarea name="write_talk" cols="20" rows="5"></textarea><img src="http://img1.tmon.kr/static/img/btn_ask_up.gif" alt="문의등록" style="cursor:pointer" onclick="talk_submit();">
                    </div>
            </form>
			
			<div class="qna_list">
				<div class="qna_list_bar">
					<img src="css/img_shop/view_qna_bar.jpg"/>
				</div>
				<div class="qna_list_text">
					<!-- 댓글 리스트 시작 -->
					
						<div class="goods_qna">
                            <div class="goods_qna_inner">
                                <span class="thmb"><img src="http://img1.tmon.kr/static/img/thmb_male.png" width="40" height="40" alt=""></span>
                                <a name="29876281"></a>
                                    <div class="qus_area">
											<div class="info">
											<em class="user_id">tnrud2***</em>
												<span class="date">2013-12-01 00:35:56</span>
											</div>
                                        <p class="modfield0">28일날주문했는데지금까지계속집화처리라고만뜨고<br>더이상진전이없네요<br>어떻게된건가요 </p>
                                        <!-- 댓글 수정시 textArea--> 
                                        <div class="option modfield0" style="display:none">
                                            <a onclick="$('.modfield0').toggle()" href="javascript:modifyTalk(29876281)">확인</a>
                                            <span class="bar">|</span>
                                            <a style="cursor:pointer">취소</a>
                                        </div>
 
                                        <div class="qus_reply">
                                            <a class="btn_reply modfield0" style="cursor:pointer" onclick="$('#viewReply0').toggle()">댓글</a>
                                        </div>
                                        
                                        <!-- 댓글 등록시 textArea -->
                                        <div class="qus_reply enable" id="viewReply0" style="padding-top:8px;">
                                            <textarea cols="30" rows="5" name="t_29876281"></textarea>
                                            <a class="btn_submit " href="javascript:writeTalkReply(29876281,'Y')">등록</a>
                                        </div>
                                    </div><!--  <div class="qus_area"> -->
                                </div><!-- <div class="goods_qna_inner"> -->
                        </div><!-- 	<div class="goods_qna"> -->
					<!-- 댓글 리스트 끝 -->
				</div><!-- <div class="qna_list_text"> -->
			</div><!--<div class="qna_list"> -->


		</div><!-- <div class="detail_photo"> -->

		<!-- 뜨는 상품 -->
<?php include 'common/view_hot_item.php' ?>
		<!-- 뜨는 상품 -->
	</div>
</div><!-- <div class="view_area"> -->



</body>
</html>
