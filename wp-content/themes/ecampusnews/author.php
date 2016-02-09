<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<?php 
//insert cache query
$author = get_user_by( 'slug', get_query_var( 'author_name' ) );
$box_qt = 'esm_c_arcauthor_auth'.$author->ID;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){
	// start code to cache
		ob_start( );
		echo '<!-- c -->'; 
		?>
		
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
	

	<div class="row">
<div class="small-12 large-8 columns" role="main">

	<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>

			<article>
				<header>
				<?php //get_template_part('parts/flags'); ?>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<?php if( get_field('remove_author')) { 

							echo '';

						} else { ?>

							<div class="small-caps">
								
								<?php  if( get_field('Alt Author Read More Name')) {

									echo 'By ';

									the_field('Alt Author Read More Name');

								}elseif(get_field('Byline')){

									the_field('Byline');

								} else {
									echo 'By ';

									the_author();

								} ?>

							</div>

						<?php } ?>
					<div class="posted-on"><?php the_time('F jS, Y') ?></div>	

				

				</header>
			</article>

			<hr/>
        
	<?php endwhile; ?>

	<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
	<nav class="prev-next-posts">
		<div class="prev-posts-link">
			
			<?php 
			echo '';
			echo get_next_posts_link( '<button class="button">Older Entries</button>', $the_query->max_num_pages ); // display older posts link 
			echo '';

			echo get_previous_posts_link( '<button class="button right">Newer Entries</button>' ); // display newer posts link 
			echo '';
			$wp_query = NULL;
			$wp_query = $temp_query;

			?></button>
		</div>
	</nav>
	<?php } ?>

<?php else: ?>
	<article>
		<h1>Sorry...</h1>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	</article>
	<?php endif; // End have_posts() check. ?>

	
	
	
	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
		</nav>
	<?php } ?>

	</div>	


<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc][c ...category][p  ...post id(if sidebar needs to be unique][t ...(tagid)if a tag page][a ... Author ID (if an author page)]
//$cat_name = get_category(get_query_var('cat'))->term_id;

// $queried_object = get_queried_object();
// var_dump( $queried_object );
//$tag_id = get_query_var('term_taxonomy_id');
$post_id = get_the_ID(); 
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_authr_a'.$ast."c".$astc.'p';
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