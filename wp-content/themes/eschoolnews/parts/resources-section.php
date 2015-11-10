<?php
/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */
$resourcessection = 0;
?>

<?php // The Query
	
		if( is_home() || is_front_page()) {
			$resources = new WP_Query(array(
				'post_type' => array( 'whitepapers', 'ercs', 'specialreports'),
				'posts_per_page' => '6'
				)); 

		} elseif ( is_category()) {
			
			//get_template_part( 'parts/category-tags' );

			$resources = new WP_Query(array(
				'cat' => $cat,
				'tag' => $categorytags,
				'posts_per_page' => '6',
				'post_type' => array( 'whitepapers', 'ercs', 'specialreports')
			)); 

					}?>


				<?php if ( $resources->have_posts() ) : ?> 
                <?php $resourcessection = 1; ?>

<div class="row">
	<div class="columns medium-12">

		<?php if(is_category()) {
		echo '<h3>';
		single_cat_title();
		echo ' Resources</h3>';
	} else {
		echo '<h1 class="section-title"><span><i class="fi-page-filled"></i> Resources</span></h1>';
	} ?>

	<ul class="small-block-grid-1 medium-block-grid-2">

		

				<?php while ( $resources->have_posts() ) : $resources -> the_post(); ?>
				
					<li> 
						<article>

						<?php get_template_part('parts/flags'); ?>
					

						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

						<header> 

							<?php if ( 'whitepapers' == get_post_type()) {

								echo '<h4>';
								the_title();
								echo '</h4>';

							} else {

								echo '<h4> <a href="';
								get_permalink(); 
								echo '">';
								the_title();
								echo '</a></h4>';

							} ?>
							

							<?php if( 'webinars' == get_post_type()){ ?>
							<h5><i class="fi-calendar"></i> <?php 
							$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
							if($showdate){ echo $showdate -> format('F d, Y');} ?></h5>
							<h5><i class="fi-clock"></i> <?php the_field('event_time'); ?></h5>

							<?php } ?>


						</header>

					</article>
				</li>

					<?php endwhile; ?>

					<?php wp_reset_query(); ?>

				

			</ul>


				<h6 class="readmore"><a href="<?php echo home_url(); ?>/resources">See All Resources &raquo;</a></h6>

			</div>
		</div>

		<?php endif;?>

