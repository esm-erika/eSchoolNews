<?php
/**
 * Template part for featured article 
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<h1 class="section-title"><span>Featured Story</span></h1>

<div class="small-12 large-6 columns" role="main">



<?php if ( have_posts() ) : ?>

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php
			if ( is_front_page() ) {
				query_posts( array ( 'category_name' => 'featured', 'posts_per_page' => 1 ));
			} elseif ( is_category()) {
				
				global $query_string;
				query_posts( $query_string . '&posts_per_page=1' );
			}

		?>

		<?php while ( have_posts() ) : the_post(); ?>
			

						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

		</div>

		<article class="small-12 large-6 columns">

			<header> 
					<span class="flag"><a href="#">Featured</a></span>
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

	<?php endif;?>

	<?php rewind_posts(); ?>


	<?php do_action( 'foundationpress_after_content' ); ?>

</div>

