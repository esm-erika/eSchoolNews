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
		'posts_per_page' => 1,
					'tax_query' => array(
						array(

							'taxonomy' => 'status',
							'field' => 'slug',
							'terms' => 'active-erc',

							),

						),
				)); ?>

				<?php if ( $featured->have_posts() ) : ?>
				
				<div class="row">
				

				<div class="small-12 medium-12 columns" role="main">
					<div class="featured-slick">

							<?php while ( $featured->have_posts() ) : $featured -> the_post(); ?>

							<div>

					<?php 

					$image = get_field('masthead_image');

					if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					
		
			<?php if( get_field('masthead_text')): ?>
			
				<?php the_field('masthead_text') ?>
			
			<?php endif; ?>
		


	<h6 class="readmore"><a href="<?php the_permalink(); ?>">Read More &raquo;</a></h6>

				</div>

							<?php endwhile; ?>

		<?php wp_reset_query(); ?>
	</div>
		<hr class="thick"/>
</div>
</div>

<?php endif;?>






	<div class="row">
		<div class="small-12 medium-8 columns">

					
			<!-- <h4>Active ERCs</h4> -->


				<?php

				// The Query
				$args = array(
					'posts_per_page' => -1,
					'tax_query' => array(
						array(

							'taxonomy' => 'status',
							'field' => 'slug',
							'terms' => 'active-erc',

							),

						),

					
					);

					$query2 = new WP_Query( $args ); ?>
							

				<ul class="medium-block-grid-2">



				<?php // The Loop
				while ( $query2->have_posts() ) :
					$query2->the_post(); ?>

				
				<li>
					<?php 

					$image = get_field('masthead_image');

					if( !empty($image) ): ?>

					<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
				<?php endif; ?>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				</li>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>

		<hr/>

		<div class="erc-sponsors">

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
			
	
			

</div>

	<?php echo get_sidebar(); ?>
</div>
	<?php get_footer(); ?>
