<?php
/**
 * Template part for featured article 
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<h1 class="section-title"><span><i class="fi-page-filled"></i> Top <?php single_cat_title(); ?> Stories</span></h1>

<div class="row">

		<?php
			if ( is_front_page() ) {
				query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 3, 'cat' => -4 ));
			} elseif (is_category()) {
				//query_posts( array ( 'posts_per_page' => 2 ));

				global $query_string;
				query_posts( $query_string . '&posts_per_page=3&offset=1' );
			}
		?>

		<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>			
		
		<article class="large-4 columns">

			<header> 
					<p class="category"><a href="#">News</a></p>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<div class="excerpt">
					<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 15, $more = '' ), true); 
					?>
				</div>
			</header>

		</article>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>

	<?php endif;?>




</div>

	<h6 class="readmore"><a href="#">Read More Top Stories &raquo;</a></h6>

