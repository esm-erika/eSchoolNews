<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 
echo '11111111111111111';
$terms = wp_get_post_terms( $post->ID, 'subject_categories' );
print_r($terms);
foreach ( $terms as $term ) { echo " ".$term->slug ; } 

$template = get_post_meta($post->ID,'_wp_post_template',true);
if($template == 'single-olddata.php'){ 


include('single-olderc.php');

}else{

?>
<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc][c ...category][p  ...post id(if sidebar needs to be unique][t ...(tagid)if a tag page][a ... Author ID (if an author page)]
$cat_name = get_category(get_query_var('cat'))->term_id;

// $queried_object = get_queried_object();
// var_dump( $queried_object );
//$tag_id = get_query_var('term_taxonomy_id');
$post_id = get_the_ID(); 
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_sercbdy_a'.$ast."c".$astc.'c'.$cat_name.'p'.$post_id;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->'; 
?>


<div class="row">

<?php
	$image = get_field('masthead_image');

	if( !empty($image) ) {

		echo '<div class="small-12 medium-12 columns">'; ?>

	<?php	if (get_field('masthead_url')) {
		echo '<a href="' . get_field('masthead_url') . '">'; 
		echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
		echo '</a>';
		echo '</div>';
		} else {
		echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
		echo '</div>';
	} ?>

	<?php } elseif ($astused > 0){
		// ast used defined   How to do this in the new?
	} else {
			$pageadset = $_GET['ast'];
		if(filter_var($pageadset, FILTER_VALIDATE_INT))
		{//reserved for default ad set
			$astused = $pageadset;	
		} else {
			// Retrieve adset info from URL query vars
			$astused = 1;
		}
	}
	if(function_exists(adrotate_banner)){ echo adrotate_banner($astused,11);
	}

	?>

	<?php if(get_field('erc_html')) { 



		the_field('erc_html');

	 } ?>

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


<?php } ?>

<?php
get_footer(); ?>

