$(function(){

	$(".act_text").mCustomScrollbar({
		theme:"3d-thick", // 設定捲軸樣式
		setWidth: 687, // 設定寬度
		setHeight: 520,  // 設定高度
	});

	$("#myform").validate();
});

$(window).scroll(function(){
	if($(window).scrollTop() >= 300){
		$('.banner_img').css({position:'absolute',top:300});
	}else{
		$('.banner_img').css({position:'fixed',top:100});
	}
	// console.log($(window).scrollTop());
});

var str = '';
var filename = '';
var p_num = '';
var des = '';
var base_url = $('base').attr('href');
// 上傳圖片到暫存資料夾並預覽圖片

$('#fileupload').fileupload({
	dataType: 'json',
	done: function (e, data) {
		var imgurl = $(this).data('url');
		$.each(data.result.files, function (index, file) {
			$('.upload_file_see').css({background:'url()'});
			filename = file.name
			str = imgurl+'files/'+filename;
			// console.log(str);
			var canvas = document.getElementById("myCanvas");
			var context = canvas.getContext("2d");
			var img = new Image();
			img.onload = function(){
				context.drawImage(img, 0, 0, 205, 205);
			};
			img.src = str;
		});
	}
});
var aa = new Array();
aa[0] = ["請選擇參賽錶款名稱"];
aa[1] = [];
aa[2] = [];
var bb = new Array();
bb[0] = [''];
bb[1] = [];
bb[2] = [];
//load出男錶女錶的所有商品名稱放進aa陣列中，貨號放進bb陣列中當value
$.get('activity_list/loadProductSelect', {p_cate:1}, function(data){
	for(var i = 0; i < data.length; i++){
		aa[1].push(data[i]['name']);
		bb[1].push(data[i]['pic_num']);
	}
}, 'json');
$.get('activity_list/loadProductSelect', {p_cate:2}, function(data){
	for(var i = 0; i < data.length; i++){
		aa[2].push(data[i]['name']);
		bb[2].push(data[i]['pic_num']);
	}
}, 'json');

$('.act_am').click(function(){
	$('.act_lt').fadeIn();
})

$('.act_vote, .act_post_img').click(function(){
	$('.act_lt').fadeOut();
})

$('.act_vote').click(function(){
	$('html, body').stop(true,false).animate({scrollTop:880},1500,'easeInOutBack');
})

$('.act_upload, .act_post_img').click(function(){
	// location.href = "upload.php";
	var sid = $('.step1_next').data('sid');
	if(sid != ''){
		$('.act_ul').fadeIn();
	}else{
		alert('請先登入會員');
	}
})
var v = 0;
var act_tmp = $('#act_tmp').text();
var act_tmp_fnc = _.template(act_tmp);
// console.log(base_url);


var loadmore = function(button){
	var pc = $('.act_img_area');
	button = button ? button : 0;
	$.post('activity_list/loadmore', {button:button}, function(data){
		for(var i=0; i<data.data.length; i++) {
			pc.append( act_tmp_fnc(data.data[i]) );
			$('.act_img_place').fadeIn(1000);
		}
		if(data.maxMore == 1 || v >= data.maxMore){
			//判斷還有沒有資料，沒有就不用顯示MORE按鈕
			$('#btn').hide();
		}
	}, 'json');
}
loadmore(v);
$('#btn').click(function(){
	loadmore(++v);
})

// 上傳換頁
var up1 = $('.upload_content1') ;
var up2 = $('.upload_content2') ;
var up3 = $('.upload_content3') ;
var ball1 = $('.ball1') ;
var ball2 = $('.ball2') ;
var ball3 = $('.ball3') ;
var ball4 = $('.ball4') ;
var ball5 = $('.ball5') ;
var ball6 = $('.ball6') ;
var ball7 = $('.ball7') ;
var ball8 = $('.ball8') ;
var ball9 = $('.ball9') ;
var step_text1 = $('.step_text1');
var step_text2 = $('.step_text2');
var step_text3 = $('.step_text3');
var step1_next = $('.step1_next');
var step2_prev = $('.step2_prev');
var step2_next = $('.step2_next');
var step3_prev = $('.step3_prev');
var step3_over = $('.step3_over');

