<?php
/*
* Readme: To use, place this snippet in your functions.php.
*/
add_filter('wp_link_pages', 'bootstrap_wp_link_pages');
function bootstrap_wp_link_pages($wp_links){
	global $post;

	// Generate current page base url without pagination.
	$post_base = trailingslashit( get_site_url(null, $post->post_name) );

	$wp_links = trim(str_replace(array('<p>Pages: ', '</p>'), '', $wp_links));

	// Get out of here ASAP if there is no paging.
	if ( empty($wp_links) )
		return '';

	// Split on spaces
	$splits = explode(' ', $wp_links );
	$links = array();
	$current_page = 1;

	// Since links are now split up such that <a and href=".+" are seperate...
	// loop over split array and correct links.
	foreach( $splits as $key => $split ){
		if( is_numeric($split) ) {
			$links[] = $split;
			$current_page = $split;
		} else if ( strpos($split, 'href') === false ) {
			$links[] = $split . ' ' . $splits[$key + 1];
		}
	}

	$num_pages = count($links);

	// Output pagination
	$output = '';
	$output .= '<ul class="pagination">';

	$output .= "<li><a href=\"{$post_base}\">&lt;&lt;</a></li>";

	if ( $current_page == 1 )
		$output .= '<li class="disabled"><a>';
	else
		$output .= '<li><a href="' . $post_base . ($current_page - 1) . '">';

	$output .= '&lt;</a></li>';	// end the li. No reason to duplicated this in both conditionals.

	foreach( $links as $key => $link ) {
		if ( is_numeric($link) ) {
			$temp_key = $key + 1;
			$output .= "<li class=\"active\"><a href=\"{$post_base}{$temp_key}\">{$temp_key}</a></li>";
		}
		else {
			$output .= "<li>{$link}</li>";
		}
	}

	if ( $current_page == $num_pages )
		$output .= '<li class="disabled"><a>';
	else
		$output .= '<li><a href="' . $post_base . ($current_page + 1) . '">';

	$output .= '&gt;</a></li>';	// end the li. No reason to duplicated this in both conditionals.

	$output .= "<li><a href=\"{$post_base}{$num_pages}\">&gt;&gt;</a></li>";

	$output .= '</ul>';

	return $output;
} ?>