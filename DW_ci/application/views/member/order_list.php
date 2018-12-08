<link rel="stylesheet" href="css/order_list.css">

<div class="container">
	<div class="order_form_content">
		<div class="order_form_area">
			<table class="order_form_table" cellspacing="0" cellpadding="0" style="line-height: 2.5vw">
				<tr class="order_form_tr1">
					<td width="20%">訂單編號</td>
					<td width="15%">訂購日期</td>
					<td width="15%">訂單金額</td>
					<td width="15%">付款方式</td>
					<td width="15%">發票資訊</td>					
					<td width="20%">訂單問答</td>
				</tr>
				<?php
					$i = 0;
				 	while($row = $result2->fetch_assoc()){
					$i++;
				?>
				<tr class="order_form_tr<?php if($num == $i){echo " order_form_tr_last";}?>">
					<td><span class="order_detail"><?= $row['order_id'] ?></span></td>
					<td><?= $row['o_date'] ?></td>
					<td><?= $row['o_amount'] ?></td>
					<td><?php 
							$sql = "SELECT * FROM payment WHERE sid = {$row['pay_sid']}"; 
							$result3 = $mysqli->query($sql);
							$payrow = $result3->fetch_assoc();
							echo $payrow['payment_method'];
							if($row['pay_sid'] == 2){
								echo "<br/>(".$row['ibon_num'].")";
							}
						?></td>
					<td><?= $row['invoice'] ?><?php if(!empty($row['three_num'])){?><br/>(<?= $row['three_num']?>) <?php } ?></td>
					<td><div class="orderask"><img src="images/ask.png" class="fa fa-envelope-o" data-order="<?= $row['order_id']; ?>"></div></td>
				</tr>
				<tr><td class="show_detail_td" colspan="6">
				<div class="show_detail_box">
					<table class="show_order_detail" cellspacing="0"></table>
					<table class="notice" cellspacing="0">
						<tr><td align="center">備註</td></tr>
						<tr><td align="left"><?php 
							$sql = "SELECT * FROM orders WHERE order_id = '{$row['order_id']}'";
							$notice = $mysqli->query($sql);
							$row = $notice->fetch_assoc();
							echo $row['o_notice'];
						 ?></td></tr>
					</table>
				</div></td></tr>
				<?php }?>
			</table>
		</div>
	</div>
	<div class="order_form_center">
        <ul class="order_form_pagination">
            <li><a href="?pageNum=1" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
              	<?php
	              	for($i = $pageNum - 3; $i <= $pageNum + 3; $i++):
	                	if($i >= 1 && $i <= $totalPages):
		                	$active = $i == $pageNum ? 'active' : '';
		                	$href = $i == $pageNum ? '' : 'href="?pageNum='.$i.'"' ;
		                	printf('<li class="%s"><a %s>%s</a></li>', $active, $href, $i, $i);
	                  	endif;
	              	endfor;
              	?>
            <li><a href="?pageNum=<?= $totalPages ?>" aria-label="Next"><span aria-hidden="true">»</span></a></li>
        </ul>
    </div>
    <!-- 左邊錶帶標籤 -->
	<div data-nowpage="<?= $_SESSION['page'] ?>" class="p_left_band">		
		<div data-page="member_list" class="btn-cate">
			<div class="nsub">會員修改</div>
			<img src="images/article/belt-1.png">
		</div>
		<div data-page="order_form" class="btn-cate">
			<div class="nsub">訂單查詢</div>
			<img src="images/article/belt-2.png">
		</div>
		<div data-page="activity_manage" class="btn-cate">
			<div class="nsub">活動追蹤</div>
			<img src="images/article/belt-3.png">
		</div>
		<div data-page="logout" class="btn-cate">
			<div class="nsub">會員登出</div>
			<img src="images/article/belt-4.png">
		</div>
	</div>			
	<div class="area120"></div>
</div>

<!-- 燈箱 -->
<div class="order_form_lt">
	<form action="" method="post">
		<div class="order_form_lightbox">
			<!-- <div class="order_form_number"><input type="hidden" name="order_input"></input>[訂單編號]<span class="order_number"></span></div> --><br>
			<div class="order_form_ask">
				<div class="order_form_title">標題：</div><input class="order_form_input ipt1" id="order_input" name="order_input" readonly></input><br>
			</div>
			<?php 
			 $sql="SELECT * FROM members WHERE sid = {$_SESSION['user']['sid']}";
					$memberemail = $mysqli->query($sql);
					$emailrow = $memberemail->fetch_assoc(); ?>

			<div class="order_form_ask">
				<div>會員帳號：</div><input class="order_form_input ipt2" type="text" name="subject" value="<?= $emailrow['email'] ?>" readonly><br>
			</div>
			<div class="order_form_ask">
				<div class="order_form_msg">留言內容：</div><textarea name="textbody" class="order_form_input ipt3" rows="10"></textarea>
				<input type="submit" class="btn-email" name="Send" value="寄出">
			</div>
			<div class="order_form_backimg"><img src="images/order_ask.jpg"></div>
			<div class="order_form_xx"><!-- <i class="fa fa-times"></i> --><img class="order_close_icon" src="images/close.png"></div>
		</div>
	</form>
</div>