<body id="login">
	<div id="login-wrapper" class="png_bg">
		<div id="login-top">
			<img id="logo" src="teamplates/images/logo.png" alt="CONTROL PANEL" style="
    width: 112px;
">
		</div>
		<div id="login-content">
			<form action="" method="post">
				<p>
					<label>Login ID</label>
					<input class="text-input" name="username" />
				</p>
				<div class="clear"></div>
				<p>
					<label>password</label>
					<input class="text-input" type="password" name="password" />
				</p>
				<div class="clear"></div>
				<p>
					<input type="hidden" name="login" value="login"/>
					<input class="button" type="submit" value="Login" />
				</p>
			</form>
		</div>
	</div> 
</body>
<?php
	exit();
?>