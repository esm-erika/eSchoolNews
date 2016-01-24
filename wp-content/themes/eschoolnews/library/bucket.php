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

add_image_size( 'large', 200, 200, TRUE );



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


// Image Sizes
add_image_size( 'newsletter-thumb', 180, 180, true ); //intended for newletter use
add_image_size( 'small-landscape', 300, 200, true );
add_image_size( 'medium-landscape', 600, 400, true );
add_image_size( 'large-landscape', 800, 533, true );
add_image_size( 'x-small-portrait', 120, 180, true ); //intended for newletter use
add_image_size( 'small-portrait', 200, 300, true );
add_image_size( 'medium-portrait', 400, 600, true );
add_image_size( 'large-portrait', 533, 800, true );

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
<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-3">
	<?php // The Loop
	while ( $query_1->have_posts() ) :
		$query_1->the_post(); ?>
	<li>
		<?php 
			the_post_thumbnail('medium-landscape');
		?>

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

function wpse_category_set_post_types( $query ){
    if( $query->is_category() && $query->is_main_query() ){
        $query->set( 'post_type', array( 'post', 'whitepapers' ) );
    }
}
add_action( 'pre_get_posts', 'wpse_category_set_post_types' );


/**
 * add page slug to body class, if on a page
 */
 
add_filter('body_class','smartestb_pages_bodyclass');
function smartestb_pages_bodyclass($classes) {
    if (is_page()) {
        // get page slug
        global $post;
        $slug = get_post( $post )->post_name;
 
        // add slug to $classes array
        $classes[] = $slug;
        // return the $classes array
        return $classes;
    } else { 
        return $classes;
    }
}

/**
 * add single template for CPTs (ex.  single-[post-type]-[slug].php)
 */

add_filter( 'single_template', function( $template ) {
    global $post;
    if ( $post->post_type === 'ercs' ) {
        $locate_template = locate_template( "single-ercs-{$post->post_name}.php" );
        if ( ! empty( $locate_template ) ) {
            $template = $locate_template;
        }
    }
    return $template;
} );

// [linkli href="href-value" class="class-value" close="a"]
function linkli_func( $atts ) {
    global $post, $wpdb, $user, $esmuser; 
	$linkli_atts = shortcode_atts( array(
        'class' => '',
        'href' => '',
		'close' => 'no'
    ), $atts );	
	$output = '';
	
	if(!$linkli_func[ 'close' ] == 'no')
    $output .= '</a>';	
	if(esm_is_user_logged_in()){ 
	    $output .= '<a href="';
        $output .=  wp_kses_post( $linkli_atts[ 'href' ] ) ;
	    $output .= '" class="';
		$output .= '' . wp_kses_post( $linkli_atts[ 'class' ] ) . '">';
    
	 }else{
		 
	    $output .= '<a href="#" data-reveal-id="login-popup"';
	    $output .= '" class="';
		$output .= '' . wp_kses_post( $linkli_atts[ 'class' ] ) . '">';
    
	 }
     return $output;
	
}
add_shortcode( 'linkli', 'linkli_func' );



if (!current_user_can('edit_posts')) {show_admin_bar(false);}

add_action( 'after_setup_theme', 'esn_rss_template' );
/**
 * Register custom RSS template.
 */
function esn_rss_template() {
	add_feed( 'esnsmartbrief', 'my_custom_rss_render' );
	add_feed( 'educationdive', 'my_custom_rss_render2' );
}
	add_feed( 'educationdive', 'my_custom_rss_render2' );
/**
 * Custom RSS template callback.
 */
function my_custom_rss_render() {
	get_template_part( 'feed', 'esnsmartbrief' );
}
function my_custom_rss_render2() {
	get_template_part( 'feed', 'educationdive' );
}

?>