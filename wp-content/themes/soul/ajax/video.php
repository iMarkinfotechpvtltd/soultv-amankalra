<?php
include('../../../../wp-config.php');
?>
<?php
global $wpdb;
$id=$_POST['id'];
$sort=$_POST['count'];
$pack=$_POST['pack'];
$endday=$_POST['endday'];
$number=$_POST['number'];
$myrows = $wpdb->get_results( "SELECT * FROM `soul_video` WHERE user_id='$id'" );
$checked=$myrows[0]->counter;
$final= ($checked + 1);
// $numPost = count($myrows);
if($checked > $number)
	{
		echo '1';
	}
else{
	$up = $wpdb->get_results( "UPDATE `soul_video` SET `counter`='$final',`end_day`='$endday', `package`='$pack' WHERE user_id='$id'" );
	$chck= $wpdb->get_results( "SELECT `counter` FROM `soul_video` WHERE user_id='$id'" );
	$confrm=$chck[0]->counter;
		if($confrm==$number){
			echo '1';
		}
	}
//SELECT * FROM `im_posts` WHERE `ID`=169 and `post_date` LIKE '2016-05-25';
?>
