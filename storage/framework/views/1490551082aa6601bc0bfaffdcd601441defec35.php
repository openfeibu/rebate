<div class="login">
	<div class="login-top">
		<div class="login-logo"><img src="<?php echo theme_asset('images/logo.png'); ?>" alt=""></div>
	</div>
	<div class="login-form">
		<?php echo $__env->make('notifications', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
		<form action="<?php echo e(url('/user/login')); ?>" method="post">
			<div class="login-item login-item-phone">
				<input name="Accounts" type="text" placeholder="请输入您的账号">
			</div>
			<div class="login-item login-item-pass">
				<input name="password" type="password" placeholder="请输入您的密码">
			</div>
			<?php echo csrf_field(); ?>

			<div class="login-submit">
				<input type="submit" value="登录">
			</div>
		</form>
	</div>
	<div class="login-footer">
		©翻转奇迹
	</div>
</div>
