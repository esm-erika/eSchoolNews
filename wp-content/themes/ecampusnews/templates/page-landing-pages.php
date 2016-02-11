<?php
/*
Template Name: Top Level Landing Pages
*/
get_header(); ?>


<div class="row">


	<?php // get_template_part( 'parts/ads/leaderboard' ); ?>
	
	<?php get_template_part( 'parts/section-titles' ); ?>

	<div class="small-12 medium-12 columns" role="main">

	
	<?php if( is_page('trending-topics')) {

		get_template_part( 'parts/landing-pages/trending-topics' );

	} elseif ( is_page('campus-departments')) {
		get_template_part( 'parts/landing-pages/campus-departments' );
	
	} elseif( is_page('industry-update')) {
		get_template_part( 'parts/landing-pages/industry-update' );
	
	} elseif( is_page('community-colleges')) {
		get_template_part( 'parts/landing-pages/community-colleges' );
	
	/*} elseif( is_page('colleague-corner')) {
		get_template_part( 'parts/landing-pages/colleague-corner' );
	
	*/}  else {
		echo '<!-- NO RESULTS -->';

	} ?>

	
	</div>
	
	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
