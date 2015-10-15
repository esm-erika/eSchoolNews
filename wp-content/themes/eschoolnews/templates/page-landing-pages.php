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

	}?>

	
	</div>
	
	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
