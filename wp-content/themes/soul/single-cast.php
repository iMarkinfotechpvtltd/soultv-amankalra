<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header();
global $post;
while ( have_posts() ) : the_post();
?>
<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'c_synop' ); ?>
<div class="banner" style="background:url(<?php echo $src[0];?>); background-size:cover;"></div>
 
    <div class="cast_section">
        <div class="container">
            <h2>The cast</h2>
            <div class="actor_info members_info">
                <div class="row">
                    <div class="col-md-3 col-sm-3">
                        
                        <img src="<?php the_field('cast_image',$post->ID);?>">
                        <div class="person_info">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_field('subheading',$post->ID);?></p>
                        </div>
                        <div class="follow_on_social">
                            <ul class="follow">
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9 col-sm-9">
                       <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php 
endwhile;
wp_reset_query();
		?>
<?php get_footer(); ?>
