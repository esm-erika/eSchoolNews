<?php
/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */
$whitepapersection = 0;
?>

<?php // The Query
	
		if( is_home() || is_front_page()) {
			$whitepapers = new WP_Query(array(
				'post_type' => 'whitepapers',
				'posts_per_page' => '6'
				)); 

		} elseif ( is_category()) {
			
			//get_template_part( 'parts/category-tags' );


			$whitepapers = new WP_Query(array(
				//'cat' => $cat,
				'posts_per_page' => '6',
				'post_type' => 'whitepapers'
				)); 
						

					}?>


				<?php if ( $whitepapers->have_posts() ) : ?> 
                <?php $whitepapersection = 1; ?>

<div class="row">


<div class="small-12 medium-12 columns">

	<hr class="thick"/>

	<?php if(is_category()) {
	echo '<h4>';
	single_cat_title();
	echo ' White Papers</h4>';
} else {
	echo '<h1 class="section-title"><span><i class="fi-page"></i> White Papers</span></h1>';
} ?>


<br/>
		<ul class="small-block-grid-1 large-block-grid-2">


			<?php while ( $whitepapers->have_posts() ) : $whitepapers -> the_post(); ?>

						
					
					<li <?php post_class(); ?>>
					<article class="row">

						<div class="medium-4 columns">

						<?php   
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

												<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

					</div>
						

						<header class="medium-8 columns"> 
							<h5><?php the_title(); ?></h5>
							<a href="#" class="button tiny radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download</a>
							<?php get_template_part( 'parts/whitepapers-modal' ); ?>
						</header>

						

					</article>

					</li>

					<?php endwhile; wp_reset_query(); ?>

		</ul>

		<h6 class="readmore"><a href="<?php echo home_url(); ?>/whitepapers">See All White Papers &raquo;</a></h6>

	</div>
</div>

	<?php endif;?>