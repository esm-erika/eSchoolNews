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

		<h4>Upcoming Events</h4>
		<br/>

		<?php

				// The Query
				$args = array(
					'post_type' => 'events',
					'posts_per_page' => '5',
					);

				$query = new WP_Query( $args ); ?>

				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h3 class="entry-title"><?php the_title(); ?></h3>
				<p class="date"><?php the_time('F j, Y'); ?></p>
				<p><?php the_tags('<span class="flag event">','</span><span class="flag event">','</span>'); ?></p>
			</header>
		</article>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

		<hr class="thick"/>

		<h4>Conference News</h4>
		<br/>

	<?php

				// The Query
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => '5',
					'orderby' => 'date',
					'tag' => 'aasa, alas, ascd, blc, cosn, cue, fetc, infocomm, iste, nsba, tcea, event, events, conference, conferences'
					);

				$query = new WP_Query( $args ); ?>

				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<h6>By <?php the_author(); ?></h6>
				<p class="date"><?php the_time('F j, Y'); ?></p>
				
			</header>
		</article>

				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

		
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
