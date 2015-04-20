<?php
/*      table 에서 검색타입 (이름,전화번호,주소등 과같은)을 선택하는 select box 들      */
	
	if(isset($_REQUEST['ba_code_search_type'])==''){
		$ba_code_search_txt="0";
	}else{
		$ba_code_search_type=$_REQUEST['ba_code_search_type'];
		$ba_code_search_txt=$_REQUEST['ba_code_search_txt'];
	}

	if(isset($_REQUEST['category_code02_search_type'])==''){
		$category_code02_search_txt="0";
	}else{
		$category_code02_search_type=$_REQUEST['category_code02_search_type'];
		$category_code02_search_txt=$_REQUEST['category_code02_search_txt'];
	}

	if(isset($_REQUEST['category_code01_search_type'])==''){
		$category_code01_search_txt="0";
	}else{
		$category_code01_search_type=$_REQUEST['category_code01_search_type'];
		$category_code01_search_txt=$_REQUEST['category_code01_search_txt'];
	}
	
	if(isset($_REQUEST['main_category_search_type'])==''){
		$main_category_search_txt="0";
	}else{
		$main_category_search_type=$_REQUEST['main_category_search_type'];
		$main_category_search_txt=$_REQUEST['main_category_search_txt'];
	}


	if(isset($_REQUEST['business_area_type'])==''){
		$business_area_txt="0";
	}else{
		$business_area_type=$_REQUEST['business_area_type'];
		$business_area_txt=$_REQUEST['business_area_txt'];
	}	

	if(isset($_REQUEST['member_search_type'])==''){
		$member_search_txt="0";
	}else{
		$member_search_type=$_REQUEST['member_search_type'];
		$member_search_txt=$_REQUEST['member_search_txt'];
	}

	if(isset($_REQUEST['department_search_type'])==''){
			$department_search_txt="0";
	}else{
		$department_search_type=$_REQUEST['department_search_type'];
		$department_search_txt=$_REQUEST['department_search_txt'];
	}

	if(isset($_REQUEST['company_search_type'])==''){
			$company_search_txt="0";
	}else{
		$company_search_type=$_REQUEST['company_search_type'];
		$company_search_txt=$_REQUEST['company_search_txt'];
	}

	if(isset($_REQUEST['company_t_search_type'])==''){//company_type_list
			$company_search_txt="0";
	}else{
		$company_search_type=$_REQUEST['company_search_type'];
		$company_search_txt=$_REQUEST['company_search_txt'];
	}

	if(isset($_REQUEST['board_search_type'])==''){
		$board_search_txt="0";
	}else{
		$board_search_type=$_REQUEST['board_search_type'];
		$board_search_txt=$_REQUEST['board_search_txt'];
	}

	if(isset($_REQUEST['product_search_type'])==''){
		$product_search_type="0";
	}else{
		$product_search_type=$_REQUEST['product_search_type'];
		$product_search_txt=$_REQUEST['product_search_txt'];
	}


/*      process 형태의 고정된 상수를 사용하는 select box 들      */

	if(isset($_REQUEST['area'])==''){
			$area="0"; //초기화
	}else{
		$area=$_REQUEST['area'];
	}

	if(isset($_REQUEST['admin_process'])==''){
			$admin_process="0"; 
	}else{
		$admin_process=$_REQUEST['admin_process'];
	}
	
	if(isset($_REQUEST['company_process'])==''){
			$company_process="0";
	}else{
		$company_process=$_REQUEST['company_process'];
	}

	if(isset($_REQUEST['display_process'])==''){
			$display_process="0";
	}else{
		$display_process=$_REQUEST['display_process'];
	}

	if(isset($_REQUEST['order_process'])==''){
			$order_process="0";
	}else{
		$order_process=$_REQUEST['order_process'];
	}
	
	if(isset($_REQUEST['board_type'])==''){
			$board_type="0";
	}else{
		$board_type=$_REQUEST['board_type'];
	}
	
	if(isset($_REQUEST['order_type'])==''){
			$order_type="0";
	}else{
		$order_type=$_REQUEST['order_type'];
	}
	
	if(isset($_REQUEST['product_type'])==''){
			$product_type="0";
	}else{
		$product_type=$_REQUEST['product_type'];
	}

	if(isset($_REQUEST['product_process'])==''){
			$product_process="0";
	}else{
		$product_process=$_REQUEST['product_process'];
	}

