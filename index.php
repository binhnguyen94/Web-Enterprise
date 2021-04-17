<?php
    //ini_set('display_errors', 0);
	session_start();
	require_once("includes/connection.php");
	require_once("includes/functions.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="icon" href="favicon.ico" type="image/x-icon" />
<title>Website Document Management Online</title>
<link type="text/css" rel="stylesheet" href="templates/style/css.css" />
<script type="text/javascript" src="templates/script/jquery.js"></script>
<script type="text/javascript" src="templates/script/superfish.js"></script>
<script type="text/javascript" src="templates/script/slides.min.jquery.js"></script>
<script type="text/javascript" src="templates/script/content.js"></script>
<div id="fb-root"></div>
</head>

<body>
	<div id="header">
            <div class="header-i">
            	
            </div>
        <div id="menuBar">
            <div class="header-i">
            	<?php
    				require_once("modules/menutop/menutop.php");
    			?>
            </div>
        </div>
    </div>
    <div id="container">
        <div id="leftContent">
            <div class="module">
                <h3>Search Document</h3>
                <div style="padding-top:3px">
                    <form method="get" action="index.php">
                        <input type="hidden" name="act" value="document" />
                        <input name="key" placeholder='Search Keyword' class='text-formlogin'/><br/>
                        <center><input value=" Search " type="submit" class='button-form'></center>
                    </form>
                </div>
            </div>
            <div class="module">
                <h3>Student Login</h3>
                <div>
                    <?php
                        require_once("modules/login/studentLogin.php");
                    ?>
                </div>
            </div>
        </div>
        <div id="Content">
        	<?php
				require_once("includes/c_right.php");
			?>
        </div>
    </div>
    <!-- <div id="footer">
        <div class="copyright">
            <p class="footer-i">Copyright © Building Website Document Management Online</p>
        </div>
    </div> -->
    <script type="text/javascript">
		$(function(){
		$(window).scroll(function () {
		if ($(this).scrollTop() > 200) $('#goTop').fadeIn();
		else $('#goTop').fadeOut();
		});
		$('#goTop').click(function () {
		$('body,html').animate({scrollTop: 0}, 'slow');
		});
		});
	</script>
	<div id="goTop">
		<img src="templates/image/top_page.png"/>Up
	</div>
</body>
</html>