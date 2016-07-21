<?php
/**
 * Template Name: About-Soul-Tv Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<?php while ( have_posts() ): the_post();
$image =wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'tv_background' );
$feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
?>
<div class="banner_inner" style="background:url(<?php echo $feat_image; ?>);"> </div>

<?php endwhile; wp_reset_query(); ?>

    <div class="synopsis_section">
        <div class="container">
        
        <?php while(have_posts()) : the_post(); ?>
        
            <div class="main_part about_tv">
                <h2 class="pg_title"><?php the_title(); ?></h2>
                <?php the_content(); ?>
            </div>
            
            <?php endwhile; wp_reset_query(); ?>
            
            <div class="sidebar1">

                <div class="advertise">
                    <?php the_field('advertisement_1',23); ?>
                </div>
                <div class="advertise">
                   <?php the_field('advertisement_2',23);?>
                </div>
            </div>
        </div>
    </div>

    <?php get_footer(); ?>