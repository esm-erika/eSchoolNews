<?php
/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="large-12 columns">
<h5 class="section-title"><span>Quaternary</span></h5>



	<?php if ( have_posts() ) : ?>

		<?php
			if ( is_front_page() ) {
				query_posts( array ( 'category_name' => 'category-3', 'posts_per_page' => 6 ));
			} elseif( is_category()) {

				global $query_string;
				query_posts( $query_string . '&posts_per_page=6' );
			}
		?>

		<?php while ( have_posts() ) : the_post(); ?>
			
		<article class="row">
			<div class="small-12 medium-6 large-4 columns">
				
						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

			</div>

			<div class="small-12 medium-6 large-8 columns">

				<p class="date"><?php the_time('F j, Y'); ?></p>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

				
					<p class="author">By <?php the_author(); ?></p>


					
					
					
				

			</div>
		</article>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>

		<?php endif;?>

		<h6  class="readmore"><a href="#">See More &raquo;</a></h6>
	</div>





		