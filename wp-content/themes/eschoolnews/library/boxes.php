<?php

function box_lead($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $offset = 0, $ast = 0, $astc = 0){


// echo 'COLUMN 1 Box 1';
$box_lead_cat = 0 ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			global $astc, $astused;
$box_qt = 'blead_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$astused."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );


		$count = 1;
		$args = array(
		  'post__not_in'=>$do_not_duplicate,
		  'offset'=> $offset,
		  'posts_per_page' => $qty,
		  'orderby'=> $theorder,
		  'cat' => $box_lead_cat
		);
$query = new WP_Query( $args );
while ($query->have_posts()) : $query->the_post();

if ($count == 1) { ?>
			<div class="featuredPost2">
					<?php if($showthumb == 1){ 

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

									<?php } ?>	
					<h2 class="postTitle"><a href="<?php the_permalink(); echo $aststr; ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p><?php echo the_excerpt(); ?>...</p> 
					
			</div>
		<?php } else { ?> 
		<?php if ($count == 2) { ?> 
		<span class="catname">
			<?php if(strlen($theboxtitle) ==  '0'){ ?>
				<a href="<?php echo get_category_link($box_lead_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>"><?php echo get_cat_name($box_lead_cat); ?></a>
			<?php } else { ?> 
            <a href="<?php echo get_category_link($box_lead_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>"><?php echo $theboxtitle; ?></a>
			<?php } ?>
		</span> 
		<?php } ?>
		
			<div class="featuredpost<?php // if($count == $qty) { echo ' lastpost'; } ?>">
			<?php if($showthumb == 1){ 

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

									<?php } ?>	
				
					<h2 class="posttitle">
						<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
					</h2>							
					
					<p><?php echo the_excerpt(); ?>&hellip;</p>
					
					

		   <?php if($count == $qty) { ?>
  			<div class="morenews"><strong><?php if(strlen($theboxtitle) ==  '0'){ ?>
				<a href="<?php echo get_category_link($box_lead_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>">View all <?php echo get_cat_name($box_lead_cat); ?></a>
			<?php } else { ?> 
            <a href="<?php echo get_category_link($box_lead_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>">View all <?php echo $theboxtitle; ?></a>
			<?php } ?></strong></div>
		  <?php  } ?>

			</div><!-- .featuredpost -->
		   <?php }
$count++; endwhile; wp_reset_query();

echo '<div class="clear"></div>';
    $local_box_cache = ob_get_clean( );
echo $local_box_cache;
// end the code to cache

//end cache query 
	
if( current_user_can( 'edit_post' ) ) {
//you cannot cache it
} else {
set_transient($box_q ,$local_box_cache, 60 * 15);
}

	
	
	
} else { 
echo $local_box_cache;
}

} 
add_shortcode('box_lead', 'lead_post_plus_shortcode');

function box_multilead($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $offset = 0, $ast = 0, $astc = 0){
/*
*  qty must be a number or 3 will be used
*  theorder can be any order that WP_Query will accept the default is date.
*  thecat is a list of numbers 1,2,3,4 
*  thecat is a list of numbers 1,2,3,4 
*/
// echo 'COLUMN 1 Box 1';
$box_multilead_cat = 0 ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			global $astc, $astused;
$box_qt = 'bmlead_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$astused."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );


		$count = 1;
		$args = array(
		  'post__not_in'=>$do_not_duplicate,
		  'offset'=> $offset,
		  'posts_per_page' => $qty,
		  'orderby'=> $theorder,
		  'cat' => $box_multilead_cat
		);
$query = new WP_Query( $args );
while ($query->have_posts()) : $query->the_post();

?>
			<div class="featuredPost2" <?php if($count > 1){ echo 'style="border-top:#999 dotted 1px; padding-top:10px;margin-top:10px;"'; } ?>>
					<?php if($showthumb == 1){ 

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

									<?php } ?>	
					<h2 class="postTitle"><a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p><?php echo the_excerpt(); ?>...</p> 
					
			</div>

		   <?php 
$count++; endwhile; wp_reset_query();

echo '<div class="clear"></div>';
    $local_box_cache = ob_get_clean( );
echo $local_box_cache;
// end the code to cache

//end cache query 
	if( current_user_can( 'edit_post' ) ) {
//you cannot cache it
} else {
set_transient($box_q ,$local_box_cache, 60 * 15);
}
} else { 
echo $local_box_cache;
}

}  
add_shortcode('box_multilead', 'lead_post_plus_shortcode');




