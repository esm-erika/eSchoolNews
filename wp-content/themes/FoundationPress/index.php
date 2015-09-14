<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>



<div id="featured-article" class="row top">

	<?php get_template_part( 'parts/ads/leaderboard' ); ?>
		
	<?php get_template_part( 'parts/featured-article' ); ?>

</div>

	

<div class="row">
	<div class="small-12 large-12 columns right-column top-stories">
		<?php get_template_part( 'parts/top-stories' ); ?>
	</div>
</div>


<div class="bottom">

	<div class="row">

	<div class="small-12 large-8 columns">

			<?php get_template_part('parts/secondary'); ?>		

		<!-- secondary -->

		
		<?php get_template_part('parts/tertiary'); ?>

		<!-- tertiary -->





</div>

	<?php get_sidebar(); ?>

</div>


		<?php //get_template_part('parts/quaternary'); ?>



<?php get_footer(); ?>