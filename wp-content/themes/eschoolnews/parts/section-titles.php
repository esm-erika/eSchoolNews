<?php

/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<h1 class="section-title">
	<span>

<?php 

if ( is_page('Resources')) {

echo "Resources";

} elseif ( is_archive()) {

	post_type_archive_title();
}


?>


</span>
</h1>