<?php
/**
 * Template Name: Gallery Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); 
global $post;
?>
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
                                   function get_numerics ($str)
                       {
                       preg_match_all('/\d+/', $str, $matches);
                       return $matches[0];
                       }
					   while ( have_posts() ) : the_post();
					     $one1 = get_the_content(); ?>
                               <?php
                                           $arr1=get_numerics($one1);
                                           foreach($arr1 as $val1)
                                           {
                                           $val1;
                                           
                                            $small_image_url1 = wp_get_attachment_image_src($val1, 'gallery');
                                           ?>
                    <div class="col-md-4 col-sm-4 col-xs-12">
									<a href="<?php echo $small_image_url1[0]; ?>" class="html5lightbox">
                                   <img src="<?php echo $small_image_url1[0]; ?>" alt="image"/>   </a></div>
                                           <?php } ?>
                 
               </div>
			   <?php endwhile; 
			   wp_reset_query(); ?>
            </div>
        </div>
    </div>

    <?php get_sidebar('updates'); ?>
<?php get_footer(); ?>