function box_art($qty = 4,$theorder = 'date', $showthumb = 1, $thecat = 0, $offset = 0, $theboxtitle = '0', $ast = 0, $astc = 0){
$box_art_cat = 0 ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			global $astc, $astused;
$box_qt = 'art_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$astused."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
			//$local_box_cache = get_transient( $box_q ); 
			//if (false === ($local_box_cache) ){
// start code to cache
//    ob_start( );
?>			
<div class="columns" role="main">
				<h4><?php if(strlen($theboxtitle) ==  '0'){ echo get_cat_name($box_art_cat); 
				 } else { echo $theboxtitle; } ?></h4>


<?php
$count = 1;
$args = array(
'post__not_in'=>$do_not_duplicate,
'offset'=> $offset,
'posts_per_page' => $qty,
'orderby'=> $theorder,
'cat' => $box_art_cat
);
$query = new WP_Query( $args );
while ($query->have_posts()) : $query->the_post();

?>
<div class="row" >
<?php if($showthumb == 1 and has_post_thumbnail()){ ?>
<div class="small-4 medium-4 large-4 columns">
<?php
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
</div>
<div class="small-8 medium-8 large-8 columns">	
<?php } else {
?>	
<div class="small-12 medium-12 large-12 columns">	
<?php } ?>	
<h5>
<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a></h5>
											
                    	<p class="excerpt">
							<?php 
							echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
							?>
						</p>
											
									

		   <?php if($count == $qty) { ?>
			
			<?php if(strlen($theboxtitle) ==  '0'){ ?>
				<h6><a href="<?php echo get_category_link($box_art_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>">View all <?php echo get_cat_name($box_art_cat); ?></a></h6>
			
			<?php } else { ?> 
            
            <h6><a href="<?php echo get_category_link($box_art_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>">View all <?php echo $theboxtitle; ?></a></h6>
			
			<?php } ?>
		  <?php  } ?>
	</div>
</div>										
<hr />
<?php $count++; endwhile; wp_reset_query(); ?>

</div>

<?php
	
//    $local_box_cache = ob_get_clean( );
//echo $local_box_cache;
// end the code to cache

//end cache query 
//	if( current_user_can( 'edit_post' ) ) {
//you cannot cache it
//} else {
//set_transient($box_q ,$local_box_cache, 60 * 15);
//}
//} else { 
//echo $local_box_cache;
//}

}
add_shortcode('box_art', 'article_list_shortcode');




function box_lead_300($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $offset = 0, $theboxtitle = '0', $ast = 0, $astc = 0){
$box_lead_cat = 0 ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			global $astc, $astused;
$box_qt = 'blead300_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$astused."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );

					$count = 1;
					$args = array(
					  'post__not_in'=>$do_not_duplicate,
					  'offset'=> $offset,
					  'posts_per_page' => $qty,
					  'orderby'=> $theorder,
					  'cat' => $thecat
					);
$query = new WP_Query( $args );
while ($query->have_posts()) : $query->the_post();
		
					if ($count == 1) { ?>
                        <div class="featuredPost2">
                             	<?php if($showthumb == 1){ 

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

									<?php } ?>	
                                <h2 class="postTitle"><a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                <p><?php echo the_excerpt(); ?>...</p> 
                               
                        </div>
					<?php } else { ?> 
					<?php if ($count == 2) { ?> 
						<span class="catname">
							<?php if(strlen($theboxtitle) ==  '0'){ ?>
								<a href="<?php echo get_category_link($box_lead_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>"><?php echo get_cat_name($box_lead_cat); ?></a>
							<?php } else { echo $theboxtitle; } ?>
						</span> 					
					
					<?php } ?>
						<div class="featuredpost<?php if($count == $qty) { echo ' lastpost'; } ?>">
						<?php if($showthumb == 1){ 

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

									<?php } ?>	
		                        <?php if ( in_category( array( 10650,10651,10652,144,11112 ) )) {	
if ( in_category( 144 )) { echo '<span style="color:red; font-weight:bold;"><em>Digital Issue Article</em></span>'; }											
if ( in_category( 10650 )) { echo '<span style="color:#039; font-weight:bold;"><em>News</em></span>'; }											
if ( in_category( 10651 )) { echo '<span style="color:#039; font-weight:bold;"><em>Opinion</em></span>'; }											
if ( in_category( 10652 )) { echo '<span style="color:#039; font-weight:bold;"><em>How-to</em></span>'; }
if ( in_category( 11112 )) { echo '<span style="color:#039; font-weight:bold;"><em>Resource</em></span>'; }											
											} ?>
								<h2 class="posttitle">
									<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
								</h2>							
								
								<p><?php echo the_excerpt(); ?>&hellip;</p>
								
								
			<?php if($count == $qty) { ?>
  			<div class="morenews"><strong><?php if(strlen($theboxtitle) ==  '0'){ ?>
				<a href="<?php echo get_category_link($box_lead_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>">View all <?php echo get_cat_name($box_lead_cat); ?></a>
			<?php } else { ?> 
            <a href="<?php echo get_category_link($box_lead_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>">View all <?php echo $theboxtitle; ?></a>
			<?php } ?></strong></div>
		  <?php  } ?>	
						</div><!-- .featuredpost -->
                       <?php } ?> 
                        
					<?php $count++; endwhile; wp_reset_query(); ?>


<?php
echo '<div class="clear"></div>';
	
    $local_box_cache = ob_get_clean( );
echo $local_box_cache;
// end the code to cache

//end cache query 
	if( current_user_can( 'edit_post' ) ) {
//you cannot cache it
} else {
set_transient($box_q ,$local_box_cache, 60 * 15);
}
} else { 
echo $local_box_cache;
}

}
add_shortcode('box_lead_300', 'lead_post_narrow_plus_shortcode');




