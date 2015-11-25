<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php 



//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc][c ...category][p  ...post id(if sidebar needs to be unique][t ...(tagid)if a tag page][a ... Author ID (if an author page)]
$cat_name = get_category(get_query_var('cat'))->term_id;

// $queried_object = get_queried_object();
// var_dump( $queried_object );
//$tag_id = get_query_var('term_taxonomy_id');
//$post_id = get_the_ID(); 
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_top-strbdy_a'.$ast."c".$astc.'c'.$cat_name.'pg'.get_query_var( 'paged' );
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->';
?>







<div class="row">
	<?php get_template_part( 'parts/section-titles' ); ?>

	<div class="small-12 large-8 columns" role="main">

	<?php // The Query

			// Define custom query parameters
		$exclude_val = get_option( 'esm_top_story_exclude_form' );	
		$topstories_args = array( 'post_type' => 'post', 'posts_per_page' => '10', 'cat' => -$exclude_val);

		// Get current page and append to custom query parameters array
		$topstories_args['paged'] = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

		// Instantiate custom query
		$topstories = new WP_Query( $topstories_args );

		// Pagination fix
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $topstories; ?>




		<?php 
			if ( $topstories->have_posts() ) :
		    while ( $topstories->have_posts() ) :
		        $topstories->the_post();
		 ?>


		<article class="row">


			<?php if (has_post_thumbnail( )) { 

				$smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
				$largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>


				<div class="small-12 large-4 columns" role="main">

					<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
				</div>
				<header class="small-12 large-8 columns">

					<?php } ?>

					<?php if ( ! has_post_thumbnail( )) { ?>
					<header class="small-12 large-12 columns">
						<?php } ?>

						


						<span class="flag content"><a href="<?php the_permalink(); ?>">News</a></span>

						<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<div class="small-caps">By <?php the_author(); ?></div>
						<div class="posted-on">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div>		
					</article>
					<hr/>



			<?php
			
			endwhile;
			endif;
			// Reset postdata
			wp_reset_postdata(); ?>


			<?php 

			pagination($topstories->max_num_pages);
				
				// Custom query loop pagination
				//previous_posts_link( 'Older Posts' );
				//next_posts_link( 'Newer Posts', $topstories->max_num_pages );


			$wp_query = NULL;
			$wp_query = $temp_query;
			 ?>





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
//name format esm_c_[template name in 5 char]_a[ast]c[astc][c ...category][p  ...post id(if sidebar needs to be unique][t ...(tagid)if a tag page][a ... Author ID (if an author page)]
$cat_name = get_category(get_query_var('cat'))->term_id;

// $queried_object = get_queried_object();
// var_dump( $queried_object );
//$tag_id = get_query_var('term_taxonomy_id');
//$post_id = get_the_ID(); 
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_topst_a'.$ast."c".$astc.'c'.$cat_name;
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
