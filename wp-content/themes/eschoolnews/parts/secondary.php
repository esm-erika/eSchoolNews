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

<h1 class="section-title"><span><i class="fi-bookmark"></i> Resources</span></h1>

<div class="row">
	<div class="columns medium-12">

	<ul class="small-block-grid-1 medium-block-grid-2">

		<?php if ( have_posts() ) : ?>

					<?php
						if ( is_front_page() ) {
							query_posts( array ( 'post_type' => array('webinars','ercs','special-reports','whitepapers'), 'posts_per_page' => 2, 'orderby' =>'rand'));
		
						} elseif( is_category()) {

							//global $query_string;
							//query_posts( $query_string . '&posts_per_page=2&category_name=category-2' );
						}
					?>

					<?php while ( have_posts() ) : the_post(); ?>
						
					<li> <article>
					

						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

						<header> 
 
							<?php //Prints the CPT and links to the archive page for that CPT
							$post_type = get_post_type_object( get_post_type($post) );
							echo '<span class="flag content">';
							echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
							echo $post_type->labels->singular_name; 
							echo '</a></span>';
							?>
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						</header>

					</article></li>

					<?php endwhile; ?>

					<?php wp_reset_query(); ?>

				<?php endif;?>

				<?php rewind_posts(); ?>

			</ul>


				<h6 class="readmore"><a href="<?php echo home_url(); ?>/resources">See More Resources &raquo;</a></h6>

			</div>
		</div>

				</section>