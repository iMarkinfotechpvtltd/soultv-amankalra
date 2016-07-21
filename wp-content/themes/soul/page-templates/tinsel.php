<?php
/**
 * Template Name: Tinsel Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

    <div id="main">
       <?php echo do_shortcode('[wonderplugin_slider id=3]'); ?>
        <div class="container">
            <div class="tol_navigation in_slider">
                <h2>Tinsel</h2>
                
                 <?php wp_nav_menu(array('menu'=>'tinsel','menu_class'=>'frst_ul')); ?>
                 
                
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
                <h2>TASTE OF LOVE - <small>With every sweet love comes a great story… </small></h2>
            </div>
        </div>
    </div>
    <div class="clr"></div>
   


	<?php
		if ( is_user_logged_in() ) {
			
		} else { ?>
        
        <div class="watch_section">
        <div class="container">
            <div class="wathing_box">
                <h2>Watch from Anywhere</h2>
                <a class="watch_btn" href="<?php echo site_url(); ?>">Start Watching Now!</a>
            </div>
            <div class="wathing_box">
                
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/desktop_icon.png">
                    <h3>watch on your tv</h3>
           
            </div>
            <div class="wathing_box">
               
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/tablet_icon.png">
                    <h3>on the go</h3>
             
            </div>
            <div class="wathing_box rmv">
             
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/computer_icon.png">
                    <h3>use any computer</h3>
             
            </div>
        </div>
    </div>
		<?php 	} ?>
   
    
    <div class="latest_episode_section">
        <div class="container">
            <h2 class="pg_title pull-left">Our Latest episodes</h2>
            <div class="pagination_view pull-right">
     <?php
		$i=1;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		query_posts(array(
			'post_type'      => 'episode', // You can add a custom post type if you like
			'paged'          => $paged,
			'posts_per_page' => 3,
			'tax_query' => array(
                   array(
                       'taxonomy' => 'episode_category',
                       'field' => 'slug',
                       'terms' => array( 
                           'tinsel' 
                       )
                   )
               )  
			
		));
		if ( have_posts() ) : 
		?>
			  <ul>
			<li class="view_li"><?php echo 'Page ' . $paged . ' of ' . $wp_query->max_num_pages; ?></li>
		   <li class="view_li"><?php kriesi_pagination(); ?></li>
          <li><?php echo get_previous_posts_link( '<i class="fa fa-angle-left" aria-hidden="true"></i>' ); ?></a></li>
          <li><?php echo get_next_posts_link( '<i class="fa fa-angle-right" aria-hidden="true"></i>', $loop->max_num_pages ); ?></a> </li>
						        </ul>
		      <?php endif; ?>


            </div>
            <ul>
            
            
            
  
		 <?php
		
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		query_posts(array(
			'post_type'      => 'episode', // You can add a custom post type if you like
			'paged'          => $paged,
			'posts_per_page' => 3,
			'tax_query' => array(
                   array(
                       'taxonomy' => 'episode_category',
                       'field' => 'slug',
                       'terms' => array( 
                           'tinsel' 
                       )
                   )
               )  
			
		));
				
				if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
				
			 <li>
                    <?php the_post_thumbnail('episode_medium'); ?>
                    <p><?php the_title(); ?></p>
                    <a href="<?php the_permalink(); ?>">WATCH THE Episode</a>
                </li>
				
				<?php endwhile; ?>
				<div class="my_pagi">
					<?php //my_pagination(); ?>
				</div>
				<?php else : ?>
				
						<?php // no posts found message goes here ?>
					
				<?php endif; ?>
            
              
           
            </ul>
        </div>
    </div>
    
    
    <div class="behind_scene_section">
        <div class="container">
            <h2 class="pg_title">Behind the scene</h2>
            <ul>
            
            
             <?php
           $args = array(
               'posts_per_page' => 3,
               'post_type' => 'behind',
               'order'    => 'desc',
			   'tax_query' => array(
                   array(
                       'taxonomy' => 'behind_category',
                       'field' => 'slug',
                       'terms' => array( 
                           'tinsel' 
                       )
                   )
               )
                      
           );
           query_posts( $args ); while ( have_posts() ): the_post(); ?>
            
            
                <li>
                    <?php the_post_thumbnail('behind'); ?>
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>

                </li>
                
                <?php endwhile; wp_reset_query(); ?>
                
            </ul>
        </div>
    </div>
    
    <?php get_sidebar('updates'); ?>
    
<?php
get_footer(); 