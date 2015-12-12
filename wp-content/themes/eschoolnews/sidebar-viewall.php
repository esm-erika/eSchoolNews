<?php
/**
 * The sidebar for the page 2+ of a category view that will not show on page 1
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>


<aside id="sidebar" class="small-12 medium-4 columns">

	<?php
			get_template_part( 'parts/ads/embeddedbanner' );
		
			//get_template_part( 'parts/sidebar/most-popular' ); 			
			
			get_template_part( 'parts/ads/embeddedbanner-2' );
	 ?>

	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>

