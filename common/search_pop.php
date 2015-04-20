<?php
/*         pop_department_list 파라미터  시작        */
	if(isset($_REQUEST['department_name'])==''){
			$department_name="";
	}else{
		$department_name=$_REQUEST['department_name'];
	}

	if(isset($_REQUEST['department_id'])==''){
			$department_id="0";
	}else{
		$department_id=$_REQUEST['department_id'];
	}
/*         pop_department_list 파라미터  끝          */


/*         pop_position_list 파라미터  시작            */
	if(isset($_REQUEST['position_name'])==''){
			$position_name="";
	}else{
		$position_name=$_REQUEST['position_name'];
	}

	if(isset($_REQUEST['position_id'])==''){
			$position_id="0";
	}else{
		$position_id=$_REQUEST['position_id'];
	}
/*         pop_position_list 파라미터  끝            */


/*         pop_company_list 파라미터  시작            */
	if(isset($_REQUEST['company_name'])==''){
			$company_name="";
	}else{
		$company_name=$_REQUEST['company_name'];
	}

	if(isset($_REQUEST['company_id'])==''){
			$company_id="0";
	}else{
		$company_id=$_REQUEST['company_id'];
	}
/*          pop_company_list 파라미터  끝            */



/*          pop_company_type_list 파라미터  시작            */
	if(isset($_REQUEST['company_type_name'])==''){
			$company_type_name="";
	}else{
		$company_type_name=$_REQUEST['company_type_name'];
	}

	if(isset($_REQUEST['company_type_id'])==''){
			$company_type="0";
	}else{
		$company_type=$_REQUEST['company_type_id'];
	}
/*          pop_company_type_list 파라미터  끝            */



/*          pop_main_category_list 파라미터  시작            */
	if(isset($_REQUEST['main_category_name'])==''){
			$main_category_name="";
	}else{
		$main_category_name=$_REQUEST['main_category_name'];
	}

	if(isset($_REQUEST['main_category_id'])==''){
			$main_category_id="0";
	}else{
		$main_category_id=$_REQUEST['main_category_id'];
	}
/*          pop_main_category_list 파라미터  끝            */


/*          pop_business_area_list 파라미터  시작            */
	if(isset($_REQUEST['business_area_name'])==''){
			$business_area_name="";
	}else{
		$business_area_name=$_REQUEST['business_area_name'];
	}

	if(isset($_REQUEST['business_area_id'])==''){
			$business_area_id="0";
	}else{
		$business_area_id=$_REQUEST['business_area_id'];
	}

	if(isset($_REQUEST['area_name'])==''){
			$area_name="";
	}else{
		$area_name=$_REQUEST['area_name'];
	}

	if(isset($_REQUEST['area_id'])==''){
			$area_id="0";
	}else{
		$area_id=$_REQUEST['area_id'];
	}

/*          pop_business_area_list 파라미터  끝            */


/*          pop_category_code01_list 파라미터  시작            */
	if(isset($_REQUEST['category_code01_name'])==''){
			$category_code01_name="";
	}else{
		$category_code01_name=$_REQUEST['category_code01_name'];
	}

	if(isset($_REQUEST['category_code01_id'])==''){
			$category_code01_id="0";
	}else{
		$category_code01_id=$_REQUEST['category_code01_id'];
	}
/*          pop_category_code01_list 파라미터  끝            */


/*          pop_category_code02_list 파라미터  시작            */
	if(isset($_REQUEST['category_code02_name'])==''){
			$category_code02_name="";
	}else{
		$category_code02_name=$_REQUEST['category_code02_name'];
	}

	if(isset($_REQUEST['category_code02_id'])==''){
			$category_code02_id="0";
	}else{
		$category_code02_id=$_REQUEST['category_code02_id'];
	}
/*          pop_category_code02_list 파라미터  끝            */


/*          pop_ba_code_list 파라미터  시작            */
	if(isset($_REQUEST['ba_code_name'])==''){
			$ba_code_name="";
	}else{
		$ba_code_name=$_REQUEST['ba_code_name'];
	}

	if(isset($_REQUEST['ba_code_id'])==''){
			$ba_code_id="0";
	}else{
		$ba_code_id=$_REQUEST['ba_code_id'];
	}
