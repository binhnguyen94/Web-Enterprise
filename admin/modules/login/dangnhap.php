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
					<input class="text-input" name="tendangnhap" />
				</p>
				<div class="clear"></div>
				<p>
					<label>Password</label>
					<input class="text-input" type="password" name="matkhau" />
				</p>
				<div class="clear"></div>
				<p>
					<input type="hidden" name="dangnhap" value="dangnhap"/>
					<input class="button" type="submit" value=" Login " />
				</p>
			</form>
		</div>
	</div> 
</body>
<?php
	exit();
?>