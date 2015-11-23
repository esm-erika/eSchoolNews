<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 
$template = get_post_meta($post->ID,'_wp_post_template',true);
if($template == 'single-olddata.php'){ 
include('single-coa.php');
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

		echo '<div class="small-12 medium-12 columns">';
		echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" />';
		echo '</div>';

	} elseif ($astused > 0){
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

	<?php 

		//$image = get_field('masthead_image');

		//if( !empty($image) ): ?>

		<!-- <div class="small-12 medium-12 columns"> -->
			<!-- <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /> -->
		<!-- </div> -->
	<?php //endif; ?>

	<?php if( get_field('masthead_text')): ?>
		<div class="small-12 medium-12 columns" role="main">
			<div class="row">
				<div class="small-12 medium-8 columns">
					<p><?php the_field('masthead_text') ?></p>
				</div>
				
					<?php get_sidebar('erc'); ?>
				
			</div>
		</div>
	<?php endif; ?>


	<?php

		// check if the repeater field has rows of data
		if( have_rows('add_section') ):

			echo '<section class="erc-section">';

		 	// loop through the rows of data
		    while ( have_rows('add_section') ) : the_row();

		        if(get_sub_field('how_many_columns') == "one") {
		        	echo '<div class="small-12 medium-12 columns">';
		      
		       } elseif(get_sub_field('how_many_columns') == "two") {
		        	echo '<div class="small-12 medium-6 columns">';

		       }

		        	if( get_sub_field('section_title')):

		        		echo '<h3 style="color:';
		        		the_field('base_color'); 
		        		echo ';">';
		        		echo the_sub_field('section_title');
		        		echo '</h3>';

		        	endif;

		        	if( have_rows('erc_article')):

		        		while( have_rows('erc_article')) : the_row();

			        		//variables
			        		$thumbnail = get_sub_field('article_thumbnail');
			        		$title = get_sub_field('article_title');
			        		$subtitle = get_sub_field('article_subtitle');
			        		$excerpt = get_sub_field('article_excerpt');
			        		$readmorelink = get_sub_field('read_more_link');
			        		$video = get_sub_field('video_link');

			        		echo '<article class="panel">';
			        		echo '<div class="row">';

			        		if( $title ):

			        			echo '<h4 class="columns">' . $title . '</h4>';

			        		endif;

			        		if( $subtitle ):

			        			echo '<h6 class="columns">' . $subtitle . '</h6>';

			        		endif;
			        		
			        		if ( $thumbnail ):

			        			echo '<div class="small-12 medium-6 columns">';

			        			echo '<img src="' . $thumbnail['url'] . '" />';

			        			echo '</div>';

			        			echo '<div class="small-12 medium-6 columns">';

			        		endif;

			        		if( empty($thumbnail) ):

			        			echo '<div class="small-12 medium-12 columns">';			        			

			        		endif;


			        		if( $excerpt ):

			        			echo '<p>' . $excerpt . '</p>';

			        		endif;

			        		if( $readmorelink ):

			        			echo '<a href="' . $readmorelink . '">Read more</a>';

			        		endif;


							$file = get_sub_field('upload_file');

							if( $file ): 
								
								echo '<a class="button radius tiny" href="' . $file['url'] . '"><i class="fi-arrow-down"></i> Download</a>';

							endif;

			        		if( $video ):

			        			echo '<i class="fi-play-video"></i>';

			        		endif;

			        		echo '</div></div>';

			        		echo '</article>';


		        		endwhile;

		        	endif;



		        	echo '</div>';


		    endwhile;

		else :

		    // no rows found

		endif;

	echo '</section>';

		?>


		<div class="sponsor">
			
		</div>

	

	
	
	<?php //get_sidebar(); ?>
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

