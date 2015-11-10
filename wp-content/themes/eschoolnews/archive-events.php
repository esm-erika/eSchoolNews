<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">

			<?php get_template_part( 'parts/section-titles' ); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">

		

		<?php

				// The Query
				$args = array(
					'post_type' => 'events',
					'posts_per_page' => '5',
					);

				$query = new WP_Query( $args ); ?>

				<?php if( $query->have_posts() ) : ?>

				<h4>Upcoming Events</h4>
		<br/>

				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<article class="row">
					<div class="large-4 columns">
						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">
					</div>

			<header class="large-8 columns">
				<h4 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
				<div class="small-caps"><?php the_time('F j, Y'); ?></div>
				<p><?php the_tags('<span class="flag event">','</span><span class="flag event">','</span>'); ?></p>
			</header>
		</article>
		<br/>

				<?php endwhile; ?>

				<hr class="thick"/>
			<?php endif; ?>
				<?php wp_reset_postdata(); ?>

		

		<h4>Conference News</h4>
		
		

	<?php

				// The Query
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => '3',
					'orderby' => 'date',
					'tag' => 'aasa, alas, ascd, blc, cosn, cue, fetc, infocomm, iste, nsba, tcea, event, events, conference, conferences'
					);

				$query = new WP_Query( $args ); ?>

				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>


				<article class="row">
			<header class="small-12 columns">
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="small-caps">By <?php the_author(); ?></div>
				<div class="posted-on">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div>		

			</header>
		</article>

		<hr/>


		


				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			
		
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
