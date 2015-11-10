<?php
/**
 * Template part for featured article 
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="row" id="featured">


		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php // The Query
		
			if( is_home() || is_front_page()) {
			$featured = new WP_Query(array(
				'meta_query' => array(
					array(
						'key' => 'front_page',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => 1
				)); 


		} elseif ( is_singular( array( 'webinars', 'whitepapers', 'specialreports', 'ercs' )) ) {

			$post_type = get_post_type( $post->ID );

			$featured = new WP_Query(array(
				'post_type' => $post_type,
				'meta_query' => array(
					array(
						'key' => 'featured',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => 1
				)); 

		} elseif ( is_page('resources')) {

			$featured = new WP_Query(array(
				'post_type' => array( 'whitepapers', 'erc', 'webinars', 'specialreports', 'events'),
				'meta_query' => array(
					array(
						'key' => 'featured_resource',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => 1
				)); 
		} ?>

				<?php if ( $featured->have_posts() ) : ?>


				

				<?php if( is_page('resources')) {
					echo '';

				} elseif (is_category()) {
					echo '';


				}else{

				echo '<h1 class="section-title"><span>Featured</span></h1>';

					} ?>




				<?php while ( $featured->have_posts() ) : $featured -> the_post(); ?>
			
						<div class="small-12 medium-6 columns" role="main">

						<?php

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
						

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

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

	</div>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>




<!--  -->
</div>

	<?php endif;?>

<?php get_template_part( 'parts/ads/leaderboard-2' ); ?>

	
