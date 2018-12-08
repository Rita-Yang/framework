<link rel="stylesheet" href="assets/css/activity_inner.css">
<div class="container">
<!-- 麵包屑 -->
<div class="p_path"><a href="index">首頁</a> > <a href="activity_list">活動專區</a> > <a>第 <?= $row['sid'] ?> 號參賽者</a></div>

	<div class="act_left">
		<div class="upload_img">
				<div class="act_img"><img src="assets/images/upload/<?= $row['act_img_path'] ?>" alt=""></div>
			
		</div>
	</div>

	<div class="act_right">
		<div class="act_con">
			
			<div class="member"><?= $row['mname'] ?></div>
			<div class="content"><?= $row['act_description'] ?></div>
		</div>
		<a href="#" class="shareF">
			<img src="assets/images/iconF.png">
		</a>
		<a href="#" class="shareT">
			<img src="assets/images/iconT.png">
		</a>
		<div class="act_votes_num">
			<img src="assets/images/article/belt-1.png" alt="">
			<p><?= $row['act_votes'] ?>票</p>
			
		</div>
		<div class="act_p">
			<a href="product/product/<?= $row['s_category'] ?>/<?= $row['psid'] ?>">
				<img src="assets/images/product/middle/<?= $row['act_p_num'] ?>.png" alt="">
			</a>
			<div class="act_p_name"><?= $row['pname'] ?></div>
		</div>
		
		
		<!-- <a href="#" class="btn_share">分享此篇文章</a> -->
		<div class="btn_vote" data-sid="<?= $row['sid']; ?>" memberid="<?php if(isset($user)){ echo $user; }else{echo "0";} ?>">我要投他</div>	
	</div>

</div>