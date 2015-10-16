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
	<div class="small-12 medium-12 columns" role="main">

		<ul class="medium-block-grid-3" data-equalizer>
		    <?php

				// The Query
				$args = array(
					'post_type' => 'special-reports',
					'posts_per_page' => '5',
					'orderby' => 'date'
					);

				$query = new WP_Query( $args ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<li>
						<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('full');
						} ?>
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<p><?php the_date(); ?></p>
						<a class="button radius tiny" href="<?php the_permalink(); ?>">View Report</a>
						  
				</li>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</ul>

			<hr class="thick"/>

			<h4>More Special Reports</h4>




			<?php

				// The Query
				$args2 = array(
					'post_type' => 'special-reports',
					'orderby' => 'date'
					);

				$query2 = new WP_Query( $args2 ); ?>


				<?php // The Loop
				 while ( $query2->have_posts() ) :
					$query2->the_post(); ?>

			<div class="row">
				<div class="small-6 medium-4 columns">
					<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('full');
						} ?>
				</div>
				<div class="small-6 medium-8 columns">
					<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php the_date(); ?></p>
					<p class="excerpt">
						<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 100, $more = '' ), true); 
					?>
					</p>

					<a class="button radius small" href="<?php the_permalink(); ?>">
						View Report
					</a>

				</div>
				
			</div>

			<hr/>

			<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>



	</div>
	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>
