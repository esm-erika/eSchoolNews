<?php
/**
* The template for displaying all single posts and attachments
*
* @package WordPress
* @subpackage FoundationPress
* @since FoundationPress 1.0.0
*/

get_header(); ?>

<div class="row">
	<div class="small-12 medium-8 columns" role="main">

		<?php do_action( 'foundationpress_before_content' ); ?>

		<div class="row">

			<header class="row">

		<?php 

		if ( has_post_thumbnail() ) { ?>
		
		<div class="small-12 medium-4 columns">
			<?php the_post_thumbnail('medium-portrait'); ?>
		</div>
		
		<div class="small-12 medium-8 columns">

		<?php } else { ?>

		<div class="small-12 medium-12 columns">

		<?php } ?>

	


		<?php get_template_part('parts/flags'); ?>

		<h1 id="whitepaper-<?php the_ID(); ?>"><?php the_title(); ?></h1>
		
		<div class="posted-on">Posted on <?php the_time('F j, Y'); ?></div>

		</div>
	</div>

		<hr/>

		<?php 

								$taxonomy = 'sponsor';
								$terms = get_the_terms( $post->ID, $taxonomy);
								$term_id = $terms[0]->term_id;

								$image = get_field('sponsor_image', $taxonomy . '_' . $term_id);
								
								if( !empty($image) ): ?>

									
										<div class="row sponsored">
											<div class="small-12 medium-6 columns">

											<small>Sponsored by:</small><br>

											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

											</div>
										</div>
									<br/>
									

								<?php endif; ?>

		<div class="row">

		<div class="medium-12 columns">


		<?php 
		
									global $esmuser;

									$WPautofill = array(
										wpuidSP => $esmuser[wpuid],
										sfuidSP => $esmuser[sfuidSP],
										PersonContactIdPS => $esmuser[PersonContactIdPS],
										wpuid => $esmuser[wpuid],
										sfuid => $esmuser[sfuid],
										PersonContactId => $esmuser[PersonContactId],	
										esmpassvalue => $esmuser[esmpassvalue],	
										astc => $astc			
										); 
		
		
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); 
								//
				the_content();
								//
							} // end while
						} // end if
						?>			    




						<?php 

						$WPLength=get_post_meta($post->ID, 'WP Length', $single = true);
						$WPType=get_post_meta($post->ID, 'WP Type', $single = true);
						$WPSize=get_post_meta($post->ID, 'WP Size', $single = true);
						$WPURL=get_post_meta($post->ID, 'WP URL', $single = true).'?'.$_SERVER['QUERY_STRING'];
						$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);
						$WPLogo=get_post_meta($post->ID, 'WP Logo', $single = true);
						$WPcpl=get_post_meta($post->ID, 'WP Custom Page Layout', $single = true);
						$WPctl=get_post_meta($post->ID, 'WP Custom Title Layout', $single = true);
						$WPcbt=get_post_meta($post->ID, 'WP Custom Button', $single = true);
						$WPfooter=get_post_meta($post->ID, 'WP Footer', $single = true);
						?>


						<?php global $page; ?>

						<?php if(esm_is_user_logged_in()){ 	


				//	the_content(); no need it is above.


							if (($WPForm != null) and ($WPForm > 0)) {

								gravity_form( $WPForm , false, false, false, $WPautofill, true);  


							}else if ($WPURL != null) { 
								echo '<p>';
								if ($WPcbt != null) { 

									echo'<a href="'.$WPURL.'" target="_blank"><img class="alignright" src="'.$WPcbt.'" alt="Next" border="0" /></a>';
								} else{
									echo'<a class="button radius small" href="'.$WPURL.'">Download White Paper</a>';
								}
								echo '</p>'; 


								?>


								<?php 
							} else {
								?>


								<?php the_content(); ?>

								<?php
								if (($WPForm != null) and ($WPForm > 0)) {

									global $esmuser;

									$WPautofill = array(
										wpuidSP => $esmuser[wpuid],
										sfuidSP => $esmuser[sfuidSP],
										PersonContactIdPS => $esmuser[PersonContactIdPS],
										wpuid => $esmuser[wpuid],
										sfuid => $esmuser[sfuid],
										PersonContactId => $esmuser[PersonContactId],	
										esmpassvalue => $esmuser[esmpassvalue],	
										astc => $astc			
										); 


									gravity_form( $WPForm , false, false, false, $WPautofill, true);  

								}else if ($WPURL != null) { 
									echo '<p>';
									if ($WPcbt != null) { 
										echo'<a href="'.$WPURL.'" target="_blank"><img class="alignright" src="'.$WPcbt.'" alt="Next" border="0" /></a>';
									} else{
										echo'<a class="button radius small" href="'.$WPURL.'">Download White Paper</a>';	 

									}
									echo '</p>'; 
								}

								?>




								<?php }



								if ($WPLogo != null) { echo '<img src="'.$WPLogo.'" border="0" style="border:none" />';}

								if ($WPfooter != null) { echo $WPfooter;} 

								?>



								<?php } else { ?>



								<div style="border:#CCCCCC solid 1px; padding:10px;">
									<form action="<?php echo get_option('home'); ?>/wp-login.php?wpe-login=esminc" method="post">
										<p><strong>Free registration required to view this resource.</strong><br />
											<br />
											Register today and receive free access to all our news and resources and the ability to customize your news by topic with My eSchool News.<br /><br />
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




<?php			}//end showpagecontent check
?>



<?php // endwhile; else : endif; ?>

	<?php do_action( 'foundationpress_after_content' ); ?>

</div>

</div>
</div>

<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc][c ...category][p  ...post id(if sidebar needs to be unique][t ...(tagid)if a tag page][a ... Author ID (if an author page)]
//$cat_name = get_category(get_query_var('cat'))->term_id;

// $queried_object = get_queried_object();
// var_dump( $queried_object );
//$tag_id = get_query_var('term_taxonomy_id');
$post_id = get_the_ID(); 
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_swp_a'.$ast."c".$astc.'p'.$post_id;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->';
			get_sidebar();
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
</div>
<?php get_footer(); ?>