<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>



<div class="row">
	<div class="small-12 columns" role="main">


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

	
} else { ?>

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<h3><?php the_title(); ?></h3>
		<small>Date Published: <strong><?php the_date(); ?></strong></small>

		<?php endwhile;
				endif; 
		?>

		

		<hr>


		<?php 

		$file = get_field('download_file');
		$pdfurl = $file['url'];

		$content = '[pdf-embedder toolbar="top" toolbarfixed="on" url="' . $pdfurl . '"]';

		//var_dump( $content);


		if( $file ) { 

		echo do_shortcode( $content );


		 } ?>

		 <?php } ?>

	</div>


		



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

</div>
<?php get_footer(); ?>