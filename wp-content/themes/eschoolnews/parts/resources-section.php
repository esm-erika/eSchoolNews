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
				'post_type' => array( 'ercs', 'specialreports'),
				'posts_per_page' => '6'
				)); 

		} elseif ( is_category()) {
			
			get_template_part( 'parts/category-tags' );

			$resources = new WP_Query(array(
				'cat' => $cat,
				'tag' => $categorytags,
				'posts_per_page' => '6',
				'post_type' => array( 'ercs', 'specialreports')
			)); 

					}?>


				<?php if ( $resources->have_posts() ) : ?> 
                <?php $resourcessection = 1; ?>

<div class="row">
	<div class="small-12 medium-12 columns">
		
		<?php if(is_category()) {
		echo '<h4>';
		single_cat_title();
		echo ' Resources</h4>';
		echo '<br/>';
	} else {
		echo '<h1 class="section-title"><span><div class="icon resources"></div> Resources</span></h1>';
	} ?>

		

				<?php while ( $resources->have_posts() ) : $resources -> the_post(); ?>
				
					
						<article class="row">

						
					<div class="small-12 medium-4 columns">

						<?php if( has_post_thumbnail()){
							the_post_thumbnail('small');
						} ?>

					</div>

						<header class="small-12 medium-8 columns"> 
							<?php get_template_part('parts/flags'); ?>
				<h4> <a href="<?php the_permalink();?>"><?php the_title( ); ?></a></h4>
								
							<?php if( 'webinars' == get_post_type()){ ?>
							<h5><i class="fi-calendar"></i> <?php 
							$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
							if($showdate){ echo $showdate -> format('F d, Y');} ?></h5>
							<h5><i class="fi-clock"></i> <?php the_field('event_time'); ?></h5>

							<?php } ?>

							<?php the_field('masthead_text') ?>


						</header>

					</article>

					<hr>
				

					<?php endwhile; ?>

					<?php wp_reset_query(); ?>

				

			


				<h6 class="readmore"><a href="<?php echo home_url(); ?>/resources">See All Resources &raquo;</a></h6>

			</div>
		</div>

		<?php endif;?>