$('.step1_next').click(function(){
	//拿到選擇的商品貨號
	p_num = $('.upload2_product').val();
	//拿到說明文字
	des = $('.upload2_pic_des').val();
	// console.log(des+'+');
	// console.log(p_num);
	if(str == ''){
		alert('請選擇上傳圖片');
	}else if(p_num == ''){
		alert('請選擇參賽錶款');
	}else if(des == ''){
		alert('請輸入相片敘述');
	}else{			
		up1.addClass('hide');
		up2.removeClass('hide');
		up3.addClass('hide');
		step_text1.addClass('hide');
		step_text2.removeClass('hide');
		step_text3.addClass('hide');
		ball1.css({color:'#bebebe'});
		ball2.css({'background-color':'#e8e8e8'});
		ball3.css({'background-color':'#bc5e6a'});
		ball4.css({'background-color':'#ab1729'});
		ball5.css({color:'#ab1729'});
		ball6.css({'background-color':'#ab1729'});
		ball7.css({'background-color':'#bc5e6a'});
		ball8.css({'background-color':'#e8e8e8'});
		ball9.css({color:'#bebebe'});
	}	
});

$('.step3_prev').click(function(){
	up1.removeClass('hide');
	up2.addClass('hide');
	step_text1.removeClass('hide');
	step_text2.addClass('hide');
	step_text3.addClass('hide');
	ball1.css({color:'#ab1729'});
	ball2.css({'background-color':'#ab1729'});
	ball3.css({'background-color':'#bc5e6a'});
	ball4.css({'background-color':'#e8e8e8'});
	ball5.css({color:'#bebebe'});
	ball6.css({'background-color':'#e8e8e8'});
	ball7.css({'background-color':'#e8e8e8'});
	ball8.css({'background-color':'#e8e8e8'});
	ball9.css({color:'#bebebe'});
	up2.addClass('hide');
	var c=document.getElementById("myCanvas");
	var ctx=c.getContext("2d");
	$('.upload_file_see').css({background:"url('assets/images/activity/upload.png') 37px center no-repeat"});
	ctx.clearRect(0,0,205,205);	
	str = '';
	des = '';
	p_num = '';
})
$('.act_close_box').click(function(){
	if(confirm('是否確定要放棄參賽?')){
		$('.act_ul').fadeOut(close);
	}		
});
$('.act_close').click(function(){
	$('.act_lt').fadeOut(close);
});

$(window).scroll(function(){
	var _STW = $(window).scrollTop();
	var a = _STW/20;
	var o = 1-(a/35);
	// console.log(_STW);

	if (_STW >= 0 && _STW < 800) {
		$('.act_banner02').css({top: (92-a)+'%', 'opacity':o});
		$('.act_banner03').css({top:(73+a)+'%', 'opacity':o});
	}else{
		$('.act_banner02').css({top: '92%'});
	}	
});

function close(){
	up1.removeClass('hide');
	step_text1.removeClass('hide');
	step_text2.addClass('hide');
	step_text3.addClass('hide');
	ball1.css({color:'#ab1729'});
	ball2.css({'background-color':'#ab1729'});
	ball3.css({'background-color':'#bc5e6a'});
	ball4.css({'background-color':'#e8e8e8'});
	ball5.css({color:'#bebebe'});
	ball6.css({'background-color':'#e8e8e8'});
	ball7.css({'background-color':'#e8e8e8'});
	ball8.css({'background-color':'#e8e8e8'});
	ball9.css({color:'#bebebe'});
	up2.addClass('hide');	
	var c=document.getElementById("myCanvas");
	var ctx=c.getContext("2d");
	$('.upload_file_see').css({background:"url('assets/images/activity/upload.png') 37px center no-repeat"});
	ctx.clearRect(0,0,205,205);	
	str = '';
	des = '';
	p_num = '';
}
function click_finish(){
	var mobile = $('.contact_mobile').val();
	var address = $('.contact_address').val();
	var check = $('input:checkbox[name="checkbox"]:checked').val();
	if(mobile != '' && address != ''){
		if(check == 'on'){
			if(confirm('確認後將無法修改資料，請問是否確定已完成?')){
				$.post("activity_list/uploadimg", {tmp_file:str, filename:filename, p_num:p_num, des:des, mobile:mobile, address:address}, function(data){
					alert('恭喜您上傳完成，待審核通過後將成功參賽並獲得抽獎資格!');
					$('.act_ul').fadeOut(close);
					return true;
				}, 'json')			
			}else{
				return false;
			}
		}else{
			alert('需勾選同意隱私權政策及使用相關規定');
			return false;
		}
	}else{
		alert('請輸入聯絡資料');
		return false;
	}
}
var renew = function(index){	
	for(var i = 0; i < aa[index].length; i++){
		document.upload2_form1.upload2_product1.options[i]=new Option(aa[index][i], bb[index][i]);
	}
		document.upload2_form1.upload2_product1.length=aa[index].length;	
	p_num = '';
}