<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header('home'); ?>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ol class="carousel-indicators">

            <?php 
				$i=0;
				query_posts('post_type=slider&showposts=6'); ?>
                <?php while (have_posts()) : the_post(); ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i; ?>" class=""></li>
                    <?php 
				$i++;
			endwhile; wp_reset_query(); ?>

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">


            <?php 
			global $post;
		$i=0;
		query_posts('post_type=slider&showposts=6');
         while (have_posts()) : the_post();
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'banner' );
		$feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
		?>

                <div class="item" style="background:url(<?php echo $feat_image; ?>); background-size:cover;">
                    <div class="banner-caption">
                        <h1><?php the_title(); ?></h1>
                       <?php the_content(); ?>
                        <a href="<?php the_field('link_to_landing_page',$post->ID); ?>" class="">WATCH THIS VIDEO</a>
                    </div>
                </div>


                <?php 
		$i++;
		endwhile; wp_reset_query(); ?>

        </div>

    </div>

    <?php
get_footer('home');