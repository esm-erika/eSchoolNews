<?php
/**
* The template for displaying all single posts and attachments
*
* @package WordPress
* @subpackage FoundationPress
* @since FoundationPress 1.0.0
*/

get_header(); 
$WPURL=get_post_meta($post->ID, 'WP URL', $single = true).'?'.$_SERVER['QUERY_STRING'];
$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);
$WPcbt=get_post_meta($post->ID, 'WP Custom Button', $single = true);
?>

<div class="row">
	<div class="small-12 medium-8 columns" role="main">


		<?php if ( have_posts() ) : ?>
	<?php while ( have_posts() ) : the_post(); ?>    
	<!-- do stuff ... -->
	


		<header class="row collapse">

			<?php 

			if (has_post_thumbnail()) { ?>

			<div class="small-12 medium-3 columns">

				<div class="hide-for-small-only">
					<?php the_post_thumbnail('medium-portrait'); ?>
				</div>

			</div>

			<div class="small-12 medium-9 columns">
				<div class="row">
					<div class="small-12 columns">



						<?php }else{ ?>

						<div class="small-12 columns">
							<div class="row collapse">
								<div class="small-12 columns">

									<?php } ?>


									<h2><?php the_title(); ?></h2>
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
	
$pdfselects = get_field('pdf_select');

if( $pdfselects ) { 
	foreach( $pdfselects as $pdf): ?>
	<div class="text-center">
		<a class="button radius" target="_blank" href="<?php echo get_permalink( $pdf->ID ); ?>">View Now</a>
	</div>
<?php 
	endforeach; 
 ?>


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



	<?php } //end showpagecontent check?>



</div>
</header>


<div class="row">
	<div class="small-12 columns">
		
<?php the_content(); ?>

<div class="row sponsored">
	<div class="small-12 columns">

		<small><strong>Sponsored by:</strong></small><br>


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

</div>
</div>

<?php endwhile; ?>
<?php endif; ?>


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