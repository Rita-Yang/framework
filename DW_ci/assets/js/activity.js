var sid = parseInt($('.btn_vote').data('sid'));
var member_id = parseInt($('.btn_vote').attr('memberid'));

$('.btn_vote').click(function(){	
    if(member_id > 0){
        if(confirm('是否確定投票?')){
            $.post("addvote.php", {sid:sid,member_sid:member_id}, function(data){				
                var isvote = parseInt(data.isvote);
                var votes = parseInt(data.votes);
                console.log(isvote);
                if(isvote == 0){
                    alert('感謝您的投票!');
                    location.href = "activity.php?act_id=" + sid;
                }else{
                    if(votes > 0){
                        alert('請勿對同一張圖片進行重複投票，您還剩' + votes + '票可前往其他頁面投票哦!');
                    }else{
                        alert('您的剩餘票數已投完，無法再進行投票');
                    }
                }
            }, 'json');
        }
    }else{
        alert('您尚未登入，請登入後再進行投票!');
    }
});