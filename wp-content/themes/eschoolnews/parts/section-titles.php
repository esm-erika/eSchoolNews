<?php

/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>



<div class="medium-12 columns"><h1 class="section-title"><span>

<?php 

if ( is_page()) {

	the_title();

} elseif ( is_page('Resources')) {

	echo 'Resources';

} elseif ( is_archive()) {

	echo get_queried_object()->name;

} 

?>

</span></h1></div>





