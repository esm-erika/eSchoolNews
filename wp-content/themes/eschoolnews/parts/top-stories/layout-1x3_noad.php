<?php
/**
 * Template part for Top Stories 1x3 w/No Ad Layout
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>




<div class="small-12 large-12 columns right-column top-stories">
	<?php if(is_category()) {
	echo '';
} else {
	echo '<h1 class="section-title"><span><i class="fi-page-filled"></i> Top ';
	single_cat_title(); 
	echo ' Stories</span></h1>';
} ?>

	<div class="row">

		<div class="columns large-12">

			<?php // The Query
				$topstories = new WP_Query(array(
				'post_type' => 'post',
				'posts_per_page' => 3
				)); 

				if ( is_category() ) {

					global $cat;

					$topstories = new WP_Query(array(
					'cat' => $cat,
					'post_type' => 'post',
					'posts_per_page' => 3
					)); 

			 } ?>

<ul class="small-block-grid-1 medium-block-grid-3">

				<?php while ( $topstories->have_posts() ) : $topstories -> the_post(); ?>

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

	<?php //endif;?>

</ul>

<h6 class="readmore">

<?php  

$current_category = get_category ($cat); 
$catplug = $current_category->slug;

	if (is_category()) {

?>
	<a href="<?php site_url(); ?>/<?php echo $catplug; ?>/page/2/>">See All <?php single_cat_title(); ?> Top Stories &raquo;</a>

<?php } else { ?>

	<a href="<?php site_url(); ?>/top-stories">See All Top Stories &raquo;</a>

</h6>

<?php } ?>


		<hr class="thick"/>

</div>

</div> <!-- end row -->
</div> <!-- end top stories -->

<?php //get_template_part( 'parts/ads/halfpage' ); ?>

