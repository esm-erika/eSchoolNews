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

	<?php 

	if ( is_singular('whitepapers') || in_category('leading-the-digital-leap')) {

		echo '';

	} else {

		get_template_part( 'parts/ads/embeddedbanner' );

	} ?>

	<?php
	get_template_part( 'parts/sidebar/astc' );
	?>

	<?php if(is_page('Resources')){
		get_template_part( 'parts/sidebar/topics' );
	} ?>

	<?php if(is_post_type_archive('events')){
		get_template_part( 'parts/sidebar/conferences' );
	} ?>

	<?php 
	if( is_page('Resources') || is_post_type_archive('events')) { 
		get_template_part( 'parts/sidebar/upcoming-webinars' );
	} ?>

	<?php
	if( in_category('leading-the-digital-leap')) { 
		get_template_part( 'parts/sidebar/digital-leap' );  	
	}
	?>

	<?php 
	if( is_post_type_archive('webinars') || is_search() || is_post_type_archive( 'special-reports') || is_post_type_archive( 'ercs')) { 
		get_template_part( 'parts/sidebar/resources' );
	} ?>

	<?php
	if( is_singular('webinars')) { 
		get_template_part( 'parts/sidebar/sponsored-by' );  
	}
	?>


	<?php if(is_singular( array('webinars', 'events') )) {
		get_template_part( 'parts/sidebar/speakers' );
	}

	?>

	<?php if( is_tag() || is_page('Top Stories')) {
		get_template_part( 'parts/sidebar/tag-cloud' );

	} ?>

	<?php if(is_front_page() && is_home() || is_category() || is_page('Top Stories')){
		get_template_part( 'parts/sidebar/professional-development' );

	} ?>

	<?php
	if( is_singular('post')) { 
		get_template_part( 'parts/sidebar/related-content' );  

	}
	?>

	<?php
	if( is_post_type_archive('whitepapers' ) || is_tax()) { 
		get_template_part( 'parts/sidebar/company-categories' );  	
	}
	?>


	<?php
	if( is_category()) { 
			//get_template_part( 'parts/sidebar/most-popular' );  	
	}
	?>

	<?php 

	if ( is_singular('whitepapers') || in_category('leading-the-digital-leap')) {

		echo '';

	} else {

		get_template_part( 'parts/ads/embeddedbanner-2' ); 

	} ?>

	<?php if ( is_home() || is_front_page() ) {
		get_template_part( 'parts/sidebar/links' );

	} ?>
	

	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>

