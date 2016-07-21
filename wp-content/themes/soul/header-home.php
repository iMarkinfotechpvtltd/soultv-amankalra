<?php error_reporting(0); ?>
<?php 
if ( is_front_page() ) {
	if ( is_user_logged_in() ) {
		global $current_user;
		// echo "<pre>";
		// print_r($current_user);
		// echo "</pre>";
		$req_array_key = key($current_user->caps);
	if($req_array_key == "subscriber")
	{
		?>
		<?php wp_logout();
		?>
		<script>
		location.reload();
		</script>
		<?php
			die();
		?>
		<!--<a class="logout" href="<?php echo wp_logout_url( home_url() ); ?>" title="Logout">Logout</a>
		<script>
		jQuery(document).ready(function(){
		// setTimeout(function(){  jQuery(".logout").click();  }, 5000);
		});
		// window.location.href = "<?php echo wp_logout_url( home_url() ); ?>";
		</script>-->
		<?php
	}
	}
}
?>
<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>

	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    
    <link rel="shortcut icon" href="<?php echo esc_url( get_template_directory_uri() ); ?>/images/fav_icon.png">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
    
    <!-- Bootstrap -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Style -->
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/style.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!----------------->
    
</head>

<script type="text/javascript">

jQuery(function($) {
	jQuery('#user_login').validate({
		
		rules: {
			username: {
				required: true,
				minlength: 3
			},
			
			user_pass: {
				required: true
			}
		},
		messages: {
			username: {
				required: "<?php _e( 'Please provide a username', 'agrg' ); ?>",
				minlength: "<?php _e( 'Your username must be at least 3 characters long', 'agrg' ); ?>"
			},
			
			user_pass: {
				required: "<?php _e( 'Please provide a password', 'agrg' ); ?>",
			}
			
		},
		
		submitHandler: function(form) {
				jQuery("#loading").show();		
			jQuery(form).ajaxSubmit({
				type: "POST",
				data: jQuery(form).serialize(),
				url: '<?php echo admin_url('admin-ajax.php'); ?>', 
				success: function(data) 
				{
				
				    if(data==1)
					{
						
						jQuery('#result').empty().append('<div class="alert alert-danger">Username Not exists</div>');
					}
					if(data==2)
					{
						jQuery('#result').empty().append('<div class="alert alert-danger">Password not match</div>');
					}
					if(data==3)
					{
						jQuery("#loading").hide();
						window.location.href="<?php echo site_url(); ?>/casino"; 
					}
						
				}
			});
		}
		
	});
});
</script>

<script type="text/javascript">

