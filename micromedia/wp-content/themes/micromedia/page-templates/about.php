<?php
/**
 * Template Name: About Page
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
                    <div class="col-md-4 col-sm-4 col-xs-12"><a class="link_btn bounce animated" href="<?php echo get_permalink(9);?>/#production">Production </a></div>
                    <div class="col-md-4 col-sm-4 col-xs-12"><a class="link_btn bounce animated" href="<?php echo get_permalink(9);?>/#sales">Sales/Marketing</a></div>
                    <div class="col-md-4 col-sm-4 col-xs-12"><a class="link_btn bounce animated" href="<?php echo get_permalink(9);?>/#distribution">Int’l Distribution</a></div>
                </div>
            </div>
        </div>
    </div>
    <div class="business_proposal">
        <div class="container">
            <h2 class="pull-left"><img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/rqst_icon.png">Wish to contact us or request for our business proposal?</h2>
            <a class="pull-right" href="<?php echo get_permalink(7);?>/#message">Request for proposal</a>
        </div>
    </div>
    <div class="info_tabs">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="box wow slideInUp">
					<?php 						
					$image_id=get_post_meta(5,"about_us_image",true);	
					$thumb = wp_get_attachment_image_src($image_id, 'icons' );
					?>	
                        <img src="<?php echo $thumb['0'];?>">
                       <?php the_field('about_us_content',5); ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="box pull-right  wow slideInUp">
                        <?php 						
					$image_id=get_post_meta(5,"our_value_image",true);	
					$thumb = wp_get_attachment_image_src($image_id, 'icons' );
					?>	
                        <img src="<?php echo $thumb['0'];?>">
                         <?php the_field('our_value_content',5); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>