?>

<?php
	
	function get_ba_code_list_search_type($ba_code_search_type){
		echo "<select class='input_size10' name='ba_code_search_type'>";
			if($ba_code_search_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>지역카테고리명</option>";
			}
			else{
				if($ba_code_search_type==0){	echo "<option value='0' selected>	--통합검색--	</option>";}
				else{ echo "<option value='0'>	--통합검색--	</option>";}
				if($ba_code_search_type==1){	echo "<option value='1' selected>	지역카테고리명	</option>";}
				else{ echo "<option value='1'>	지역카테고리명	</option>";}
				
			}
			echo "</select>";
	}	
?>
<?php
	
	function get_category_code02_list_search_type($category_code02_search_type){
		echo "<select class='input_size10' name='category_code02_search_type'>";
			if($category_code02_search_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>2차카테고리명</option>";
			}
			else{
				if($category_code02_search_type==0){	echo "<option value='0' selected>	--통합검색--	</option>";}
				else{ echo "<option value='0'>	--통합검색--	</option>";}
				if($category_code02_search_type==1){	echo "<option value='1' selected>	1차카테고리명	</option>";}
				else{ echo "<option value='1'>	2차카테고리명	</option>";}
				
			}
			echo "</select>";
	}	

	function get_category_code01_list_search_type($category_code01_search_type){
		echo "<select class='input_size10' name='category_code01_search_type'>";
			if($category_code01_search_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>1차카테고리명</option>";
			}
			else{
				if($category_code01_search_type==0){	echo "<option value='0' selected>	--통합검색--	</option>";}
				else{ echo "<option value='0'>	--통합검색--	</option>";}
				if($category_code01_search_type==1){	echo "<option value='1' selected>	1차카테고리명	</option>";}
				else{ echo "<option value='1'>	1차카테고리명	</option>";}
				
			}
			echo "</select>";
	}	

	function get_main_category_list_search_type($main_category_search_type){
		echo "<select class='input_size10' name='main_category_search_type'>";
			if($main_category_search_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>카테고리명</option>";
			}
			else{
				if($main_category_search_type==0){	echo "<option value='0' selected>	--통합검색--	</option>";}
				else{ echo "<option value='0'>	--통합검색--	</option>";}
				if($main_category_search_type==1){	echo "<option value='1' selected>	카테고리명	</option>";}
				else{ echo "<option value='1'>	카테고리명	</option>";}
				
			}
			echo "</select>";
	}	

	function get_b_area_list_search_type($business_area_type){
		echo "<select class='input_size10' name='business_area_type'>";
			if($business_area_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>상권명</option>";
			}
			else{
				if($business_area_type==0){	echo "<option value='0' selected>	--통합검색--	</option>";}
				else{ echo "<option value='0'>	--통합검색--	</option>";}
				if($business_area_type==1){	echo "<option value='1' selected>	상권명	</option>";}
				else{ echo "<option value='1'>	상권명	</option>";}
				
			}
			echo "</select>";
	}
	
	///수정
	function get_company_t_list_search_type($position_id){
		echo "<select class='input_size10' name='position_id'>";
			if($position_id==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>타입명</option>";
			}
			else{
				if($position_id==0){	echo "<option value='0' selected>	--통합검색--	</option>";}
				else{ echo "<option value='0'>	--통합검색--	</option>";}
				if($position_id==1){	echo "<option value='1' selected>	타입명	</option>";}
				else{ echo "<option value='1'>	타입명	</option>";}
				
			}
			echo "</select>";
	}

	function get_position_list_search_type($position_id){
		echo "<select class='input_size10' name='position_id'>";
			if($position_id==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>직책명</option>";
			}
			else{
				if($position_id==0){	echo "<option value='0' selected>	--통합검색--	</option>";}
				else{ echo "<option value='0'>	--통합검색--	</option>";}
				if($position_id==1){	echo "<option value='1' selected>	직책명	</option>";}
				else{ echo "<option value='1'>	직책명	</option>";}
				
			}
			echo "</select>";
	}

	function get_member_list_search_type($member_search_type ){
		echo "<select class='input_size10' name='member_search_type'>";
			if($member_search_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>회원아이디</option>";
				echo "<option value='2'>회원명</option>";
				echo "<option value='3'>회원폰번호</option>";
				echo "<option value='4'>회원전화번호</option>";
				echo "<option value='5'>회원주소</option>";
				echo "<option value='6'>회원이메일</option>";
			}
			else{
				if($member_search_type==0){	echo "<option value='0' selected>--통합검색--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($member_search_type==1){	echo "<option value='1' selected>회원아이디</option>";}
				else{ echo "<option value='1'>회원아이디</option>";}
				if($member_search_type==2){	echo "<option value='2' selected>회원명</option>";}
				else{ echo "<option value='2'>회원명</option>";}
				if($member_search_type==3){	echo "<option value='3' selected>회원폰번호	</option>";}
				else{echo "<option value='3'>회원폰번호</option>";}
				if($member_search_type==4){	echo "<option value='4' selected>회원전화번호</option>";}
				else{echo "<option value='4'>회원전화번호</option>";}
				if($member_search_type==5){	echo "<option value='5' selected>회원주소</option>";}
				else{echo "<option value='5'>회원주소</option>";}
				if($member_search_type==6){	echo "<option value='6' selected>회원이메일</option>";}
				else{echo "<option value='6'>회원이메일</option>";}
			}
			echo "</select>";
	}

	function get_company_list_search_type($company_search_type ){
		echo "<select class='input_size10' name='company_search_type'>";
			if($company_search_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>업체명</option>";
				echo "<option value='2'>업체대표</option>";
				echo "<option value='3'>업체주소</option>";
				echo "<option value='4'>업체전화번호</option>";
				echo "<option value='5'>업체URL</option>";
				echo "<option value='6'>사업자등록번호</option>";
			}
			else{
				if($company_search_type==0){	echo "<option value='0' selected>--통합검색--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($company_search_type==1){	echo "<option value='1' selected>업체명</option>";}
				else{ echo "<option value='1'>업체명</option>";}
				if($company_search_type==2){	echo "<option value='2' selected>업체대표</option>";}
				else{ echo "<option value='2'>업체대표</option>";}
				if($company_search_type==3){	echo "<option value='3' selected>업체주소</option>";}
				else{echo "<option value='3'>업체주소</option>";}
				if($company_search_type==4){	echo "<option value='4' selected>업체전화번호</option>";}
				else{echo "<option value='4'>업체전화번호</option>";}
				if($company_search_type==5){	echo "<option value='5' selected>업체URL</option>";}
				else{echo "<option value='5'>업체url</option>";}
				if($company_search_type==6){	echo "<option value='6' selected>사업자등록번호</option>";}
				else{echo "<option value='6'>사업자등록번호</option>";}
			}
			echo "</select>";
	}

	function get_department_list_search_type($department_search_type){
		echo "<select class='input_size10' name='department_search_type'>";
			if($department_search_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>부서명</option>";
				echo "<option value='2'>부서위치</option>";
				echo "<option value='3'>부서전화번호</option>";
			}
			else{
				if($department_search_type==0){	echo "<option value='0' selected>--통합검색--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($department_search_type==1){	echo "<option value='1' selected>부서명</option>";}
				else{ echo "<option value='1'>부서명</option>";}
				if($department_search_type==2){	echo "<option value='2' selected>부서위치</option>";}
				else{ echo "<option value='2'>부서위치</option>";}
				if($department_search_type==3){	echo "<option value='3' selected>부서전화번호</option>";}
				else{echo "<option value='3'>부서전화번호</option>";}
			}
			echo "</select>";
	}

	function get_product_list_search_type($product_search_type ){
		echo "<select class='input_size10' name='product_search_type'>";
			if($product_search_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>상품명</option>";
				echo "<option value='2'>대표가격</option>";
				echo "<option value='3'>배송료</option>";
				echo "<option value='4'>상세정보</option>";
				echo "<option value='5'>간략정보</option>";
			}
			else{
				if($product_search_type==0){	echo "<option value='0' selected>--통합검색--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($product_search_type==1){	echo "<option value='1' selected>상품명</option>";}
				else{ echo "<option value='1'>상품명</option>";}
				if($product_search_type==2){	echo "<option value='2' selected>대표가격</option>";}
				else{ echo "<option value='2'>대표가격</option>";}
				if($product_search_type==3){	echo "<option value='3' selected>배송료	</option>";}
				else{echo "<option value='3'>배송료</option>";}
				if($product_search_type==4){	echo "<option value='4' selected>상세정보</option>";}
				else{echo "<option value='4'>상세정보</option>";}
				if($product_search_type==5){	echo "<option value='5' selected>간략정보</option>";}
				else{echo "<option value='5'>간략정보</option>";}
			}
			echo "</select>";
	}

	/*                           상수형 select box                                           */
	/*                           상수형 select box                                           */
	/*                           상수형 select box                                           */
	/*                           상수형 select box                                           */
	/*                           상수형 select box                                           */
	/*                           상수형 select box                                           */

	function get_admin_type($admin_type){
		echo "<select class='input_size10' name='admin_type'>";
			if($admin_type==0){
				echo "<option value='0'>--관리자타입--</option>";
				echo "<option value='1'>소셜커머스직원</option>";
				echo "<option value='2'>거래업체직원</option>";
			}
			else{
				if($admin_type==0){	echo "<option value='0' selected>--관리자타입--</option>";}
				else{ echo "<option value='0'>--관리자타입--</option>";}
				if($admin_type==1){	echo "<option value='1' selected>소셜커머스직원</option>";}
				else{ echo "<option value='1'>소셜커머스직원</option>";}
				if($admin_type==2){	echo "<option value='2' selected>거래업체직원</option>";}
				else{ echo "<option value='2'>거래업체직원</option>";}
			}
			echo "</select>";
	}

	function get_area($area){
		echo "<select class='input_size10' name='area'>";
			if($area==0){
				echo "<option value='0'>--지역선택--</option>";
				echo "<option value='1'>서울</option>";
				echo "<option value='2'>경기</option>";
				echo "<option value='3'>인천</option>";
				echo "<option value='4'>대전</option>";
				echo "<option value='5'>충청</option>";
				echo "<option value='6'>강원</option>";
				echo "<option value='7'>부산</option>";
				echo "<option value='8'>울산</option>";
				echo "<option value='9'>대구</option>";
				echo "<option value='10'>경상</option>";
				echo "<option value='11'>전라</option>";
				echo "<option value='12'>제주</option>";
			}
			else{
				if($area==0){	echo "<option value='0' selected>--지역선택--</option>";}
				else{ echo "<option value='0'>--지역선택--</option>";}
				if($area==1){	echo "<option value='1' selected>서울</option>";}
				else{ echo "<option value='1'>서울</option>";}
				if($area==2){	echo "<option value='2' selected>경기</option>";}
				else{ echo "<option value='2'>경기</option>";}
				if($area==3){	echo "<option value='3' selected>인천</option>";}
				else{ echo "<option value='3'>인천</option>";}
				if($area==4){	echo "<option value='4' selected>대전</option>";}
				else{ echo "<option value='4'>대전</option>";}
				if($area==5){	echo "<option value='5' selected>충청</option>";}
				else{ echo "<option value='5'>충청</option>";}
				if($area==6){	echo "<option value='6' selected>강원</option>";}
				else{ echo "<option value='6'>강원</option>";}
				if($area==7){	echo "<option value='7' selected>부산</option>";}
				else{ echo "<option value='7'>부산</option>";}
				if($area==8){	echo "<option value='8' selected>울산</option>";}
				else{ echo "<option value='8'>울산</option>";}
				if($area==9){	echo "<option value='9' selected>대구</option>";}
				else{ echo "<option value='9'>대구</option>";}
				if($area==10){	echo "<option value='10' selected>경상</option>";}
				else{ echo "<option value='10'>경상</option>";}
				if($area==11){	echo "<option value='11' selected>전라</option>";}
				else{ echo "<option value='11'>전라</option>";}
				if($area==12){	echo "<option value='12' selected>제주</option>";}
				else{ echo "<option value='12'>제주</option>";}
			}
			echo "</select>";
	}

	function get_admin_process($admin_process){
		echo "<select class='input_size10' name='admin_process'>";
			if($admin_process==0){
				echo "<option value='0'>--관리자상태--</option>";
				echo "<option value='1'>미승인</option>";
				echo "<option value='2'>승인</option>";
				echo "<option value='3'>정지</option>";
				echo "<option value='4'>휴직</option>";
				echo "<option value='5'>퇴사</option>";
			}
			else{
				if($admin_process==0){	echo "<option value='0' selected>--관리자상태--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($admin_process==1){	echo "<option value='1' selected>미승인</option>";}
				else{ echo "<option value='1'>미승인</option>";}
				if($admin_process==2){	echo "<option value='2' selected>승인</option>";}
				else{ echo "<option value='2'>승인</option>";}
				if($admin_process==3){	echo "<option value='3' selected>정지</option>";}
				else{ echo "<option value='3'>정지</option>";}
				if($admin_process==4){	echo "<option value='4' selected>휴직</option>";}
				else{ echo "<option value='4'>휴직</option>";}
				if($admin_process==5){	echo "<option value='5' selected>퇴사</option>";}
				else{ echo "<option value='5'>퇴사</option>";}
			}
			echo "</select>";
	}

	function get_company_process($company_process){
		echo "<select class='input_size10' name='company_process'>";
			if($company_process==0){
				echo "<option value='0'>--업체상태--</option>";
				echo "<option value='1'>미승인</option>";
				echo "<option value='2'>승인</option>";
				echo "<option value='3'>계약완료</option>";
				echo "<option value='4'>정지</option>";
			}
			else{
				if($company_process==0){	echo "<option value='1' selected>--업체상태--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($company_process==1){	echo "<option value='1' selected>미승인</option>";}
				else{ echo "<option value='1'>미승인</option>";}
				if($company_process==2){	echo "<option value='2' selected>승인</option>";}
				else{ echo "<option value='2'>승인</option>";}
				if($company_process==3){	echo "<option value='3' selected>계약완료</option>";}
				else{ echo "<option value='3'>계약완료</option>";}
				if($company_process==4){	echo "<option value='4' selected>정지</option>";}
				else{ echo "<option value='4'>정지</option>";}
			}
			echo "</select>";
	}

	function get_display_process($display_process){
		echo "<select class='input_size10' name='display_process'>";
			if($display_process==0){
				echo "<option value='0'>--노출상태--</option>";
				echo "<option value='1'>미승인</option>";
				echo "<option value='2'>노출승인</option>";
				echo "<option value='3'>노출대기</option>";
				echo "<option value='4'>노출금지</option>";
			}
			else{
				if($display_process==0){	echo "<option value='1' selected>--노출상태--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($display_process==1){	echo "<option value='1' selected>미승인</option>";}
				else{ echo "<option value='1'>미승인</option>";}
				if($display_process==2){	echo "<option value='2' selected>노출승인</option>";}
				else{ echo "<option value='2'>노출승인</option>";}
				if($display_process==3){	echo "<option value='3' selected>노출대기</option>";}
				else{ echo "<option value='3'>노출대기</option>";}
				if($display_process==4){	echo "<option value='4' selected>노출금지</option>";}
				else{ echo "<option value='4'>노출금지</option>";}
			}
			echo "</select>";
	}

	function get_board_type($board_type){
		echo "<select class='input_size10' name='board_type'>";
			if($board_type==0){
				echo "<option value='0'>--게시판타입--</option>";
				echo "<option value='1'>공지사항</option>";
				echo "<option value='2'>상품문의</option>";
				echo "<option value='3'>상품후기</option>";
				echo "<option value='4'>F&Q</option>";
			}
			else{
				if($board_type==0){	echo "<option value='0' selected>--게시판타입--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($board_type==1){	echo "<option value='1' selected>공지사항</option>";}
				else{ echo "<option value='1'>공지사항</option>";}
				if($board_type==2){	echo "<option value='2' selected>상품문의</option>";}
				else{ echo "<option value='2'>상품문의</option>";}
				if($board_type==3){	echo "<option value='3' selected>상품후기</option>";}
				else{ echo "<option value='3'>상품후기</option>";}
				if($board_type==4){	echo "<option value='4' selected>F&Q</option>";}
				else{ echo "<option value='4'>F&Q</option>";}
			}
			echo "</select>";
	}

	function get_board_list_search_type($board_search_type){
		echo "<select class='input_size10' name='board_search_type'>";
			if($board_search_type==0){
				echo "<option value='0'>--통합검색--</option>";
				echo "<option value='1'>제목</option>";
				echo "<option value='2'>내용</option>";
			}
			else{
				if($board_search_type==0){	echo "<option value='0' selected>--통합검색--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($board_search_type==1){	echo "<option value='1' selected>제목</option>";}
				else{ echo "<option value='1'>제목</option>";}
				if($board_search_type==2){	echo "<option value='2' selected>내용</option>";}
				else{ echo "<option value='2'>내용</option>";}
			}
			echo "</select>";
	}

	function get_order_type($order_type){
		echo "<select class='input_size10' name='order_type'>";
			if($order_type==0){
				echo "<option value='0'>--결제타입--</option>";
				echo "<option value='1'>무통장입금</option>";
				echo "<option value='2'>계좌이체</option>";
				echo "<option value='3'>카드결제</option>";
			}
			else{
				if($order_type==0){	echo "<option value='1' selected>--결제타입--</option>";}
				else{ echo "<option value='0'>--결제타입--</option>";}
				if($order_type==1){	echo "<option value='1' selected>무통장입금</option>";}
				else{ echo "<option value='1'>무통장입금</option>";}
				if($order_type==2){	echo "<option value='2' selected>계좌이체</option>";}
				else{ echo "<option value='2'>계좌이체</option>";}
				if($order_type==3){	echo "<option value='3' selected>카드결제</option>";}
				else{ echo "<option value='3'>카드결제</option>";}
			}
			echo "</select>";
	}

	function get_product_type($product_type){
		echo "<select class='input_size10' name='product_type'>";
			if($product_type==0){
				echo "<option value='0'>--상품타입--</option>";
				echo "<option value='1'>일반상품</option>";
				echo "<option value='2'>쿠폰</option>";
				echo "<option value='3'>티켓</option>";
			}
			else{
				if($product_type==0){	echo "<option value='1' selected>--상품타입--</option>";}
				else{ echo "<option value='0'>--상품타입--</option>";}
				if($product_type==1){	echo "<option value='1' selected>일반상품</option>";}
				else{ echo "<option value='1'>일반상품</option>";}
				if($product_type==2){	echo "<option value='2' selected>쿠폰</option>";}
				else{ echo "<option value='2'>쿠폰</option>";}
				if($product_type==3){	echo "<option value='3' selected>티켓</option>";}
				else{ echo "<option value='3'>티켓</option>";}
			}
			echo "</select>";
	}

	function get_product_process($product_process){
		echo "<select class='input_size10' name='product_process'>";
			if($product_process==0){
				echo "<option value='0'>--상품상태--</option>";
				echo "<option value='1'>미승인</option>";
				echo "<option value='2'>등록완료</option>";
				echo "<option value='3'>판매승인</option>";
				echo "<option value='4'>판매중지</option>";
				echo "<option value='5'>판매금지</option>";
			}
			else{
				if($product_process==0){	echo "<option value='0' selected>--상품상태--</option>";}
				else{ echo "<option value='0'>--상품상태--</option>";}
				if($product_process==1){	echo "<option value='1' selected>미승인</option>";}
				else{ echo "<option value='1'>미승인</option>";}
				if($product_process==2){	echo "<option value='2' selected>등록완료</option>";}
				else{ echo "<option value='2'>등록완료</option>";}
				if($product_process==3){	echo "<option value='3' selected>판매승인</option>";}
				else{ echo "<option value='3'>판매승인</option>";}
				if($product_process==4){	echo "<option value='3' selected>판매중지</option>";}
				else{ echo "<option value='4'>판매중지</option>";}
				if($product_process==5){	echo "<option value='3' selected>판매금지</option>";}
				else{ echo "<option value='5'>판매금지</option>";}
			}
			echo "</select>";
	}

	function get_order_process($order_process){
		echo "<select class='input_size10' name='order_process'>";
			if($order_process==0){
				echo "<option value='0'>--주문단계--</option>";
				echo "<option value='1'>입금대기</option>";
				echo "<option value='2'>입금확인</option>";
				echo "<option value='3'>배송준비</option>";
				echo "<option value='4'>배송중</option>";
				echo "<option value='5'>배송완료</option>";
				echo "<option value='6'>발행준비</option>";
				echo "<option value='7'>발행완료</option>";
				echo "<option value='8'>사용완료</option>";
				echo "<option value='9'>주문취소신청</option>";
				echo "<option value='10'>주문취소완료</option>";
				echo "<option value='11'>교환신청</option>";
				echo "<option value='12'>교환완료</option>";
				echo "<option value='13'>환불신청</option>";
				echo "<option value='14'>환불완료</option>";
			}
			else{
				if($order_process==0){	echo "<option value='1' selected>--주문단계--</option>";}
				else{ echo "<option value='0'>--통합검색--</option>";}
				if($order_process==1){	echo "<option value='1' selected>입금대기</option>";}
				else{ echo "<option value='1'>입금대기</option>";}
				if($order_process==2){	echo "<option value='2' selected>입금확인</option>";}
				else{ echo "<option value='2'>입금확인</option>";}
				if($order_process==3){	echo "<option value='3' selected>배송준비</option>";}
				else{ echo "<option value='3'>배송준비</option>";}
				if($order_process==4){	echo "<option value='4' selected>배송중</option>";}
				else{ echo "<option value='4'>배송중</option>";}
				if($order_process==5){	echo "<option value='5' selected>배송완료</option>";}
				else{ echo "<option value='5'>배송완료</option>";}
				if($order_process==6){	echo "<option value='6' selected>발행준비</option>";}
				else{ echo "<option value='6'>발행준비</option>";}
				if($order_process==7){	echo "<option value='7' selected>발행완료</option>";}
				else{ echo "<option value='7'>발행완료</option>";}
				if($order_process==8){	echo "<option value='8' selected>사용완료</option>";}
				else{ echo "<option value='8'>사용완료</option>";}
				if($order_process==9){	echo "<option value='9' selected>주문취소신청</option>";}
				else{ echo "<option value='9'>주문취소신청</option>";}
				if($order_process==10){	echo "<option value='10' selected>주문취소완료</option>";}
				else{ echo "<option value='10'>주문취소완료</option>";}
				if($order_process==11){	echo "<option value='11' selected>교환신청</option>";}
				else{ echo "<option value='11'>주문취소완료</option>";}
				if($order_process==12){	echo "<option value='12' selected>교환완료</option>";}
				else{ echo "<option value='12'>교환완료</option>";}
				if($order_process==13){	echo "<option value='13' selected>환불신청</option>";}
				else{ echo "<option value='13'>환불신청</option>";}
				if($order_process==14){	echo "<option value='14' selected>환불완료</option>";}
				else{ echo "<option value='14'>환불완료</option>";}
			}
			echo "</select>";
	}
?>

