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
 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
 <script type="text/javascript" src="https://www.northsideskipbins.com.au/wp-content/themes/northsideseek/js/form.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/bootstrap.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/wow.min.js"></script>
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
        jQuery(document).ready(function() {
			
			
			
        jQuery('.carousel-indicators>li:first').addClass('active');
        jQuery('.carousel-inner>.item:first').addClass('active');
        
        });
     </script>



<?php wp_footer(); ?>

</body>
</html>
