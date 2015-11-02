<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php
$webinars = new WP_Query(array(
	'post_type' => 'webinars',
	'posts_per_page' => '6',
	'tax_query' => array(
		array(

			'taxonomy' => 'status-webinars',
			'field' => 'slug',
			'terms' => 'archived-webinars',

			),

		),

		));  ?> 

		<div class="row">
			<?php get_template_part( 'parts/section-titles' ); ?>

			<!-- Row for main content area -->
			<div class="small-12 medium-12 columns" role="main">

				<h4>Recently Recorded Webinars</h4>

				<br/>

				<ul class="medium-block-grid-2">

					<?php while ( $webinars->have_posts() ) : $webinars -> the_post(); ?>

					<li>
						<article class="row">
							<div class="small-12 medium-4 columns">

								<?php   
								$smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
								$largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
								?>

								<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">
							</div>
							<header class="small-12 medium-8 columns">
								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

								<!-- <h6>Related Tags</h6> -->
								<p class="related-tags">

									<?php
									$posttags = get_the_tags();
									$count=0;
									if ($posttags) {
										foreach($posttags as $tag) {
											$count++;
											echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a> ';
											if( $count >5 ) break;
										}
									}
									?>
								</p>
								</header>

							</article>


						</li>

						<?php endwhile; 
						wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>

			<div class="row">
				<hr class="thick">

				<?php
				$morewebinars = new WP_Query(array(
					'post_type' => 'webinars',
					'offset' => '6',
					'posts_per_page' => '-1',
					'tax_query' => array(
						array(

							'taxonomy' => 'status-webinars',
							'field' => 'slug',
							'terms' => 'archived-webinars',

							),

						),

						));  ?> 

						<div class="small-12 medium-8 columns" role="main">


							<h4>Additional Recorded Webinars</h4>
							<br/>

							<?php while ( $morewebinars->have_posts() ) : $morewebinars -> the_post(); ?>


							<article>
								<header>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>


								
								<div class="related-tags">

									<?php
									$posttags = get_the_tags();
									$count=0;
									if ($posttags) {
										foreach($posttags as $tag) {
											$count++;
											echo '<a href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a> ';
											if( $count >5 ) break;
										}
									}
									?>
								</div>
								</header>
							</article>
							<hr/>

							<?php endwhile; 
							wp_reset_postdata(); ?>
						</ul>
					</div>






					<?php get_sidebar(); ?>
				</div>
				<?php get_footer(); ?>