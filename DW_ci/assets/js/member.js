$(function(){

	$("#m_form").validate();
	
	var nowpage = $('.p_left_band').data('nowpage');
	if(nowpage != 0){
		if(nowpage == 'member'){
			$('.btn-cate').eq(0).css({transition:'0s',marginLeft:'15%'}).siblings().css({marginLeft:0});
		}else if(nowpage == 'order_list'){
			$('.btn-cate').eq(1).css({transition:'0s',marginLeft:'15%'}).siblings().css({marginLeft:0});
		}else if(nowpage == 'activity_manage'){
			$('.btn-cate').eq(2).css({transition:'0s',marginLeft:'15%'}).siblings().css({marginLeft:0});
		}else{
			$('.btn-cate').eq(3).css({transition:'0s',marginLeft:'15%'}).siblings().css({marginLeft:0});
		}			
	}
	$('.btn-cate').click(function(){
		var page = $(this).data('page');
		location.href = "member/" + page;
	});
	$('.btn-cate').hover(function(){
		$(this).css({transition:'.3s',marginLeft:'15%'});
	},function(){
		var page = $(this).data('page');
		if(page == "index") page = "member";
		if(  page != nowpage){
			$(this).css({marginLeft:0});
		}
	});
	var pwd, cpwd; // 定義存放密碼和確認密碼欄位的變數
	var dd = new Date();
	var thisYear = dd.getFullYear();
	
	$( "#birth" ).datepicker({
		dateFormat : "yy-mm-dd",
		showOn: "button",
		buttonText: '選擇日期',
		changeYear : true,
		changeMonth : true,
		defaultDate : (new Date(new Date().getFullYear() - 30 + "/01/01") - new Date()) / (1000 * 60 * 60 * 24),
		yearRange: "1930:" + thisYear
	});		
	
	$('#btn').click(function(){
		pwd = document.getElementById('pwd').value; // 點擊確認修改按紐時將密碼欄位的值塞給變數pwd
		cpwd = document.getElementById('c_pwd').value; // 點擊確認修改按紐時將確認密碼欄位的值塞給變數cpwd
		if(pwd.length>0 && pwd.length<6){
			$('#hint').css({display:'inline-block'}); // 顯示密碼的警告提示
		}else{
			$('#hint').css({display:'none'}); // 隱藏密碼的警告提示
		}
		if(pwd != cpwd){ // 再判斷pwd字串與cpwd字串相同時
			$('#chint').css({display:'inline-block'}); // 顯示確認密碼的警告提示
		}else{
			$('#chint').css({display:'none'}); // 隱藏確認密碼的警告提示
		}
	});
	
});
function checkAll(){
	if((pwd.length>0 && pwd.length < 6) || pwd != cpwd || !myClick()){ 
	// 判斷當pwd字串長度少於6或pwd字串與cpwd字串不同時
		return false; // 回傳false不讓頁面跳轉
	}else{
		//密碼格式正確
		return true; // 回傳true讓頁面跳轉
	}			
}	
function myClick(){
	var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i; // EMAIL格式判斷
	var str = document.m_form.email.value;
	var bool = pattern.test(str);
	return bool;
}	