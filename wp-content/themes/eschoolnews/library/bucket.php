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

function string_limit_words($string, $word_limit)
{
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit)
  array_pop($words);
  return implode(' ', $words);
}

function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');  




/**
 * Add prev and next links to a numbered page link list
 */
function wp_link_pages_args_prevnext_add($args)
{
    global $page, $numpages, $more, $pagenow;

    if (!$args['next_or_number'] == 'next_and_number') 
        return $args; # exit early

    $args['next_or_number'] = 'number'; # keep numbering for the main part
    if (!$more)
        return $args; # exit early

    if($page-1) # there is a previous page
        $args['before'] .= _wp_link_page($page-1)
            . $args['link_before']. $args['previouspagelink'] . $args['link_after'] . '</a>'
        ;

    if ($page<$numpages) # there is a next page
        $args['after'] = _wp_link_page($page+1)
            . $args['link_before'] . ' ' . $args['nextpagelink'] . $args['link_after'] . '</a>'
            . $args['after']
        ;

    return $args;
}
add_filter('wp_link_pages_args', 'wp_link_pages_args_prevnext_add');


function append_query_string($url) {
    return add_query_arg($_GET, $url);
}
//add_filter('the_permalink', 'append_query_string'); //removed prevent query string addition in all cases


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
		    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
		    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
		?>

		<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

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

// Short Codes for custom fields [field = xxx]
function field_func($atts) {
global $post;
$name = $atts['name'];
if (empty($name)) return;
return get_post_meta($post->ID, $name, true);
}
add_shortcode('field', 'field_func');

function current_page_url() {
	$pageURL = 'http';
	if( isset($_SERVER["HTTPS"]) ) {
		if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
	}
	$pageURL .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
	}
	return $pageURL;
}
?>