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
								
				get_template_part('parts/flags');
				
				?>

	<?php do_action( 'foundationpress_before_content' ); ?>

	<?php while ( have_posts() ) : the_post(); 

	setPostViews(get_the_ID()); ?>

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
							<div class="posted-on">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div>		

			
			<?php get_template_part('parts/social'); ?>
			 </header>

			 <hr/>


			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content">

	
			<?php if( get_field('remove_featured_image') ) :
    
    			echo '';
			 
			 elseif ( has_post_thumbnail()) :

    				echo '<div class="row">';
    				echo '<div class="column">';
    				the_post_thumbnail( '', array('class' => 'th') );
    				echo '</div></div>';

    			
    		endif;

			if (esm_is_user_logged_in()){
				$showpagecontent = 1;
			} else { 
				$reg_requirement=get_post_meta($post->ID, 'registration_requirement_for_content', $single = true); /*	0 : Default,  1 : Required,  2 : Not Required */
				if($reg_requirement == 1){
					$showpagecontent = 0;
				}
			}

				if($showpagecontent == 0){
				the_excerpt(); echo '...'
			?>

<div style="border:#CCCCCC solid 1px; padding:10px;">
<form action="<?php echo get_option('home'); ?>/wp-login.php?wpe-login=esminc" method="post">
<p><strong>Free registration required to view this resource.</strong><br />
<br />
<a href="<?php echo get_option('home'); ?>/registration/?action=register&redirect_to=<?php echo urlencode(get_permalink()); ?><?php if ( defined($_GET['astc'])){ echo '&astc='.$_GET['astc']; }?><?php if ( defined($_GET['ast'])){ echo '&ast='.$_GET['ast']; }?>" style="text-decoration:underline;"><strong>Register now.</strong></a>
<br />
<br />
Already a member? Log in
<div>Username: <input type="text" name="log" id="log" value="" /></div>
<div>Password:&nbsp <input name="pwd" id="pwd" type="password" value="" /></div>
<input type="submit" name="submit" value="Login" class="button">
<input name="rememberme" id="rememberme" type="hidden" checked="checked" value="forever">
<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
<br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword&redirect_to=<?php echo urlencode(get_permalink()); ?>">Lost Password?</a>

</form>	
</div> <?php



					
				} else {
					 the_content(); 
					  wp_link_pages(array(
							'before' => '<p>' . __('Pages:'),
							'after' => '</p>',
							'next_or_number' => 'next_and_number', # activate parameter overloading
							'nextpagelink' => __('Next'),
							'previouspagelink' => __('Previous'),
							'pagelink' => '%',
							'echo' => 1 )
						);
					 
					 
					 
				}
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
										echo '<li class="email left"><a href="mailto:' . esc_url($email) . '"><i class="fi-mail"></i></a></li>';
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


<?php } ?>

	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>

	</div>
	
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>