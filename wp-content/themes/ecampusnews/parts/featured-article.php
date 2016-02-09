<?php
/**
 * Template part for featured article 
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>




		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php // The Query
		
			if( is_home() || is_front_page()) {
			$featured = new WP_Query(array(
				'meta_query' => array(
					array(
						'key' => 'front_page',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => 1
				)); 


		} elseif ( is_singular( array( 'webinars', 'whitepapers', 'specialreports', 'ercs' )) ) {

			$post_type = get_post_type( $post->ID );

			$featured = new WP_Query(array(
				'post_type' => $post_type,
				'meta_query' => array(
					array(
						'key' => 'featured',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => 1
				)); 

		} elseif ( is_page('resources')) {

			$featured = new WP_Query(array(
				'post_type' => array( 'whitepapers', 'erc', 'webinars', 'specialreports', 'events'),
				'meta_query' => array(
					array(
						'key' => 'featured_resource',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => 1
				)); 
		} ?>

				<?php if ( $featured->have_posts() ) : ?>


				<div class="row" id="featured">

				<?php if( is_page('resources')) {
					echo '';

				} elseif (is_category()) {
					echo '';


				}else{

				echo '<h1 class="section-title"><span>Featured</span></h1>';

					} ?>




				<?php while ( $featured->have_posts() ) : $featured -> the_post(); ?>
			
						<div class="small-12 medium-6 columns" role="main">

						<?php if(has_post_thumbnail()){

							the_post_thumbnail('medium-landscape');

						} ?>

						</div>

						<article class="small-12 medium-6 columns">		

			<header> 
					<span class="flag"><a href="<?php the_permalink(); ?>">Featured</a></span>
				<h2>
					<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h2>
<?php  global $pagefeaturedid;  $pagefeaturedid = get_the_ID(); ?>

			<?php if(get_field('subheader')){
					echo '<h4 class="subheader">';
					the_field('subheader');
					echo '</h4>';
			} ?>

				<?php if( get_field('remove_author')) { 

						echo '';

					} else { ?>

						<div class="small-caps">
							
							<?php  if( get_field('Alt Author Read More Name')) {

								echo 'By ';

								the_field('Alt Author Read More Name');

							}elseif(get_field('Byline')){

								the_field('Byline');

							} else {
								echo 'By ';

								the_author();

							} ?>

						</div>

					<?php } ?>


				<div class="excerpt">
					<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
					?>
				</div>
			</header>

		</article>

	</div>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>


<?php if( is_page('resources')) { ?>

<div class="row">
	<div class="small-12 medium-12 columns">
<hr class="thick" />
</div>
</div>

<?php }?>

<?php //get_template_part( 'parts/ads/leaderboard-2' ); ?>


	<?php endif;?>





	
