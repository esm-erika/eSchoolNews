<?php


function box_hec($qty = 4,$theorder = 'date', $showthumb = 1, $thecat = 0, $offset = 0, $theboxtitle = '0', $ps = 0, $astc = 0 ){
$box_art_cat = 0 ? current_catID() : $thecat;

if($ps > 0){ $psstr = '?ps='.$ps; }

	//insert cache query
		$box_qt = 'hec_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$ps."_".$astc;
		$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
		
		$local_box_cache = get_transient( $box_q );
		if (false === ($local_box_cache) ){
	// start code to cache
	ob_start( );

?>

<header> 
	<h4><?php if(strlen($theboxtitle) ==  '0'){ ?>
    <a href="<?php echo get_category_link($box_art_cat);?>" style="color:#fff;"><?php echo get_cat_name($box_art_cat); ?></a>
									<?php } else { 
echo '<a href="http://www.ecampusnews.com/" >'.$theboxtitle.'</a>'; } ?>
<div align="right"><a href="http://www.ecampusnews.com" style="font-style:italic; font-size:10px; color:#000">sponsored by eCampus News</a>
    </h4>

</header>
			
<?php
global $switched;
switch_to_blog(3); //switched to ecn blog

?>
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
								
									<div class="featuredpost<?php // if($count == $qty) { echo ' lastpost'; } ?>" style="border-bottom:1px dotted #360;">
											<?php 
											if ( in_category( array( 10650,10651,10652,144,11112 ) )) {	
if ( in_category( 144 )) { echo '<span style="color:red; font-weight:bold;"><em>Digital Issue Article</em></span>'; }											
if ( in_category( 10650 )) { echo '<span style="color:#039; font-weight:bold;"><em>News</em></span>'; }											
if ( in_category( 10651 )) { echo '<span style="color:#039; font-weight:bold;"><em>Opinion</em></span>'; }											
if ( in_category( 10652 )) { echo '<span style="color:#039; font-weight:bold;"><em>How-to</em></span>'; }
if ( in_category( 11112 )) { echo '<span style="color:#039; font-weight:bold;"><em>Resource</em></span>'; }											
											}
											?>
                                            <h2 class="posttitle">
												<a href="<?php the_permalink();echo $psstr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
											</h2>							
									<?php if($showthumb == 1){ 

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

									<?php } ?>		
											<p><?php echo the_excerpt(); ?>&hellip;</p>
											
											
							<?php if($count == $qty) { ?>
	                            <div class="morenews"><strong><a href="http://www.ecampusnews.com/<?php echo $psstr; ?>" target="_blank">Visit eCampus News</a></strong></div>
                            <?php  } ?>	
										
									</div><!-- .featuredpost -->
								<?php $count++; endwhile; wp_reset_query();

 restore_current_blog(); //switched back to main site

				
								
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
add_shortcode('box_hec', 'hec_shortcode');



function box_lead($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $offset = 0, $ast = 0, $astc = 0){


// echo 'COLUMN 1 Box 1';
$box_lead_cat = 0 ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			$box_qt = 'blead_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$ast."_".$astc;
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
			$box_qt = 'bmlead_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$ast."_".$astc;
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
			$box_qt = 'art_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$ast."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );
?>			<span class="catname">
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
								  'cat' => $box_art_cat
								);
$query = new WP_Query( $args );
while ($query->have_posts()) : $query->the_post();

?>
								
									<div class="featuredpost<?php // if($count == $qty) { echo ' lastpost'; } ?>">
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
add_shortcode('box_art', 'article_list_shortcode');




function box_lead_300($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $offset = 0, $theboxtitle = '0', $ast = 0, $astc = 0){
$box_lead_cat = 0 ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			$box_qt = 'blead300_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$ast."_".$astc;
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
			$box_qt = 'art300_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$ast."_".$astc;
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







function box_myesm($qty = 4,$theorder = 'date', $showthumb = 1, $thecat = 11, $user_id = 0, $newselection = '0'){
$box_art_cat = 0 ? current_catID() : $thecat;

// if selection use user selection
  $key = '_myesm_esn';
  $single = true;

if($user_id == 0){
	?>
		<div style="margin-bottom:10px;">
          <span class="catname"><a href="/myeschoolnews/"><img src="<?php bloginfo( 'template_url' ); ?>/images/myesn4.png" alt="My eSchool News" height="28" width="191"></a></span>					
        <div style="margin:7px;margin-bottom:10px;">	
	
    		<form action="<?php echo get_option('home'); ?>/wp-login.php?wpe-login=esminc" method="post"><p>
			My eSchool News provides you the latest news by the categories you select. <br />
			Customize your news now. You must be logged in to view your customized news.<br />
            Watch <a href="http://www.eschoolnews.com/2012/12/06/my-esn-video-tutorial/" target="_blank">this short video</a> to learn more about My eSchool News. <br />

            
Username: <input type="text" name="log" id="log" value="" style="width:120px" /> 
&nbsp;&nbsp;Password: <input name="pwd" id="pwd" type="password" value="" style="width:120px" />
&nbsp;&nbsp;<input type="submit" name="submit" value="Login" class="button">
<input name="rememberme" id="rememberme" type="hidden" checked="checked" value="forever">
<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
<br /><a href="<?php echo get_option('home'); ?>/wp-login.php?action=register&redirect_to=?redirect_to=<?php echo urlencode(get_permalink()); ?>">Register</a>&nbsp;|&nbsp;
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword">Lost Password?</a></p>
</form>	
            
            
    
		</div><div class="clear"></div></div>
	
<?php	
	
} else {

		
	

if(!$user_id == 0 and !$newselection == '0'){
	update_user_meta( $user_id, $key, $newselection );
	}


$myesm_subs_meta = get_user_meta( $user_id, $key, $single ); 
if($user_id > 0){
	$user_subs = explode("|", $myesm_subs_meta);
	$qty = $user_subs[0];
	$showthumb = $user_subs[1];
	$thecat = $user_subs[2] . ',-136,-137,-138';
	if(strlen($thecat) < 16){$thecat = '99999999,-136,-137,-138'; $qty = 1; }
$esmautofill = array(
	esmqty => $qty,
	showimage => $showthumb,
	esmcats => $thecat);

	
	
}
?>

    <script type="text/javascript"><!--  
     
    function showPageElement(what)  
    {  
        var obj = typeof what == 'object'  
            ? what : document.getElementById(what);  
      
        obj.style.display = 'block';  
        return false;  
    }  
      
    function hidePageElement(what)  
    {  
        var obj = typeof what == 'object'  
            ? what : document.getElementById(what);  
      
        obj.style.display = 'none';  
        return false;  
    }  
      
    function togglePageElementVisibility(what)  
    {  
        var obj = typeof what == 'object'  
            ? what : document.getElementById(what);  
      
        if (obj.style.display == 'none')  
            obj.style.display = 'block';  
        else  
            obj.style.display = 'none';  
        return false;  
    }  
      
    //--></script>  
		<div style="margin-bottom:10px;">
        	<span class="catname"><a href="/myeschoolnews/"><img src="<?php bloginfo( 'template_url' ); ?>/images/myesn4.png" alt="My eSchool News" height="28" width="191"></a></span>			
		<div style="margin:7px;margin-bottom:10px;">
<?php   
if(!$myesm_subs_meta){
	echo '<div>My eSchool News provides you the latest news by the categories you select.<br /><strong>Customize your news now.</strong>Watch <a href="http://www.eschoolnews.com/2012/12/06/my-esn-video-tutorial/" target="_blank">this short video</a> to learn more about My eSchool News. <br /></div>';
	
} else {   ?>
        						<?php
								$count = 1;
								$args = array(
								  'post__not_in'=>$do_not_duplicate,
								  'posts_per_page' => $qty,
								  'cat' => $thecat
								);
$query = new WP_Query( $args );
while ($query->have_posts()) : $query->the_post();

									$categories = get_the_category();
									$seperator = ' ';
									$output = '';
									
									$arraythecat = explode(",", $thecat);
									
									if($categories){
										$catnamefound = 0;
											foreach($categories as $category) {
												//print_r($category);
											if (in_array($category->cat_ID, $arraythecat)) {
												if($catnamefound == 0){
												$output .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>';}
												$catnamefound = 1;
												} else if (in_array($category->category_parent, $arraythecat)) {
												if($catnamefound == 0){
												$output .= '<a href="'.get_category_link($category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'. get_category_parents($category->term_id, false, $seperator).'</a>';
												//$output = trim($output, $seperator);
												}
												$catnamefound = 1;
											} 
										}
										echo trim($output, $seperator);
									}								
								?>
                              
                              	<div class="featuredpost<?php // if($count == $qty) { echo ' lastpost'; } ?>">
									<?php if($showthumb == 1){ 

						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

									<?php } ?>	
										
											<h2 class="posttitle">
												<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
											</h2>							
											
											<p><?php echo the_excerpt(); ?>&hellip;</p>
											
                                            
                                                
                                               
                                            
											
									</div><!-- .featuredpost -->
								<?php $count++; endwhile; wp_reset_query(); ?>
                                
<div class="morenews"><strong>
	<a href="/myeschoolnews/all/">View All My Education News</a>
</strong></div>                                
                                
<?php
}
echo '<div class="clear"></div>';
?>
<h3 class="section-title" style="font-size:10px; width:100%"><button id="button3" onclick="return togglePageElementVisibility(document.getElementById('divmyesm1'))">Change your preferences</button></h3>

<?php 
/*
<button id="button1" onclick="return showPageElement('divmyesm1')">Show DIV</button>
<a onclick="return hidePageElement(document.getElementById('divmyesm1'))" href="#">Hide DIV</a>
<button id="button3" onclick="return togglePageElementVisibility(document.getElementById('divmyesm1'))">Toggle DIV visibility</button>
<a onclick="return togglePageElementVisibility(document.getElementById('divmyesm1'));" href="/">Gracefuly degradable toggle visibility</a>
*/

echo '<div id="divmyesm1" style="display:none;">';
//gravity_form($id, $display_title=true, $display_description=true, $display_inactive=false, $field_values=null, $ajax=false)
gravity_form(57, false, false, false, $esmautofill, false);
echo '</div></div><div class="clear"></div></div>';
}


}



add_shortcode('box_myesm', 'myemn_posts_shortcode');



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











?>