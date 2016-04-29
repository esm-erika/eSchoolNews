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
	<div class="small-12 columns" role="main">

		<ul class="small-block-grid-1 medium-block-grid-4">

	<?php 

		$args = array(
			//'posts_per_page' => '1',
			'post_type'	=> 'digital-issues',
			//'meta_key'	=> 'digital_issue_date',
			//'orderby'	=> 'meta_value_num',
			'order'		=> 'ASC'

			);
		// the query
		$the_query = new WP_Query( $args ); 

		if ( $the_query->have_posts() ) : ?>

	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
			<li>
				<?php if (has_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>">
					<span style="border: 1px solid #000;">
						<?php the_post_thumbnail('medium-portrait'); ?>
					</span>
				<?php } else { ?>
				<a href="<?php the_permalink(); ?>">
				<?php } ?>
				<div><?php the_title(); ?></div></a>
			</li>
			
	
	<?php endwhile; wp_reset_postdata(); endif; ?>

	</ul>

	</div>
<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc][c ...category][p  ...post id(if sidebar needs to be unique][t ...(tagid)if a tag page][a ... Author ID (if an author page)]
$cat_name = get_category(get_query_var('cat'))->term_id;

// $queried_object = get_queried_object();
// var_dump( $queried_object );
$tag_id = get_query_var('term_taxonomy_id');
//$post_id = get_the_ID(); 
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_arc_a'.$ast."c".$astc.'c'.$cat_name.'t'.$tag_id;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->';
			//get_sidebar();
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
