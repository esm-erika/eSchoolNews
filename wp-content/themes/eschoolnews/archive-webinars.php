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
//insert cache query
global $page;
$box_qt = 'esm_c_arcwebinar_menu_pg'.$page;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){
	// start code to cache
		ob_start( );
		echo '<!-- c -->'; 
	

$ucwebinars = new WP_Query(array(
	'post_type' => 'webinars',
	'tax_query' => array(
		array(

			'taxonomy' => 'status-webinars',
			'field' => 'slug',
			'terms' => 'upcoming-webinars',

			),

		),

		));  ?> 
<?php if ($ucwebinars->have_posts()) { ?>
		<div class="row">
			<?php get_template_part( 'parts/section-titles' ); ?>

			<!-- Row for main content area -->
			<div class="small-12 medium-12 columns" role="main">

				<h4>Upcoming Webinars</h4>

				<br/>

				<ul class="medium-block-grid-2">

					<?php while ( $ucwebinars->have_posts() ) : $ucwebinars -> the_post(); ?>

					<li>
						<article class="row">
							
							<?php if( has_post_thumbnail()){ ?>
							<div class="small-12 medium-4 columns">
								<?php the_post_thumbnail('medium-landscape'); ?>
							</div>
							<header class="small-12 medium-8 columns">
							<?php } else { ?>
							
							<header class="small-12 medium-12 columns">

							<?php } ?>

								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

																<a class="button radius small" href="<?php the_permalink(); ?>">View Now</a>

								
								</header>


							</article>


						</li>

						<?php endwhile; 
						wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>

<?php } ?>

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
							
							<?php if( has_post_thumbnail()){ ?>
							<div class="small-12 medium-4 columns">
								<?php the_post_thumbnail('medium-landscape'); ?>
							</div>
							<header class="small-12 medium-8 columns">
							<?php } else { ?>
							
							<header class="small-12 medium-12 columns">

							<?php } ?>

								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

																<a class="button radius small" href="<?php the_permalink(); ?>">View Now</a>

								
								</header>


							</article>


						</li>

						<?php endwhile; 
						wp_reset_postdata(); ?>
					</ul>
				</div>
			</div>

			<div class="row">
				

				<?php
				$morewebinars = new WP_Query(array(
					'post_type' => 'webinars',
					'offset' => '6',
					'posts_per_page' => '6',
					'tax_query' => array(
						array(

							'taxonomy' => 'status-webinars',
							'field' => 'slug',
							'terms' => 'archived-webinars',

							),

						),

						));  ?> 

						<div class="small-12 medium-8 columns" role="main">

							<hr class="thick">


							<h4>Additional Recorded Webinars</h4>
							<br/>

							<?php while ( $morewebinars->have_posts() ) : $morewebinars -> the_post(); ?>


							<article>
								<header>
									<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>


								
																		<a class="button radius small" href="<?php the_permalink(); ?>">View Now</a>

								</header>
							</article>
							<hr/>

							<?php endwhile; 
							wp_reset_postdata(); ?>
						</ul>
					</div>


		<?php
		echo '<!-- c '.date(DATE_RFC2822).' -->' ;
		$local_box_cache = ob_get_clean( );
	// end the code to cache
		echo $local_box_cache;
	//end cache query 
	
	if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
	} else {
		set_transient($box_q ,$local_box_cache, 60 * 10);
	}
} else { 

echo $local_box_cache;

}
?>



<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique]t[if a tag page]
//$cat_name = get_category(get_query_var('cat'))->term_id;

global $astc, $astused;
$box_qt = 'esm_c_webna_a'.$astused."c".$astc.'c'.'p';
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->';
			get_sidebar();
			echo '<!-- c '.date(DATE_RFC2822).' -->' ;
		$local_box_cache = ob_get_clean( );
	// end the code to cache
		echo $local_box_cache;
	//end cache query 
	
	if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
	} else {
		set_transient($box_q ,$local_box_cache, 60 * 10);
	}
} else { 

echo $local_box_cache;

}
?>
				</div>
				<?php get_footer(); ?>