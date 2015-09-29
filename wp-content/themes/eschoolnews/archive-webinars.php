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
	<div class="small-12 large-8 columns" role="main">

<?php 	$args = array('post_type' => array( 'Webinars' ));
		$query = new WP_Query( $args );
		$count = 0;
			if ( have_posts() ) : 
			ob_start( );
			?>
            
<h1 class="section-title">
	<span>Upcoming Webinars</span>
</h1>
	  
<section class="tertiary">

		<ul class="small-block-grid-2 large-block-grid-3">




<?php
						 while ( have_posts() ) : the_post(); 
					
$webinar_date = get_field( "webinar_date" );
$webinar_registration_link = get_field_object("webinar_registration_link");
$todayis = date("Ymd");
$showdate = DateTime::createFromFormat('Ymd', $webinar_date);
if($webinar_date >= $todayis){
	$count++
					?>
						
					
					<li>
					<article>

						<?php the_post_thumbnail('small-thumb');?>

						<header> 
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<p>
                            <?php echo $showdate->format('d F, Y');; ?><br />
                            <a href="<?php the_field('webinar_registration_link'); ?>">Register Now</a></p>
						</header>

						

					</article>

					</li>

					<?php 
					} //check if in date range
					endwhile; 
					$upcomingwebinars = ob_get_clean( );
					if($count > 0){
						echo $upcomingwebinars;	
						}
					
					
					?>
                   	<?php wp_reset_query(); ?>

		</ul>

		<h6 class="readmore"><a href="#">See More Webinars &raquo;</a></h6>

	</section>

	
					<?php endif;?>



<?php 	$args = array('post_type' => array( 'Webinars' ));
		$query = new WP_Query( $args );
		$count = 0;
			if ( have_posts() ) : 
			ob_start( );
			?>
            
<h1 class="section-title">
	<span>Past Webinars</span>
</h1>
	  
<section class="tertiary">

		<ul class="small-block-grid-2 large-block-grid-3">




<?php
						 while ( have_posts() ) : the_post(); 
					
$webinar_date = get_field( "webinar_date" );
$webinar_registration_link = get_field_object("webinar_registration_link");
$todayis = date("Ymd");
$showdate = DateTime::createFromFormat('Ymd', $webinar_date);
if($webinar_date < $todayis){
	$count++
					?>
						
					
					<li>
					<article>

						<?php the_post_thumbnail('small-thumb');?>

						<header> 
							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							<p>
                            <?php echo $showdate->format('d F, Y');; ?><br />
                            <a href="<?php the_field('webinar_registration_link'); ?>">Register Now</a></p>
						</header>

						

					</article>

					</li>

					<?php 
					} //check if in date range
					endwhile; 
					$pastwebinars = ob_get_clean( );
					if($count > 0){
						echo $pastwebinars;	
						}
					
					
					?>
                   	<?php wp_reset_query(); ?>

		</ul>

		<h6 class="readmore"><a href="#">See More Webinars &raquo;</a></h6>

	</section>

	
					<?php endif;?>



	</div>
					<?php rewind_posts(); ?>





	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
