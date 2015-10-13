<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside id="sidebar" class="small-12 large-4 columns">

	<?php 
	if( is_singular('webinars')) { 

		// The Query
				$upcoming = array(
					'post_type' => 'webinars',
					'tax_query' => array(
						array(

							'taxonomy' => 'status-webinars',
							'field' => 'slug',
							'terms' => 'upcoming-webinars',

							),

						),

					);


				$query = new WP_Query( $upcoming );
				
				
				while ( $query->have_posts() ) :
					$query->the_post(); ?>


				<div class="row">
					<div class="large-12 columns">
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<p><?php 
                        $showdate = DateTime::createFromFormat('Ymd', get_field( "webinar_date" )); 
						echo $showdate->format('F d, Y'); ?></p>
                         
                        
					</div>
				</div>
					
					<?php endwhile; 
				wp_reset_postdata();

	} ?>
	
	<!-- <div class="box-ad"><img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sample-ad.png"/></div> -->

	<?php do_action( 'foundationpress_before_sidebar' ); ?>
	<?php dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>