<!doctype html>
<html lang='ko'>
<head>
<title>옵션 select</title>
<meta charset='utf-8' />
<link rel='stylesheet' href='./css/option.css' />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.4/jquery-ui.min.js"></script>

<style type="text/css">
#container { width: 400px; margin: 0 auto; }
#container ul { margin: 0; padding: 0; list-style: none; }
#container select { width: 380px; }
#selected-result { display: none; }
#total-price { display: none; }
.option-delete { cursor: pointer; }
.option-price { display: none; }
.item-count input { width: 45px; text-align: right; padding-right: 5px; }
.add-item { cursor: pointer; }
.subtract-item { cursor: pointer; }
</style>

</head>
<body >
    <span>상품가격 : </span><span id="item-price">20,000원</span>

	<div id="container" class="select_list">
		<ul>
			<li>
				<select id="option-13" class="nomore-option" name="option-13">
					<option value="">높이선택</option>
					<option value="100">200cm</option>
					<option value="200||+500">300cm(+500원)</option>
					<option value="300||+1000">400cm(+1,000원)</option>
				</select>
			</li>
		</ul>
		<ul id="selected-result">
		</ul>
		<div id="total-price">총 금액 : <span></span></div>
		<input type="submit">
	</div>


<script>
$(document).ready(function() {
    $('#container li select').change(function() {
        if(!$(this).hasClass('nomore-option')) {
            var val = $(this).val();
            var str = $(this).attr('id').split('-');
            var id = str[0] + '-' + str[1].substr(0, 1);
 
            var val = $(this).val();
            var idx = $('select[id^=' + id + ']').index($(this));
 
            if(val == '') {
                var $el = $('select[id^=' + id + ']:gt(' + idx + ')');
 
                $el.val('');
                $el.attr('disabled', true);
            } else {
                var $el = $('select[id^=' + id + ']:gt(' + idx + ')');
 
                $el.val('');
                $el.attr('disabled', true);
 
                $el.each(function() {
                    if($(this).is(':disabled')) {
                        $(this).attr('disabled', false);
                        return false;
                    }
                });
            }
        }
    });
 
    $('#container li select.nomore-option').change(function() {
        if($(this).hasClass('nomore-option')) {
            var str = $(this).attr('id').split("-");
            var id = str[0] + '-' + str[1].substr(0, 1);
            optionDisplay(id);
        }
    });
 
    // 상품개수증가
    $('span.add-item').live('click', function() {
        var $cntinput = $(this).closest('li').find('#itemcount');
        var count = parseInt($cntinput.val());
        count++;
 
        $cntinput.val(count);
 
        calculatePrice();
    });
 
    // 상품개수감소
    $('span.subtract-item').live('click', function() {
        var $cntinput = $(this).closest('li').find('#itemcount');
        var count = parseInt($cntinput.val());
        count--;
 
        if(count < 1) {
            alert('상품개수는 1이상 입력해 주십시오.');
            count = 1;
        }
 
        $cntinput.val(count);
 
        calculatePrice();
    });
 
    // 선택옵션삭제
    $('span.option-delete').live('click', function() {
        $(this).closest('li').remove();
 
        var resultcount = $('ul#selected-result li').size();
        if(resultcount < 1) {
            $('ul#selected-result').css('display', 'none');
            $('#total-price').css('display', 'none');
        }
 
        calculatePrice();
    });
});
 
function optionDisplay(id)
{
    var option = "";
    var sep = "";
    var optionval = "";
    var optionprc = "";
    var optionprice = "";
    var optionid = "";
    var optionadd = false;
	var optiontext ="";

    if($('ul#selected-result').is(':hidden')) {
        $('ul#selected-result').css('display', 'block');
        $('#total-price').css('display', 'block');
    }
 
    $('#container li select[id^=' + id + ']').each(function() {
        var str = $(this).val().split('||');
		optionval = str[0];
        if(str[1] == undefined) {
            optionprc = "0";
        } else {
            optionprc = str[1];
        }
        optionid = $(this).attr('id');
        optiontext=$("#option-13 option:selected").text();
        if(optionval == '') {
            optionadd = true;
            return false;
        }
		//optiontext=option.text();
        option += sep + '<span class="selected-' + optionid + '">' + optionval + '</span>';
        optionprice += '<span class="price-value">' + optionprc + '</span>';
 
        sep = "/";
    });
 
    // 선택된 옵션체크
    $('ul#selected-result li span.selected-value').each(function() {
        var oldoption = $(this).html();
 
        if(oldoption == option) {
            alert('이미 선택된 옵션입니다.');
            optionadd = true;
            return false;
        }
    });
 
    if(!optionadd) {
        var resultcount = $('ul#selected-result li').size();
        var optioncontent = '<li><span class="selected-value">' + option + '</span><span class="option-price">' + optionprice + '</span><span class="item-count"> <input type="text" id="itemcount" name="itemcount[]" value="1" /></span><span class="add-item"> + </span><span class="subtract-item"> - </span><span class="option-delete"> 삭제</span><input type="text" name="product_idx[]" value="'+optiontext+'"/></li>';
 
        if(resultcount > 0) {
            $('ul#selected-result li:last').after(optioncontent);
        } else {
            $('ul#selected-result').html(optioncontent);
        }
 
        calculatePrice();
    }
}
 
function calculatePrice()
{
    var totalprice = 0;
    var itemprice = parseInt($('span#item-price').text().replace(/[^0-9]/g, ''));
 
    $('ul#selected-result li').each(function() {
        var $prcelmt = $(this).find('.price-value');
        var optprc = 0;
        var itcnt = parseInt($(this).find('#itemcount').val());
 
        $prcelmt.each(function() {
            var prc = parseInt($(this).text());
            optprc += prc;
        });
 
        totalprice += (itemprice + optprc) * itcnt;
    });
 
    $('#total-price span').text(number_format(totalprice) + '원');
}
 
function number_format(input){
    var input = String(input);
    var reg = /(-?d+)(d{3})($|.d+)/;
    if(reg.test(input)){
        return input.replace(reg, function(str, p1,p2,p3){
                return number_format(p1) + "," + p2 + "" + p3;
            }
        );
    }else{
        return input;
    }
}
</script>
</body>
</html>