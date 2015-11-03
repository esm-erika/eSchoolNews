<?php
/**
 * Template part for Top Stories 2x2 w/Halfpage Ad Layout
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="small-12 large-8 columns right-column top-stories">

	<?php if(is_category()) {
	echo '';
} else {
	echo '<h1 class="section-title"><span><i class="fi-page-filled"></i> Top ';
	single_cat_title(); 
	echo ' Stories</span></h1>';
} ?>
	
	<div class="row">

		<div class="columns large-12">

			<?php
			if ( is_front_page() ) {
				query_posts( array ( 'post_type' => 'post', 'posts_per_page' => 4, 'cat' => -4 ));
			} elseif (is_category()) {
				global $query_string;
				query_posts( $query_string . '&posts_per_page=3&offset=1' );
			}
			?>

<ul class="small-block-grid-1 medium-block-grid-2">

	<?php if( have_posts() ) : while( have_posts() ) : the_post(); ?>			

	<li>

		<article>

			<header> 
				<span class="flag"><a href="<?php site_url(); ?>/top-stories">News</a></span>
				<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<div class="excerpt">
						<?php 
						echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 15, $more = '' ), true); 
						?>
					</div>
				</header>

			</article>

		</li>

	<?php endwhile; ?>

	<?php wp_reset_query(); ?>

<?php endif;?>

</ul>

<h6 class="readmore">
	<a href="<?php site_url(); ?>/top-stories">
		
			
			See All Top Stories &raquo;

	</a>
</h6>
</div>

</div> <!-- end row -->
</div> <!-- end top stories -->

<?php get_template_part( 'parts/ads/halfpage' ); ?>