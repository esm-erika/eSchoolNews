<?php
/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>


<section class="secondary">
<div class="row">

<h1 class="columns section-title"><span><i class="fi-bookmark"></i> Resources</span></h1>


		<?php if ( have_posts() ) : ?>

					<?php
						if ( is_front_page() ) {
							query_posts( array ( 'category_name' => 'category-2', 'posts_per_page' => 2 ));
						} elseif( is_category()) {

							global $query_string;
							query_posts( $query_string . '&posts_per_page=2&category_name=category-2' );
						}
					?>

					<?php while ( have_posts() ) : the_post(); ?>
						
					
					<article class="small-12 large-6 columns">

						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

						<header> 
 
							<p class="category"><a href="#">ERC</a></p>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</header>

					</article>

					<?php endwhile; ?>

					<?php wp_reset_query(); ?>

				<?php endif;?>

				<?php rewind_posts(); ?>

				<h6  class="readmore columns"><a href="#">See More Resources &raquo;</a></h6>

				</div>
				</section>