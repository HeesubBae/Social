<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/layout_admin.css" type="text/css" rel="stylesheet"/>
<title>제목</title>
</head>
   
<body>
 <div id="admin_common_include_title">
  <span class="title_icon"></span>
  <p class="title_text">회원등록</p>
  <p class="title_detail_text">회원등록 하는 페이지 입니다.</p>
 </div>
 <div id="admin_common_include_subject">
 <span class="subject_icon"></span>    
 <p class="subject_text">회원정보 입력 관리</p>
 <p class="subject_detail_text">회원정보 입력 기본정보</p>
 </div>
<form name="form" method="post" action="index.php?p=member/member_write_ok"> 
 <table id="admin_common_wirte_table">
  <tr>
   <th>아이디</th>
   <td>
    <input type="text" class="input_size30" name="member_id"/>
   </td>
  </tr>
  <tr>
   <th>비밀번호</th>
   <td>
    <input type="password" class="input_size30" name="member_pass"/>
   </td>
  </tr>  
  <tr>
   <th>이름</th>
   <td>
    <input type="text" class="input_size30" name="member_name"/>
   </td>
  </tr>
  <tr>
   <th>이메일</th>
   <td>
    <input type="text" class="input_size30" name="member_email"/>
   </td>
  </tr>
  <tr>
   <th>주소1</th>
   <td><input type="text" class="input_size30" name="member_addr1" /></td>
  </tr>
  <tr>
   <th>주소2</th>
   <td><input type="text" class="input_size30"  name="member_addr2" /></td>
  </tr>
  <tr>
   <th>우편번호</th>
   <td><input type="text" class="input_size30"  name="member_zipcode" /></td>
  </tr>
  
  <tr>
   <th>휴대폰번호</th>
   <td><input type="text" class="input_size30" name="member_mobile" /></td>
  </tr>
  <tr>
   <th>전화번호</th>
   <td><input type="text" class="input_size30" name="member_phone" /></td>
  </tr>
  <tr>
   <th>생년월일</th>
   <td><input type="text" class="input_size30" name="member_birthday" /></td>
  </tr>
  <tr>
   <th>성별</th>
   <td><input type="text" class="input_size30" name="member_sex" /></td>
  </tr> 
  </table>
  
  
   <div id="admin_common_submit_wrap">
		<a class="bt_save" onclick="form.submit();">등록</a>
   	    <a class="bt_calcel" onclick="history.back();">취소</a>
   </div> 
</form>
</body>
</html>
