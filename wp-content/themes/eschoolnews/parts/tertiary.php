<?php
/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<section class="tertiary">

	<h1 class="section-title"><span><i class="fi-page"></i> White Papers</span></h1>


		<ul class="small-block-grid-2 large-block-grid-3">


			<?php if ( have_posts() ) : ?>

					<?php
						// if ( is_front_page() ) {
							query_posts( array ( 'post_type' => array('whitepapers'), 'posts_per_page' => 6, 'orderby' =>'rand'));
						//}
					?>

					<?php while ( have_posts() ) : the_post(); ?>
						
					
					<li>
					<article>

						<?php //the_post_thumbnail('small-thumb');  
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'small-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>
						

						<header> 
							<h5><?php the_title(); ?></h5>
							<a href="#" data-reveal-id="<?php the_slug(); ?>">Download</a>
							<?php get_template_part( 'parts/whitepapers-modal' ); ?>
						</header>

						

					</article>

					</li>

					<?php endwhile; ?>

					<?php wp_reset_query(); ?>

					<?php endif;?>

					<?php rewind_posts(); ?>

		</ul>

		<h6 class="readmore"><a href="<?php echo home_url(); ?>/whitepapers">See More White Papers &raquo;</a></h6>

	</section>