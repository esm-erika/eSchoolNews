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

	echo 'Resources';

} elseif ( is_page('Top Stories')) {

	echo 'Top Stories';

} elseif ( is_page('Registration')) {

	echo 'Registration';

} elseif ( is_post_type_archive('special-reports')) {

	echo 'Special Reports';

//} elseif ( is_post_type_archive('whitepapers')) {

	//echo 'White Papers';


} elseif ( is_archive()) {

	echo get_queried_object()->name;

} elseif ( is_archive()) {
	
	single_cat_title();

	//echo 'TEST';
}


?>

</span></h1>





