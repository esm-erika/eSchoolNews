<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 
$template = get_post_meta($postid,'wp_post_template',true);



if($template == 'single-olddata.php'){ 
echo "<!--". $template." -->	";
include('single-coa.php');
}else{
echo "<!--". $template." - ".$postid." - ".$id." -->	";
?>



<div class="row">

		<?php 

		$image = get_field('masthead_image');

		if( !empty($image) ): ?>	

		<div class="small-12 medium-12 columns">
			<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
		</div>
	<?php endif; ?>

	<?php if( get_field('masthead_text')): ?>
		<div class="small-12 medium-12 columns" role="main">
			<p><?php the_field('masthead_text') ?></p>
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
			        		
			        		if ( $thumbnail ):

			        			//echo '<div class="small-12 medium-6 columns">';

			        			echo '<img src="' . $thumbnail['url'] . '" />';

			        			//echo '</div>';

			        		endif;

			        		//echo '<div class="small-12 medium-6 columns">';


			        		if( $title ):

			        			echo '<h4>' . $title . '</h4>';

			        		endif;

			        		if( $subtitle ):

			        			echo '<h6>' . $subtitle . '</h6>';

			        		endif;

			        		if( $excerpt ):

			        			echo '<p>' . $excerpt . '</p>';

			        		endif;

			        		if( $readmorelink ):

			        			echo '<a href="' . $readmorelink . '">Read more</a>';

			        		endif;

			        		if( $video ):

			        			echo '<i class="fi-play-video"></i>';

			        		endif;

			        		//echo '</div>';

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
}
get_footer(); ?>