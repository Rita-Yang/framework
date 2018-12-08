<link rel="stylesheet" href="assets/css/login.css">
<div class="login_bg">
	<div class="container login_bg_img">
		<div class="login_area">
		<div class="don1"></div>
			<h2 class="login_h2">會員登入</h2>
			<form name="form" method="post">
				<table class="login_tb">
					<tr>
						<td><input class="login_input" type="text" name="l_email" id="l_email" placeholder="請輸入帳號 email"></td>
					</tr>
					<tr>
						<td>
						<input class="login_input" type="password" name="l_pwd" id="l_pwd" placeholder="請輸入密碼">
						<span class="pwd1">密碼不可少於六碼</span>
						</td>
					</tr>
					<tr>
						<td align="center"><input class="login_btn" type="submit" value="登入" id="login"></td>
					</tr>
				</table>
			</form>
			
			<div class="change_to_rg">註冊<div class='loader-ring-light'></div></div>
		</div>
		<div class="register_area">
			<div class="don2"></div>
			<h2 class="register_h2">註冊會員</h2>
			<form name="form1" method="post" onsubmit="return myClick()">
				<table class="register_tb">
				    <tr>
				        <td><input class="register_input" type="text" name="r_name" id="name" placeholder="請輸入真實姓名"></td>
				    </tr>
				    <tr>
				        <td>
				        	<input class="register_input" type="text" name="r_email" id="r_email" placeholder="請輸入email帳號">
					        <span class="r_mail">格式錯誤</span>
					        <span class="havetomail">此為必填欄位</span>
					        <span class="isrepeat">此Email(帳號)已存在!</span>
				        </td>
				    </tr>
				    <tr>
				        <td>
				        	<input class="register_input" type="password" name="r_pwd" id="r_pwd" placeholder="密碼請多於六個字元">
					        <span class="r_pwd1">密碼不可少於六個字元</span>
					        <span class="havetopwd">此為必填欄位</span>
				        </td>
				    </tr>
				    <tr>
				        <td>
				        	<input class="register_input" type="password" name="r_cpwd" id="r_cpwd" placeholder="請再次輸入密碼">
					        <span class="r_cpwd1">確認密碼不可少於六個字元</span>
					        <span class="r_cpwd2">與上方設定的密碼不同！</span>
					        <span class="havetocpwd">此為必填欄位</span></td>
				    </tr>
				    <tr>
				    	<td align="center"><input class="register_btn" type="submit" value="加入會員" name="join" id="join"></td>
				    </tr>
				</table>
			</form>
			<a class="change_to_lg">登入<div class='loader-ring-light'></div></a>
		</div>
	</div>
</div>