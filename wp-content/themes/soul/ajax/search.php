<?php
include('../../../../wp-config.php');
global $wpdb;
$genre=$_POST['genre'];
$sort=$_POST['sort'];
 $iparr = split ("\-", $sort);
$year=$iparr[0];
$month=$iparr[1];
$day=$iparr[2];

			$i=1;
			$args = array(
				'post_type'  => 'shows',
				'meta_query' => array(
					array(
						'key'     => 'genre',
						'value'   => array($genre),
					),
				),
				'date_query' => array(
					array(
						'year'  => $year,
						'month' => $month,
						'day'   => $day,
					),
				),
			);
			$query = new WP_Query( $args );
			if ( $query->have_posts() ) :
			?>
			<div class="tv_shows_grid">
     <ul>
			<?php
			while ( $query->have_posts() ) : $query->the_post();
		?>
		<?php 
			if ( has_post_thumbnail() ) { ?>
			 <li> <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('shows');?> </a></li>
			<?php 
			}
			else {
				?>
			<li> NO RESULTS FOUND </li>
				<?php 
			}
			?>
        <?php 
		endwhile;
		wp_reset_query();
		?>
        </ul>
        </div>
		<?php endif; ?>