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
								<span class="catname" style=" background-image:url('/images/catname_grbg.gif'); margin-bottom:1px;">
									<?php if(strlen($theboxtitle) ==  '0'){ ?>
										<a href="<?php echo get_category_link($box_art_cat);?>" style="color:#fff;"><?php echo get_cat_name($box_art_cat); ?></a>
									<?php } else { 
echo '<a href="http://www.ecampusnews.com/" style="color:#fff;">'.$theboxtitle.'</a>'; } ?>
								</span> 
<div align="right"><a href="http://www.ecampusnews.com" style="font-style:italic; font-size:10px; color:#000">sponsored by eCampus News</a></div>				
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
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();	
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
									<?php if($showthumb == 1){ ?>
										<a href="<?php the_permalink();echo $psstr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
										<?php
											gab_media(array(
												'name' => 'an-belowfea',
												'enable_video' => 'false',
												'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
												'enable_thumb' => 'true',
												'resize_type' => 'c',
												'media_width' => 90, 
												'media_height' => 60, 
												'thumb_align' => 'alignleft',
												'enable_default' => 'false'
											));
										?></a>
									<?php } ?>		
											<p><?php echo string_limit_words(get_the_excerpt(),28); ?>&hellip;</p>
											
											<?php gab_postmeta(true,false,true,false,$ast,$astc); ?>

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
/*
*  qty must be a number or 3 will be used
*  theorder can be any order that WP_Query will accept the default is date.
*  thecat is a list of numbers 1,2,3,4 
*  thecat is a list of numbers 1,2,3,4 
*/
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
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();	
		if ($count == 1) { ?>
			<div class="featuredPost2">
					<?php if($showthumb == 1){ ?>
						<a href="<?php the_permalink();echo $aststr;?>" rel="bookmark">
<?php
if ( has_post_thumbnail() ) {
the_post_thumbnail('200 x 150', array('class' => 'alignleft'));
}
else {
gab_media(array(
'name' => 'an-belowfea',
'enable_video' => 'false',
'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
'enable_thumb' => 'true',
'resize_type' => 'c',
'media_width' => 110, 
'media_height' => 77, 
'thumb_align' => 'alignleft',
'enable_default' => 'false'
));
}
?>
					</a>
					<?php } ?>
					<h2 class="postTitle"><a href="<?php the_permalink(); echo $aststr; ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p><?php print string_limit_words(get_the_excerpt(), 100); ?>...</p> 
					<?php gab_postmeta(true,false,true,true,$ast,$astc); ?>
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
			<?php if($showthumb == 1){ ?>
            <a href="<?php the_permalink();echo $psstr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
				<?php
					if ( has_post_thumbnail() ) {
the_post_thumbnail('110 x 77', array('class' => 'alignleft'));
}
else {
gab_media(array(
						'name' => 'an-belowfea',
						'enable_video' => 'false',
						'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
						'enable_thumb' => 'true',
						'resize_type' => 'c',
						'media_width' => 110, 
						'media_height' => 77, 
						'thumb_align' => 'alignleft',
						'enable_default' => 'false'
					));
}
				?></a>
			<?php } ?>
				
					<h2 class="posttitle">
						<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
					</h2>							
					
					<p><?php echo string_limit_words(get_the_excerpt(),28); ?>&hellip;</p>
					
					<?php gab_postmeta(true,false,true,true,$ast,$astc); ?>

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
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post(); ?>
			<div class="featuredPost2" <?php if($count > 1){ echo 'style="border-top:#999 dotted 1px; padding-top:10px;margin-top:10px;"'; } ?>>
					<?php if($showthumb == 1){ ?>
						<a href="<?php the_permalink();echo $aststr;?>" rel="bookmark"><?php
						if ( has_post_thumbnail() ) {
the_post_thumbnail('200 x 150', array('class' => 'alignleft'));
}
else {
gab_media(array(
						'name' => 'an-generic',
						'enable_video' => 'false',
						'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
						'enable_thumb' => 'true',
						'resize_type' => 'c',
						'media_width' => 200, 
						'media_height' => 150, 
						'thumb_align' => 'alignleft',
						'enable_default' => 'false'
						));
						
}
						?>	</a>
					<?php } ?>
					<h2 class="postTitle"><a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark"><?php the_title(); ?></a></h2>
					<p><?php print string_limit_words(get_the_excerpt(), 100); ?>...</p> 
					<?php gab_postmeta(true,false,true,true,$ast,$astc); ?>
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

function box_rota($qty = 6, $offset = 0, $ast = 0, $astc = 0, $thecat = NULL){
$box_rota_cat = is_null($thecat) ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			$box_qt = 'rota_'.$qty.'_'.$offset."_".$ast."_".$astc._.$thecat;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );

?>

<?php if($qty < 4 ){ ?>
<style type="text/css">
h2.posttitle2 a{color:#000;text-decoration:none}
h2.posttitle2 a:hover{text-decoration:underline;color:#69C}
.posttitle2{font-family:Arial,Helvetica,sans-serif;font-style:normal;font-variant:normal;font-weight:normal;font-size:21px;line-height:22px;font-size-adjust:none;font-stretch:normal;-x-system-font:none;color:#000;margin-top:0pt;margin-right:0pt;margin-bottom:10px;margin-left:0pt;letter-spacing:-1px; width:385px;}
#featured-slider .featured-media2{display:block;width:478px;height:185px;position:relative}
#featured-slider .fea-slides{height:200px;overflow-x:hidden;overflow-y:hidden}
.sliderrightsidewrapper{margin-left:10px;width:180px;height:200px;float:left}
#fea-nav {float:right; width:78px;}
#featured-nav li{width:73px;float:left;margin-right:8px;margin-top:10px}
#featured-nav li a img{border:3px solid #fff;padding:1px;display:block}
#featured-nav li.activeSlide img,  #featured-nav li a:hover img{border:3px solid #cd1713}
</style>
<?php } else { ?>
<style type="text/css">
h2.posttitle2 a {color:#000;text-decoration:none;}
h2.posttitle2 a:hover {text-decoration:underline;color:#6699CC;}
.posttitle2 {font-family: Arial, Helvetica, sans-serif;font-style: normal;font-variant: normal;font-weight: normal;font-size: 21px;line-height: 22px;font-size-adjust: none;font-stretch: normal;-x-system-font: none;color: #000;margin-top: 0pt;margin-right: 0pt;margin-bottom: 10px;margin-left: 0pt;letter-spacing: -1px;}
#featured-slider .featured-media2 {display: block;width: 478px;height: 185px;position: relative;}
#featured-slider .fea-slides {height: 185px;overflow-x: hidden;overflow-y: hidden;}
</style>
<?php } ?>


<div id="featured-slider"  style="margin-bottom:15px;">


<?php
		$args = array(
			  'post__not_in'=>$do_not_duplicate,
			  'offset'=> $offset,
			  'posts_per_page' => $qty, 
			  'cat' => $box_rota_cat
		);	
 if($qty < 4 ){ ?>

	<div id="fea-nav">
		<ul id="featured-nav">
			<?php
			$count = 1;
			$gab_query = new WP_Query();$gab_query->query($args); 
			while ($gab_query->have_posts()) : $gab_query->the_post();		
			?>
				<li <?php if($count % 6 == 0) { echo 'class="last"'; } ?>>
				<a href="#">
					<?php 
					if ( has_post_thumbnail() ) {
the_post_thumbnail('73 x 50', array('class' => 'fea_thumb'));
}
else {
gab_media(array(
						'name' => 'an-feathumb', 
						'enable_video' => 'false', 
						'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
						'enable_thumb' => 'true', 
						'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
						'media_width' => '73', 
						'media_height' => '50', 
						'thumb_align' => 'fea_thumb', 
						'enable_default' => 'true',
						'default_name' => 'feathumb.jpg'
					)); 	
}
					?>
				</a>
				</li>
			<?php $count++; endwhile; wp_reset_query(); ?>
		</ul>
		<div class="clear"></div>
	</div><!-- /nav -->
<?php } ?>

	<div class="fea-slides">
		<?php 
		$count = 1;
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();						
		$do_not_duplicate[] = $post->ID;
		?>
		
		<div class="slide_item">
		
			<div class="featured-media2">
            <?php if ( in_category( array( 10650,10651,10652,144,11112 ) )) {	
if ( in_category( 144 )) { echo '<span style="color:red; font-weight:bold;"><em>Digital Issue Article</em></span>'; }											
if ( in_category( 10650 )) { echo '<span style="color:#039; font-weight:bold;"><em>News</em></span>'; }											
if ( in_category( 10651 )) { echo '<span style="color:#039; font-weight:bold;"><em>Opinion</em></span>'; }											
if ( in_category( 10652 )) { echo '<span style="color:#039; font-weight:bold;"><em>How-to</em></span>'; }
if ( in_category( 11112 )) { echo '<span style="color:#039; font-weight:bold;"><em>Resource</em></span>'; }											
											} ?>	
            				<h2 class="posttitle2">
								<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
							</h2>
					<?php if (($gab_flv == '') and ($gab_video == '') and ($gab_iframe == '') ) { /* if this is not a video */ ?>
						
    					<div class="sliderleftsidewrapper">
						<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
	<?php 
						if ( has_post_thumbnail() ) {
the_post_thumbnail('200 x 150', array('class' => 'media'));
}
else {
gab_media(array(
							'name' => 'an-featured', 
							'enable_video' => 'false', 
							'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
							'enable_thumb' => 'true', 
							'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
							'media_width' => '200', 
							'media_height' => '150', 
							'thumb_align' => 'media', 
							'enable_default' => 'true',
							'default_name' => 'featured.jpg'
						)); 
}
						?>	</a>			
						</div>
                        <div class="sliderrightsidewrapper">
						<p><?php print string_limit_words(get_the_excerpt(),38); ?>...</p>
						<span class="postmeta"><a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark"><?php the_time('F j Y') ?> / Read More &raquo;</a> </span>
						
                        
					</div>
					<?php } else { ?>
						
						<?php 
						if ( has_post_thumbnail() ) {
the_post_thumbnail('478 x 270', array('class' => 'media'));
}
else {
gab_media(array(
							'name' => 'an-featured', 
							'enable_video' => 'false', 
							'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
							'enable_thumb' => 'true', 
							'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
							'media_width' => '478', 
							'media_height' => '270', 
							'thumb_align' => 'media', 
							'enable_default' => 'true',
							'default_name' => 'featured.jpg'
						)); 
}
						?>					
					
					<?php } ?>

			</div>
		</div><!-- .slide-item -->

		<?php $count++; endwhile; wp_reset_query(); ?>
	</div><!-- .fea-slides -->

<?php if($qty > 3 ){ ?>
	
	<div id="fea-nav">
		<ul id="featured-nav">
			<?php
			$count = 1;
			$gab_query = new WP_Query();$gab_query->query($args); 
			while ($gab_query->have_posts()) : $gab_query->the_post();		
			?>
				<li <?php if($count % 6 == 0) { echo 'class="last"'; } ?>>
				<a href="#">
					<?php 
					if ( has_post_thumbnail() ) {
the_post_thumbnail('73 x 50', array('class' => 'fea_thumb'));
}
else {
gab_media(array(
						'name' => 'an-feathumb', 
						'enable_video' => 'false', 
						'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
						'enable_thumb' => 'true', 
						'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
						'media_width' => '73', 
						'media_height' => '50', 
						'thumb_align' => 'fea_thumb', 
						'enable_default' => 'true',
						'default_name' => 'feathumb.jpg'
					)); 	
}
					?>
				</a>
				</li>
			<?php $count++; endwhile; wp_reset_query(); ?>
		</ul>
		<div class="clear"></div>
	</div><!-- /nav -->	
	
<?php } ?>	
	
</div><!-- #featured-slider -->
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

add_shortcode('box_rota', 'rotating_posts_shortcode');

function box_rotp($qty = 6, $offset = 0, $ast = 0, $astc = 0, $thecat = NULL){
$box_rotp_cat = is_null($thecat) ? current_catID() : $thecat;	
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}	
//insert cache query
			$box_qt = 'rotp_'.$qty.'_'.$offset."_".$ast."_".$astc._.$thecat;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );



?>
			<div id="featured-slider" style="margin-bottom:15px;">
				<div class="fea-slides">
<?php
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
							  'offset'=> $offset,
							  'posts_per_page' => $qty,
							  'cat' => $box_rotp_cat
 							 );

					$gab_query = new WP_Query();$gab_query->query($args); 
					while ($gab_query->have_posts()) : $gab_query->the_post();						
					$do_not_duplicate[] = $post->ID;
					?>
					
					<div class="slide_item">
					
						<div class="featured-media">
								
									<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
								
								
									<?php 
									if ( has_post_thumbnail() ) {
the_post_thumbnail('478 x 270', array('class' => 'media'));
}
else {
gab_media(array(
										'name' => 'an-featured', 
										'enable_video' => 'false', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'enable_thumb' => 'true', 
										'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
										'media_width' => '478', 
										'media_height' => '270', 
										'thumb_align' => 'media', 
										'enable_default' => 'true',
										'default_name' => 'featured.jpg'
									)); 
}
									?>
									
								
									</a>
									
									<div class="postteaser"><?php if ( in_category( array( 144 ) )) { echo '<a href="/current-issue/" title="Digital Issue Article"><em>Digital Issue Article</em></a>';} ?>
										<h2 class="posttitle">
											<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
										</h2>
										<p><?php echo string_limit_words(get_the_excerpt(),10); ?>&hellip;</p>
									</div>
						</div>
					</div><!-- .slide-item -->

					<?php $count++; endwhile; wp_reset_query(); ?>
				</div><!-- .fea-slides -->
				
				<div id="fea-nav">
					<ul id="featured-nav">
						<?php
						$count = 1;
						$gab_query = new WP_Query();$gab_query->query($args); 
						while ($gab_query->have_posts()) : $gab_query->the_post();		
						?>
							<li <?php if($count % 6 == 0) { echo 'class="last"'; } ?>>
							<a href="#">
								<?php 
								
if ( has_post_thumbnail() ) {
the_post_thumbnail('73 x 50', array('class' => 'fea_thumb'));
}
else {
gab_media(array(
									'name' => 'an-feathumb', 
									'enable_video' => 'false', 
									'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
									'enable_thumb' => 'true', 
									'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
									'media_width' => '73', 
									'media_height' => '50', 
									'thumb_align' => 'fea_thumb', 
									'enable_default' => 'true',
									'default_name' => 'feathumb.jpg'
								)); 
}
								?>
							</a>
							</li>
						<?php $count++; endwhile; wp_reset_query(); ?>
					</ul>
					<div class="clear"></div>
				</div><!-- /nav -->	
				
			</div><!-- #featured-slider -->
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

add_shortcode('box_rotp', 'rotating_postpics_shortcode');
function box_rotpb($qty = 6, $offset = 0, $theboxtitle = '0', $ast = 0, $astc = 0, $thecat = NULL){
$box_rotp_cat = is_null($thecat) ? current_catID() : $thecat;	
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}
//insert cache query
			$box_qt = 'rotpb_'.$qty.'_'.$offset."_".$theboxtitle."_".$ast."_".$astc._.$thecat;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );

?>
			<div id="featured-slider" style="margin-bottom:15px;">
			<?php if(strlen($theboxtitle) ==  '0'){ ?>
				<div style="padding-bottom:5px; color: #333333; font-weight:bold; font-size: 14px;><?php echo get_cat_name($box_lead_cat); ?></div>
			<?php } else { ?> 
            <div style="padding-bottom:5px; color: #333333; font-weight:bold; font-size: 14px;><?php echo $theboxtitle; ?></div>
			<?php } ?>

				<div class="fea-slides">
<?php

							$args = array(
							  'post__not_in'=>$do_not_duplicate,
							  'offset'=> $offset,
							  'posts_per_page' => $qty,
							  'cat' => $box_rotp_cat
 							 );

					$gab_query = new WP_Query();$gab_query->query($args); 
					while ($gab_query->have_posts()) : $gab_query->the_post();						
					$do_not_duplicate[] = $post->ID;
					?>
					
					<div class="slide_item">
					
						<div class="featured-media">
								
									<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
								
								
									<?php 
									
if ( has_post_thumbnail() ) {
the_post_thumbnail('478 x 270', array('class' => 'media'));
}
else {
gab_media(array(
										'name' => 'an-featured', 
										'enable_video' => 'false', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'enable_thumb' => 'true', 
										'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
										'media_width' => '478', 
										'media_height' => '270', 
										'thumb_align' => 'media', 
										'enable_default' => 'true',
										'default_name' => 'featured.jpg'
									));
}
									?>
									
								
									</a>
									
									<div class="postteaser">
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
										<p><?php echo string_limit_words(get_the_excerpt(),10); ?>&hellip;</p>
									</div>
						</div>
					</div><!-- .slide-item -->

					<?php $count++; endwhile; wp_reset_query(); ?>
				</div><!-- .fea-slides -->
				
				<div id="fea-nav">
					<ul id="featured-nav">
						<?php
						$count = 1;
						$gab_query = new WP_Query();$gab_query->query($args); 
						while ($gab_query->have_posts()) : $gab_query->the_post();		
						?>
							<li <?php if($count % 6 == 0) { echo 'class="last"'; } ?>>
							<a href="#">
								<?php 
								if ( has_post_thumbnail() ) {
the_post_thumbnail('73 x 50', array('class' => 'fea_thumb'));
}
else {
gab_media(array(
									'name' => 'an-feathumb', 
									'enable_video' => 'false', 
									'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
									'enable_thumb' => 'true', 
									'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
									'media_width' => '73', 
									'media_height' => '50', 
									'thumb_align' => 'fea_thumb', 
									'enable_default' => 'true',
									'default_name' => 'feathumb.jpg'
								)); 
}
								?>
							</a>
							</li>
						<?php $count++; endwhile; wp_reset_query(); ?>
					</ul>
					<div class="clear"></div>
				</div><!-- /nav -->	
				
			</div><!-- #featured-slider -->
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
add_shortcode('box_rotp', 'rotating_postpics_shortcode');

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
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();	
								?>
								
									<div class="featuredpost<?php // if($count == $qty) { echo ' lastpost'; } ?>">
									<?php if($showthumb == 1){ ?>
										<a href="<?php the_permalink();echo $psstr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php
											if ( has_post_thumbnail() ) {
the_post_thumbnail('110 x 77', array('class' => 'alignleft'));
}
else {
gab_media(array(
												'name' => 'an-belowfea',
												'enable_video' => 'false',
												'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
												'enable_thumb' => 'true',
												'resize_type' => 'c',
												'media_width' => 110, 
												'media_height' => 77, 
												'thumb_align' => 'alignleft',
												'enable_default' => 'false'
											));
}
										?></a>
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
											
											<p><?php echo string_limit_words(get_the_excerpt(),28); ?>&hellip;</p>
											
											<?php gab_postmeta(true,false,true,true,$ast,$astc); ?>

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



function box_art_2($qty = 4,$theorder = 'date', $showthumb = 1, $thecat = 0, $offset = 0, $theboxtitle = '0', $ast = 0, $astc = 0){
$box_art_cat = 0 ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			$box_qt = 'art2_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$ast."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );

?>			<span class="catname">
				<?php if(strlen($theboxtitle) ==  '0'){ ?>
					<a href="<?php echo get_category_link($box_art_cat);echo $aststr; ?>"><?php echo get_cat_name($box_art_cat); ?></a>
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
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();	
								?>
								
											<h2 class="posttitle">
												<a href="<?php the_permalink();echo $aststr;?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
											</h2>							
											<div class="featuredpost<?php // if($count == $qty) { echo ' lastpost'; } ?>">
											<?php if($showthumb == 1){ ?>
												<a href="<?php the_permalink();echo $psstr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php
													if ( has_post_thumbnail() ) {
the_post_thumbnail('110 x 77', array('class' => 'alignleft'));
}
else {
gab_media(array(
														'name' => 'an-belowfea',
														'enable_video' => 'false',
														'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
														'enable_thumb' => 'true',
														'resize_type' => 'c',
														'media_width' => 110, 
														'media_height' => 77, 
														'thumb_align' => 'alignleft',
														'enable_default' => 'false'
													));
}
												?></a>
											<?php } ?>											
											<p><?php echo string_limit_words(get_the_excerpt(),28); ?>&hellip;</p>
											<span class="postmeta" style="height:1px;"></span>
											<?php // gab_postmeta(true,false,true,true,$ast,$astc); ?>
									
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

add_shortcode('box_art_2', 'article_list_2_shortcode');

function box_art_3($qty = 4,$theorder = 'date', $showthumb = 1, $thecat = 0, $offset = 0, $theboxtitle = '0', $ast = 0, $astc = 0){
$box_art_cat = 0 ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}


//insert cache query
			$box_qt = 'art3_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$ast."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );
?>			<span class="catname">
				<?php if(strlen($theboxtitle) ==  '0'){ ?>
					<a href="<?php echo get_category_link($box_art_cat);?>"><?php echo get_cat_name($box_art_cat); ?></a>
				<?php } else { echo '<a href="'. get_category_link($box_art_cat);echo $aststr.'">'.$theboxtitle.'</a>'; } ?>
            <div style="float:right">
				<form action="<?php bloginfo('url'); ?>">
					<input type="text" id="s" name="s" value="Search in this Section" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" style="font-size:8pt;"/>
                    <?php $searchcat = $thecat; ?>
				    <input type="hidden" name="cat" value="<?php echo $box_art_cat; ?>" />
                	<input type="submit" value="Go" />
				</form>
              </div>
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
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();	
								?>
								
									<div class="featuredpost<?php // if($count == $qty) { echo ' lastpost'; } ?>">
									<?php if($showthumb == 1){ ?>
										<?php
											if ( has_post_thumbnail() ) {
the_post_thumbnail('130 x 100', array('class' => 'alignleft'));
}
else {
gab_media(array(
												'name' => 'an-belowfea',
												'enable_video' => 'false',
												'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
												'enable_thumb' => 'true',
												'resize_type' => 'c',
												'media_width' => 100, 
												'media_height' => 130, 
												'thumb_align' => 'alignleft',
												'enable_default' => 'false'
												
											));
}
										?>
									<?php } ?>
										
											<h2 class="posttitle">
												<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
											</h2>							
											
											<?php 
											global $post; 
											$SubTitle=get_post_meta($post->ID, 'Sub Title', $single = true); 
                                                if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';}?>
                                            <?php $PageByLine=get_post_meta($post->ID, 'Byline', $single = true);
                                                if ($PageByLine != null) { echo '<span class="byline"> Provided by '.$PageByLine.'</span>';}?>

											<p style="padding-top:10px;"><?php echo string_limit_words(get_the_excerpt(),100); ?>&hellip;</p>
											
											<span style="font-size:14px!important;"><?php gab_postmeta(false,false,true,true,$ast,$astc); ?></span>

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


add_shortcode('box_art_3', 'article_list_3_shortcode');














function box_art_4($qty = 4,$theorder = 'date', $showthumb = 1, $thecat = 0, $offset = 0, $theboxtitle = '0', $ast = 0, $astc = 0){
$box_art_cat = 0 ? current_catID() : $thecat;

$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}


//insert cache query
			if (strlen($_SERVER["QUERY_STRING"] )){ $usenocache = 1;}
			$box_qt = 'art4_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$offset."_".$theboxtitle."_".$ast."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) or $usenocache == 1 ){
// start code to cache
    ob_start( );
?>			
<form action="?filter" name="filter" >
			<span class="catname" style="color:#FFF; background-image:none; background-color:#0072BC;">
				<?php if(strlen($theboxtitle) ==  '0'){ ?>
					<a href="<?php echo get_category_link($box_art_cat);?>" style="color:#fff; "><?php echo get_cat_name($box_art_cat); ?></a>
				<?php } else { echo '<a href="'. get_category_link($box_art_cat);echo $aststr.'" style="color:#fff;">'.$theboxtitle.'</a>'; } ?>

	<input type="text" id="s" name="search" value="" style="float:none; font-size:12px;" />
       
        <select name="topic" id="search-dir-topics" style="font-size:12px;display: inline;padding-top: 2px;padding-right: 5px;padding-bottom: 2px;padding-left: 5px;margin-top: 2px;margin-left: 8px;">
			<option value="">All Topics</option>
				<?php 
                $splitcat = explode(",", $thecat);
				foreach ($splitcat as $v) {
					$v = trim($v);
					if($v != '7084' and $v != '6274'){
					echo '<option value="'.$v.'" style="font-size:10px;" >'.str_replace("Whitepapers","", get_cat_name($v)).'</option>'; //str_replace("White Papers","", get_cat_name($box_art_cat))
					}
				}

                ?>
        </select>			
					
                    <input type="submit" value="Go" style="font-size:12px;margin-top: 2px;" />
				


       &nbsp;&nbsp;&nbsp; <a href="http://<?php echo $_SERVER["SERVER_NAME"]; echo strtok($_SERVER["REQUEST_URI"],'?'); ?>" style="color:#fff; font-size:10px; text-decoration:underline; margin-top:4px;">clear search</a>
            </span>	 
	<?php			
								$count = 1;
								if ( isset( $_REQUEST[ 'filter' ] ) ) {
								// run search query
								if ( isset( $_GET['topic'] ) ) {$box_art_cat = intval($_GET['topic']);}
								
								
								
								if (intval($box_art_cat) == 0){ $box_art_cat = $thecat;
								
								 }
								
								$args = array(
								  's' => $_REQUEST[ 'search' ],
								  'cat' => $box_art_cat,
								  'paged' => $paged,
								  'post__not_in'=>$do_not_duplicate
								 ); 
								} else {
								if ( isset( $_GET['topic'] ) ) {$box_art_cat = intval($_GET['topic']);
								
								if (intval($box_art_cat) == 0){ $box_art_cat = $thecat;
								
								 }
								}
								  $args = array(
								  'post__not_in'=>$do_not_duplicate,
								  'offset'=> $offset,
								  'posts_per_page' => $qty,
								  'orderby'=> $theorder,
								  'cat' => $box_art_cat
								); }
								
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();	
								?>
								
									<div class="featuredpost<?php // if($count == $qty) { echo ' lastpost'; } ?>">
									


<h2 class="posttitle" style="background-color:#069;  padding:5px;">	
                                            <span style="color:#eee; font-weight:bold;font-size:12px;line-height:14px; "><em>
<?php $categories = get_the_category();
$separator = ', ';
$output = '';
if($categories){
foreach($categories as $category) {
if($category->term_id != '7084' and $category->term_id != '6274'){
$output .= '<a href="?search=&topic='. $category->term_id .'" style="color:#ff0" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.str_replace("Whitepapers","", $category->cat_name).'</a>'.$separator;
}
}
echo trim($output, $separator);
}	?>
</em></span><br> <a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" style="color:#fff" ><?php the_title(); ?></a>
											</h2>

										<?php if($showthumb == 1){ ?>
										<?php
											if ( has_post_thumbnail() ) {
the_post_thumbnail('130 x 100', array('class' => 'alignleft'));
}
else {
gab_media(array(
												'name' => 'an-belowfea',
												'enable_video' => 'false',
												'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
												'enable_thumb' => 'true',
												'resize_type' => 'c',
												'media_width' => 100, 
												'media_height' => 130, 
												'thumb_align' => 'alignleft',
												'enable_default' => 'false'
											));
}
										?>
									<?php } 
									?>
																	
											
											<?php 


											global $post; 
											//echo get_the_category_list();
											

											$SubTitle=get_post_meta($post->ID, 'Sub Title', $single = true); 
                                                if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';}?>
                                            <?php $PageByLine=get_post_meta($post->ID, 'Byline', $single = true);
                                                if ($PageByLine != null) { echo '<span class="byline"> Provided by '.$PageByLine.'</span>';}?>

											<p style="padding-top:10px;"><?php echo string_limit_words(get_the_excerpt(),100); ?>&hellip;[ <a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >Read More</a>]</p>
           <span class="postmeta">

	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. $post->ID;echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" ><img src="<?php echo site_url(); ?>/files/2011/10/download-whitepaper.gif" height="38" width="182" style="margin-top:10px; padding-left:15px;" /></a>


									
									<?php /*		  <a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><img src="<?php echo site_url(); ?>/files/2014/04/ReadMoreReport.gif" height="38" width="182" style="padding-left:10px;" /></a>*/ ?></span>

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
	if( current_user_can( 'edit_post' ) or $usenocache == 1 ) {
//you cannot cache it
} else {
set_transient($box_q ,$local_box_cache, 60 * 15);
}
} else { 
echo $local_box_cache;
}

}


add_shortcode('box_art_4', 'article_list_4_shortcode');

























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
					$gab_query = new WP_Query();$gab_query->query($args); 
					while ($gab_query->have_posts()) : $gab_query->the_post();	
					if ($count == 1) { ?>
                        <div class="featuredPost2">
                             	<?php if($showthumb == 1){ ?>
                                    <a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark"><?php
                                    if ( has_post_thumbnail() ) {
the_post_thumbnail('300 x 225', array('class' => 'alignleft'));
}
else {
gab_media(array(
                                    'name' => 'an-generic',
                                    'enable_video' => 'false',
                                    'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
                                    'enable_thumb' => 'true',
                                    'resize_type' => 'c',
                                    'media_width' => 300, 
                                    'media_height' => 225, 
                                    'thumb_align' => 'alignleft',
                                    'enable_default' => 'false'
                                    ));
}
                                    ?>	</a>
                        		<?php } ?>
                                <h2 class="postTitle"><a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                                <p><?php print string_limit_words(get_the_excerpt(), 100); ?>...</p> 
                                <?php gab_postmeta(true,false,true,true,$ast,$astc); ?>
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
						<?php if($showthumb == 1){ ?><a href="<?php the_permalink();echo $psstr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
							<?php
								if ( has_post_thumbnail() ) {
the_post_thumbnail('110 x 77', array('class' => 'alignleft'));
}
else {
gab_media(array(
									'name' => 'an-belowfea',
									'enable_video' => 'false',
									'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
									'enable_thumb' => 'true',
									'resize_type' => 'c',
									'media_width' => 110, 
									'media_height' => 77, 
									'thumb_align' => 'alignleft',
									'enable_default' => 'false'
								));
}
							?></a>
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
								
								<p><?php echo string_limit_words(get_the_excerpt(),28); ?>&hellip;</p>
								
								<?php gab_postmeta(true,false,true,true,$ast,$astc); ?>
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
function box_rota_300($qty = 6, $offset = 0,$ast = 0, $astc = 0, $thecat = NULL){
	$box_rota_cat = is_null($thecat) ? current_catID() : $thecat;
	$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

//insert cache query
			$box_qt = 'blead300_'.$qty.'_'.$offset."_".$ast."_".$astc._.$thecat;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);

			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) ){
// start code to cache
    ob_start( );

?>

<style type="text/css">
h2.posttitle2 a {color:#000;text-decoration:none;}
h2.posttitle2 a:hover {text-decoration:underline;color:#6699CC;}
.posttitle2 {font-family: Arial, Helvetica, sans-serif;font-style: normal;font-variant: normal;font-weight: normal;font-size: 21px;line-height: 22px;font-size-adjust: none;font-stretch: normal;-x-system-font: none;color: #000;margin-top: 0pt;margin-right: 0pt;margin-bottom: 10px;margin-left: 0pt;letter-spacing: -1px;}
#featured-slider .featured-media2 {display: block;width: 478px;height: 185px;position: relative;}
#featured-slider .fea-slides {height: 185px;overflow-x: hidden;overflow-y: hidden;}
</style>

<div id="featured-slider">
	<div class="fea-slides">
		<?php 
		$count = 1;
		$args = array(
			  'post__not_in'=>$do_not_duplicate,
			  'offset'=> $offset,
			  'posts_per_page' => $qty, 
			  'cat' => $box_rota_cat
		);
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();						
		$do_not_duplicate[] = $post->ID;
		?>
		<div class="slide_item">
			<div class="featured-media2">
            				<?php if ( in_category( array( 10650,10651,10652,144,11112 ) )) {	
if ( in_category( 144 )) { echo '<span style="color:red; font-weight:bold;"><em>Digital Issue Article</em></span>'; }											
if ( in_category( 10650 )) { echo '<span style="color:#039; font-weight:bold;"><em>News</em></span>'; }											
if ( in_category( 10651 )) { echo '<span style="color:#039; font-weight:bold;"><em>Opinion</em></span>'; }											
if ( in_category( 10652 )) { echo '<span style="color:#039; font-weight:bold;"><em>How-to</em></span>'; }
if ( in_category( 11112 )) { echo '<span style="color:#039; font-weight:bold;"><em>Resource</em></span>'; }											
											} ?>
							<h2 class="posttitle2">
								<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
							</h2>
    					<div class="sliderleftsidewrapper">

						<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
	<?php 
						
if ( has_post_thumbnail() ) {
the_post_thumbnail('200 x 150', array('class' => 'media'));
}
else {
gab_media(array(
							'name' => 'an-featured', 
							'enable_video' => 'false', 
							'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
							'enable_thumb' => 'true', 
							'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
							'media_width' => '200', 
							'media_height' => '150', 
							'thumb_align' => 'media', 
							'enable_default' => 'true',
							'default_name' => 'featured.jpg'
						)); 	
}
						?>	</a>			
						</div>
                        <div class="sliderrightsidewrapper">
						<p><?php print string_limit_words(get_the_excerpt(),30); ?>...</p>
						<span class="postmeta"><a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark"><?php the_time('F j Y') ?> / Read More &raquo;</a> </span>
						
                        
					</div>
			</div>
		</div><!-- .slide-item -->

		<?php $count++; endwhile; wp_reset_query(); ?>
	</div><!-- .fea-slides -->
	
	<div id="fea-nav">
		<ul id="featured-nav">
			<?php
			$count = 1;
			$gab_query = new WP_Query();$gab_query->query($args); 
			while ($gab_query->have_posts()) : $gab_query->the_post();		
			?>
				<li <?php if($count % 6 == 0) { echo 'class="last"'; } ?>>
				<a href="#">
					<?php 
					
if ( has_post_thumbnail() ) {
the_post_thumbnail('73 x 50', array('class' => 'fea_thumb'));
}
else {
gab_media(array(
						'name' => 'an-feathumb', 
						'enable_video' => 'false', 
						'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
						'enable_thumb' => 'true', 
						'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
						'media_width' => '73', 
						'media_height' => '50', 
						'thumb_align' => 'fea_thumb', 
						'enable_default' => 'true',
						'default_name' => 'feathumb.jpg'
					)); 	
}
					?>
				</a>
				</li>
			<?php $count++; endwhile; wp_reset_query(); ?>
		</ul>
		<div class="clear"></div>
	</div><!-- /nav -->	
	
</div><!-- #featured-slider -->






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

add_shortcode('box_rota_300', 'rotating_narrow_posts_shortcode');

function box_rotp_300($qty = 4, $offset = 0, $ast = 0, $astc = 0, $thecat = NULL){
$box_rotp_cat = is_null($thecat) ? current_catID() : $thecat;	
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}
?>
<style type="text/css">
#primary-mid #featured-slider {width:278px;padding:10px;background:#efefef;border:1px solid #ddd;
		-webkit-border-radius: 4px;-moz-border-radius:4px;border-radius: 4px;}
		#primary-mid #featured-slider .fea-slides {height:157px;overflow:hidden;}
		#primary-mid #featured-slider .featured-media {display:block;width:165px;height:157px;position:relative;}
			#primary-mid #featured-slider .media {position:absolute;z-index:1;}
			#primary-mid #featured-slider .fea-slides .postteaser {background: url(<?php bloginfo( 'template_url' ); ?>/styles/default/bg-transparent.png) repeat;width:258px;padding:10px;z-index:2;position:absolute;bottom:0;left:0;color:#fff;}
			#primary-mid #featured-slider .posttitle { font-family:Arial, Helvetica, sans-serif; margin:0 0 3px;font-size:14px;}
			#primary-mid #featured-slider .posttitle a {color:#fff;}
			#primary-mid #featured-slider .posttitle a:hover {text-decoration:underline;}
			#primary-mid #featured-slider p {margin:0;}
			#primary-mid .section_shadow {background:url(<?php bloginfo( 'template_url' ); ?>/styles/default/section-shadow.png) no-repeat top center; width:280px;height:5px;display:block;margin-bottom:10px;}
			#primary-mid #featured-nav li {width:64px;float:left;margin-right:4px;margin-right:4px;margin-top:8px;}
			#primary-mid #featured-nav li a img {border-top-width: 2px;border-top-style: solid;border-top-color: #ffffff;padding-top: 4px;display: block; margin-right:5px; margin-left:5px;}
			#primary-mid #featured-nav li.activeSlide img, #featured-nav li a:hover img {border-top-width: 2px;border-top-style: solid;border-top-color: #cd1713;}

</style>

<div id="featured-slider">
	<div class="fea-slides">
		<?php 
		$count = 1;
			$args = array(
			  'post__not_in'=>$do_not_duplicate,
			  'offset'=> $offset,
			  'posts_per_page' => $qty, 
			  'cat' => $box_rotp_cat
			);				
		
		$gab_query = new WP_Query();$gab_query->query($args); 
		while ($gab_query->have_posts()) : $gab_query->the_post();						
		$do_not_duplicate[] = $post->ID;
		?>
		
		<div class="slide_item">
		
			<div class="featured-media">
				<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
				
                		<?php 
											if ( has_post_thumbnail() ) {
the_post_thumbnail('278 x 157', array('class' => 'media'));
}
else {
gab_media(array(
							'name' => 'an-featured', 
							'enable_video' => 'false', 
							'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
							'enable_thumb' => 'true', 
							'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
							'media_width' => '278', 
							'media_height' => '157', 
							'thumb_align' => 'media', 
							'enable_default' => 'true',
							'default_name' => 'featured.jpg'
						)); 	
}
						?>
						</a>
						
						<div class="postteaser" style="background: url(<?php bloginfo( 'template_url' ); ?>/styles/default/bg-transparent.png) repeat;width:258px;padding:10px;z-index:2;position:absolute;bottom:0;left:0;color:#fff;">
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
							<p><?php echo string_limit_words(get_the_excerpt(),10); ?>&hellip;</p>
						</div>
				
			</div>
		</div><!-- .slide-item -->

		<?php $count++; endwhile; wp_reset_query(); ?>
	</div><!-- .fea-slides -->
	
	<div id="fea-nav">
		<ul id="featured-nav">
			<?php
			$count = 1;
			$gab_query = new WP_Query();$gab_query->query($args); 
			while ($gab_query->have_posts()) : $gab_query->the_post();		
			?>
				<li <?php if($count % 4 == 0) { echo 'class="last"'; } ?>>
				<a href="#">
					<?php 
					if ( has_post_thumbnail() ) {
the_post_thumbnail('73 x 50', array('class' => 'fea_thumb'));
}
else {
gab_media(array(
						'name' => 'an-feathumb', 
						'enable_video' => 'false', 
						'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
						'enable_thumb' => 'true', 
						'resize_type' => 'c', /* c to crop, h to resize only height, w to resize only width */
						'media_width' => '73', 
						'media_height' => '50', 
						'thumb_align' => 'fea_thumb', 
						'enable_default' => 'true',
						'default_name' => 'feathumb.jpg'
					)); 	
}
					?>
				</a>
				</li>
			<?php $count++; endwhile; wp_reset_query(); ?>
		</ul>
		<div class="clear"></div>
	</div><!-- /nav -->	
	
</div><!-- #featured-slider -->

<?php
echo '<div class="clear"></div>';}
add_shortcode('box_rotp_300', 'rotating_postpics_narrow_shortcode');


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
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();	
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
									<?php if($showthumb == 1){ ?>
										<a href="<?php the_permalink();echo $psstr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php
																													if ( has_post_thumbnail() ) {
the_post_thumbnail('90 x 60', array('class' => 'alignleft'));
}
else {
gab_media(array(
												'name' => 'an-belowfea',
												'enable_video' => 'false',
												'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
												'enable_thumb' => 'true',
												'resize_type' => 'c',
												'media_width' => 90, 
												'media_height' => 60, 
												'thumb_align' => 'alignleft',
												'enable_default' => 'false'
											));
}
										?></a>
									<?php } ?>		
											<p><?php echo string_limit_words(get_the_excerpt(),28); ?>&hellip;</p>
											
											<?php gab_postmeta(true,false,true,true,$ast,$astc); ?>

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

function box_myesn($ast = 0, $astc = 0){}
add_shortcode('box_myesn', 'myesn_posts_shortcode');

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
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();

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
									<?php if($showthumb == 1){ ?>
										<a href="<?php the_permalink();echo $psstr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php
																													if ( has_post_thumbnail() ) {
the_post_thumbnail('110 x 77', array('class' => 'alignleft'));
}
else {
gab_media(array(
												'name' => 'an-belowfea',
												'enable_video' => 'false',
												'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
												'enable_thumb' => 'true',
												'resize_type' => 'c',
												'media_width' => 110, 
												'media_height' => 77, 
												'thumb_align' => 'alignleft',
												'enable_default' => 'false'
											));
}
										?></a>
									<?php } ?>
										
											<h2 class="posttitle">
												<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
											</h2>							
											
											<p><?php echo string_limit_words(get_the_excerpt(),28); ?>&hellip;</p>
											
                                            
                                                
                                               
                                            
											<?php gab_postmeta(true,false,true,true); ?>
										
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


function box_myesm3(){
get_currentuserinfo();
$user_id = $current_user->ID;
echo 'user_id = ';
echo $user_id;
}
add_shortcode('box_myesm3', 'myemn3_posts_shortcode');


function box_myesm_col2($qty = 4,$theorder = 'date', $showthumb = 1, $thecat = 0, $user_id = 0, $newselection = '0'){
$box_art_cat = 0 ? current_catID() : $thecat;

// if selection use user selection
  $key = '_myesm_esn';
  $single = true;
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

    	<div style="border:#ccc solid 1px; margin 10px 0px;">
        <span class="catname"><a href="/myeschoolnews/"><img src="<?php bloginfo( 'template_url' ); ?>/images/myesn8.png" alt="My eSchool News" height="23" width="250" /></a></span>				
        <ul>
        						<?php
								$count = 1;
								$args = array(
								  'post__not_in'=>$do_not_duplicate,
								  'posts_per_page' => $qty,
								  'cat' => $thecat
								);
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();	
								?>
                              <li style="margin:2px 5px 8px 5px;"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
							<?php $count++; endwhile; wp_reset_query(); ?>
<?php


echo '<div class="clear"></div></div>';

}

add_shortcode('box_myesm_col2', 'myemn_col2_posts_shortcode');





function box_slide($qty = 12, $offset = 0, $ast = 0, $astc = 0, $thecat = NULL){
$box_slide_cat = is_null($thecat) ? current_catID() : $thecat;
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}

?>



<style type="text/css">
#submenu #featured-slider {width:900px;padding:5px 35px 3px 35px ;background:#efefef;border:1px solid #ddd;
		-webkit-border-radius: 4px;-moz-border-radius:4px;border-radius: 4px;}
		#submenu #featured-slider .fea-slides {height:135px;overflow:hidden;}
		
		#submenu #featured-slider .featured-media {display:block;width:215px;height:135px; float:left; margin-right:5px; margin-left:5px;/*position:relative;*/}
		
		#submenu #featured-slider .media {position:absolute;z-index:1;}
		#submenu #featured-slider .fea-slides .postteaser {background: url(<?php bloginfo( 'template_url' ); ?>/styles/default/bg-transparent.png) repeat;width:205px;padding:5px;z-index:2;position:absolute;bottom:0;left:0;color:#fff;}
		#submenu #featured-slider .posttitle { font-family:Arial, Helvetica, sans-serif; margin:0 0 3px;font-size:14px;}
		#submenu #featured-slider .posttitle a {color:#fff;}
		#submenu #featured-slider .posttitle a:hover {text-decoration:underline;}
		#submenu #featured-slider p {margin:0;}
		#submenu .section_shadow {background:url(<?php bloginfo( 'template_url' ); ?>/styles/default/section-shadow.png) no-repeat top center; width:215px;height:5px;display:block;margin-bottom:10px;}
		#submenu #featured-slider #featured-nav {width:900px;}
		/*#submenu #featured-nav li {width:64px;float:left;margin-right:4px;margin-right:4px;margin-top:8px;}
		#submenu #featured-nav li a img {border-top-width: 2px;border-top-style: solid;border-top-color: #ffffff;padding-top: 4px;display: block; margin-right:5px; margin-left:5px;}
		#submenu #featured-nav li.activeSlide img, #featured-nav li a:hover img {border-top-width: 2px;border-top-style: solid;border-top-color: #cd1713;} */

</style>



			<div id="featured-slider">
            	<div class="fea-slides">
                
<?php
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
							  'posts_per_page' => $qty,
							  'cat' => $box_slide_cat
 							 );
					$count = 1; 
					$subcount = 1;
					$gab_query = new WP_Query();$gab_query->query($args); 
					while ($gab_query->have_posts()) : $gab_query->the_post();						
					$do_not_duplicate[] = $post->ID;
					
					?>

					<?php
					$modulus = $count % 4;
					if ($count == 1 or $modulus == 1){ echo '<div class="slide_item">';}
					?>
						
                        <div class="featured-media" style="background-color:#006699;">
								
									<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
								
								
									<?php 
																		if ( has_post_thumbnail() ) {
the_post_thumbnail('215 x 135', array('class' => 'media'));
}
else {
gab_media(array(
										'name' => 'an-featured', 
										'enable_video' => 'false', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'enable_thumb' => 'true', 
										'resize_type' => 'w', /* c to crop, h to resize only height, w to resize only width */
										'media_width' => '215', 
										'media_height' => '135', 
										'thumb_align' => 'media', 
										'enable_default' => 'true',
										'default_name' => 'feathumb.jpg'
									)); 
}
									?>
									
								
									</a>
									
									<div class="postteaser">
										<h2 class="posttitle">
											<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
										</h2>
									</div>
						</div>
					<?php   if($modulus == 0 or $count == $qty){echo '</div><!-- .slide-item -->';}

					
					$count++; endwhile; wp_reset_query(); ?> 
				</div><!-- .fea-slides -->
				
				 <div id="fea-nav" style="text-align:center;">
	                 <a class="fea_prev" id="fea_prev" href="#" style="padding-right:380px;">&lt;&lt; previous</a>
					<?php /*<ul id="featured-nav">
                    	<a class="fea_prev" id="fea_prev" href="#">Previous</a>
						<?php
						$count = 1;
						$gab_query = new WP_Query();$gab_query->query($args); 
						while ($gab_query->have_posts()) : $gab_query->the_post();		
						?>
							<?php //if ($count < 4) {echo '<li><a href="#">&omicron;</a></li>';}?>
						<?php $count++; endwhile; wp_reset_query(); ?>
                        
					</ul><div class="clear"></div>
                   	*/?>
                    <a class="fea_next" id="fea_next" href="#" style="padding-left:380px;">next &gt;&gt;</a>
					
				</div> <!-- /nav -->	 
				
			</div><!-- #featured-slider -->
            </div>
<?php
echo '<div class="clear"></div>';}
add_shortcode('box_slide', 'rotating_postpics_shortcode');

function box_ad($thead = NULL){
if (!is_null($thead)){
		include_once(TEMPLATEPATH . '/ads/'.$thead.'.php');
	}
}
add_shortcode('box_ad', 'box_ad_shortcode');

function box_registration(){
?>

<div style="border:#CCCCCC solid 1px; padding:10px;">
<form action="<?php echo get_option('home'); ?>/wp-login.php?wpe-login=esminc" method="post">
<table style="width:100%;">
<tr><td colspan="2"><p><strong>Free registration required to continue.</strong></p></td></tr>
<tr><td style="width:45%; padding-right:10px; border-right:1px solid #666">

Register today and receive free access to all our news and resources and the ability to customize your news by topic with My eSchool News.<br /><br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=register&redirect_to=?redirect_to=<?php echo urlencode(get_permalink()); ?>" style="text-decoration:underline;"><strong>Register now.</strong></a>
</td>
<td style="width:55%; padding-left:10px">
Already a member? Log in
<div>Username: <input type="text" name="log" id="log" value="" /></div>
<div>Password:&nbsp <input name="pwd" id="pwd" type="password" value="" /></div>
<input type="submit" name="submit" value="Login" class="button">
<input name="rememberme" id="rememberme" type="hidden" checked="checked" value="forever">
<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
<br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" target="_blank">Lost Password?</a>

</td></tr></table>
</form>	
</div>
<?php
}
add_shortcode('box_registration', 'box_registration_shortcode');




function box_tab_1($tab1 = 0,$tab2 = 0,$tab3 = 0,$tab4 = 0,$tab5 = 0, $offset = 0, $ast = 0, $astc = 0){
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}



?>
<style>
#submit {
display: inline-block;
text-decoration: none !important;
padding: 3px 16px;
margin: 0;
font-size: 1em;
line-height: 1.6em;
text-align: center;
vertical-align: middle;
cursor: pointer;
border: 1px solid;
border-color: #bcc1c8 #bababa #adb2bb;
max-width: 100%;
color: #333;
background-color: #d8dde6;
outline: 0;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
-moz-box-shadow: rgba(255,255,255,0.6) 0 1px 0 inset;
-webkit-box-shadow: rgba(255,255,255,0.6) 0 1px 0 inset;
box-shadow: rgba(255,255,255,0.6) 0 1px 0 inset;
background-image: -moz-linear-gradient(#f7f8fa 0%,#e7e9ec 100%);
background-image: -webkit-linear-gradient(#f7f8fa 0%,#e7e9ec 100%);
background-image: linear-gradient(#f7f8fa 0%,#e7e9ec 100%);
font-family: "HelveticaNeue","Helvetica",Helvetica,Arial,sans-serif;

}

#submit:hover {

    background:eee;
    box-shadow: 0px 0px 1px #777;
}
</style>
<div id="mid-slider" style="width:600px">
		
		<div id="mid-slider-nav" style="border-top: none;  border-right: none; border-radius:8px 0 0 0;border-bottom-color: #333;">
			<ul id="mid-slider-pagination">
				<?php if (intval($tab1) > 0 ) { ?><li><a href="#" style="padding: 12px 12px 10px 12px; border-top:#333 1px solid; border-left:#333 1px solid; border-right:#333 1px solid; border-radius:8px 8px 0 0; color:#333;"><?php echo str_replace("Whitepaper Library","All White Papers", get_cat_name($tab1));// echo get_cat_name($tab1); ?></a></li><?php } ?>
				<?php if (intval($tab2) > 0 ) { ?><li><a href="#" style="padding: 12px 12px 10px 12px; border-top:#333 1px solid; border-left:#333 1px solid; border-right:#333 1px solid; border-radius:8px 8px 0 0; color:#333;"><?php echo str_replace("Whitepapers","", get_cat_name($tab2)); ?></a></li><?php } ?>
				<?php if (intval($tab3) > 0 ) { ?><li><a href="#" style="padding: 12px 12px 10px 12px; border-top:#333 1px solid; border-left:#333 1px solid; border-right:#333 1px solid; border-radius:8px 8px 0 0; color:#333;"><?php echo str_replace("Whitepapers","", get_cat_name($tab3));; ?></a></li><?php } ?>
				<?php if (intval($tab4) > 0 ) { ?><li><a href="#" style="padding: 12px 12px 10px 12px; border-top:#333 1px solid; border-left:#333 1px solid; border-right:#333 1px solid; border-radius:8px 8px 0 0; color:#333;"><?php echo str_replace("Whitepapers","", get_cat_name($tab4)); ?></a></li><?php } ?>
				<?php if (intval($tab5) > 0 ) { ?><li><a href="#" style="padding: 12px 12px 10px 12px; border-top:#333 1px solid; border-left:#333 1px solid; border-right:#333 1px solid; border-radius:8px 8px 0 0; color:#333;"><?php echo str_replace("Whitepapers","", get_cat_name($tab5)); ?></a></li><?php } ?>
			</ul>
			<a class="media_next" id="media_next" href="#"><?php _e('Next','advanced'); ?></a>
			<a class="media_prev" id="media_prev" href="#"><?php _e('Previous','advanced'); ?></a>
			<div class="clear"></div>
		</div><!-- /nav -->
		
		<div class="fea-slides-wrapper" style="border-bottom:#333 1px solid; border-left:#333 1px solid; border-right:#333 1px solid; margin-left:1px;"> <!-- using this class just to generate a border -->
			<div class="fea-slides">					
					<?php if (intval($tab1) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab1
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; padding-bottom: 1px;" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle" style="font-size: 17px;">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
									$my_date = the_date('', '', '</h2>', FALSE); 
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'<br>'.$my_date.'</span>';} else { echo '<br /><span class="byline">'.$my_date.'</span>';}?></h2>
                                    <p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 10px 20px 10px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>
					
					<?php if (intval($tab2) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab2
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; margin-bottom:10px" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
									$my_date = the_date('', '', '</h2>', FALSE); 
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'<br>'.$my_date.'</span>';} else { echo '<br /><span class="byline">'.$my_date.'</span>';}?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 15px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>				
					<?php if (intval($tab3) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab3
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; margin-bottom:10px" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
									$my_date = the_date('', '', '</h2>', FALSE); 
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'<br>'.$my_date.'</span>';} else { echo '<br /><span class="byline">'.$my_date.'</span>';}?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 15px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>
					<?php if (intval($tab4) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab4
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; margin-bottom:10px" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
									$my_date = the_date('', '', '</h2>', FALSE); 
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'<br>'.$my_date.'</span>';} else { echo '<br /><span class="byline">'.$my_date.'</span>';}?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 15px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>
					<?php if (intval($tab5) > 0 ) { ?>
												<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab5
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; margin-bottom:10px" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
									$my_date = the_date('', '', '</h2>', FALSE); 
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'<br>'.$my_date.'</span>';} else { echo '<br /><span class="byline">'.$my_date.'</span>';}?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 15px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>                                        					
			</div><!-- .fea-slides -->
				
			<div class="clear"></div>

		</div><!-- .fea-slides-wrapper -->
	<div class="clear"></div>
	
</div><!-- #mid-slider -->
<?php
}
add_shortcode('box_ad', 'box_tab_1_shortcode');


function box_tab_2($tab1 = 0,$tab2 = 0,$tab3 = 0,$tab4 = 0,$tab5 = 0, $offset = 0, $ast = 0, $astc = 0){
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}



?>
<style>
#submit {
    /* background-color: #fff;
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius:2px;
    color: #000;
    font-size: 12px;
    text-decoration: none;
    cursor: pointer;
    border:1px solid #ccc;
	padding:5px 15px; */
	
	
	display: inline-block;
text-decoration: none !important;
padding: 3px 16px;
margin: 0;
font-size: 1em;
line-height: 1.6em;
text-align: center;
vertical-align: middle;
cursor: pointer;
border: 1px solid;
border-color: #bcc1c8 #bababa #adb2bb;
max-width: 100%;
color: #333;
background-color: #d8dde6;
outline: 0;
-moz-border-radius: 3px;
-webkit-border-radius: 3px;
border-radius: 3px;
-moz-box-shadow: rgba(255,255,255,0.6) 0 1px 0 inset;
-webkit-box-shadow: rgba(255,255,255,0.6) 0 1px 0 inset;
box-shadow: rgba(255,255,255,0.6) 0 1px 0 inset;
background-image: -moz-linear-gradient(#f7f8fa 0%,#e7e9ec 100%);
background-image: -webkit-linear-gradient(#f7f8fa 0%,#e7e9ec 100%);
background-image: linear-gradient(#f7f8fa 0%,#e7e9ec 100%);
font-family: "HelveticaNeue","Helvetica",Helvetica,Arial,sans-serif;

}

#submit:hover {

    background:eee;
    box-shadow: 0px 0px 1px #777;
}
</style>
<div id="mid-slider" style="width:800px">
		
		<div id="mid-slider-nav">
			<ul id="mid-slider-pagination">
				<?php if (intval($tab1) > 0 ) { ?><li><a href="#"><?php echo str_replace("Whitepapers","", get_cat_name($tab1));// echo get_cat_name($tab1); ?></a></li><?php } ?>
				<?php if (intval($tab2) > 0 ) { ?><li><a href="#"><?php echo str_replace("Whitepapers","", get_cat_name($tab2)); ?></a></li><?php } ?>
				<?php if (intval($tab3) > 0 ) { ?><li><a href="#"><?php echo str_replace("Whitepapers","", get_cat_name($tab3));; ?></a></li><?php } ?>
				<?php if (intval($tab4) > 0 ) { ?><li><a href="#"><?php echo str_replace("Whitepapers","", get_cat_name($tab4)); ?></a></li><?php } ?>
				<?php if (intval($tab5) > 0 ) { ?><li><a href="#"><?php echo str_replace("Whitepapers","", get_cat_name($tab5)); ?></a></li><?php } ?>
			</ul>
			<a class="media_next" id="media_next" href="#"><?php _e('Next','advanced'); ?></a>
			<a class="media_prev" id="media_prev" href="#"><?php _e('Previous','advanced'); ?></a>
			<div class="clear"></div>
		</div><!-- /nav -->
		
		<div class="fea-slides-wrapper"> <!-- using this class just to generate a border -->
			<div class="fea-slides">					
					<?php if (intval($tab1) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab1
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; margin-bottom:10px" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'</span>';}?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 15px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>
					
					<?php if (intval($tab2) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab2
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; margin-bottom:10px" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'</span>';}?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 15px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>				
					<?php if (intval($tab3) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab3
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; margin-bottom:10px" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'</span>';}?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 15px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>
					<?php if (intval($tab4) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab4
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; margin-bottom:10px" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'</span>';}?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 15px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>
					<?php if (intval($tab5) > 0 ) { ?>
												<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 50, 
							  'cat' => $tab5
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 1 == 0) { echo ' last'; }?>" style="width:98%; margin-bottom:10px" >
									<?php /* 
									gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 	*/									
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									
									<?php // $SubTitle=get_post_meta(get_the_ID(), 'Sub Title', $single = true); 
                                    // if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';} ?>
                                    <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
                                    if ($PageByLine != null) { echo '<br /><span class="byline"> Provided by '.$PageByLine.'</span>';}?></h2>
									<p><?php echo get_the_excerpt(); ?></p>
									<p style="padding: 15px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>
                                    <!-- <hr style="color:#eee" /> -->
								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>                                        					
			</div><!-- .fea-slides -->
				
			<div class="clear"></div>

		</div><!-- .fea-slides-wrapper -->
	<div class="clear"></div>
	
</div><!-- #mid-slider -->
<?php
}
add_shortcode('box_ad', 'box_tab_2_shortcode');

function box_tab_3($tab1 = 0,$tab2 = 0,$tab3 = 0,$tab4 = 0,$tab5 = 0, $offset = 0, $ast = 0, $astc = 0){
$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}
?>
<div id="mid-slider">
		
		<div id="mid-slider-nav">
			<ul id="mid-slider-pagination">
				<?php if (intval($tab1) > 0 ) { ?><li><a href="#"><?php echo get_cat_name($tab1); ?></a></li><?php } ?>
				<?php if (intval($tab2) > 0 ) { ?><li><a href="#"><?php echo get_cat_name($tab2); ?></a></li><?php } ?>
				<?php if (intval($tab3) > 0 ) { ?><li><a href="#"><?php echo get_cat_name($tab3); ?></a></li><?php } ?>
				<?php if (intval($tab4) > 0 ) { ?><li><a href="#"><?php echo get_cat_name($tab4); ?></a></li><?php } ?>
				<?php if (intval($tab5) > 0 ) { ?><li><a href="#"><?php echo get_cat_name($tab5); ?></a></li><?php } ?>
			</ul>
			<a class="media_next" id="media_next" href="#"><?php _e('Next','advanced'); ?></a>
			<a class="media_prev" id="media_prev" href="#"><?php _e('Previous','advanced'); ?></a>
			<div class="clear"></div>
		</div><!-- /nav -->
		
		<div class="fea-slides-wrapper"> <!-- using this class just to generate a border -->
			<div class="fea-slides">					
					<?php if (intval($tab1) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
					  		  'offset'=> $offset,
					  		  'posts_per_page' => 4, 
							  'cat' => $tab1
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
																		if ( has_post_thumbnail() ) {
the_post_thumbnail('216 x 120', array('class' => 'tabbedimg'));
}
else {
gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 
}
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									</h2>
									
									<p><?php echo string_limit_words(get_the_excerpt(),9); ?>&hellip;</p>

								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>
					
					<?php if (intval($tab2) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
							  'offset'=> $offset,
							  'posts_per_page' => 4, 
							  'cat' => $tab2
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
																		if ( has_post_thumbnail() ) {
the_post_thumbnail('216 x 120', array('class' => 'tabbedimg'));
}
else {
gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 
}
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									</h2>
									
									<p><?php echo string_limit_words(get_the_excerpt(),9); ?>&hellip;</p>

								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>				
					<?php if (intval($tab3) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							  'post__not_in'=>$do_not_duplicate,
							  'offset'=> $offset,
							  'posts_per_page' => 4, 
							  'cat' => $tab3
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
																		if ( has_post_thumbnail() ) {
the_post_thumbnail('216 x 120', array('class' => 'tabbedimg'));
}
else {
gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 
									
}
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									</h2>
									
									<p><?php echo string_limit_words(get_the_excerpt(),9); ?>&hellip;</p>

								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>
					<?php if (intval($tab4) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							'post__not_in'=>$do_not_duplicate,
							  'offset'=> $offset,
							  'posts_per_page' => 4, 
							  'cat' => $tab4
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
									if ( has_post_thumbnail() ) {
the_post_thumbnail('216 x 120', array('class' => 'tabbedimg'));
}
else {
gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									)); 
}
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									</h2>
									
									<p><?php echo string_limit_words(get_the_excerpt(),9); ?>&hellip;</p>

								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>
					<?php if (intval($tab5) > 0 ) { ?>
						<div class="slide_item">
							<?php 
							$count = 1;
							$args = array(
							'post__not_in'=>$do_not_duplicate,
							  'offset'=> $offset,
							  'posts_per_page' => 4, 
							  'cat' => $tab5
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
									if ( has_post_thumbnail() ) {
the_post_thumbnail('216 x 120', array('class' => 'tabbedimg'));
}
else {
gab_media(array(
										'name' => 'an-midtabs', 
										'enable_video' => 'true', 
										'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
										'video_id' => 'midslide1', 
										'enable_thumb' => 'true', 
										'resize_type' => 'c', 
										'media_width' => '216', 
										'media_height' => '120', 
										'thumb_align' => 'tabbedimg', 
										'enable_default' => 'false'
									));
}										
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
									</h2>
									
									<p><?php echo string_limit_words(get_the_excerpt(),9); ?>&hellip;</p>

								</div><!-- .featured-media -->
								
							<?php $count++; endwhile; wp_reset_query(); ?>
							<div class="clear"></div>
						</div><!-- .slide-item -->
					<?php } ?>                                        					
			</div><!-- .fea-slides -->
				
			<div class="clear"></div>

		</div><!-- .fea-slides-wrapper -->
	<div class="clear"></div>
	
</div><!-- #mid-slider -->
<?php
}
add_shortcode('box_ad', 'box_tab_3_shortcode');




function box_search($qty = 10,$theorder = 'date', $showthumb = 1, $thecat = 6274, $tag = 0, $theboxtitle = '0', $ast = 0, $astc = 0){
$box_art_cat = 0 ? current_catID() : $thecat;

$aststr = '';
if($ast > 0){ $aststr = '?ast='.$ast;
 if($astc > 0){ $aststr = $aststr.'&astc='.$astc;}
}


//insert cache query
			if (strlen($_SERVER["QUERY_STRING"] )){ $usenocache = 1;}
			$box_qt = 'box_search_'.$qty.'_'.$theorder.'_'.$showthumb."_".$thecat."_".$box_tag."_".$theboxtitle."_".$ast."_".$astc;
			$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
			$local_box_cache = get_transient( $box_q );
			if (false === ($local_box_cache) or $usenocache == 1 ){

			// start code to cache
			ob_start( );
?>


<?php 
								$count = 1;
								if ( isset( $_GET['topic'] ) ) {$box_art_cat = intval($_GET['topic']);}
								if ( isset( $_GET['tg'] ) ) {$box_tag = intval($_GET['tg']);
								$term =  get_term_by('id', $box_tag , 'post_tag');
								
								
								
echo '<span style=" background-color:#fff; padding:7px 15px 2px 15px; border-top: #555 1px solid; border-right: #555 1px solid; border-left: #555 1px solid; font-size: 12px; border-radius:8px 8px 0 0;">'. $term->name . '</span>';
$url = $_SERVER["REQUEST_URI"];
echo '<a href="'.substr( $url, 0, strrpos( $url, "?")).'" style="float:right;background:url(/wp-content/themes/advanced-newspaper/images/close.gif) no-repeat right top;width:16px;height:16px;display:block;text-indent:-999em;margin-top:17px; margin-left:-15px; ">close</a>';
}	

echo '<div style="border: #333 1px solid; padding: 10px 15px; overflow-x: hidden; overflow-y: hidden; margin-bottom:10px;border-radius:0 8px 0 0;">';
							
								$args = array(
								  's' => $_REQUEST[ 'search' ],
								  'cat' => $box_art_cat,
								  'tag_id' => $box_tag,								  
								  'paged' => $paged,
								  'post__not_in'=>$do_not_duplicate
								 ); 
								
								$gab_query = new WP_Query();$gab_query->query($args); 
								while ($gab_query->have_posts()) : $gab_query->the_post();	
								?>
								
									<div class="featuredpost" style="border-bottom:none; padding-bottom: 1px;">

<h2 class="posttitle">	<a href="<?php the_permalink();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
 <?php $PageByLine=get_post_meta(get_the_ID(), 'Byline', $single = true);
									$my_date = the_date('', '', '</h2>', FALSE); 
                                    if ($PageByLine != null) { echo '<br /><span class="byline" style="line-height: 14px; letter-spacing:normal;"> Provided by '.$PageByLine.'<br>'.$my_date.'</span>';} else { echo '<br /><span class="byline">'.$my_date.'</span>';}?></h2>
										<?php if($showthumb == 1){ ?>
                                        <a href="<?php the_permalink();echo $psstr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" >
<?php
if ( has_post_thumbnail() ) {
the_post_thumbnail('130 x 100', array('class' => 'alignleft'));
}
else {
gab_media(array(
'name' => 'an-belowfea',
'enable_video' => 'false',
'catch_image' => 'true', //get_option('of_an_catch_img', 'false'),
'enable_thumb' => 'true',
'resize_type' => 'c',
'media_width' => 100, 
'media_height' => 130, 
'thumb_align' => 'alignleft',
'enable_default' => 'false'
));
}
?>		</a>								
									<?php } 
									?>
																	
											
											<?php 


											global $post; 
											//echo get_the_category_list();
											

											$SubTitle=get_post_meta($post->ID, 'Sub Title', $single = true); 
                                                if ($SubTitle != null) { echo '<h5>'.$SubTitle.'</h5>';}?>
                                            

<p><?php echo get_the_excerpt(); ?></p>
									

                                    <p style="padding: 5px 20px 5px 20px; border-bottom:solid 1px #aaa;">	 <a href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a></p>

										
									</div><!-- .featuredpost -->
								<?php $count++; endwhile; wp_reset_query(); ?>

<?php

echo '</div><div class="clear"></div>';
	
	
    $local_box_cache = ob_get_clean( );
echo $local_box_cache;
// end the code to cache

//end cache query 
	if( current_user_can( 'edit_post' ) or $usenocache == 1 ) {
//you cannot cache it
} else {
set_transient($box_q ,$local_box_cache, 60 * 15);
}
} else { 
echo $local_box_cache;
}

}


add_shortcode('box_search', 'article_box_search_shortcode');


?>