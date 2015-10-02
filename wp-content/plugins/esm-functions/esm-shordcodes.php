<<<<<<< HEAD
<?php
/**
 * @package eSchool Media Theme Shortcodes
 * @author Vince Carlson
 * @version 0.1
 */ 
/*
Plugin Name: eSchool Media Theme Shortcodes
Plugin URI: http://www.eschoolmedia.com/#
Description: This plugin adds shortcodes to all pages of the site that are in wordpress.
Author: Vince Carlson
Version: 0.1
Author URI: http://www.eschoolmedia.com
*/
function box_tab_3($tab1 = 0,$tab2 = 0,$tab3 = 0,$tab4 = 0,$tab5 = 0){ ?>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab1
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab2
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab3
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab4
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab5
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
=======
<?php
/**
 * @package eSchool Media Theme Shortcodes
 * @author Vince Carlson
 * @version 0.1
 */ 
/*
Plugin Name: eSchool Media Theme Shortcodes
Plugin URI: http://www.eschoolmedia.com/#
Description: This plugin adds shortcodes to all pages of the site that are in wordpress.
Author: Vince Carlson
Version: 0.1
Author URI: http://www.eschoolmedia.com
*/
function box_tab_3($tab1 = 0,$tab2 = 0,$tab3 = 0,$tab4 = 0,$tab5 = 0){ ?>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab1
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab2
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab3
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab4
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
							  /* 'post__not_in'=>$do_not_duplicate, */
							  'posts_per_page' => 4, 
							  'cat' => $tab5
							);				
							$gab_query = new WP_Query();$gab_query->query($args); 
							while ($gab_query->have_posts()) : $gab_query->the_post();						
							$do_not_duplicate[] = $post->ID;
							?>

								<div class="featured-media<?php if($count% 4 == 0) { echo ' last'; }?>">
									<?php 
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
									?>
									
									<h2 class="posttitle">
										<a href="<?php the_permalink(); if($astused > 1){echo '?ast='.$astused; if($astc > 0){ echo '&astc='.$astc;} } ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" ><?php the_title(); ?></a>
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
>>>>>>> origin/master
add_shortcode('box_ad', 'box_tab_3_shortcode');?>