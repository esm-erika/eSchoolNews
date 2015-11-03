<?php
/*
Template Name:  page reg options
 * The template for displaying all old single posts in the new theme
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row top">
	<div class="small-12 large-8 columns" role="main">

				<?php if( is_singular( array('ercs','whitepapers','webinars','special-reports') )) {?>
				
				<?php $post_type = get_post_type_object( get_post_type($post) );
				
				echo '<span class="flag content">';
				echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
				echo $post_type->labels->singular_name; 
				echo '</a></span>'; ?>
				
				<?php }?>

	<?php do_action( 'foundationpress_before_content' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
<?php  $astused = get_post_meta($id, '_wp_esmad_template', true);
$oldtemplate = get_post_meta($id, '_wp_post_template', true);



   ?>
<?php if($oldtemplate){ echo '<!-- '.$oldtemplate.' -->'; //using old template
	
//require_once( 'library/boxes.php' );	
include('single-coa.php');
	
	
	
	   } else { ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="small-caps">By <?php the_author(); ?></div>
							<small>Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></small>		

			
			<?php get_template_part('parts/social'); ?>
			 </header>

			 <hr/>


			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content">

			<?php if ( has_post_thumbnail() ) : ?>
				<div class="row">
					<div class="column">
						<?php the_post_thumbnail( '', array('class' => 'th') ); ?>
					</div>
				</div>
			<?php endif; ?>

			<?php the_content(); ?>
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


<?php } ?>

	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>