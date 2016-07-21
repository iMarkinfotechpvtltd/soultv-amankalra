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
     <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	  <link rel="stylesheet" href="/resources/demos/style.css">
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
    <link href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/owl.carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/flexslider.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ); ?>/css/font-awesome.min.css" type="text/css" media="screen" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <!----------------->
    
</head>

<body <?php body_class(); ?>>

<header class="header">
        <div class="header_top_part">
            <div class="container">
                <ul class="pull-left social_connect">
                    <li>
                        <a href="<?php echo get_option_tree('micromedia_link'); ?>">micromedia</a> 
                    </li>
                    <li>
                        <a href="<?php echo get_option_tree('linkedin'); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option_tree('facebbok'); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option_tree('twitter'); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option_tree('you_tube'); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option_tree('instagram'); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
                <div class="top_section">
                    <div class="search">
                       <form role="search" method="get" id="searchform" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    
                        <input type="text" class="form-control" placeholder="Search" name="s" id="s" value="<?php echo get_search_query(); ?>">
					
                    </form>
                    </div>
					<?php if (is_user_logged_in() ) {
					global $current_user;
      get_currentuserinfo();

      // echo 'Username: ' . $current_user->user_login . "\n";
      // echo 'User email: ' . $current_user->user_email . "\n";
      // echo 'User level: ' . $current_user->user_level . "\n";
      // echo 'User first name: ' . $current_user->user_firstname . "\n";
      // echo 'User last name: ' . $current_user->user_lastname . "\n";
      // echo 'User display name: ' . $current_user->display_name . "\n";
      // echo 'User ID: ' . $current_user->ID . "\n";
				?>
                    <p class="username">Hi <?php echo $current_user->user_login; ?> <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </p>

                </div>
                <div class="user_profile_tab">

                    <div class="user_icon">
					<?php echo get_avatar( $current_user->user_email, 100 ); ?>
					
					</div>
                    <div class="user_info_rgt">
                        <h2><?php echo $current_user->user_firstname; ?> <?php echo $current_user->user_lastname; ?></h2>
                        <div class="linking">Email: <a href="mail to:<?php echo $current_user->user_email;  ?>"><?php echo $current_user->user_email;  ?></a></div>
						<?php $sub=$current_user->membership_level->name; if($sub!=""){?>
                        <p>Subscription Type:</p>
                        <a class="subscription_btn" href="<?php echo site_url(); ?>/membership-account/membership-levels"><?php $sub=$current_user->membership_level->name; if($sub=="Silver"){echo'Daily';} else if($sub=="Gold"){echo 'Weekly';} else if($sub=="Platinum"){echo 'Monthly';}?> Subscription</a>
						<?php }else{ ?>
						<p>Subscribe:</p>
                        <a class="subscription_btn" href="<?php echo site_url(); ?>/membership-account/membership-levels">Select Package</a>
						<?php } ?>
                    </div>
                    <ul>
                        <li>
                            <a href="<?php echo site_url(); ?>/profile">Edit Profile</a>
                        </li>
                        <li>
                            <a class="active" href="<?php echo wp_logout_url( home_url() ); ?>">SIGN OUT</a>
                        </li>
                    </ul>
                </div>
					<?php } ?>
            </div>
        </div>
        <nav class="navbar custom-nav inner_nav">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#topnav" aria-expanded="false"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                    <a class="navbar-logo logo" href="<?php echo site_url(); ?>"><img src="<?php echo get_option_tree('logo'); ?>" alt="Logo"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="topnav">
                
              <?php wp_nav_menu( array( 'menu'=>'main_menus','theme_location' => '','menu_class' => 'nav navbar-nav topnav pull-right' ) ); ?>
                
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container -->
        </nav>
    </header>
	
	