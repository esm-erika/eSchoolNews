<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside id="sidebar" class="small-12 large-4 columns">

	<?php 
	if( is_singular('webinars')) { 

		get_template_part( 'parts/sidebar/upcoming-webinars' );  

	}?>

	<?php if( is_tag()) {

		get_template_part( 'parts/sidebar/tag-cloud' );

	} ?>

	
	
	<!-- <div class="box-ad"><img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sample-ad.png"/></div> -->

	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>