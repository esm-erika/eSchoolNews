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
		<a class="button radius" target="_blank" href="<?php the_permalink(); ?>">View Now</a>
	</div>

<?php endforeach; ?>

<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>


<? } else if ($WPURL != null) { 
	echo '<div class="text-center">';
	if ($WPcbt != null) { 

		echo'<a class="button radius medium" href="'.$WPURL.'" target="_blank">Submit and Download</a>';
	} else{
		echo'<a class="button radius medium" href="'.$WPURL.'">View Now</a>';
	}
	echo '</div>'; 
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

	$product_terms = wp_get_object_terms( $post->ID,  'sponsor', $args );

	if ( ! empty( $product_terms ) ) {
		if ( ! is_wp_error( $product_terms ) ) {
			echo '<ul class="small-block-grid-2 medium-block-grid-4">';
			foreach( $product_terms as $term ) { ?>



			<?php 
			$taxonomy = 'sponsor';
			$term_id = $term->term_id; 
			$image = get_field('sponsor_image', $taxonomy . '_' . $term_id);

			?>

			<li>

				<div class="responsive-container">
					<div class="dummy"></div>
					<div class="img-container">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					</div>
				</div>
			</li>



			<?php }
			echo '</ul>';

		}
	} ?>




</div>
</div>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
