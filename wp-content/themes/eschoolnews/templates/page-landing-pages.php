<?php
/*
Template Name: Top Level Landing Pages
*/
get_header(); ?>


<div class="row">


	<?php get_template_part( 'parts/ads/leaderboard' ); ?>
	
	<?php get_template_part( 'parts/section-titles' ); ?>

	<div class="small-12 medium-12 columns" role="main">

	
	<?php if( is_page('top-trends')) {

		get_template_part( 'parts/landing-pages/top-trends' );

	} elseif ( is_page('thought-leadership')) {
		get_template_part( 'parts/landing-pages/thought-leadership' );
	
	} elseif( is_page('technology')) {
		get_template_part( 'parts/landing-pages/technology' );
	
	} elseif( is_page('digital-curriculum')) {
		get_template_part( 'parts/landing-pages/digital-curriculum' );
	
	} elseif( is_page('colleague-corner')) {
		get_template_part( 'parts/landing-pages/colleague-corner' );
	
	} else {
		echo '<!-- NO RESULTS -->';

	} ?>

	
	</div>
	
	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
