var x, y, z, email;
$(document).ready(function(){

	$('#login').click(function(){
		$l_pwd = document.getElementById("l_pwd").value;
		if($l_pwd.length < 6){
			$('.pwd1').css({'display': 'inline-block'});
			return false;
		}else{
			$('.pwd1').css({'display': 'none'});
		}
	})

// 切換登入註冊頁
	$('.change_to_rg').click(function(){
		$('.login_bg').css({'background-image':'url(assets/images/loginRegister/registerback.jpg)'});
		$('.login_area').addClass('flip_lg');
		$('.register_area').addClass('flip_rg');

	})
	$('.change_to_lg').click(function(){
		$('.login_bg').css({'background-image':'url(assets/images/loginRegister/loginback.jpg)'});
		$('.login_area').removeClass('flip_lg');
		$('.register_area').removeClass('flip_rg');

	})


// 串註冊

	var $pwd = document.form1.r_pwd.value;
	var $cpwd = document.form1.r_cpwd.value;

	$('#login').click(function(){
		$pwd = document.getElementById("pwd").value;
		if($pwd.length < 6){
			$('.pwd1').css({'display': 'inline-block'});
			return false;
		}else{
			$('.pwd1').css({'display': 'none'});
		}
	})

	$('#join').click(function(){
		x = document.getElementById("r_pwd").value;
		y = document.getElementById("r_cpwd").value;
		email = document.forms[1].r_email.value;
		if(x.length == 0){
			$('.havetopwd').css({'display': 'inline-block'});
			$('.r_pwd1').css({'display': 'none'});
		}else{
			$('.havetopwd').css({'display': 'none'});
			if(x.length < 6){//判斷密碼是否少於六碼
			$('.r_pwd1').css({'display': 'inline-block'});//若少於六碼，則顯示警告文字
			}else{
			$('.r_pwd1').css({'display': 'none'});//若無少於六碼，則無警告
			}
		}
		if(y.length == 0){
			$('.havetocpwd').css({'display': 'inline-block'});
			$('.r_cpwd2').css({'display': 'none'});
		}else{
			if(y != x){//判斷確認密碼是否與密碼設定相同
			$('.r_cpwd2').css({'display': 'inline-block'});//若是不同，則顯示警告文字
			$('.havetocpwd').css({'display': 'none'});
			}else{
			$('.r_cpwd2').css({'display': 'none'});//若是相同，則無警告
			}
		}
		

	})
	
})	

function myClick(){

    if(!myclick1(email) || x.length < 6 || y != x){//判斷Email格式、密碼是否少於六碼或確認密碼是否與密碼相同
        return false;//若有其中一個錯誤，則不成功加入會員
    }else{
        return true;//若皆正確，則成功加入會員
    }
    
}

function myclick1(str){
    var pattern = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    var bool;
    var ar = ['<?php echo join("\", \"", $array); ?>']; //把PHP陣列傳給JS陣列
    if(str.length == 0){//判斷是否填寫
        $('.havetomail').css({'display': 'inline-block'});
        $('.r_mail').css({'display': 'none'});
        bool = false;
    }else{
        $('.havetomail').css({'display': 'none'});
        bool = pattern.test(str);//偵測Email格式是否正確
        if(bool){
            $('.r_mail').css({'display': 'none'});
            for(var i = 0; i < ar.length; i++){ 
                if(str == ar[i]){ //判斷帳號是否重複
                    bool = false;
                    $('.isrepeat').css({'display': 'inline-block'});
                    break;
                }else{
                    $('.isrepeat').css({'display': 'none'});
                }
            }
        }else{
            $('.r_mail').css({'display': 'inline-block'});
        }

    }
    return bool;
}	

$('.login_input, .register_input').click(function(){
    $(this).addClass('active');
    $(this).parent().parent().siblings().children().children().removeClass('active');
})
$('.login_btn, .register_btn').click(function(){
    $('.login_input, .register_input').removeClass('active');
})
