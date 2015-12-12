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
echo '- 16 -';
	if ( is_singular('whitepapers') || in_category('leading-the-digital-leap')) {

		echo '';
echo '- 20 -';
	} else {

		get_template_part( 'parts/ads/embeddedbanner' );
echo '- 24 -';
	} ?>

	<?php
	get_template_part( 'parts/sidebar/astc' );
	?>

	<?php if(is_page('Resources')){
		get_template_part( 'parts/sidebar/topics' );echo '- 32 -';
	} ?>

	<?php if(is_post_type_archive('events')){
		get_template_part( 'parts/sidebar/conferences' );echo '- 36 -';
	} ?>

	<?php 
	if( is_page('Resources') || is_post_type_archive('events')) { 
		get_template_part( 'parts/sidebar/upcoming-webinars' );echo '- 41 -';
	} ?>

	<?php
	if( in_category('leading-the-digital-leap')) { 
		get_template_part( 'parts/sidebar/digital-leap' );  	echo '- 46 -';
	}
	?>

	<?php 
	if( is_post_type_archive( array('webinars', 'special-reports', 'ercs')) || is_search() || is_singular('whitepapers') || is_tax('sponsor')) { 
		get_template_part( 'parts/sidebar/resources' );echo '- 52 -';
	} ?>

	<?php
	if( is_singular('webinars')) { 
		get_template_part( 'parts/sidebar/sponsored-by' );  echo '- 57 -';
	}
	?>


	<?php if(is_singular( array('webinars', 'events') )) {
		get_template_part( 'parts/sidebar/speakers' );echo '- 63 -';
	}

	?>

	<?php if( is_tag() || is_page('Top Stories')) {
		get_template_part( 'parts/sidebar/tag-cloud' );echo '- 69 -';

	} ?>

	<?php if(is_front_page() && is_home() || is_category() || is_page('Top Stories')){
		get_template_part( 'parts/sidebar/professional-development' );echo '- 74 -';

	} ?>

	<?php
	if( is_singular('post')) { 
		get_template_part( 'parts/sidebar/related-content' );  echo '- 80 -';

	}
	?>

	<?php
	if( is_post_type_archive('whitepapers' ) || is_tax('company_categories')) { 
		get_template_part( 'parts/sidebar/company-categories' );  	echo '- 87 -';
	}
	?>


	<?php
	if( is_category()) { 
			get_template_part( 'parts/ads/embeddedbanner' );echo '- 94 -';
		
			echo '<!-- this is a cat -->';
			
			get_template_part( 'parts/ads/embeddedbanner-2' );
	}
	?>

	<?php 

	if ( is_singular('whitepapers') || in_category('leading-the-digital-leap')) {

		echo '';echo '- 106 -';

	} else {

		get_template_part( 'parts/ads/embeddedbanner-2' ); echo '- 110 -';

	} ?>

	<?php if ( is_home() || is_front_page() ) {
		get_template_part( 'parts/sidebar/links' );echo '- 115 -';

	} ?>
	

	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>

