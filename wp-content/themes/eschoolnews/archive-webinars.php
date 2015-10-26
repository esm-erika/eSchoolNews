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

<div class="row">
		<?php get_template_part( 'parts/section-titles' ); ?>


<!-- Row for main content area -->
	<div class="small-12 medium-12 columns" role="main">

<?php 	$args = array(
			'post_type' => array( 'webinars' ),
            'meta_key' => 'event_date',
            'orderby' => 'meta_value meta_value_num',
            'order' => 'DESC'
);
		$query = new WP_Query( $args );
		$count = 0;
			
			//loop the post and look for upcoming items. Save them for output. 
			if ( have_posts() ) : 
			ob_start( );
			?>
            
<h4>Upcoming Webinars</h4>
	  <br/>


		<ul class="small-block-grid-1 medium-block-grid-2">




<?php
						 while ( have_posts() ) : the_post(); 
					
$webinar_date = get_field( "event_date" );
$webinar_registration_link = get_field_object("registration_link");
$todayis = date("Ymd");
$showdate = DateTime::createFromFormat('Ymd', $webinar_date);

if($webinar_date >= $todayis){
	$count++
					?>
						
					
					<li>
					<article class="row">
						

							<div class="large-4 columns">

						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

					</div>

						<header class="large-8 columns"> 
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                            <h6><?php if($showdate){echo $showdate->format('F d, Y');} ?></h6>
                            <a class="button radius small" target="new" href="<?php the_field('registration_link'); ?>">Register Now</a>
						</header>

						
					</article>

					</li>

					<?php 
					} //check if in date range
					endwhile; ?>

					<hr/>

					<?php
					$upcomingwebinars = ob_get_clean( );
					if($count > 0){
						echo $upcomingwebinars;	
						} 
						
						// else should be put in in case there are not any. 
					
					
					?>

					
                   	<?php wp_reset_query(); ?>

                   

		</ul>

		<!-- <h6 class="readmore"><a href="#">See More Webinars &raquo;</a></h6> -->

		



	
					<?php endif;?>



<?php 	$args = array('post_type' => array( 'Webinars' ),'meta_key' => 'event_date','orderby' => 'meta_value meta_value_num','order' => 'DESC');
		$query = new WP_Query( $args );
		$count = 0;
				//loop the post and look for past items. Save them for output. 
			if ( have_posts() ) : 
			ob_start( );
			
			
			?>
            


	  
	<h4>Recorded Webinars</h4>
	<br/>

		<ul class="small-block-grid-1 large-block-grid-2">




<?php
						 while ( have_posts() ) : the_post(); 
					
$webinar_date = get_field( "event_date" );
$webinar_registration_link = get_field_object("registration_link");
$todayis = date("Ymd");
$showdate = DateTime::createFromFormat('Ymd', $webinar_date);
if($webinar_date < $todayis){
	$count++
					?>
											 
					<li>
					<article>
						<div class="row">
							<div class="large-4 columns">

						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">
						</div>
						<header class="large-8 columns"> 
							<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
							<h6><?php if($showdate){echo $showdate->format('F d, Y');} ?></h6>
                            <a class="button radius tiny" href="<?php the_permalink(); ?>">View Now</a>
						</header>
					</div>
					</article>

					</li>

					<?php 
					} // end check if in date range
					endwhile; 
					$pastwebinars = ob_get_clean( );
					if($count > 0){
						echo $pastwebinars;	
						}
						//else if no content should be here. Not that that could happen without an error. 
					
					
					?>
                   	<?php wp_reset_query(); ?>

		</ul>


	
					<?php endif;?>



	</div>
					<?php rewind_posts(); ?>




	<?php //get_sidebar(); ?>
</div>
<?php get_footer(); ?>