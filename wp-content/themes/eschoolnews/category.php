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


global $cat;

if ( is_paged() ){

?>

<div class="row">

	<br/>

	<h1 class="section-title"><span><?php single_cat_title(); ?> Top Stories</span></h1>

	<div class="small-12 large-8 columns" role="main">

		<?php
  
					
		$pageoffset = $paged - 1;
		$query_args = array(
			'post_type' => 'post',
			'cat' => $cat,
			'posts_per_page' => 10,
			'paged' => $pageoffset
			);
		$the_query = new WP_Query( $query_args );


		if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); // run the loop ?>
		
			<article>
				<header>
				<?php //get_template_part('parts/flags'); ?>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<div class="small-caps">By <?php the_author(); ?></div>
					<div class="posted-on">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div>	

				

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
<?php endif; ?>




</div>
<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc][c ...category][p  ...post id(if sidebar needs to be unique][t ...(tagid)if a tag page][a ... Author ID (if an author page)]
$cat_name = get_category(get_query_var('cat'))->term_id;

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

	/// start code to cache
		ob_start( );
		echo '<!-- c -->';
			get_sidebar();
		echo '<!-- c '.date(DATE_RFC2822).' -->' ;
	$local_box_cache = ob_get_clean( );
	// end the code to cache
	echo $local_box_cache;
	//end cache query 
	
	if( current_user_can( 'edit_post' ) ) {
		///you cannot cache it
	} else {
		set_transient($box_q ,$local_box_cache, 60 * 10);
	}
} else { 

echo $local_box_cache;

}
?>
	</div>
	<?php get_footer(); 


	
} else { 


//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique]
global $page;
echo $page;
$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_top_cata_a'.$astused."c".$astc.'c'.$cat_name;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c '. 'esm_c_top_cata_a'.$astused."c".$astc.'c'.$cat_name .'-->';

?>



<?php // get_template_part( 'parts/ads/leaderboard' ); ?>

<div class="row">
	<div class="small-12 medium-12 columns">
		<?php get_template_part( 'parts/section-titles' ); ?>
	</div>
</div>

<div class="row" id="featured">
<?php 
			



$featured = new WP_Query(array(
	'cat' => $cat,
	'meta_query' => array(
		array(
			'key' => 'featured',
			'value' => '1',
			'compare' => '=='
			)
		),
	'posts_per_page' => 1

)); ?>

<?php if ( $featured->have_posts() ) : ?>
	<?php while ( $featured->have_posts() ) : $featured -> the_post(); ?>

		<div class="small-12 medium-6 columns" role="main">

						<?php

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
						

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

						</div>

						<article class="small-12 medium-6 columns">		

			<header> 
					<span class="flag"><a href="<?php the_permalink(); ?>">Featured</a></span>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="small-caps">By <?php the_author(); ?></p>

				<div class="excerpt">
					<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
					?>
				</div>
			</header>

		</article>
			
	<?php endwhile;  


	 else:

	$featured = new WP_Query(array(
	'cat' => $cat,
	'posts_per_page' => 1

	));

	while ( $featured->have_posts() ) : $featured -> the_post(); ?>

		<div class="small-12 medium-6 columns" role="main">

						<?php

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>
						

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

						</div>

						<article class="small-12 medium-6 columns">		

			<header> 
					<span class="flag"><a href="<?php the_permalink(); ?>">Featured</a></span>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p class="small-caps">By <?php the_author(); ?></p>

				<div class="excerpt">
					<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
					?>
				</div>
			</header>

		</article>

	<?php endwhile;

	endif;

   wp_reset_query();  ?>

	
</div>

<?php get_template_part( 'parts/ads/leaderboard-2' ); ?>

<div class="row">

	<?php get_template_part( 'parts/top-stories' ); ?>

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


<div class="row">

	

	<div class="small-12 medium-8 columns">

		<?php get_template_part('parts/resources-section'); ?>	

		<?php get_template_part('parts/whitepaper-section'); ?>	
		
		<?php if($resourcessection == 0 and $whitepapersection == 0) { 
			//echo '<!-- display other content  -->'; 
		 	//get_template_part('parts/popular-posts');
		 	get_template_part('parts/temporary_top-stories'); 
		}?>

	</div>

<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique]
$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_cata_a'.$astused."c".$astc.'c'.$cat_name.'p';
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




</div>


<?php get_footer(); ?>

<?php } ?>


