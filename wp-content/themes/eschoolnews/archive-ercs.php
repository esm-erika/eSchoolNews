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

<?php get_template_part( 'parts/section-titles' ); ?>


	<?php $featured = new WP_Query(array(
		'post_type' => 'ercs',
				'meta_query' => array(
					array(
						'key' => 'featured_resource',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => 1
				)); ?>

				<?php if ( $featured->have_posts() ) : ?>
				
				<div class="row">
				

				<div class="small-12 medium-12 columns" role="main">
					<h4>Featured</h4>

							<?php while ( $featured->have_posts() ) : $featured -> the_post(); ?>

							<div>

					<?php 

					$image = get_field('masthead_image');

					if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<?php if( get_field('masthead_text')): ?>
		<div>
			<?php the_field('masthead_text') ?>
		</div>
	<?php endif; ?>

	<h6 class="readmore"><a href="<?php the_permalink(); ?>">Read More &raquo;</a></h6>

				</div>

							<?php endwhile; ?>

		<?php wp_reset_query(); ?>
		<hr class="thick"/>
</div>
</div>

<?php endif;?>






	<div class="row">
		<div class="small-12 medium-8 columns">

					
			<h4>Active ERCs</h4>

			<ul class="medium-block-grid-2">

				<?php

				// The Query
				$args = array(
					'tax_query' => array(
						array(

							'taxonomy' => 'status',
							'field' => 'slug',
							'terms' => 'active-erc',

							),

						),

					
					);

					$query2 = new WP_Query( $args ); ?>


				<?php // The Loop
				while ( $query2->have_posts() ) :
					$query2->the_post(); ?>

				<?php 

					$image = get_field('masthead_image');

					if( !empty($image) ): ?>
				<li>
					<a href="<?php the_permalink(); ?>">

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></a>

					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

				</li>

			<?php endif; endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>

		<hr/>

	<h4>Sponsors</h4>

<?php
				//list terms in a given taxonomy (useful as a widget for twentyten)
				$taxonomy = 'sponsor';
				$tax_terms = get_terms($taxonomy);
				?>
				<ul>
				<?php
				foreach ($tax_terms as $tax_term) {
				echo '<li>' . '<a href="' . esc_attr(get_term_link($tax_term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $tax_term->name ) . '" ' . '>' . $tax_term->name.'</a></li>';
				}
				?>
			</ul>
	
			

</div>

	<?php echo get_sidebar(); ?>
</div>
	<?php get_footer(); ?>
