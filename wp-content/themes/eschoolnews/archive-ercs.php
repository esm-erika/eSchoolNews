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

					<?php

					$terms_of_post = get_the_term_list( $post->ID, 'sponsor', 'Sponsored by: ','', '', '' );
					echo $terms_of_post;



					?>

				</div>




				

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			<?php 

			echo '<h6>Sponsors:</h6>';

			$args = array( 'hide_empty' => 0 );

			$terms = get_terms( 'sponsor', $args );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			    $count = count( $terms );
			    $i = 0;
			    $term_list = '<p class="my_term-archive">';
			    foreach ( $terms as $term ) {
			        $i++;
			    	$term_list .= '<span class="flag content"><a href="' . get_term_link( $term ) . '" title="' . sprintf( __( 'View all %s ERCs', 'my_localization_domain' ), $term->name ) . '">' . $term->name . '</a></span>';
			    	if ( $count != $i ) {
			            $term_list .= ' ';
			        }
			        else {
			            $term_list .= '</p>';
			        }
			    }
			    echo $term_list;
			}

			?>

		</div>
		<div class="small-12 medium-4 columns">
			<h4>Active ERCs</h4>

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


					<h6><?php the_title(); ?></h6>

				</li>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>

			

		</div>
	</div>
	<?php get_footer(); ?>
