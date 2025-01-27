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

	<?php if( is_page('current-issue') || is_singular('digital-issues')) {
		get_template_part('parts/sidebar/issues' );
	} ?>

	<?php 

	if ( is_singular(array( 'webinars', 'whitepapers', 'special-reports' )) || in_category('leading-the-digital-leap')) {

		echo '';

	} else {

		get_template_part( 'parts/ads/embeddedbanner' );

	}

	get_template_part( 'parts/ads/currentissue' );
	
	 ?>



	<?php
	get_template_part( 'parts/sidebar/astc' );
	?>

	<?php if(is_page('Resources') || is_singular('webinars')){
		get_template_part( 'parts/sidebar/most-popular' );
	} ?>

	<?php if(is_post_type_archive('events') || is_singular('events')){
		get_template_part( 'parts/sidebar/conferences' );
	} ?>

	<?php 
	if( is_post_type_archive('events')) { 
		get_template_part( 'parts/sidebar/upcoming-webinars' );
	} ?>

	<?php
	if( in_category('leading-the-digital-leap')) { 
		get_template_part( 'parts/sidebar/digital-leap' );  	
	}
	?>

	<?php 
	if( is_post_type_archive( array('webinars', 'special-reports', 'ercs')) || is_search() || is_singular('whitepapers') || is_tax('sponsor')) { 
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
	if( is_post_type_archive('whitepapers' ) || is_tax('company_categories')) { 
		get_template_part( 'parts/sidebar/company-categories' );
	
	}
	?>



	<?php 

	if ( is_singular(array( 'webinars', 'whitepapers', 'special-reports' )) || in_category('leading-the-digital-leap')) {

		echo '';

	} else {

		get_template_part( 'parts/ads/embeddedbanner-2' ); 

	} ?>

	<?php if ( is_home() || is_front_page() ) { ?>

		<script type="application/javascript" src="http://shindig.com/event/data/demo_series?series=65&joinbefore=60"></script>
		<script src="http://shindig.com/js/widgets/RSVPSeriesWidget.js"></script>
		<script>var series_base_url='http://shindig.com';</script>

		<div style="margin: auto; " id="shindig_rsvp_series_widget_300"></div>

		<br>

		<?php get_template_part( 'parts/sidebar/links' ); ?>

	<?php } ?>

	
	

	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>

