<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique]t[if a tag page]
//$cat_name = get_category(get_query_var('cat'))->term_id;

global $astc, $astused;
$post_id = get_the_ID(); 
$box_qt = 'esm_c_sldl_a'.$astused."c".$astc.'c'.'p'.$post_id;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c a'.$astused."c".$astc.'c'.'p'.$post_id.'-->';
?>
<div class="row top">
	<div class="small-12 large-8 columns" role="main">

				<?php 
				//if( is_singular( array('ercs','whitepapers','webinars','special-reports') )) {
								
				//get_template_part('parts/flags');
				
				?>

	<?php do_action( 'foundationpress_before_content' ); ?>

	<?php while ( have_posts() ) : the_post(); 

	setPostViews(get_the_ID()); ?>

<?php  $astused = get_post_meta($id, '_wp_esmad_template', true);
$oldtemplate = get_post_meta($id, '_wp_post_template', true);
   ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="small-caps">By <?php the_author(); ?></div>
							<div class="posted-on">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div>		

			
			<?php get_template_part('parts/social'); ?>
			 </header>

			 <hr/>


			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content">



<?php

$pagedln=get_post_meta($post->ID, 'Digital Leap Newsletter URL', $single = true);
echo '<iframe src="'.$pagedln.'" style="width: 100%; height: 1500px;" scrolling="yes"></iframe>'; 

?>

<?php
	// wp_link_pages(array(
	// 		    'before' => '<div id="page-links">' . __(''),
	// 		    'after' => '</div>',
	// 		    'next_or_number' => 'next_and_numbers', # activate parameter overloading
	// 		    'nextpagelink' => __('Next Page'),
	// 		    'previouspagelink' => __('Previous Page'),
	// 		    'pagelink' => '%',
	// 		    'echo' => 1 )); 

custom_wp_link_pages();

?>
			
            </div>

			<?php get_template_part('parts/social'); ?>
			

				<?php if( ! has_tag()){
				 echo '<hr/>';
				} ?>


				<?php if( has_tag()) { ?>
				<br/>
				<footer class="panel tags">
					<h6>Related Tags</h6>
					<p><?php the_tags('','',''); ?></p>
				</footer>

				<?php } ?>
			<?php do_action( 'foundationpress_post_before_comments' ); ?>
			<?php //comments_template(); ?>
			<?php do_action( 'foundationpress_post_after_comments' ); ?>
		</article>




	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
    
  
    
    
	<?php get_sidebar(); ?>
</div>

<?php			echo '<!-- c '.date(DATE_RFC2822).' -->' ;
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

<?php get_footer(); ?>