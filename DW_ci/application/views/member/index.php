<link rel="stylesheet" href="assets/css/member.css">
<div class="container">
	<form name="m_form" id="m_form" method="post" onsubmit="return checkAll()">
		<div class="member">		
			<table class="m_tb">
				<tr><td colspan="2" align="center"><h2>會員資料修改</h2></td></tr>
				<tr>
					<td align="right" nowrap="nowrap"><label for="name">姓名</label></td>
					<td><input type="text" name="name" id="name" class="ableinput1" value="<?= $row['name']; ?>"></input></td>					
				</tr>
				<tr>
					<td align="right" nowrap="nowrap"><label for="email">Email(帳號)</label></td>
					<td><input type="text" name="email" id="email" class="disableinput" value="<?= $row['email']; ?>" readonly></input></td>
				</tr>
				<tr>
					<td align="right" nowrap="nowrap"><label for="pwd">新密碼</label></td>
					<td><input type="password" name="pwd" id="pwd" class="ableinput2"></input><span id="hint">密碼不可少於6碼</span></td>					
				</tr>
				<tr>
					<td align="right" nowrap="nowrap"><label for="c_pwd">確認密碼</label></td>
					<td><input type="password" name="c_pwd" id="c_pwd" class="ableinput2"></input><span id="chint">與上層欄位不同</span></td>
				</tr>
				<tr>
					<td align="right" nowrap="nowrap">性別</td>
					<td>
						<input type="radio" name="gender" value="M" <?php if($row['gender'] == 'M'){echo 'checked="checked"';} ?>></input><label for="male">男</label>
						<input type="radio" name="gender" value="F" <?php if($row['gender'] == 'F'){echo 'checked="checked"';} ?>></input><label for="female">女</label>
					</td>
				</tr>
				<tr>
					<td align="right" nowrap="nowrap"><label for="birth">生日</label></td>
					<td><input type="text" name="birth" id="birth" class="ableinput1" value="<?= $row['birthday']; ?>" readonly></input></td>
				</tr>
				<tr>
					<td align="right" nowrap="nowrap"><label for="mobile">*電話</label></td>
					<td><input type="text" name="mobile" id="mobile" class="ableinput2 required digits" value="<?= $row['mobile']; ?>"></input></td>
				</tr>
				<tr>
					<td align="right" nowrap="nowrap"><label for="address">*地址</label></td>
					<td><input type="text" name="address" id="address" class="ableinput2 required" value="<?= $row['address']; ?>"></input></td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" id="btn" value="確認修改"></input></td>			
				</tr>
			</table>
		</div>
	</form>
<!-- 左邊錶帶標籤 -->
	<div data-nowpage="<?= $page ?>" class="p_left_band">		
		<div data-page="index" class="btn-cate">
			<div class="nsub">會員修改</div>
			<img src="assets/images/article/belt-1.png">
		</div>
		<div data-page="order_list" class="btn-cate">
			<div class="nsub">訂單查詢</div>
			<img src="assets/images/article/belt-2.png">
		</div>
		<div data-page="activity_manage" class="btn-cate">
			<div class="nsub">活動追蹤</div>
			<img src="assets/images/article/belt-3.png">
		</div>
		<div data-page="logout" class="btn-cate">
			<div class="nsub">會員登出</div>
			<img src="assets/images/article/belt-4.png">
		</div>
	</div>		
	<div class="area120"></div>
</div>
<script src="assets/js/jquery.validate.js" type="text/javascript"></script>