jQuery(function($) {
	jQuery('#user_register').validate({
		
		rules: {
			userName: {
				required: true,
				minlength: 3
			},
			
			userPassword: {
				required: true
			}
		},
		messages: {
			userName: {
				required: "<?php _e( 'Please provide a username', 'agrg' ); ?>",
				minlength: "<?php _e( 'Your username must be at least 3 characters long', 'agrg' ); ?>"
			},
			
			userPassword: {
				required: "<?php _e( 'Please provide a password', 'agrg' ); ?>",
			}
			
		},
		
		submitHandler: function(form) {
				jQuery("#loader").show();		
			jQuery(form).ajaxSubmit({
				type: "POST",
				data: jQuery(form).serialize(),
				url: '<?php echo admin_url('admin-ajax.php'); ?>', 
				success: function(data) 
				{
				
				    if(data==1)
					{
						
						jQuery('#result1').empty().append('<div class="alert alert-danger">Username already exists</div>');
					}
					if(data==2)
					{
						jQuery('#result1').empty().append('<div class="alert alert-danger">Email already exists</div>');
					}
					if(data==3)
					{
						jQuery("#loader").hide();
						jQuery(".result_up").show();
						window.location.href="<?php echo site_url(); ?>"; 
					}
						
				}
			});
		}
		
	});
});
</script>
<body <?php body_class(); ?>>
	
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">

                    <h2 class="sign_in">Sign In<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/signin.png"></h2>
                    <div class="left_part">
                        <h2>SIGN in with your facebook</h2>
                       <div class="new-fb-btn new-fb-4 new-fb-default-anim"><div class="new-fb-4-1"><a href="http://soultv.stagingdevsite.com/wp-login.php?loginFacebook=1&redirect=http://soultv.stagingdevsite.com" onclick="window.location = 'http://soultv.stagingdevsite.com/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"><div class="new-fb-4-1-1">SIGN IN WITH FACEBOOK</div></a></div></div>
                        
                    </div>
                    <div class="right_part">
                        <h2>Sign in with your Email</h2>
						<div id="result"></div>
						<form role="form" id="user_login" action="" method="post">
                       <input type="text" id="username" name="username" placeholder="Username"> 
                        <input type="password" id="user_pass" name="user_pass" placeholder="Password">
						<input type="hidden" name="action" value="wpLoginForm" />
						<?php wp_nonce_field( 'wpLoginForm_html', 'wpLoginForm_nonce' ); ?>
						<button type="submit" class="btn btn-primary sbmt_btn" name="submit">Sign In</button>
                       </form>
					   <div id="loading" style="display: none"  align="center"> 
               <img src="http://i.imgur.com/fAj1wi5.gif" id="loading_image">
                                   </div>
                       <!-- <a class="frgt_pwd" href="#">Forgot Password?</a>-->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">

                    <h2 class="sign_in">Sign up To Soul Tv<img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/signin.png"></h2>
                    <div class="full">
                        <div class="left_part">
                            <h2>SIGN UP with your facebook account</h2>
							<div class="new-fb-btn new-fb-4 new-fb-default-anim"><div class="new-fb-4-1"><a href="http://soultv.stagingdevsite.com/wp-login.php?loginFacebook=1&redirect=http://soultv.stagingdevsite.com" onclick="window.location = 'http://soultv.stagingdevsite.com/wp-login.php?loginFacebook=1&redirect='+window.location.href; return false;"><div class="new-fb-4-1-1">SIGN UP WITH FACEBOOK</div></a></div></div>

                        </div>
                        <div class="right_part">
                            <h2>Sign up with your Email account</h2>
							<div id="result1"></div>
							<form role="form" id="user_register" action="" method="post">
							 <input type="text" id="userFname" name="userFname" placeholder="Enter Firstname"> 
							<input type="text" id="userLname" name="userLname" placeholder="Enter Lastname">
                            <input type="text" id="userName" name="userName" placeholder="Enter User Name">
                            <input type="email" id="userEmail" name="userEmail" placeholder="Enter Your Email">
                            <input type="password" id="userPassword" name="userPassword" placeholder="Enter Password">
							<input type="hidden" name="action" value="wpRegisterForm" />
						<?php wp_nonce_field( 'wpRegister_html', 'wpRegister_nonce' ); ?>
						<button type="submit" class="btn btn-primary sbmt_btn" name="submit">Register</button>
							</form>
							 <div id="loader" style="display: none"  align="center"> 
               <img src="http://i.imgur.com/fAj1wi5.gif" id="loading_image">
                                   </div>
				<div class="result_up" style="display: none">Registered Successfully.Login to Soultv.</div>
                        </div>
                    </div>
                    <div class="blw_link">By clicking SIGN UP, I agree to the Soultv <a href="#">Terms of Use </a>and <a href="#">Privacy Policy</a>.</div>
                </div>

            </div>
        </div>
    </div>
    <header class="header">

        <div class="container">
            <div class="top_section">
	
                <div class="search">
				 <form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    
                        <input type="text" class="form-control" placeholder="Search" name="s" id="s" value="<?php echo get_search_query(); ?>">
					
                    </form>
                </div>
				<?php if (is_user_logged_in() ) {}else{ ?>
                <ul>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#myModal1">REGISTER</a>
                    </li>
                    <li>
                        <a class="active" href="javascript:void(0);" data-toggle="modal" data-target="#myModal">LOGIN</a>
                    </li>
                </ul>
				<?php } ?>


            </div>
        </div>
        <nav class="navbar custom-nav">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topnav" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-logo logo" href="<?php echo site_url(); ?>"><img src="<?php echo get_option_tree('logo'); ?>" alt="Logo"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="topnav">
                 <?php wp_nav_menu( array( 'menu'=>'landing_menus','theme_location' => '','menu_class' => 'nav navbar-nav topnav pull-right' ) ); ?>
             
          
                    
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </header>