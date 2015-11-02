<?php
/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<?php // The Query
	
		if( is_home() || is_front_page()) {
			$resources = new WP_Query(array(
				'post_type' => array( 'whitepapers', 'ercs', 'specialreports'),
				'posts_per_page' => '6'
				)); 

		} elseif ( is_category()) {
			
			global $cat;


			$resources = new WP_Query(array(
				'cat' => $cat,
				'posts_per_page' => '6',
				'post_type' => array( 'whitepapers', 'ercs', 'specialreports')
				)); 
						

					}?>


				<?php if ( $resources->have_posts() ) : ?> 

<div class="row">

	


	<div class="columns medium-12">

		<?php if(is_category()) {
		echo '<h2>';
		single_cat_title();
		echo ' Resources</h2>';
	} else {
		echo '<h1 class="section-title"><span><i class="fi-page-filled"></i> Resources</span></h1>';
	} ?>

	<ul class="small-block-grid-1 medium-block-grid-2">

		

				<?php while ( $resources->have_posts() ) : $resources -> the_post(); ?>
				
					<li> 
						<article>

						<?php //Prints the CPT and links to the archive page for that CPT
							$post_type = get_post_type_object( get_post_type($post) );
							echo '<span class="flag content">';
							echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
							echo $post_type->labels->singular_name; 
							echo '</a></span>';
							?>
					

						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

						<header> 
							
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

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


				<h6 class="readmore"><a href="<?php echo home_url(); ?>/resources">Read All Resources &raquo;</a></h6>

			</div>
		</div>

		<?php endif;?>

