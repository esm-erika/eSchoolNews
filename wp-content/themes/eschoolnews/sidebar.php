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

	<?php get_template_part( 'parts/ads/embeddedbanner' );?>

	<?php if(is_page('Resources')){
		get_template_part( 'parts/sidebar/topics' );
		//get_template_part( 'parts/ads/embeddedbanner-2' );
	} ?>


	<?php if(is_post_type_archive('events')){
		get_template_part( 'parts/sidebar/conferences' );
		//get_template_part( 'parts/ads/embeddedbanner-2' );
	} ?>

	<?php 
	if( is_page('Resources') || is_post_type_archive('events')) { 
		//get_template_part( 'parts/ads/embeddedbanner' );
		get_template_part( 'parts/sidebar/upcoming-webinars' );
		//get_template_part( 'parts/ads/embeddedbanner-2' );
	} ?>

	  <?php
	if( is_singular('webinars')) { 
		//get_template_part( 'parts/ads/embeddedbanner' );
		get_template_part( 'parts/sidebar/sponsored-by' );  
		//get_template_part( 'parts/ads/embeddedbanner-2' );
		}
	 ?>


	 <?php if(is_singular( array('webinars', 'events') )) {
		//get_template_part( 'parts/ads/embeddedbanner' );
	 	get_template_part( 'parts/sidebar/speakers' );
		//get_template_part( 'parts/ads/embeddedbanner-2' );
	 }

	  ?>

	<?php if( is_tag() || is_page('Top Stories')) {
		//get_template_part( 'parts/ads/embeddedbanner' );
		get_template_part( 'parts/sidebar/tag-cloud' );
		//get_template_part( 'parts/ads/embeddedbanner-2' );

	} ?>

	<?php if(is_front_page() && is_home() || is_category() || is_page('Top Stories')){
		//get_template_part( 'parts/ads/embeddedbanner' );
		get_template_part( 'parts/sidebar/professional-development' );
		//get_template_part( 'parts/ads/embeddedbanner-2' );

	} ?>

	<?php
	if( is_singular('post')) { 
		//get_template_part( 'parts/ads/embeddedbanner' );
		get_template_part( 'parts/sidebar/related-content' );  
		//get_template_part( 'parts/ads/embeddedbanner-2' );
	
		}
	 ?>

	 <?php
	if( is_post_type_archive('whitepapers' )) { 
		//get_template_part( 'parts/ads/embeddedbanner' );
		get_template_part( 'parts/sidebar/company-categories' );  
		//get_template_part( 'parts/ads/embeddedbanner-2' );
	
		}
	 ?>

	 <?php get_template_part( 'parts/ads/embeddedbanner-2' ); ?>
	

	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>

