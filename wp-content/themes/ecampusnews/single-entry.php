<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */
if ( in_category( 'Leading the Digital Leap' )) { // can be removed with 4.4 update -- thank you ahead of public release documentation.
	include('single-post-leading-the-digital-leap.php');
} else {
get_header();
 ?>

<div class="row top">
	<div class="small-12 medium-8 columns" role="main">

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
<?php 
if(!$oldtemplate == 'default' and strlen($oldtemplate > 4)){ echo '<!-- old template'.$oldtemplate.' -->'; //using old template
	
//require_once( 'library/boxes.php' );	
include('single-coa.php');
	
	
	
	   } else { ?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<?php if(get_field('symposium_subhead')){
        			echo '<h3>';
        			the_field('symposium_subhead');
        			echo '</h3>'; 
        		} ?>
			<!-- single note -->

			<?php if( get_field('remove_author')) { 

				echo '';

			} else { ?>

				<div class="small-caps">
					
					<?php  if( get_field('Alt Author Read More Name')) {

						echo 'By ';

						the_field('Alt Author Read More Name');

					}elseif(get_field('Byline')){

						the_field('Byline');

					} else {
						echo 'By ';

						the_author();

					} ?>

				</div>

			<?php } ?>


							<div class="posted-on"><?php the_time('F jS, Y') ?></div>		

			
			<?php get_template_part('parts/social'); ?>
			 </header>

			 <hr/>




			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content">

			<?php 

			//$post_id < '161335' <--- Vince's Code

			$post_date = strtotime( the_date( 'Y-m-d', '', '', false ) );
			$cutoff_date = strtotime( '2016-02-24' );

			if( get_field('remove_featured_image') || $post_date < $cutoff_date ) {
    
    			echo '';
			 
			 } elseif ( has_post_thumbnail()) {

    				echo '<div class="row">';
    				echo '<div class="small-12 medium-12 columns">';
    				the_post_thumbnail('large-landscape');
    				echo '</div></div>';
    		} else {

    		} ?>

    			
    		<?php 
			
			if (esm_is_user_logged_in()){
				echo '<!-- lgi -->';
				$showpagecontent = 1; 
			} else { 
				echo '<!-- nli -->';
				$reg_requirement=get_post_meta($post->ID, 'registration_requirement_for_content', $single = true); /*	0 : Default,  1 : Required,  2 : Not Required */
				echo '<!-- reg_requirement = '.$reg_requirement. ' -->';
				
				$astcset = $_GET['astc'];
				echo '<!-- astcset='.$astcset.' -->';
				if(filter_var($astcset, FILTER_VALIDATE_INT)){
					if($astcset > 1){ $astpagecontent = 0; }
				}
				
				echo '<!-- astpagecontent='.$astpagecontent.' -->';
				
				if($reg_requirement == 1){
					$showpagecontent = 0;
				} else if($astpagecontent === 0){
					$showpagecontent = 0; 
				} else  {
					$showpagecontent = 1;
				}
			}

				if($showpagecontent == 0){
				echo string_limit_words(get_the_excerpt(), 55).'...</br>';
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
</div> 

<?php } else { ?>

<?php // the_content(); 

$content = apply_filters( 'the_content', get_the_content() );
$content = explode("</p>", $content);
$count = count($content);
$placement = round($count/2);
$paragraphAfter[$placement] = ''; // Can insert text if wanted.

for ($i = 0; $i < $count; $i++ ) {
    if ( array_key_exists($i, $paragraphAfter) ) {
        echo $paragraphAfter[$i];
		get_template_part( 'parts/ads/lb-article-1' );		
    }
    echo $content[$i] . "</p>";
}


custom_wp_link_pages();

			    ?>
					 
					 
					 
				<?php } ?>
			
            </div>

			<?php get_template_part('parts/social'); ?>

			<?php 

			$contributor_bio = get_field('contributor_bio');

			 if( get_field('contributor_name') || get_field('Byline') && empty($contributor_bio)) {


			} else {

				get_template_part('parts/authors'); 
			}

			?>
			

				

				<?php if( ! has_tag()){
				 echo '<hr/>';
				} ?>


				<?php if( has_tag()) { ?>
				<br/>
				<footer class="panel related-tags">
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
$box_qt = 'esm_c_cata_a'.$ast."c".$astc.'p'.$post_id;
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
<?php get_footer(); }?>