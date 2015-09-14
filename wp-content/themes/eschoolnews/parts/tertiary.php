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
							query_posts( array ( 'category_name' => 'category-3', 'posts_per_page' => 6 ));
						//}
					?>

					<?php while ( have_posts() ) : the_post(); ?>
						
					
					<li>
					<article>

						<?php the_post_thumbnail('small-thumb'); ?>

						<header> 
							<p class="download"><a href="#"><i class="fi-arrow-down"></i> Download</a></p>
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						</header>

						

					</article>

					</li>

					<?php endwhile; ?>

					<?php wp_reset_query(); ?>

					<?php endif;?>

					<?php rewind_posts(); ?>

		</ul>

		<h6 class="readmore"><a href="#">See More White Papers &raquo;</a></h6>

	</section>