<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); 

$terms = wp_get_post_terms( $post->ID, 'status' );
foreach ( $terms as $term ) { echo "<!-- ".$term->slug .' -->'; if($term->slug == 'inactive-erc'){ $isinactive = 1;} } 

$template = get_post_meta($post->ID,'_wp_post_template',true);
if($template == 'single-olddata.php' or $isinactive == 1){ 


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

</div>

	<?php if(get_field('erc_html')) { 

		the_field('erc_html');

	 } else { ?>

	 <?php if(get_field('masthead_text')) { ?>

	 <div class="row">

	 	<?php if(get_field('masthead_sidebar')) { ?>

			<div class="small-12 medium-8 columns">

				<?php the_field('masthead_text') ?>

			</div>

			<div class="small-12 medium-4 columns">

				<?php the_field('masthead_sidebar') ?>

			<?php } else { ?>

				<div class="small-12 medium-12 columns">

					<?php the_field('masthead_text') ?>

			<?php } ?>

			</div>

			<div class="small-12 columns">
				<hr>
			</div>
	 </div>

	  <?php } ?>
	

	 <div class="row">

	 	<!-- Left Column -->
	 	<div class="small-12 medium-6 columns">

	 		<?php

			// check if the repeater field has rows of data
			if( have_rows('left_column') ):

			 	// loop through the rows of data
			    while ( have_rows('left_column') ) : the_row(); ?>

			        <?php 
			        // display section title

			        if(get_sub_field('section_title')){

			        echo '<h4 style="color:' . get_field('base_color') . '">';

			        the_sub_field('section_title'); 

			        echo '</h4>';

			    	} ?>

			    	<div class="panel">


			    	<?php 
			    	// display ERC items

					$left_posts = get_sub_field('erc_items_left');

					if( $left_posts ) : ?>
					  
					    <?php foreach( $left_posts as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>

					          <div class="row">					          	

							<?php if(has_post_thumbnail()){
								
								echo '<div class="small-12 medium-5 columns">';
								the_post_thumbnail('small-portrait');
								echo '</div>';
								echo '<div class="small-12 medium-7 columns">';

							} else {

								echo '<div class="small-12 medium-12 columns">';

							} ?>					        
					        		

								<?php 
								// link to White Papers

								if(get_field('link_to_whitepaper')) { ?>

									

										<?php $whitepaper_link = get_field('link_to_whitepaper');

										if( $whitepaper_link ): ?>

										<?php foreach( $whitepaper_link as $post): // variable must be called $post (IMPORTANT) ?>

										<?php setup_postdata($post); ?>

										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
							            	<span class="excerpt">
												<?php the_content(); ?>
											</span>

										

											<a class="button small radius" href="<?php the_permalink(); ?>">
													<i class="fi-page"></i> White Paper
											</a>

										  <?php endforeach; ?>
		    
										    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										<?php endif; ?>

								<?php } elseif(get_field('link_to_ancillary')) { ?>
										
										<?php $ancillary_link = get_field('link_to_ancillary');

										if( $ancillary_link ): ?>

										<?php foreach( $ancillary_link as $post): // variable must be called $post (IMPORTANT) ?>

										<?php setup_postdata($post); ?>


										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						            	<span class="excerpt">
											<?php the_content(); ?>
										</span>

										

											<a class="button small radius" href="<?php the_permalink(); ?>">
												<i class="fi-page"></i>
											</a>

										  <?php endforeach; ?>
		    
										    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										<?php endif; ?>


							<?php } elseif( get_field('link_to_external_url')){ ?>

								<h5><a target="new" href="<?php the_field('link_to_external_url'); ?>"><?php the_title(); ?></a></h5>
					            	<span class="excerpt">
										<?php the_content(); ?>
									</span>

								
							
								<a target="new" class="button small radius" href="<?php the_field('link_to_external_url'); ?>">
									<?php 
										echo '<i class="fi-web"></i> ';

										if(get_field('text_for_button')) {
											the_field('text_for_button');
										} else {
											echo 'Web Link';
										} ?>
								</a>

							<?php } elseif(get_field('download_file')) { 

							$file = get_field('download_file');

							if( $file ): ?>
								<h5><a href="<?php echo $file['url']; ?>"><?php the_title(); ?></a></h5>
							
					            	<span class="excerpt">
										<?php the_content(); ?>
									</span>

								

								<a class="button small radius" href="<?php echo $file['url']; ?>">
									<i class="fi-arrow-down"></i> Download
								</a>
							<?php endif; ?>

							<?php } elseif(get_field('erc_item_html')) { ?>

								<?php the_field('erc_item_html') ?>

							<?php } else { ?>

								<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					            	<span class="excerpt">
										<?php the_content(); ?>
									</span>

								<h6><a href="<?php the_permalink();?>">Read More</a></h6>
							<?php } ?>

					        	</div>
					    </div>

					    <?php if(get_sub_field('hr_left')){
					   		echo '<hr/>';
					   } else {
					   		echo '<br/>';
					   } ?>
					    
					    <?php endforeach; ?>
					    
					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>

					

				</div>

	  		<?php endwhile;

			endif;

			?>

			


	 	</div>
		
		<!-- Right Column -->
	 	<div class="small-12 medium-6 columns">

	 		<?php

			// check if the repeater field has rows of data
			if( have_rows('right_column') ):

			 	// loop through the rows of data
			    while ( have_rows('right_column') ) : the_row(); ?>

			        <?php 
			        // display section title

			        if(get_sub_field('section_title')){

			        echo '<h4 style="color:' . get_field('base_color') . '">';

			        the_sub_field('section_title'); 

			        echo '</h4>';

			    	} ?>

			    	<div class="panel">


			    	<?php 
			    	// display ERC items

					$right_posts = get_sub_field('erc_items_right');

					if( $right_posts ) : ?>
					  
					    <?php foreach( $right_posts as $post): // variable must be called $post (IMPORTANT) ?>
					        <?php setup_postdata($post); ?>

					          <div class="row">

							<?php if(has_post_thumbnail()){
								
								echo '<div class="small-12 medium-5 columns">';
								the_post_thumbnail('small-portrait');
								echo '</div>';
								echo '<div class="small-12 medium-7 columns">';

							} else {

								echo '<div class="small-12 medium-12 columns">';

							} ?>					        
					        
					            

									

								<?php 
								// link to White Papers

								if(get_field('link_to_whitepaper')) { ?>



										<?php $whitepaper_link = get_field('link_to_whitepaper');

										if( $whitepaper_link ): ?>

										<?php foreach( $whitepaper_link as $post): // variable must be called $post (IMPORTANT) ?>

										<?php setup_postdata($post); ?>

										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					            	<div class="excerpt">
										<?php the_content(); ?>
									</div>

										

											<a class="button small radius" href="<?php the_permalink(); ?>">
													<i class="fi-page"></i> White Paper
											</a>

										  <?php endforeach; ?>
		    
										    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										<?php endif; ?>

								<?php } elseif(get_field('link_to_ancillary')) { ?>

										
										
										<?php $ancillary_link = get_field('link_to_ancillary');

										if( $ancillary_link ): ?>

										<?php foreach( $ancillary_link as $post): // variable must be called $post (IMPORTANT) ?>

										<?php setup_postdata($post); ?>

										<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					            	<div class="excerpt">
										<?php the_content(); ?>
									</div>

										

											<a class="button small radius" href="<?php the_permalink(); ?>">
												<i class="fi-page"></i>
											</a>

										  <?php endforeach; ?>
		    
										    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
										<?php endif; ?>


							<?php } elseif( get_field('link_to_external_url')){ ?>

								<h5><a target="new" href="<?php the_field('link_to_external_url'); ?>"><?php the_title(); ?></a></h5>
					            	<div class="excerpt">
										<?php the_content(); ?>
									</div>
							
								<a target="new" class="button small radius" href="<?php the_field('link_to_external_url'); ?>">
									<?php 
										echo '<i class="fi-arrow-down"></i> ';

										if(get_field('text_for_button')) {
											the_field('text_for_button');
										} else {
											echo 'Web Link';
										} ?>
								</a>

							<?php } elseif(get_field('download_file')) { 

							$file = get_field('download_file');

							if( $file ): ?>
								<h5><a href="<?php echo $file['url']; ?>"><?php the_title(); ?></a></h5>
							
					            	<div class="excerpt">
										<?php the_content(); ?>
									</div>

										

								<a class="button small radius" href="<?php echo $file['url']; ?>">
									<i class="fi-arrow-down"></i> Download
								</a>
								<?php endif; ?>

							<?php } else { ?>

							<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					            	<span class="excerpt">
										<?php the_content(); ?>
									</span>

										

								<h6><a href="<?php the_permalink();?>">Read More</a></h6>
							<?php } ?>

					        	</div>
					    </div>

					   <?php if(get_sub_field('hr_right')){
					   		echo '<hr/>';
					   } else {
					   		echo '<br/>';
					   } ?>
					    
					    <?php endforeach; ?>
					    
					    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					<?php endif; ?>

				</div>

	  		<?php endwhile;

			endif;

			?>

			<?php get_template_part('parts/sponsor-images'); ?>

	 	</div>
	 </div>







	<?php } ?>




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

