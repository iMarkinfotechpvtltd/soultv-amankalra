<?php
/**
 * Template Name: Watch Movies Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); 
global $post;?>


    <?php while ( have_posts() ): the_post();
$image =wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'tv_background' );
$feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
?>
        <div class="banner_inner" style="background:url(<?php echo $feat_image; ?>);"> </div>

        <?php endwhile; wp_reset_query(); ?>

            <div class="synopsis_section">
                <div class="container">
                    <div class="main_part">
                        <h2 class="pg_title pull-left">Movie shows</h2>
                        <div class="pagination_view pull-right">
                            <?php
		$i=1;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		query_posts(array(
		'post_type'      => 'movies', // You can add a custom post type if you like
		'paged'          => $paged,
		'posts_per_page' => 4
		));
		
		if ( have_posts() ) : 
		?>
                                <ul>
                                    <li class="view_li">
                                        <?php echo 'Page ' . $paged . ' of ' . $wp_query->max_num_pages; ?>
                                    </li>
                                    <li class="view_li">
                                        <?php kriesi_pagination(); ?>
                                    </li>
                                    <li><?php echo get_previous_posts_link( '<i class="fa fa-angle-left" aria-hidden="true"></i>' ); ?></a></li>
                                    <li> <?php echo get_next_posts_link( '<i class="fa fa-angle-right" aria-hidden="true"></i>', $loop->max_num_pages ); ?></a> </li>
                                </ul>
                                <?php endif; ?>

                        </div>
                        <div class="clr"></div>


                        <?php
		$i=1;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		query_posts(array(
		'post_type'      => 'movies', // You can add a custom post type if you like
		'paged'          => $paged,
		'posts_per_page' => 4
		));
		
		if ( have_posts() ) : ?>
                            <div class="pagination_view pull-right">

                                <?php my_pagination(); ?>

                            </div>

                            <div class="tv_shows_grid">
                                <ul>
                                    <?php while ( have_posts() ) : the_post();	?>


                                        <li>
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail('shows');?>
                                            </a>
                                        </li>

                                        <?php
			if($i%4==0)
				{
				?>
                                </ul>
                                <ul>
                                    <?php
					}
					$i++;
					?>


                                        <?php endwhile; ?>

                                </ul>
                            </div>
                            <div class="pagination_view pull-right">
                                <?php
		$i=1;
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		
		query_posts(array(
		'post_type'      => 'movies', // You can add a custom post type if you like
		'paged'          => $paged,
		'posts_per_page' => 4
		));
		
		if ( have_posts() ) : 
		?>
                                    <ul>
                                        <li class="view_li">
                                            <?php echo 'Page ' . $paged . ' of ' . $wp_query->max_num_pages; ?>
                                        </li>
                                        <li class="view_li">
                                            <?php kriesi_pagination(); ?>
                                        </li>
                                        <li><?php echo get_previous_posts_link( '<i class="fa fa-angle-left" aria-hidden="true"></i>' ); ?></a></li>
                                        <li><?php echo get_next_posts_link( '<i class="fa fa-angle-right" aria-hidden="true"></i>', $loop->max_num_pages ); ?></a> </li>
                                    </ul>
                                    <?php endif; ?>
                            </div>
                            <?php else : ?>

                                <?php // no posts found message goes here ?>

                                    <?php endif; 
		wp_reset_query();
		?>





                    </div>
                    <div class="sidebar1">
                        <div class="quick_srch">
                            <h2>Movies Quick Search</h2>
                            <div class="inner_srch">
                                <p>For quick indexing on any particular Movie Show, chose the options below.</p>
                                <h4>Select A Genre</h4>
                                <select class="genre">
                                    <option value="1">Choose from Option</option>
                                    <?php 
 $args = array('post_type' => 'movies','posts_per_page'=>-1,'order' => 'DESC','post_status'=> 'publish');
  $loop = new WP_Query( $args );
  $unique_genre = array();
  while ( $loop->have_posts() ) : $loop->the_post();
  $genre=get_field('genre',$post->ID);
  if($genre!=""){
	  $genre=get_field('genre',$post->ID);
			  if( ! in_array( $genre, $unique_genre ) ) :
            $unique_genre[] = $genre;
?>
                                        <option value="<?php echo $genre; ?>">
                                            <?php echo $genre; ?>
                                        </option>
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
                            <div id="loading" style="display: none" align="center">
                                <img src="http://i.imgur.com/fAj1wi5.gif" id="loading_image">
                            </div>
                        </div>
                        <div class="result" style="display: none">Select a Date/Genre</div>
                        <div class="advertise">
                            <?php the_field('advertisement_1',$post->ID); ?>
                        </div>
                        <div class="advertise">
                            <?php the_field('advertisement_2',$post->ID); ?>
                        </div>
                    </div>
                </div>


            </div>
            </div>
            </div>

       <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-1.10.2.js"></script>
  <script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/jquery-ui.js"></script>
            <script>
                jQuery(function () {
                    jQuery("#datepicker").datepicker({
                        maxDate: "0D",
                        dateFormat: 'yy-mm-dd'
                    });
                });
            </script>
            <script>
                jQuery(document).ready(function () {

                    jQuery(".search").click(function () {

                        var genre = jQuery(".genre").val();
                        var sort = jQuery("#datepicker").val();
                        // alert(date);
                        if (genre != 1 && sort != "") {

                            // alert(genre);
                            jQuery("#loading").show();
                            jQuery.ajax({

                                type: "POST",

                                url: "<?php bloginfo('template_url'); ?>/ajax/movsrch.php",

                                data: {
                                    genre: genre,
                                    sort: sort
                                },

                                success: function (resp)

                                {
                                    jQuery(".result").hide();
                                    jQuery("#loading").hide();
                                    // alert(resp);
                                    if (resp != "") {
                                        jQuery('.main_part').empty().html(resp);

                                    }else{
										jQuery('.main_part').empty().html("<h2> NO RESULT FOUND </h2>");
									}

                                }

                            });
                        } else {
                            jQuery(".result").show();
                        }
                    });



                });
            </script>
            <?php get_sidebar('updates');?>

                <?php

get_footer();