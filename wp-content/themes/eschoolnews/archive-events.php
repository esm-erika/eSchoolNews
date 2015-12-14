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
$box_qt = 'esm_c_arcevnt_menu_pg'.$page;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){
	// start code to cache
		ob_start( );
		echo '<!-- c -->'; 
		?>


<div class="row">

			<?php get_template_part( 'parts/section-titles' ); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">

		

		<?php

				// The Query
				$args = array(
					'post_type' => 'events',
					'posts_per_page' => '5',
					);

				$query = new WP_Query( $args ); ?>

				<?php if( $query->have_posts() ) : ?>

				<h4>Upcoming Events</h4>
		<br/>

				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<article class="row">
					<div class="large-4 columns">
						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
					</div>

			<header class="large-8 columns">
				<h4 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
			</header>
		</article>
		<br/>

				<?php endwhile; ?>

				<hr class="thick"/>
			<?php endif; ?>
				<?php wp_reset_postdata(); ?>

		

		<h4>Conference News</h4>
		
		

	<?php

				// The Query
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => '3',
					'orderby' => 'date',
					'tag' => 'aasa, alas, ascd, blc, cosn, cue, fetc, infocomm, iste, nsba, tcea, event, events, conference, conferences'
					);

				$query = new WP_Query( $args ); ?>

				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>


				<article class="row">
			<header class="small-12 columns">
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<div class="small-caps">By <?php the_author(); ?></div>
				<div class="posted-on">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div>		

			</header>
		</article>

		<hr/>


		


				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			
		
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
//name format esm_c_[template name in 5 char]a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique] 
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_evnts_a'.$astused."c".$astc.'c'.'p';
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