function box_art_300($qty = 4,$theorder = 'date', $showthumb = 1, $thecat = 0, $offset = 0, $theboxtitle = '0', $ast = 0, $astc = 0 ){
$box_art_cat = 0 ? current_catID() : $thecat;

$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			global $astc, $astused;
$box_qt = 'art300_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$astused."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );

?>
								<span class="catname">
									<?php if(strlen($theboxtitle) ==  '0'){ ?>
										<a href="<?php echo get_category_link($box_art_cat);?>"><?php echo get_cat_name($box_art_cat); ?></a>
									<?php } else { echo '<a href="'. get_category_link($box_art_cat);echo $aststr.'">'.$theboxtitle.'</a>'; } ?>
								</span> 
								
								<?php
								$count = 1;
								$args = array(
								  'post__not_in'=>$do_not_duplicate,
					  			  'offset'=> $offset,
								  'posts_per_page' => $qty,
								  'orderby'=> $theorder,
								  'cat' => $thecat
								);
$query = new WP_Query( $args );
while ($query->have_posts()) : $query->the_post();
		
								?>
								
									<div class="featuredpost<?php // if($count == $qty) { echo ' lastpost'; } ?>">
											<?php if ( in_category( array( 10650,10651,10652,144,11112 ) )) {	
if ( in_category( 144 )) { echo '<span style="color:red; font-weight:bold;"><em>Digital Issue Article</em></span>'; }											
if ( in_category( 10650 )) { echo '<span style="color:#039; font-weight:bold;"><em>News</em></span>'; }											
if ( in_category( 10651 )) { echo '<span style="color:#039; font-weight:bold;"><em>Opinion</em></span>'; }											
if ( in_category( 10652 )) { echo '<span style="color:#039; font-weight:bold;"><em>How-to</em></span>'; }
if ( in_category( 11112 )) { echo '<span style="color:#039; font-weight:bold;"><em>Resource</em></span>'; }											
											} ?>
                                            <h2 class="posttitle">
												<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
											</h2>							
									<?php if($showthumb == 1){ 

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

									<?php } ?>		
											<p><?php echo the_excerpt(); ?>&hellip;</p>
											
											

			<?php if($count == $qty) { ?>
  			<div class="morenews"><strong><?php if(strlen($theboxtitle) ==  '0'){ ?>
				<a href="<?php echo get_category_link($box_art_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>">View all <?php echo get_cat_name($box_art_cat); ?></a>
			<?php } else { ?> 
            <a href="<?php echo get_category_link($box_art_cat);  if ($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>">View all <?php echo $theboxtitle; ?></a>
			<?php } ?></strong></div>
		  <?php  } ?>	
										
									</div><!-- .featuredpost -->
								<?php $count++; endwhile; wp_reset_query(); ?>

<?php
echo '<div class="clear"></div>';

	
	
    $local_box_cache = ob_get_clean( );
echo $local_box_cache;
// end the code to cache

//end cache query 
	if( current_user_can( 'edit_post' ) ) {
//you cannot cache it
} else {
set_transient($box_q ,$local_box_cache, 60 * 15);
}
} else { 
echo $local_box_cache;
}

}


add_shortcode('box_art_300', 'article_list_narrow_shortcode');






/* worry about this later...

function box_ad($thead = NULL){
if (!is_null($thead)){
		
		//NOTE THIS NEEDS UPDATE
		//include_once(TEMPLATEPATH . '/ads/'.$thead.'.php');
		

	}
}
add_shortcode('box_ad', 'box_ad_shortcode');







function box_registration(){

//WE NEED THIS FUNCTION FOR THE SITE 

}
add_shortcode('box_registration', 'box_registration_shortcode');










*/
?>