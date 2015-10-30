<?php
/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="row">
<hr/>

	

	<h1 class="section-title"><span><i class="fi-page"></i> White Papers</span></h1>


		<ul class="small-block-grid-1 large-block-grid-2">


			<?php if ( have_posts() ) : ?>

					<?php
						// if ( is_front_page() ) {
							query_posts( array ( 'post_type' => array('whitepapers'), 'posts_per_page' => 6, 'orderby' =>'rand'));
						//}
					?>

					<?php while ( have_posts() ) : the_post(); ?>
						
					
					<li>
					<article class="row">

						<div class="medium-4 columns">

						<?php   
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

												<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

					</div>
						

						<header class="medium-8 columns"> 
							<h5><?php the_title(); ?></h5>
							<a href="#" class="button tiny radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download</a>
							<?php get_template_part( 'parts/whitepapers-modal' ); ?>
						</header>

						

					</article>

					</li>

					<?php endwhile; ?>

					<?php wp_reset_query(); ?>

					<?php endif;?>


		</ul>

		<h6 class="readmore"><a href="<?php echo home_url(); ?>/whitepapers">Read All White Papers &raquo;</a></h6>

	</div>