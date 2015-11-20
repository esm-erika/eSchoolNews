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

get_header(); 

global $cat;

// get parent category slug
$parentCatList = get_category_parents($cat,false,',');
$parentCatListArray = explode(",",$parentCatList);
$topParentName = $parentCatListArray[0];
$sdacReplace = array(" " => "-", "(" => "", ")" => "");
$topParent = strtolower(strtr($topParentName,$sdacReplace));

	//echo '<pre>';
	//var_dump($topParent);
	//echo '</pre>';

?>


<div class="row">

	<br/>

	<h1 class="section-title"><span><?php echo $topParentName ?> Top Stories</span></h1>


	<div class="small-12 large-8 columns" role="main">

		<?php
  // set up or arguments for our custom query
		//$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
		$query_args = array(
			'post_type' => 'post',
			'category_name' => $topParent,
			'posts_per_page' => 5,
			'paged' => $paged
			);
  // create a new instance of WP_Query
		$the_query = new WP_Query( $query_args );

		// Pagination fix
		$temp_query = $wp_query;
		$wp_query   = NULL;
		$wp_query   = $the_query; 

		?>


		<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
		<article>
			<h1><?php echo the_title(); ?></h1>
			<div class="excerpt">
				<?php the_excerpt(); ?>
			</div>
		</article>
	<?php endwhile; ?>

	<?php if ($the_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
	<nav class="prev-next-posts">
		<div class="prev-posts-link">
			<?php 
			echo get_next_posts_link( 'Older Entries', $the_query->max_num_pages ); // display older posts link 
			echo get_previous_posts_link( 'Newer Entries' ); // display newer posts link 

			$wp_query = NULL;
			$wp_query = $temp_query;

			?>
		</div>
	</nav>
	<?php } ?>

<?php else: ?>
	<article>
		<h1>Sorry...</h1>
		<p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
	</article>
<?php endif; ?>




</div>
<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc][c ...category][p  ...post id(if sidebar needs to be unique][t ...(tagid)if a tag page][a ... Author ID (if an author page)]
//$cat_name = get_category(get_query_var('cat'))->term_id;

// $queried_object = get_queried_object();
// var_dump( $queried_object );
//$tag_id = get_query_var('term_taxonomy_id');
//$post_id = get_the_ID(); 
$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_catva_a'.$ast."c".$astc.'c'.$cat_name;
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

