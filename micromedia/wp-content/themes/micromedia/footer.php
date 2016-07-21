<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
  <div class="footer-top">
        <div class="container">
            <div class="footer_top_inner">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <h2>VIDEOS ON DEMAND</h2>
                        <ul>
                           <?php

							$defaults = array(
							'theme_location'  => '',
							'menu'            => 'video',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '%3$s',
							'depth'           => 0,
							'walker'          => ''
							);

							wp_nav_menu( $defaults );

					?>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-6">
                        <h2>IMPORTANT LINKS</h2>
                        <ul>
                            <?php

							$defaults = array(
							'theme_location'  => '',
							'menu'            => 'important_links',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'menu',
							'menu_id'         => '',
							'echo'            => true,
							'fallback_cb'     => 'wp_page_menu',
							'before'          => '',
							'after'           => '',
							'link_before'     => '',
							'link_after'      => '',
							'items_wrap'      => '%3$s',
							'depth'           => 0,
							'walker'          => ''
							);

							wp_nav_menu( $defaults );

					?>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="subscribe">
                            <h3>SIGN UP FOR OUR NEWSLETTERS</h3>
                            <p>Get the latest news and quiz competition notices via our Newsletter</p>
                            <input type="text" value="" placeholder="Enter your email address">
                            <a href="#">Subscribe Now</a>
                        </div>
                    </div>
                </div>
                <div class="social_icons">
                    <div class="pull-right">
                        <ul>
                            <li>
                                <a href="<?php echo get_option_tree('linkedin');?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo get_option_tree('facebook');?>" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo get_option_tree('twitter');?>" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo get_option_tree('youtube');?>" target="_blank"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="<?php echo get_option_tree('instagram');?>" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container">
            <div class="copyright pull-left">
                <p>Copyright © Micromedia Marketing Limited 2009 - <?php echo date('Y'); ?></p>
            </div>
            <div class="social_links pull-right">

                <a class="footer_link" href="<?php echo get_option_tree('elsorn_link');?>" target="_blank">ELSORN</a>
            </div>
        </div>
    </div>
	<?php wp_footer(); ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->

    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/wow.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/classie.js"></script>
    <script>
        var wow = new WOW({
            boxClass: 'wow', // animated element css class (default is wow)
            animateClass: 'animated', // animation css class (default is animated)
            offset: 0, // distance to the element when triggering the animation (default is 0)
            mobile: true, // trigger animations on mobile devices (default is true)
            live: true, // act on asynchronously loaded content (default is true)
            callback: function (box) {
                // the callback is fired every time an animation is started
                // the argument that is passed in is the DOM node being animated
            },
            scrollContainer: null // optional scroll container selector, otherwise use window
        });
        wow.init();
    </script>
    <script>
        function init() {
            window.addEventListener('scroll', function (e) {
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 50,
                    header = document.querySelector("header");
                if (distanceY > shrinkOn) {
                    classie.add(header, "smaller");
                } else {
                    if (classie.has(header, "smaller")) {
                        classie.remove(header, "smaller");
                    }
                }
            });
        }
        window.onload = init();
    </script>
 <script>
        function init() {
            window.addEventListener('scroll', function (e) {
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 50,
                    body = document.querySelector("body");
                if (distanceY > shrinkOn) {
                    classie.add(body, "nv");
                } else {
                    if (classie.has(body, "nv")) {
                        classie.remove(body, "nv");
                    }
                }
            });
        }
        window.onload = init();
    </script>
<script type="text/javascript">
jQuery(function() {
  jQuery('a.animated').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = jQuery(this.hash);
      target = target.length ? target : jQuery('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        jQuery('html, body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

</script>
<script type="text/javascript">
		jQuery(function() {
    jQuery("input[name='text-348']").keydown(function(e) {
		if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1
             ) {
                 // let it happen, don't do anything
                 return;
        }
      if (e.ctrlKey || e.altKey) {
        e.preventDefault();
      } else {
        var key = e.keyCode;
        if (!((key == 8)|| (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
          e.preventDefault();
        }
      }
    });
  });
		</script>
		<script type="text/javascript">
		jQuery(function() {
    jQuery("input[name='text-137']").keydown(function(e) {
		if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1
             ) {
                 // let it happen, don't do anything
                 return;
        }
      if (e.ctrlKey || e.altKey) {
        e.preventDefault();
      } else {
        var key = e.keyCode;
        if (!((key == 8)|| (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
          e.preventDefault();
        }
      }
    });
  });
		</script>
				<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery("input[name='tel-409']").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if (jQuery.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A, Command+A
            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
             // Allow: home, end, left, right, down, up
            (e.keyCode >= 35 && e.keyCode <= 40)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
});

</script>
</body>
</html>
