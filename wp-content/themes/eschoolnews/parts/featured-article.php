<?php
/**
 * Template part for featured article 
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>


		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php // The Query


			
			if( is_home() || is_front_page()) {
			$featured = new WP_Query(array(
				'meta_query' => array(
					array(
						'key' => 'featured',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => 1
				)); 

		} elseif ( is_category()) {
			
			global $cat;


			$featured = new WP_Query(array(
				'cat' => $cat,
				'meta_query' => array(
					array(
						'key' => 'featured',
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
				'post_type' => array( 'whitepapers', 'erc', 'webinars', 'specialreports'),
				'meta_query' => array(
					array(
						'key' => 'featured',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => 1
				)); 

		}

				?>

				<?php if ( $featured->have_posts() ) : ?>


				<?php if( is_page('resources')) {
					echo '';

				} else {
					echo '<h1 class="section-title"><span>Featured</span></h1>';
				}?>



<div class="row">



				<?php while ( $featured->have_posts() ) : $featured -> the_post(); ?>
			
						<div class="small-12 large-6 columns" role="main">

						<?php

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' ); ?>
						

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

						</div>

						<article class="small-12 large-6 columns">		

			<header> 
					<span class="flag"><a href="<?php the_permalink(); ?>">Featured</a></span>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="author">By <?php the_author(); ?></p>

				<div class="excerpt">
					<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 100, $more = '' ), true); 
					?>
				</div>
			</header>

		</article>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>


</div>
<div class="row">
<!--  -->
<?php if( is_page('resources')) {

echo '<hr class="thick" />';

}?>


	<?php endif;?>


	<?php do_action( 'foundationpress_after_content' ); ?>




