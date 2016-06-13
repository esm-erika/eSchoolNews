<?php

/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<h1 class="section-title"><span>

<?php 

if ( is_page()) {

	the_title();

} elseif ( is_page('Resources')) {

	echo '<div class="icon resources"></div>';
	echo 'Resources';

} elseif ( is_page('Top Stories')) {

	echo '<div class="icon topstories"></div>';
	echo 'Top Stories';

} elseif ( is_page_template('page-registration.php')) {

	echo '<div class="icon registration"></div>';
	echo 'Registration';

} elseif ( is_post_type_archive('special-reports')) {

	echo '<div class="icon specialreports"></div>';
	echo 'Special Reports';

} elseif ( is_post_type_archive('ercs')) {

	echo '<div class="icon ercs"></div>';
	echo 'Education Resource Centers';

} elseif ( is_post_type_archive('whitepapers')) {

	echo '<div class="icon whitepapers"></div>';
	echo 'White Papers';

} elseif ( is_post_type_archive('digital-issues')) {

	//echo '<div class="icon whitepapers"></div>';
	echo 'Digital Issues';

} elseif ( is_archive()) {

	echo get_queried_object()->name;

} elseif ( is_archive()) {
	
	single_cat_title();

	//echo 'TEST';
}


?>

</span></h1>





