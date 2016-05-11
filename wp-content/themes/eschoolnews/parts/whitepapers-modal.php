<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php
		$WPURL=get_post_meta($post->ID, 'WP URL', $single = true).'?'.$_SERVER['QUERY_STRING'];
		$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);
		$WPcbt=get_post_meta($post->ID, 'WP Custom Button', $single = true);
?>


<div id="whitepaper-<?php the_ID(); ?>" class="reveal-modal" data-reveal aria-labelledby="whitepaper-<?php the_ID(); ?>" aria-hidden="true" role="dialog">
  <div class="row">

  	<?php 

							if (has_post_thumbnail()) { ?>

							<div class="medium-4 columns">

							<?php the_post_thumbnail('medium-portrait'); ?> 
							
							</div>
                    		<div class="medium-8 columns">

						    <?php }else{ ?>

						    <div class="medium-12 columns">

						    <?php } ?>

						    <header>
                    		 <h2 id="whitepaper-<?php the_ID(); ?>"><?php the_title(); ?></h2>
                    		<div class="posted-on"><?php the_time('F j, Y'); ?></div>
                    		<hr/>

                    		
									

								
                    		

 
 

  

		
<?php global $page; ?>

<?php if(esm_is_user_logged_in()){ 	
	//if they are logged in then grab use information
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

				//	the_content(); no need it is above.


if (($WPForm != null) and ($WPForm > 0)) { // has form??

	gravity_form( $WPForm , false, false, false, $WPautofill, true);

	
} else {
	
	$posts = get_field('pdf_select');

	if( $posts ) { ?>

	    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
	        <?php setup_postdata($post); ?>

    <div class="text-center">
		<a class="button radius" target="_blank" href="<?php the_permalink(); ?>">Read More</a>
	</div>

		<?php endforeach; ?>
	   
	    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
					

	<? } else if ($WPURL != null) { 
			echo '<p>';
			 if ($WPcbt != null) { 
			
					echo'<a href="'.$WPURL.'" target="_blank"><img class="alignright" src="'.$WPcbt.'" alt="Next" border="0" /></a>';
					} else{
					echo'<a class="button radius small" href="'.$WPURL.'">View Now</a>';
			 }
			echo '</p>'; 
	}
}
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
</div>
                                    


<?php			}//end showpagecontent check
?>

                    	</header>
  


						<?php // endwhile; else : endif; ?>

						  <?php the_content(); ?>

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

								<?php endif; ?>
				
  </div>
  
  </div>
  
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>