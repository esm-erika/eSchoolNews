<?php
/*
Template Name: Top Level Landing Pages
*/
get_header(); ?>


<div class="row">

	<?php get_template_part( 'parts/ads/leaderboard' ); ?>
	
	<?php get_template_part( 'parts/section-titles' ); ?>

	<div class="small-12 medium-12 columns" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>



	

	<?php do_action( 'foundationpress_after_content' ); ?>

	
	</div>
	
	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
