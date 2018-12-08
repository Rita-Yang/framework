	<div class="follow">
		<div class="band_left">
			<img class="beltimg" src="">
			<div class="icon">
			<a rel="external" target="_blank" href="https://www.facebook.com/danielwellingtonofficial">
				<img src="assets/images/f-icon.png" alt="">
			</a>
			<a rel="external" target="_blank" href="https://www.instagram.com/danielwellington/">
			<img src="assets/images/i-icon.png" alt="">
			</a>
			<a rel="external" target="_blank" href="https://www.pinterest.com/itisDW/">
			<img src="assets/images/p-icon.png" alt="">
			</a>
			<a rel="external" target="_blank" href="https://twitter.com/itisDW">
			<img src="assets/images/t-icon.png" alt="">
			</a>
			<a rel="external" target="_blank" href="https://plus.google.com/+Danielwellingtonwatches/posts">
			<img src="assets/images/g-icon.png" alt="">
			</a>
		</div>
		</div>
		
	</div>
		<div class="act_goTop"><img src="assets/images/activity/top.png"></div>
		<div class="area120 indexNoArea">&nbsp;</div>
	<footer>
		<div class="bottom2">
			<div class="footin">
				<div class="footmenu">
					<a rel="external" href="FAQ.php">常見問題&nbsp;FAQ</a>｜
					<a rel="external" href="ContactUs.php">聯絡我們</a>
				</div>
				<div class="copyright">Copyright 2016 Daniel Wellington all right reserved</div>
			</div>
		</div>
	</footer>
<script src="assets/js/underscore.js"></script>
<script type="text/javascript">	
	$(function(){

		if(menupage == 'order_form' || $('.pcate_box').data('scate') == 2 || $('.p_pic_box').data('scate') == 2
		 || $('.product_list').data('ncate') == 2 || $('.a_content').data('ncate') == 2){
			$('.beltimg').attr('src','assets/images/product/belt-02.png');
		}else if(menupage == 'activity_manage' || $('.pcate_box').data('scate') == 3
		 || $('.p_pic_box').data('scate') == 3 || $('.product_list').data('ncate') == 3 || $('.a_content').data('ncate') == 3){
			$('.beltimg').attr('src','assets/images/product/belt-03.png');
		}else if( $('.pcate_box').data('scate') == 4 || $('.p_pic_box').data('scate') == 4
		 || $('.product_list').data('ncate') == 4 || $('.a_content').data('ncate') == 4){
			$('.beltimg').attr('src','assets/images/product/belt-04.png');
		}else if($('.pcate_box').data('scate') == 5 || $('.p_pic_box').data('scate') == 5
		 || $('.product_list').data('ncate') == 5 || $('.a_content').data('ncate') == 5){
			$('.beltimg').attr('src','assets/images/product/belt-05.png');
		}else {
			$('.beltimg').attr('src','assets/images/product/belt-01.png');
		}
		$('.beltimg').fadeIn(200, function(){
			$('.p_left_band').fadeIn(200);
		});	
		 
	});

	//加入購物車商品數量
    var countTotal = function(obj){
        var totalItems = 0;
        if(!obj) {
            $.get('add_to_cart.php', function(data){

                for(var s in data) {
                    totalItems += data[s][2];
                    if(data[s][3]){
                    	for(var add in data[s][3]){
                    		totalItems++;
                    	}
                    }
                }
                $('.badge').text(totalItems);
            }, 'json');
        } else {
            data = obj;
            for(var s in data) {
                totalItems += data[s][2];
                if(data[s][3]){
                    	for(var add in data[s][3]){
                    		totalItems++;
                	}
                }
            }
            $('.badge').text(totalItems);
        }
    };
    // countTotal();

	var menupage = $('.menu').data('menupage');
	if(menupage == 'brand'){
		$('.menu ul li').eq(0).css({transition:'0s', backgroundPosition: 'center 45px'}).siblings().css({transition:'0s', backgroundPosition: 'center 100px'});
	}else if(menupage == 'activity'){
		$('.menu ul li').eq(1).css({transition:'0s', backgroundPosition: 'center 45px'}).siblings().css({transition:'0s', backgroundPosition: 'center 100px'});
	}else if(menupage == 'product'){
		$('.menu ul li').eq(2).css({transition:'0s', backgroundPosition: 'center 45px'}).siblings().css({transition:'0s', backgroundPosition: 'center 100px'});
	}else if(menupage == 'article'){
		$('.menu ul li').eq(3).css({transition:'0s', backgroundPosition: 'center 45px'}).siblings().css({transition:'0s', backgroundPosition: 'center 100px'});
	}else if(menupage == 'store'){
		$('.menu ul li').eq(4).css({transition:'0s', backgroundPosition: 'center 45px'}).siblings().css({transition:'0s', backgroundPosition: 'center 100px'});
	}else if(menupage == 'login' || menupage == 'register'){
		$('.menu ul li').eq(5).css({transition:'0s', backgroundPosition: 'center 45px'}).siblings().css({transition:'0s', backgroundPosition: 'center 100px'});
	}

    $('.menu ul li').hover(function(){
    	$(this).css({transition:'.3s', backgroundPosition: 'center 45px'});
    }, function(){
    	var page = $(this).data('hh');
    	if(page != 'member'){
	    	if(page != menupage){
				$(this).css({transition:'.3s', backgroundPosition: 'center 100px'});
			}
		}
    });

    $('#member_list').hover(function(){
    	$(this).find('img').attr('src','assets/images/menu/icon-user2.png');
    },function(){
    	$(this).find('img').attr('src','assets/images/menu/icon-user.png');
    });
    $('#cart_list').hover(function(){
    	$(this).find('img').attr('src','assets/images/menu/icon-cart2.png');
    },function(){
    	$(this).find('img').attr('src','assets/images/menu/icon-cart.png');
    });

    $(window).scroll(function(){
		var _STW = $(window).scrollTop();
		var a = _STW/20;
		var o = 1-(a/35);
		// console.log(_STW);

		if (_STW >= 0 && _STW < 800) {
			$('.act_banner02').css({top: (96-a)+'%'});
			$('.act_banner03').css({top:(73+a)+'%', 'opacity':o});
		}else{
			$('.act_banner02').css({top: '96%'});
		}

		if(_STW >= 800 && menupage != 'brand' ){
			$('.act_goTop').fadeIn(400);
		}else{
			$('.act_goTop').fadeOut(400);
		}
	})

	$('.follow .icon a').hover(function(){
		$(this).css({transform:'scale(1.1)'});
		// $(this).css({transform: 'rotate(0deg)', transition:'.3s'});
	}, function(){
		$(this).css({transform:'scale(1)'});
	});

    //GOTOP
	$('.act_goTop').click(function(){
		$('html, body').stop(true,false).animate({'scrollTop': 0},1300,'easeInOutCubic');
	})

</script>
<script src="assets/js/<?= $page ?>.js"></script>
</body>
</html>