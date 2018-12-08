$(window).scroll(function(){
		var _STW = $(window).scrollTop();
		var a = _STW/10;
		var b = (_STW-1300)/10;
		var c = (_STW-2600)/10;
		var d = (_STW-3900)/10;
		var e = (_STW-5200)/10;
		// console.log(_STW);

		if (_STW >= 0 && _STW < 1300) {
			$('.area1').css({'background':'url(assets/images/brand/brand1.jpg) 0 -'+a+'px fixed'});
			
		}else if(_STW >= 1300 && _STW < 1500) {
			$('.area1').css({'background':'url(assets/images/brand/brand1.jpg) 0 -'+a+'px fixed'});
			$('.area2').css({'background':'url(assets/images/brand/brand2.jpg) 0 -'+b+'px fixed'});
			
		}else if(_STW >= 1500 && _STW < 2600) {
			$('.area2').css({'background':'url(assets/images/brand/brand2.jpg) 0 -'+b+'px fixed'});
		}else if(_STW >= 2600 && _STW < 2800) {
			$('.area2').css({'background':'url(assets/images/brand/brand2.jpg) 0 -'+b+'px fixed'});
			$('.area3').css({'background':'url(assets/images/brand/brand3.jpg) 0 -'+c+'px fixed'});
		}else if(_STW >= 2800 && _STW < 3900) {
			$('.area3').css({'background':'url(assets/images/brand/brand3.jpg) 0 -'+c+'px fixed'});
		}else if(_STW >= 3900 && _STW < 4100) {
			$('.area3').css({'background':'url(assets/images/brand/brand3.jpg) 0 -'+c+'px fixed'});
			$('.area4').css({'background':'url(assets/images/brand/brand4.jpg) 0 -'+d+'px fixed'});
		}else if(_STW >= 4100 && _STW < 5200) {
			$('.area4').css({'background':'url(assets/images/brand/brand4.jpg) 0 -'+d+'px fixed'});
		}else if(_STW >= 5200 && _STW < 5400) {
			$('.area4').css({'background':'url(assets/images/brand/brand4.jpg) 0 -'+d+'px fixed'});
			$('.area5').css({'background':'url(assets/images/brand/brand5.jpg) 0 -'+e+'px fixed'});
		}else if(_STW >= 5400 && _STW < 6500) {
			$('.area5').css({'background':'url(assets/images/brand/brand5.jpg) 0 -'+e+'px fixed'});
		}

		if (_STW >= 1200 && _STW < 1400) {
		$('.h2-2').css({left:'16%'});
	}else if(_STW >= 2500 && _STW < 2800){
		$('.h2-3').css({left:'36%'});
	}else if(_STW >= 3800 && _STW < 4300){
		$('.h2-4').css({left:'24%'});
	}else if(_STW >= 5100 && _STW < 5300){
		$('.h2-5').css({left:'25%'});
	}else if(_STW >= 5300 && _STW < 5500){
		$('.sign').css({'opacity':1});
	}
})