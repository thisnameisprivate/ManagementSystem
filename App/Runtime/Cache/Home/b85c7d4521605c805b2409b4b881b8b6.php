<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>广元协和医院</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="http://localhost/ThinkPHP/Public/statics/assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ThinkPHP/Public/statics/assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="http://localhost/ThinkPHP/Public/statics/assets/css/form-elements.css">
        <link rel="stylesheet" href="http://localhost/ThinkPHP/Public/statics/assets/css/style.css">
        <link rel="icon" href="http://localhost/ThinkPHP/Public/statics/images/hospital.ico" type="image/x-icon">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="http://localhost/ThinkPHP/Public/statics/assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://localhost/ThinkPHP/Public/statics/assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://localhost/ThinkPHP/Public/statics/assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="http://localhost/ThinkPHP/Public/statics/assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>广元协和医院</strong> 预约登录系统</h1>
                            <div class="description">
                            	<p>

                                    Appointment registration system <a href="#"><strong></strong></a>, Guangyuan Union Hospital !
                            	</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>登录你的账户</h3>
                            		<p>在下方输入你的账号和密码：</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-lock"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?php echo U('Home/Index/logincheck');?>" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="username" placeholder="账 号 ..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="password" placeholder="密 码 ..." class="form-password form-control" id="form-password">
			                        </div>
			                        <button type="submit" class="btn">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                        	<h3>...or login with:</h3>
                        	<div class="social-login-buttons">
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-facebook"></i> Facebook
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-twitter"></i> Twitter
	                        	</a>
	                        	<a class="btn btn-link-2" href="#">
	                        		<i class="fa fa-google-plus"></i> Google Plus
	                        	</a>
                        	</div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>


        <!-- Javascript -->
        <script src="http://localhost/ThinkPHP/Public/statics/assets/js/jquery-1.11.1.min.js"></script>
        <script src="http://localhost/ThinkPHP/Public/statics/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="http://localhost/ThinkPHP/Public/statics/assets/js/jquery.backstretch.min.js"></script>
        <script src="http://localhost/ThinkPHP/Public/statics/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="http://localhost/ThinkPHP/Public/statics/assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>