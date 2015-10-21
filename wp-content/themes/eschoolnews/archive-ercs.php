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
		<h4>Featured ERCs</h4>
		<br/>

		<?php

				// The Query
		$args = array(
			'tax_query' => array(
				array(

					'taxonomy' => 'status',
					'field' => 'slug',
					'terms' => 'active',

					),

				),

			'meta_query' => array(
				array(
					'key' => 'featured',
					'value' => '1',
					'compare' => '=='
					)
				)
			);

			$query = new WP_Query( $args ); ?>


				<?php // The Loop
				while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<div class="panel callout radius">

					<?php 
						    //$smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
					$largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
					?>

					<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)]">

					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

				</div>




				

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			<?php 
			//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

			$taxonomy     = 'sponsor';
			$orderby      = 'name'; 
			$show_count   = 0;      // 1 for yes, 0 for no
			$pad_counts   = 0;      // 1 for yes, 0 for no
			$hierarchical = 1;      // 1 for yes, 0 for no
			$title        = 'Sponsors';

			$args = array(
			  'taxonomy'     => $taxonomy,
			  'orderby'      => $orderby,
			  'show_count'   => $show_count,
			  'pad_counts'   => $pad_counts,
			  'hierarchical' => $hierarchical,
			  'title_li'     => $title
			);
			?>

			<ul>
			<?php wp_list_categories( $args ); ?>
			</ul>

		</div>
		<div class="small-12 medium-4 columns">
			<h4>Active ERCs</h4>
			<br/>

			<ul class="medium-block-grid-1">

				<?php

				// The Query
				$args = array(
					'tax_query' => array(
						array(

							'taxonomy' => 'status',
							'field' => 'slug',
							'terms' => 'active',

							),

						),

					
					);

					$query2 = new WP_Query( $args ); ?>


				<?php // The Loop
				while ( $query2->have_posts() ) :
					$query2->the_post(); ?>

				<?php 
				$smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
				$largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
				?>
				<li>
					<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">


					<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

				</li>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			

		</div>
	</div>
	<?php get_footer(); ?>
