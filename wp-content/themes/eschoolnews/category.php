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


<?php // get_template_part( 'parts/ads/leaderboard' ); ?>

	<?php get_template_part( 'parts/section-titles' ); ?>

<div class="row" id="featured">
<?php 
			
global $cat;


$featured = new WP_Query(array(
	'cat' => $cat,
	'meta_query' => array(
		array(
			'key' => 'featured',
			'value' => '1',
			'compare' => '=='
			)
		),
	'posts_per_page' => 1

)); ?>

<?php if ( $featured->have_posts() ) : ?>
	<?php while ( $featured->have_posts() ) : $featured -> the_post(); ?>

		<div class="small-12 medium-6 columns" role="main">

						<?php

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
						

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

						</div>

						<article class="small-12 medium-6 columns">		

			<header> 
					<span class="flag"><a href="<?php the_permalink(); ?>">Featured</a></span>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="small-caps">By <?php the_author(); ?></p>

				<div class="excerpt">
					<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
					?>
				</div>
			</header>

		</article>
			
	<?php endwhile;  


	 else:

	$featured = new WP_Query(array(
	'cat' => $cat,
	'posts_per_page' => 1

	));

	while ( $featured->have_posts() ) : $featured -> the_post(); ?>

		<div class="small-12 medium-6 columns" role="main">

						<?php

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
						

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

						</div>

						<article class="small-12 medium-6 columns">		

			<header> 
					<span class="flag"><a href="<?php the_permalink(); ?>">Featured</a></span>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="small-caps">By <?php the_author(); ?></p>

				<div class="excerpt">
					<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
					?>
				</div>
			</header>

		</article>

	<?php endwhile;

	endif;

   wp_reset_query();  ?>

	
</div>

<?php get_template_part( 'parts/ads/leaderboard-2' ); ?>

<div class="row">

	<?php get_template_part( 'parts/top-stories' ); ?>

</div>




<div class="row">

	<hr class="thick"/>

	<div class="small-12 medium-8 columns">

		<?php get_template_part('parts/resources-section'); ?>	

		<?php get_template_part('parts/whitepaper-section'); ?>	
		
		<?php if($resourcessection == 0 and $whitepapersection == 0) { 
			//echo '<!-- display other content  -->'; 
		 	//get_template_part('parts/popular-posts');
		 	get_template_part('parts/temporary_top-stories'); 
		}?>

	</div>

	<?php get_sidebar(); ?>
</div>




</div>


<?php get_footer(); ?>