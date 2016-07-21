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
 ?>


<?php $recent = new WP_Query("page_id=21");
while($recent->have_posts()) : $recent->the_post();


$image =wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'tv_background' );
$feat_image = wp_get_attachment_url( get_post_thumbnail_id(get_the_ID()) );
?>
<div class="banner_inner" style="background:url(<?php echo $feat_image; ?>);"> </div>

<?php endwhile; wp_reset_query(); ?>
 
    <div class="synopsis_section">
        <div class="container">
            <div class="main_part about_tv">
			<div class="main">
                <h2 class="pg_title">Tv shows</h2>
                
                <?php
		// Start the loop.
		while ( have_posts() ) : the_post();
		$synopsis = get_field('synopsis');
		
		?>

			<div class="show_dwnload">
                    <div class="lft_part">
                        <?php the_post_thumbnail('shows');?>
                    </div>
                    <div class="rgt_part">
                        <div class="show_information">
                            <label>Title:</label> <?php the_title(); ?>
                        </div>
                        <div class="show_information">
                            <label>Genre: </label> <?php the_field('genre',$post->ID);?>
                        </div>
                        <div class="show_information">
                            <label>Rating:</label> <?php the_field('rating',$post->ID); ?>
                        </div>
                        <div class="show_information">
                            <label>Language:</label> <?php the_field('language',$post->ID); ?>
                        </div>
                        <div class="show_information">
                            <label>Time:</label> <?php the_field('time',$post->ID); ?>
                        </div>
             <?php
		if ( is_user_logged_in() ) { 
		global $current_user;
		// print_r($current_user);
		$end=$current_user->membership_level->enddate;
		global $wpdb;
			get_currentuserinfo();
			$userid= $current_user->ID;
			$endrow = $wpdb->get_results( "SELECT * FROM `soul_video` WHERE user_id='$userid'" );
			
			$endrows=$endrow[0]->end_day;
			
			if($end > $endrows){
			$up = $wpdb->get_results( "UPDATE `soul_video` SET `counter`='0' WHERE user_id='$userid'" ); 
			?>
			<input class="endday" type="hidden" name="end" value="<?php echo $end=$current_user->membership_level->enddate;  ?>" >
			<input class="id" type="hidden" name="id" value="<?php echo $current_user->ID;  ?>" >
		<input type="hidden" name="package" value="<?php echo $sub=$current_user->membership_level->name;?>" class="pack">
		<input type="hidden" name="number" value="<?php if($sub=="Silver"){the_field('videos_daily_member_can_download',5);}else if($sub=="Gold"){the_field('videos_weekly_members_can_download',5);}else if($sub=="Platinum"){the_field('videos_monthly_member_can_download',5); }?>" class="number">
			<a class="dwnld_wtch_btn" href="<?php the_field('download_link',$post->ID); ?>">Download and Watch this Show</a>
			<?php 
			}else if($end==""){
				?>
				<a class="dwnld_wtch_btn">Subscribe To Download</a>
				<?php
			}
			else{
			
		$myrows = $wpdb->get_results( "SELECT * FROM `soul_video` WHERE user_id='$userid'" );
		$numPost = count($myrows);
		if($numPost==0)
			{
			?>
			<input class="endday" type="hidden" name="end" value="<?php echo $end=$current_user->membership_level->enddate;  ?>" >
			<input class="id" type="hidden" name="id" value="<?php echo $current_user->ID;  ?>" >
		<input type="hidden" name="package" value="<?php echo $sub=$current_user->membership_level->name;?>" class="pack">
		<input type="hidden" name="number" value="<?php if($sub=="Silver"){the_field('videos_daily_member_can_download',5);}else if($sub=="Gold"){the_field('videos_weekly_members_can_download',5);}else if($sub=="Platinum"){the_field('videos_monthly_member_can_download',5); }?>" class="number">
			<a class="dwnld_wtch_btn" href="<?php the_field('download_link',$post->ID); ?>">Download and Watch this Show</a>
			<?php 
			}
			else
			{
		foreach($myrows as $row)
			{
				$sub=$row->package;
				if($sub=="Silver"){$silver= get_field('videos_daily_member_can_download',5);}else if($sub=="Gold"){$gold=get_field('videos_weekly_members_can_download',5);}else if($sub=="Platinum"){$platinum=get_field('videos_monthly_member_can_download',5); }
					$id=$row->counter;
					if($id==$silver || $id==$gold || $id==$platinum){
						?>
						
		<a class="dwnld_wtch_btn">Your Daily Limit Is Reached.Subscribe To Download</a>			
	<?php
		}else{	
	  ?>
	  <input class="endday" type="hidden" name="end" value="<?php echo $end=$current_user->membership_level->enddate;  ?>" >
	  <input class="id" type="hidden" name="id" value="<?php echo $current_user->ID;  ?>" >
		<input type="hidden" name="package" value="<?php echo $sub=$current_user->membership_level->name;?>" class="pack">
		<input type="hidden" name="number" value="<?php if($sub=="Silver"){the_field('videos_daily_member_can_download',5);}else if($sub=="Gold"){the_field('videos_weekly_members_can_download',5);}else if($sub=="Platinum"){the_field('videos_monthly_member_can_download',5); }?>" class="number">
			<a class="dwnld_wtch_btn" href="<?php the_field('download_link',$post->ID); ?>">Download and Watch this Show</a>
		<?php } } } } } else { ?>
        
        <a class="dwnld_wtch_btn" href="<?php echo site_url(); ?>">Login and Download the videos</a>
         <?php } ?> 
                    </div>
                </div>

			<?php
			 /*?>the_post_navigation( array(
				'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
				'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
					'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
					'<span class="post-title">%title</span>',
			) );<?php */

		// End the loop.
		endwhile;
		?>

                
                <div class="all_info_synopsis">
                    <?php echo $synopsis; ?>
                </div>
				</div>
                <div class="other_tv_show">
                    <h2>OTHER TOP Movies</h2>
                    <ul>
                    
    <?php 
				global $post;
				query_posts('post_type=movies&showposts=4&order=desc&meta_key =_is_ns_featured_post&meta_value= yes'); 
				while (have_posts()) : the_post();
				?>
             <li>
                  <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('shows'); ?></a>
                   </li>
                                  
				<?php endwhile; wp_reset_query();  ?>
                    
                   </ul>
                </div>
            </div>
            <div class="sidebar1">
                <div class="quick_srch">
                    <h2>Movies Quick Search</h2>
                    <div class="inner_srch">
                        <p>For quick indexing on any particular Tv Show, chose the options below.</p>
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
                </div>
                <div class="advertise">
                    <?php the_field('adevertisement_1',$post->ID); ?>
                </div>
                <div class="advertise">
                   <?php the_field('advertisement_2',$post->ID); ?>
                </div>
            </div>
        </div>
    </div>
	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
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

			url:"<?php bloginfo('template_url'); ?>/ajax/movsrch.php",

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
						jQuery('.main').empty().html(resp);
					
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
<script>
jQuery(document).ready(function(){
		var count = 0;
		jQuery(".dwnld_wtch_btn").click(function(){
			var number= jQuery(".number").val();
			var pack = jQuery(".pack").val();
			var id=jQuery(".id").val();
			var endday=jQuery(".endday").val();
			count += 1;
			
			jQuery.ajax({

			type: "POST",

			url:"<?php bloginfo('template_url'); ?>/ajax/video.php",

			data:{
				id:id,
				count:count,
				pack:pack,
				endday:endday,
				number:number
				},
			success:function(resp){
				// alert(resp);
				if(resp==1){
			jQuery('.dwnld_wtch_btn').click(function (e) {

					e.preventDefault();
			});	
				}			
			} 
			});
			// if(pack=="Silver"){
			// if (count == number) {
			// jQuery.ajax({

			// type: "POST",

			// url:"<?php bloginfo('template_url'); ?>/ajax/video.php",

			// data:{
				// id:id,
				// count:count,
				// pack:pack,
				// endday:endday
				// },

			// success:function(resp){
			// jQuery('.dwnld_wtch_btn').click(function (e) {

					// e.preventDefault();
			// });		
			// } 
			// });
			// }
			// }
			// else if(pack=="Gold"){
				// if (count == number) {
			// jQuery.ajax({

			// type: "POST",

			// url:"<?php bloginfo('template_url'); ?>/ajax/video.php",

			// data:{
				// id:id,
				// count:count,
				// pack:pack
				// },

			// success:function(resp){
			// jQuery('.dwnld_wtch_btn').click(function (e) {

					// e.preventDefault();
			// });		
			// } 
			// });
			// }
			// }
			
			
			
		});

});
</script>
<?php //get_sidebar('updates');?>
<?php get_footer(); ?>