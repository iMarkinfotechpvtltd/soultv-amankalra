<?php
/**
 * Template Name: Synopsis Page
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
                        <h2><?php echo get_the_title($post->post_parent); ?> - <small>With every sweet love comes a great story… </small></h2>
                    </div>
                </div>
            </div>
            
            
            
            <div class="synopsis_section">
        <div class="container">
            <div class="main_part">
                <?php 
				while ( have_posts() ) : the_post();
				the_content(); 
				 endwhile;
				wp_reset_query();
				?>
         
                <h2 class="pg_title pull-left"><?php echo get_the_title($post->post_parent); ?> - Episodes</h2>
                <div class="pagination_view pull-right">
                     <?php
	
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		
		query_posts(array(
			'post_type'      => 'episode', // You can add a custom post type if you like
			'paged'          => $paged,
			'posts_per_page' => 3,
			'tax_query' => array(
                   array(
                       'taxonomy' => 'episode_category',
                       'field' => 'slug',
                       'terms' => array(get_the_title($post->post_parent)),
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
		      <?php endif; wp_reset_query();?>
                </div>
                <div class="clr"></div>
                <div class="ssn_episode">
                    <div class="row">
					 <?php
			$i=1;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		query_posts(array(
			'post_type'      => 'episode', // You can add a custom post type if you like
			'paged'          => $paged,
			'posts_per_page' => 6,
			'tax_query' => array(
                   array(
                       'taxonomy' => 'episode_category',
                       'field' => 'slug',
                       'terms' => array(get_the_title($post->post_parent)),
                   )
               )  
			
		));
				
				if ( have_posts() ) : ?>
				
				<?php while ( have_posts() ) : the_post(); ?>
                        <div class="col-md-4">
                            <a href="<?php the_permalink();?>">
                                <?php the_post_thumbnail('episode_medium'); ?>
                                <h6><?php the_time('F j'); ?></h6>
                                <p><?php the_title(); ?> </p>
                            </a>
                        </div>
                        
                        
                        <?php    
if ( $i % 3 == 0) { echo '</div><div class="row">';}
 $i++;
    endwhile;
	echo'</div>';
    wp_reset_query(); 
?>
                        
					<?php
                    
                    endif; 
					wp_reset_query();
					?>
                </div>
                <div class="pagination_view pull-right">
                  <?php
		$i=1;
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
		
		query_posts(array(
			'post_type'      => 'episode', // You can add a custom post type if you like
			'paged'          => $paged,
			'posts_per_page' => 3,
			'tax_query' => array(
                   array(
                       'taxonomy' => 'episode_category',
                       'field' => 'slug',
                       'terms' => array(get_the_title($post->post_parent)),
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
            </div>
            <div class="sidebar1">
                <div class="quick_srch">
                    <h2>Episodes Quick Search</h2>
                    <div class="inner_srch">
                        <p>For quick indexing on any particular season and episode , chose the options below.</p>
                        <h4>Select A Genre</h4>
                       <select class="genre">
						   <option value="1">Choose from Option</option>
						   <?php 
				 $args = array('post_type'=> 'episode','paged'=> $paged,'posts_per_page' => 3,'tax_query' => array(array('taxonomy' => 'episode_category','field' => 'slug','terms' => array(get_the_title($post->post_parent)),)));
				  $loop = new WP_Query( $args );
				  $unique_genre = array();
				  while ( $loop->have_posts() ) : $loop->the_post();
				  $genre=get_field('genre',$post->ID);
				  if($genre!=""){
					  $genre=get_field('genre',$post->ID);
							  if( ! in_array( $genre, $unique_genre ) ) :
							$unique_genre[] = $genre;
				?>
						 <option value="<?php echo $genre; ?>"><?php echo $genre; ?></option>
						  <?php
							endif;
							}
							endwhile;
						 wp_reset_query();
						 ?>
		          </select>
                        <h4>Sort By Date/Year</h4>
                         <input type="text" id="datepicker" class="date">
                    </div>
					<input type="submit" class="search" name="search" value="search">
		 <div id="loading" style="display: none"  align="center"> 
               <img src="http://i.imgur.com/fAj1wi5.gif" id="loading_image">
                                   </div>
            </div> 
	  <div class="result" style="display: none">Select a Date/Genre</div>
	  <div class="advertise">
                    <?php the_field('advertisement_casino_synopsis_1',$post->ID); ?>
                </div>
                <div class="advertise">
                   <?php the_field('advertisement_casino_synopsis_2',$post->ID); ?>
                </div>
                </div>
				
                
				
            </div>
        </div>
    </div>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.10.2.js"></script>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-ui.js"></script>
   <script>
  jQuery(function() {
    jQuery( "#datepicker" ).datepicker({maxDate: "0D", dateFormat: 'yy-mm-dd' });
  });
  </script>
<script>

jQuery(document).ready(function(){

		jQuery(".search").click(function(){

			var genre = jQuery(".genre").val();
			var sort = jQuery("#datepicker").val();
			// alert(date);
				if(genre!=1 && sort!=""){
				
			// alert(genre);
			jQuery("#loading").show();
			jQuery.ajax({

			type: "POST",

			url:"<?php bloginfo('template_url'); ?>/ajax/epsdsrch.php",

			data:{
				genre:genre,
				sort:sort
				},

			success:function(resp) 

			{
				jQuery(".result").hide();
				jQuery("#loading").hide();
					 // alert(resp);
					if(resp!="")
					{
						jQuery('.main_part').empty().html(resp);
					
					}else{
						jQuery('.main_part').empty().html("<h2>NO RESULT FOUND</h2>");
					}
					
			} 

			});
				}
				else{
					jQuery(".result").show();
				}
		});



});

</script>
<?php
get_footer();
?>