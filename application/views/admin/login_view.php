
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Competition Manager - Login Page</title>
    
        <!-- Bootstrap framework -->
            <link rel="stylesheet" href="<?php echo base_url(STYLE_ADMIN_DIR);?>/bootstrap.min.css" />
            <link rel="stylesheet" href="<?php echo base_url(STYLE_ADMIN_DIR);?>/bootstrap-responsive.min.css" />
        <!-- theme color-->
            <link rel="stylesheet" href<?php echo base_url(STYLE_ADMIN_DIR);?>/blue.css" />
        <!-- tooltip -->    
			<link rel="stylesheet" href="<?php echo base_url(LIB_ADMIN_DIR);?>/qtip2/jquery.qtip.min.css" />
        <!-- main styles -->
            <link rel="stylesheet" href="<?php echo base_url(STYLE_ADMIN_DIR);?>/style.css" />
    
        <!-- Favicons and the like (avoid using transparent .png) -->
            <link rel="shortcut icon" href="favicon.ico" />
            <link rel="apple-touch-icon-precomposed" href="icon.png" />
    
        <link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
    
        <!--[if lte IE 8]>
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
        <![endif]-->
		
    </head>
    <body class="login_page">
		
		<div class="login_box">
			
			<form action="<?php site_url('admin/login');?>" method="post" id="login_form">
				<div class="top_b">Sign in to Competition Manager</div>    
				<div class="alert alert-info alert-login">
					Please enter Username and Password
					
				</div>
				<div class="alert-login">
				<?php echo validation_errors('<div class="alert alert-error fade in">', '</div>'); ?><?php echo $this -> ci_alerts -> display('error'); ?>
				</div>
				<div class="cnt_b">
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-user"></i></span><input type="text" id="username" name="username" placeholder="Username" />
						</div>
					</div>
					<div class="formRow">
						<div class="input-prepend">
							<span class="add-on"><i class="icon-lock"></i></span><input type="password" id="password" name="password" placeholder="Password" />
						</div>
					</div>
					<div class="formRow clearfix">
						<!--<label class="checkbox"><input type="checkbox" /> Remember me</label>-->
					</div>
				</div>
				<div class="btm_b clearfix">
					<button class="btn btn-inverse pull-right" type="submit">Sign In</button>
					<!--<span class="link_reg"><a href="#reg_form">Not registered? Sign up here</a></span>-->
				</div>  
			</form>
			
			<form action="dashboard.html" method="post" id="pass_form" style="display:none">
				<div class="top_b">Can't sign in?</div>    
					<div class="alert alert-info alert-login">
					Please enter your email address. You will receive a link to create a new password via email.
				</div>
				<div class="cnt_b">
					<div class="formRow clearfix">
						<div class="input-prepend">
							<span class="add-on">@</span><input type="text" placeholder="Your email address" />
						</div>
					</div>
				</div>
				<div class="btm_b tac">
					<button class="btn btn-inverse" type="submit">Request New Password</button>
				</div>  
			</form>

		</div>
		
		<div class="links_b links_btm clearfix">
			<!--<span class="linkform"><a href="#pass_form">Forgot password?</a></span>-->
			<span class="linkform" style="display:none">Never mind, <a href="#login_form">send me back to the sign-in screen</a></span>
		</div>  
        
        <script src="<?php echo base_url(JS_ADMIN_DIR);?>/jquery.min.js"></script>
        <script src="<?php echo base_url(JS_ADMIN_DIR);?>/jquery.actual.min.js"></script>
        <script src="<?php echo base_url(LIB_ADMIN_DIR);?>/validation/jquery.validate.min.js"></script>
		<script src="<?php echo base_url(JS_ADMIN_DIR);?>/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                
				//* boxes animation
				form_wrapper = $('.login_box');
                $('.linkform a,.link_reg a').on('click',function(e){
					var target	= $(this).attr('href'),
						target_height = $(target).actual('height');
					$(form_wrapper).css({
						'height'		: form_wrapper.height()
					});	
					$(form_wrapper.find('form:visible')).fadeOut(400,function(){
						form_wrapper.stop().animate({
                            height	: target_height
                        },500,function(){
                            $(target).fadeIn(400);
                            $('.links_btm .linkform').toggle();
							$(form_wrapper).css({
								'height'		: ''
							});	
                        });
					});
					e.preventDefault();
				});
				
				//* validation
				$('#login_form').validate({
					onkeyup: false,
					errorClass: 'error',
					validClass: 'valid',
					rules: {
						username: { required: true, minlength: 3 },
						password: { required: true, minlength: 3 }
					},
					highlight: function(element) {
						$(element).closest('div').addClass("f_error");
					},
					unhighlight: function(element) {
						$(element).closest('div').removeClass("f_error");
					},
					errorPlacement: function(error, element) {
						$(element).closest('div').append(error);
					}
				});
            });
        </script>
    </body>
</html>
