<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */
?>
<?php global $post; ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	

	<header class="entry-header">
		<?php
			// if ( is_single() ) :
				// the_title( '<h1 class="entry-title">', '</h1>' );
			// else :
				// the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
			// endif;
		?>
	</header><!-- .entry-header -->

	
</article><!-- #post-## -->
<div id="carousel-example-generic" class="carousel slide inner_page_carousel" data-ride="carousel">

        <!-- Indicators -->


        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
		
            <div class="item active" style="background:url(<?php twentyfifteen_post_thumbnail();?>); background-size:cover;">
                <div class="container">
                    <div class="tol_navigation">
                        <h2>Taste of Love</h2>
                        <ul class="frst_ul">
                            <li><a href="#">The Synopsis</a></li>
                            <li><a href="#">Episodes</a></li>
                            <li><a class="active" href="#">The Cast</li>
                            <li><a href="#">Behind The Scene</a>
                                <ul>
                                    <li>
                                        <a href="#">Wallpaper</a>
                                    </li>
                                    <li>
                                        <a href="#">Gallery</a>
                                    </li>
                                    <li>
                                        <a href="#">Candid Clips</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
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
                        <h2>Cast - <small>With every sweet love comes a great story… </small></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cast_section">
        <div class="container">
            <h2>The cast</h2>
            <div class="actor_info members_info">
                <div class="row">
                    <div class="col-md-3">
                        <?php $image_id=get_post_meta($post->ID,"cast_image",true);						
						$thumb = wp_get_attachment_image_src($image_id, 'cast' );				
						?>	
						<img src="<?php echo $thumb['0'];?>" alt="CAST">
                        <div class="person_info">
                            <h3><?php the_title(); ?></h3>
							<p><?php the_field('subheading',$post->ID); ?></p>
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
                    <div class="col-md-9">
					<?php the_content(); ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

