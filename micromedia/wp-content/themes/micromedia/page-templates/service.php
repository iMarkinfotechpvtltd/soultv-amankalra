<?php
/**
 * Template Name: Service Page
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
		<?php
			endwhile;
			wp_reset_query(); 
		?>
        <div class="btns-link">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12"><a class="link_btn bounce animated" href="#production">Production </a></div>
                    <div class="col-md-4 col-sm-4 col-xs-12"><a class="link_btn bounce animated" href="#sales">Sales/Marketing</a></div>
                    <div class="col-md-4 col-sm-4 col-xs-12"><a class="link_btn bounce animated" href="#distribution">Int’l Distribution</a></div>
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
    <div class="info_tabs" id="production">
        <div class="container">
            <div class="box prod">
			<?php 						
					$image_id=get_post_meta(9,"production_icon",true);	
					$thumb = wp_get_attachment_image_src($image_id, 'icons' );
					?>
                <img src="<?php echo $thumb['0'];?>">
                 <?php the_field('production_content',9); ?>
            </div>
        </div>
    </div>
	 <?php 						
					$image_id=get_post_meta(9,"service_background_image",true);	
					$thumb = wp_get_attachment_image_src($image_id, 'about' );
					?>
    <div class="service"  style="background:url(<?php echo $thumb['0'];?>);">
    </div>
    <div class="info_tabs sales" id="sales">
        <div class="container">
            <div class="box prod">
                <?php 						
					$image_id=get_post_meta(9,"sales_icon",true);	
					$thumb = wp_get_attachment_image_src($image_id, 'icons' );
					?>
                <img src="<?php echo $thumb['0'];?>">
                 <?php the_field('sales_content',9); ?>
            </div>
        </div>
    </div>
	
	 <?php 						
		$image_id=get_post_meta(9,"service_social_background_image",true);	
		$thumb = wp_get_attachment_image_src($image_id, 'about' );
	?>
    <div class="service_social" style="background:url(<?php echo $thumb['0'];?>);">
    </div>
    <div class="info_tabs intl_dist" id="distribution">
        <div class="container">
            <div class="box prod">
                <?php 						
					$image_id=get_post_meta(9,"international_distribution_image",true);	
					$thumb = wp_get_attachment_image_src($image_id, 'icons' );
					?>
                <img src="<?php echo $thumb['0'];?>">
                 <?php the_field('international_distribution_content',9); ?>

            </div>
        </div>
    </div>
<?php get_footer(); ?>
