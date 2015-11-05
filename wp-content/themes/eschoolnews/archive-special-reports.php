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
	<div class="small-12 medium-8 columns" role="main">

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

				
					<article class="row">
						<div class="large-4 columns">
						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">
						</div>
						<div class="large-8 columns">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p class="small-caps"><?php the_time('F j, Y'); ?></p>

							<?php 

							$file = get_field('download_files');

							if( $file ): ?>
						  <a href="<?php echo $file['url']; ?>" class="button radius tiny">Download Report</a>
						  <?php endif; ?>

						  <a href="<?php the_permalink(); ?>" class="button tiny readmore">Read More</a>
						
					</div>

						</article>
						<hr/>
						  
				
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</ul>

		</div>
		<?php get_sidebar(); ?>
	</div>

	<div class="row">
		<div class="small-12 medium-12">

			<hr class="thick"/>

			<h4>More Special Reports</h4>

			<br/>


		<ul class="medium-block-grid-2">

			<?php

				// The Query
				$args2 = array(
					'post_type' => 'special-reports',
					'orderby' => 'date',
					'offset' => '5'
					);

				$query2 = new WP_Query( $args2 ); ?>


				<?php // The Loop
				 while ( $query2->have_posts() ) :
					$query2->the_post(); ?>
<li>
			<div class="row">
				<div class="small-6 medium-4 columns">
					<?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('full');
						} ?>
				</div>
				<div class="small-6 medium-8 columns">
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<p class="small-caps"><?php the_time('F j, Y'); ?></p>
				
					<?php 

							$file = get_field('download_files');

							if( $file ): ?>
						  <a href="<?php echo $file['url']; ?>" class="button radius tiny">Download Report</a>
						  <?php endif; ?>

						  <a href="<?php the_permalink(); ?>" class="button tiny readmore">Read More</a>

				</div>
				
			</div>
		</li>

			

			<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>


</ul>
	</div>
	
</div>
<?php get_footer(); ?>
