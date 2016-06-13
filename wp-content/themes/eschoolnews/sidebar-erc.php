<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside id="sidebar" class="small-12 medium-4 columns">
	<br/>
	<div class="ad-container">

		<a href="#">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/300x250ad.jpeg">
		</a>

	</div>

	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>