/*          pop_ba_code_list 파라미터  끝            */


/*          pop_category_code01_list 파라미터  시작            */
	if(isset($_REQUEST['category_code01_name'])==''){
			$category_code01_name="";
	}else{
		$category_code01_name=$_REQUEST['category_code01_name'];
	}

	if(isset($_REQUEST['category_code01_id'])==''){
			$category_code01_id="0";
	}else{
		$category_code01_id=$_REQUEST['category_code01_id'];
	}
/*          pop_category_code01_list 파라미터  끝            */


?>

<?php

	function pop_member_list($size,$member_idx,$member_name){
		echo "<input type='text'   class='input_size".$size."' onclick='pop_member_list()' name='member_name' value='".$member_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='member_idx' value=".$member_idx.  ">";
	}

	function pop_department_list($size,$department_id,$department_name){
		echo "<input type='text'   class='input_size".$size."' onclick='pop_department_list()' name='department_name' value='".$department_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='department_id' value=".$department_id.  ">";
	}

	function pop_position_list($size,$position_id,$position_name){
		echo "<input type='text'   class='input_size".$size."' onclick='pop_position_list()'   name='position_name' value='".$position_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='position_id'   value=".$position_id.  ">";
	}

	function pop_company_list($size,$company_id,$company_name){
		echo "<input type='text'   class='input_size".$size."' onclick='pop_company_list()'   name='company_name' value='".$company_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='company_id'   value=".$company_id.  ">";
	}

	function pop_company_type_list($size,$company_type_id,$company_type_name){
		echo "<input type='text'   class='input_size".$size."' onclick='pop_company_type_list()'   name='company_type_name' value='".$company_type_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='company_type_id'   value=".$company_type_id.  ">";
	}

	function pop_business_area_list($size,$business_area_id,$business_area_name,$area_id , $area_name){
		echo "<input type='text' class='input_size".$size."' onclick='pop_business_area_list()'                             name='area_name'   value=".$area_name.  ">";
		echo "<input type='text'   class='input_size".$size."' onclick='pop_business_area_list()'   name='business_area_name' value='".$business_area_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='business_area_id'   value=".$business_area_id.  ">";
		echo "<input type='hidden' class='input_size".$size."'                             name='area_id'   value=".$area_id.  ">";
	}

	function pop_category_code01_list($size,$category_code01_id,$category_code01_name){
		echo "<input type='text'   class='input_size".$size."' onclick='pop_category_code01_list()'   name='category_code01_name' value='".$category_code01_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='category_code01_id'   value=".$category_code01_id.  ">";
	}

	function pop_category_code02_list($size,$category_code02_id,$category_code02_name, $category_code01_id, $category_code01_name){
		echo "<input type='text' class='input_size".$size."' onclick='pop_category_code02_list()'                             name='category_code01_name'   value=".$category_code01_name.  ">";
		echo "<input type='text'   class='input_size".$size."' onclick='pop_category_code02_list()'   name='category_code02_name' value='".$category_code02_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='category_code02_id'   value=".$category_code02_id.  ">";
		echo "<input type='hidden' class='input_size".$size."'                             name='category_code01_id'   value=".$category_code01_id.  ">";
	}

	function pop_main_category_list($size,$main_category_id,$main_category_name){
		echo "<input type='text'   class='input_size".$size."' onclick='pop_main_category_list()'   name='main_category_name' value='".$main_category_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='main_category_id'   value=".$main_category_id.  ">";
	}

	function pop_ba_code_list($size,$ba_code_id,$ba_code_name){
		echo "<input type='text'   class='input_size".$size."' onclick='pop_ba_code_list()'   name='ba_code_name' value='".$ba_code_name."' >";
		echo "<input type='hidden' class='input_size".$size."'                             name='ba_code_id'   value=".$ba_code_id.  ">";
	}


?>