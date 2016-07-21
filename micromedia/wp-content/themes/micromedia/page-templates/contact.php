<?php
/**
 * Template Name: Contact Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php while ( have_posts() ) : the_post();
 $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),about);
 ?>
<div class="banner" style="background:url(<?php echo $src[0];?>); background-size:cover;">
        <div class="banner-caption">
           <?php echo content('20'); ?>
        </div>
		<?php endwhile;
		wp_reset_query(); 
		?>
        <div class="btns-link">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-sm-6"><a class="link_btn bounce animated" href="#">get directions </a></div>
                    <div class="col-md-6 col-sm-6"><a class="link_btn bounce animated" href="#message">send us a message</a></div>

                </div>
            </div>
        </div>
    </div>
    <div class="contact_form_section" id="message">
        <div class="container">
            <h2 class="pg_ttl">Send us a message</h2>
            <p>We would love to hear from you abour your requirements</p>
            <div class="form_section  wow bounceInDown">
               <?php echo do_shortcode('[contact-form-7 id="11" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
<?php get_footer(); ?>