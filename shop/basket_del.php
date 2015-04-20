<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
금오 소셜커머스::매일 매일 핫 딜!~
</title>
<script src="js/order_start.js"  charset='utf-8'></script>
<link href="css/layout_shop.css" type="text/css" rel="stylesheet"/>
</head>

<%
String idx=request.getParameter("array_list_idx");
%>


<form name="form" method="post" action="/shoesholic/shop_basket_del.do">
	<input type="hidden" name="array_list_idx" value="${idx}"/>
</form>
<body onLoad="document.form.submit();">
</body>
</html>
