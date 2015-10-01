<?php

/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>





<?php 

if ( is_page('Resources')) {

	echo '<div class="medium-12 columns"><h1 class="section-title"><span>';

	echo 'Resources';

	echo '</span></h1></div>';

} elseif ( is_archive()) {

	echo '<div class="medium-12 columns"><h1 class="section-title"><span>';

	post_type_archive_title();

	echo '</span></h1></div>';

} elseif ( is_tax()) {

	//single_term_title();

	echo 'Test';
}

?>





