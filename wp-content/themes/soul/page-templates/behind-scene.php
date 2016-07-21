<?php
/**
 * Template Name: Behind Scene Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),'c_synop' ); ?>
<div class="banner" style="background:url(<?php echo $src[0];?>); background-size:cover;">


		
                <div class="container">
                    <div class="tol_navigation">
                        <h2><?php echo get_the_title($post->post_parent); ?></h2>
                         <?php if ($post->post_parent == 34 ) {
								wp_nav_menu(array('menu'=>'casino','menu_class'=>'frst_ul'));
							}else if ($post->post_parent == 37 ){
								wp_nav_menu(array('menu'=>'jacon-cross','menu_class'=>'frst_ul')); 
							}else if ($post->post_parent == 7 ){
								wp_nav_menu(array('menu'=>'TasteOfLove','menu_class'=>'frst_ul'));
							}else if ($post->post_parent == 36 ){
								wp_nav_menu(array('menu'=>'tinsel','menu_class'=>'frst_ul'));
							}
						?>
                        <h2 class="ttl">TASTE OF LOVE FAN ZONE</h2>
                        <ul class="alt_ul">
                            <li>
                                <a href="#">TOL FACEBOOK WALL</a>
                            </li>
                            <li>
                                <a href="#">JOIN THE CONVERSATION ON TWITTER</a>
                            </li>
                            <li>
                                <a href="#">LIKE & SHARE PICS ON INSTAGRAM</a>
                            </li>
                        </ul>

                    </div>
                    <div>
                        <a class="close_navigation" href="#"><i class="fa fa-times"></i><i class="fa fa-bars"></i></a>
                    </div>

                </div>
                <div class="tagline">
                    <div class="container">
                        <h2><?php echo get_the_title($post->post_parent); ?> - <small>With every sweet love comes a great story </small></h2>
                    </div>
                </div>
         
    </div>
    <div class="cast_section">
        <div class="container">

            <h2><?php the_title(); ?></h2>
            <div class="members_info">
                <div class="row">
				<?php
			$i=0;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		query_posts(array(
			'post_type'      => 'behind', // You can add a custom post type if you like
			'paged'          => $paged,
			'posts_per_page' => -1,
			'tax_query' => array(
                   array(
                       'taxonomy' => 'behind_category',
                       'field' => 'slug',
                       'terms' => array(get_the_title($post->post_parent)),
                   )
               )  
			
		));
				
				if ( have_posts() ) : ?>
				<?php while ( have_posts() ) : the_post(); ?>
                    <div class="col-md-3 col-sm-3 wow slideInUp">
                       <?php the_post_thumbnail('behind'); ?>
                        <a href="<?php the_permalink(); ?>"><div class="person_info">
                            <h3><?php the_title(); ?></h3>
                        </div></a>
                    </div>
					<?php endwhile; ?>
						<?php if($i%2==0)
						{
							?>
							</div>
							 <div class="row">
							 <?php 
						}
						?>
                    </div>
					<?php endif; 
					wp_reset_query();
					?>
               
            </div>
        </div>
    </div>
 <?php get_sidebar('updates'); ?>
<?php get_footer(); ?>