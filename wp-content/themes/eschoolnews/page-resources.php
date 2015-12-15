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
$box_qt = 'esm_c_presobdy_a'.$ast."c".$astc.'c'.$cat_name;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->';
?>




<?php // get_template_part( 'parts/ads/leaderboard-2' ); ?>



<div class="row">
	<div class="small-12 medium-12 columns">
		<?php get_template_part( 'parts/section-titles' ); ?>
	</div>
</div>



<?php get_template_part( 'parts/featured-article' ); ?>

<div class="row">
	
	<div class="small-12 medium-8 columns">

		<h4>New Resources</h4>
		<br/>

		<?php // The Query

		$args = array(
		'post_type' => array('special-reports','ercs','whitepapers','webinars'),
		'posts_per_page' => -1,
	);
	
$resources = new WP_Query( $args );

?>
		<article class="row">

			<div class="medium-4 columns">

			<?php the_post_thumbnail('medium-portrait'); ?>
			</div>

			<header class="medium-8 columns">

				<?php get_template_part('parts/flags'); ?>

				<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

				<div class="excerpt">
					<?php 
				//echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 15, $more = '' ), true); 
					?>
				</div>
			</header>
		</article>
		<br/>
		<?php endforeach; 
		wp_reset_postdata(); ?>

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
$box_qt = 'esm_c_preso_a'.$ast."c".$astc.'c'.$cat_name;
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


<div class="row">

	<div class="medium-12 columns">
		
		<hr class="thick" />
		<h4>Additional Resources</h4>

		<br/>

		<ul class="medium-block-grid-2">

<?php // The Query
$args2 = array(
	'post_type' => array('ercs','special-reports','whitepapers'),
	'offset' => '6'
	);


$query2 = new WP_Query( $args2 );


while ( $query2->have_posts() ) :
	$query2->the_post(); ?>

<li>
	<article class="row">
		<header class="large-12 columns">
			<?php 

			$post_type = get_post_type_object( get_post_type($post) );
			echo '<span class="flag content">';
			echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
			echo $post_type->labels->singular_name; 
			echo '</a></span>';
			?>

			<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

			<div class="excerpt">
				<?php 
					//echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 15, $more = '' ), true); 
				?>
			</div>
		</header>
	</article>
</li>

<?php endwhile; 
wp_reset_postdata(); ?>

</ul>

</div>
</div>

<?php get_footer(); ?>
