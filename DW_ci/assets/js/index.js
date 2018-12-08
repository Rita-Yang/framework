$(function(){

    // 首頁slider
    var $banner_img = $('.banner-img');
    var $btn_banner = $('.btn-banner span');
    var _imgWidth = 100;//banner圖片寬度
    var c = 0;

    $btn_banner.click(function(){
        var i = $(this).index();
        $(this).css({'background-color':'#fff'}).siblings().css({'background-color':'transparent'});
        $banner_img.css({'marginLeft': (-1)*_imgWidth*i + 'vw'});
    });
    var index = 1;
    function autoPlay(){
        if(index < 3){
            $btn_banner.eq(index).css({'background-color':'#fff'}).siblings().css({'background-color':'transparent'});
            $banner_img.css({'marginLeft': (-1)*_imgWidth*index + 'vw'});
        }else{
            index = 0;
            $btn_banner.eq(index).css({'background-color':'#fff'}).siblings().css({'background-color':'transparent'});
            $banner_img.css({'marginLeft': (-1)*_imgWidth*index + 'vw'});
        }
        index++;
    }
    setInterval(autoPlay, 25000);
    
});