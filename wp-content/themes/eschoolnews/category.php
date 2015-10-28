<?php
/**
 * The category template files
 *
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>




	<?php // get_template_part( 'parts/ads/leaderboard' ); ?>
		
	<?php get_template_part( 'parts/featured-article' ); ?>




<div class="row">

		<?php get_template_part( 'parts/top-stories' ); ?>
</div>


<div class="bottom">

	<div class="row">

		<hr class="thick"/>

	<div class="small-12 large-8 columns">

			<?php get_template_part('parts/resources-section'); ?>		

		<!-- secondary -->

		
		<?php get_template_part('parts/whitepaper-section'); ?>

		<!-- tertiary -->





</div>

	<?php get_sidebar(); ?>

</div>




<?php get_footer(); ?>