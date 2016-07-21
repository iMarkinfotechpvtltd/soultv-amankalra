<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>



<div class="footer">
        <div class="container">
            <div class="copyright pull-left">
                <p>Copyright © Micromedia Marketing Limited 2009 - <?php echo date('Y'); ?></p>
            </div>
            <div class="social_links pull-right">
                <ul>
                    <li>
                        <a href="<?php echo get_option_tree('linkedin'); ?>"><i class="fa fa-linkedin"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option_tree('facebbok'); ?>"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option_tree('twitter'); ?>"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option_tree('you_tube'); ?>"><i class="fa fa-youtube"></i></a>
                    </li>
                    <li>
                        <a href="<?php echo get_option_tree('instagram'); ?>"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
                <a class="footer_link" href="#">ELSORN</a>
            </div>
        </div>
    </div>
<?php wp_footer(); ?>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
	 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
	 <script type="text/javascript" src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/form.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/wow.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/owl.carousel.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/classie.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery.flexslider.js"></script>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5lightbox.js"></script>

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
        jQuery(document).ready(function () {
			
            jQuery(".close_navigation").click(function () {
                jQuery(".tol_navigation").slideToggle("slow");
                jQuery(".close_navigation").toggleClass("open_navigation");
            });
			
	
		

        });
    </script>
    <script>
        jQuery(document).ready(function () {
		
			
            jQuery(".username").click(function () {
                jQuery(".user_profile_tab").toggle();
                jQuery(".username").toggleClass("opn");
            });

        });
    </script>
    <script>
        jQuery(document).ready(function () {

            jQuery("#owl-demo").owlCarousel({
                autoPlay: 3000, //Set AutoPlay to 3 seconds
                items: 8,
                //addClassActive: true,
                navigation: true,
                navigationText: false,
                itemsDesktop: [1199, 3],
                itemsDesktopSmall: [979, 3]

            });


        });
    </script>
    <script>
        function init() {
            window.addEventListener('scroll', function (e) {
                var distanceY = window.pageYOffset || document.documentElement.scrollTop,
                    shrinkOn = 100,
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
                    shrinkOn = 100,
                    body = document.querySelector("body");
                if (distanceY > shrinkOn) {
                    classie.add(body, "nv_pos");
                } else {
                    if (classie.has(body, "nv_pos")) {
                        classie.remove(body, "nv_pos");
                    }
                }
            });
        }
        window.onload = init();
    </script>
    <script type="text/javascript">
        jQuery(window).load(function () {
            // The slider being synced must be initialized first
            jQuery('#carousel').flexslider({
                animation: "slide",
                controlNav: true,
                animationLoop: false,
                slideshow: false,
                itemWidth: 120,
                itemMargin: 14,
                asNavFor: '#slider'
            });

            jQuery('#slider').flexslider({
                animation: "slide",
                controlNav: false,
                animationLoop: false,
                slideshow: false,
                sync: "#carousel"
            });
        });
    </script>
<script>
    jQuery(document).ready(function(){
        var common_height = jQuery(".wonderpluginslider").height();
          jQuery('.tol_navigation').css('height',common_height);

    });

</script>
<script>
jQuery(document).ready(function () {
jQuery("#menu-item-105>ul.sub-menu").removeClass("sub-menu").addClass("sub-menu1");
jQuery("#menu-item-101>ul.sub-menu").removeClass("sub-menu").addClass("sub-menu1");
jQuery("#menu-item-136>ul.sub-menu").removeClass("sub-menu").addClass("sub-menu1");
jQuery("#menu-item-148>ul.sub-menu").removeClass("sub-menu").addClass("sub-menu1");
jQuery("a[title='jQuery Slider']").parent().addClass("vid-slider");
jQuery("a[title='Responsive jQuery Slider']").parent().addClass("vid-slider");
});
</script>

</body>
</html>