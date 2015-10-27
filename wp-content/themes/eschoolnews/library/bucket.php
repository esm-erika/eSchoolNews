<?php
/**
 * Bucket - Misc scripts that need to be put into functions.php
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

//function custom_excerpt_length( $length ) {
//	return 20;
//}
//add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


function append_query_string($url) {
    return add_query_arg($_GET, $url);
}
add_filter('the_permalink', 'append_query_string');


function LandingRecentItems($catslug, $qty = 3){
	if($catslug == null){
		echo '<!--- No Category Passed --->';	
	} else {
	 $idObj = get_category_by_slug($catslug);
	 $catname =  $idObj->name;
	 $catid = $idObj->term_id;
	 $category_link = get_category_link( $catid );

if(empty($idObj)){echo '<!--- No category found --->';}else{
	
	 	 
 echo '<!-- '.$catname.' -->';

	$query_1 = array(
		'cat' => $catid,
		'posts_per_page' => $qty

		);

	$query_1 = new WP_Query( $query_1 );
 ?>
<h4><?php  echo $catname; ?></h4>
<ul class="small-block-grid-2 large-block-grid-3">
	<?php // The Loop
	while ( $query_1->have_posts() ) :
		$query_1->the_post(); ?>
	<li>
		<?php 
		    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
		    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
		?>

		<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="excerpt">
		<?php 
			echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '' ), true); 
		?> 
		</div>
	</li>

<?php endwhile; ?>

</ul>

<h6><a href="<?php echo $category_link; ?>">Read more <strong><?php echo $catname; ?></strong> Posts &raquo;</a></h6>

<hr/>

<?php wp_reset_postdata(); 

	  }
	}
} 

//Add is_post_type to conditional
function is_post_type($type){
   global $wp_query;
    if($type == get_post_type($wp_query->post->ID)) return true;
    return false;
}



?>