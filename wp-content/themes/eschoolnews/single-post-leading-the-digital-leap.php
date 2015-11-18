<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

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
echo '<iframe src="'.$pagedln.'" style="width: 100%; height: 2200px;"></iframe>'; 

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
			

				<div class="author-bio row">
					<div class="hide-for-small-only large-2 columns author-avatar small-text-center">
						<?php echo get_avatar($post->post_author, 50); ?>
					</div>
					<div class="small-12 large-10 columns author-bio-text">
						<h5 class="left small-text-center"><strong>About the Author:</strong> <?php echo the_author_posts_link(); ?></h5>

							<ul class="icons right">
								<?php 
									$email = get_the_author_meta( 'user_email' );
									if ( $email && $email != '' ) {
										echo '<li class="email left"><a href="mailto:' . $email . '"><i class="fi-mail"></i></a></li>';
									}

									$rss_url = get_the_author_meta( 'rss_url' );
									if ( $rss_url && $rss_url != '' ) {
										echo '<li class="rss left"><a href="' . esc_url($rss_url) . '"><i class="fi-rss"></i></a></li>';
									}
													
									$google_profile = get_the_author_meta( 'google_profile' );
									if ( $google_profile && $google_profile != '' ) {
										echo '<li class="google left"><a href="' . esc_url($google_profile) . '" rel="author"><i class="fi-social-google-plus medium"></i></a></li>';
									}
													
									$twitter_profile = get_the_author_meta( 'twitter_profile' );
									if ( $twitter_profile && $twitter_profile != '' ) {
										echo '<li class="twitter left"><a href="' . esc_url($twitter_profile) . '"><i class="fi-social-twitter medium"></i></a></li>';
									}
													
									$facebook_profile = get_the_author_meta( 'facebook_profile' );
									if ( $facebook_profile && $facebook_profile != '' ) {
										echo '<li class="facebook left"><a href="' . esc_url($facebook_profile) . '"><i class="fi-social-facebook medium"></i></a></li>';
									}
													
									$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
									if ( $linkedin_profile && $linkedin_profile != '' ) {
									       echo '<li class="linkedin left"><a href="' . esc_url($linkedin_profile) . '"><i class="fi-social-linkedin medium"></i></a></li>';
									}
								?>
							</ul>

						<p><?php echo get_the_author_meta('description'); ?></p>
					</div>
				</div>

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
	<?php get_sidebar('digital-leap'); ?>
</div>
<?php get_footer(); ?>