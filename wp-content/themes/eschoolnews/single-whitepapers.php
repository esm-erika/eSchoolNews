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


						    <div class="medium-12 columns">

						 

						    		<?php get_template_part('parts/flags'); ?>

  
  <h1 id="whitepaper-<?php the_ID(); ?>"><?php the_title(); ?></h1>

  						<?php 

							if (has_post_thumbnail()) { ?>


							<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?> 

						    <img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">

						    <?php } ?>

						    <hr/>
 
  <?php the_content(); ?>

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


if ($WPForm != null) {

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
if ($WPForm != null) {

			if ( isset($_GET['ps']) ) {
				$esmpassvals = explode ( "-" , $_GET['ps']);	
					if (isset($esmpassvals[0]) && is_numeric($esmpassvals[0])){
						$wpuidSP=$esmpassvals[0];} 
					if (isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 15 || ($pscheck==1) && isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 18 ){
						$sfuidSP=$esmpassvals[1];}
					if (isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || ($pscheck==1) && isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
						$PersonContactIdPS=$esmpassvals[2];} 
			}
			if (isset($_COOKIE['esmpass'])) {
				$esmpasscookvals = explode ( "-" , $_COOKIE['esmpass']);
				if (isset($esmpasscookvals[1]) && is_numeric($esmpasscookvals[1])){
					$wpuid=$esmpasscookvals[1];
				} 
				if (isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 15 || isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 18 ){
				$sfuid=$esmpasscookvals[2];
				} 
				if (isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 15 || isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 18 ){
					$PersonContactId=$esmpasscookvals[3];
				} 
			}
		$WPautofill = array(
		wpuidSP => $wpuidSP,
		sfuidSP => $sfuidSP,
		PersonContactIdPS => $PersonContactIdPS,
		wpuid => $wpuid,
		sfuid => $sfuid,
		PersonContactId => $PersonContactId,	
		esmpassvalue => $_COOKIE['esmpass'],	
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
</div>
                                    


<?php			}//end showpagecontent check
?>



						<?php // endwhile; else : endif; ?>

<?php do_action( 'foundationpress_after_content' ); ?>
</div>
</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>