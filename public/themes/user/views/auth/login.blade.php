<div class="login">
	<div class="login-top">
		<div class="login-logo"><img src="{!!theme_asset('images/logo.png')!!}" alt=""></div>
	</div>
	<div class="login-form">
		@include('notifications')
		<form action="{{ url('/user/login') }}" method="post">
			<div class="login-item login-item-phone">
				<input name="Accounts" type="text" placeholder="请输入您的账号">
			</div>
			<div class="login-item login-item-pass">
				<input name="password" type="password" placeholder="请输入您的密码">
			</div>
			{!! csrf_field() !!}
			<div class="login-submit">
				<input type="submit" value="登录">
			</div>
		</form>
	</div>
	<div class="login-desc">账号密码为你在游戏平台的账号密码</div>
	<div class="login-footer">
		©翻转奇迹
	</div>
</div>
