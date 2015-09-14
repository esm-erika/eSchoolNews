<?php
/**
 * Template part for featured article 
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

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
			

			<?php the_post_thumbnail(); ?>

		</div>

		<article class="small-12 large-6 columns">


			

			<header> 
					<p class="category"><a href="#">Featured</a></p>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="author">By <?php the_author(); ?></p>

				<div class="excerpt">
					<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '' ), true); 
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

