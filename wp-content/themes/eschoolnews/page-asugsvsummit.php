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
	<div class="small-12 large-12 columns" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>

	<?php while ( have_posts() ) : the_post(); ?>
<?php  $astused = get_post_meta($id, '_wp_esmad_template', true);
$oldtemplate = get_post_meta($id, '_wp_post_template', true);



   ?>
<?php if($oldtemplate){ echo '<!-- '.$oldtemplate.' -->'; //using old template
	
//require_once( 'library/boxes.php' );	
include('single-coa.php');
	
	
	
	   } else { //not using old template ?>    
    



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
$box_qt = 'esm_c_pagebdy_a'.$ast."c".$astc.'p'.$post_id;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->';
?>

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php //comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</article>

<?php		echo '<!-- c '.date(DATE_RFC2822).' -->' ;
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

<?php } //end old template check ?>




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
$box_qt = 'esm_c_page_a'.$ast."c".$astc.'p'.$post_id;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->';
			//get_sidebar();
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

<!-- <section id="sponsors">
	<div class="row">
		<div class="small-12 columns">
			<p class="small-caps">Brought to you by:</p>

			<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
			</ul>
			
		</div>

	</div>
</section> -->

<!-- <section id="profiles">
	<div class="row">
		<div class="small-12 columns">
		<h4>Speaker Profiles</h4>
		
		<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-5">
			<li class="text-center">
				<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
				<h4>Speaker Name</h4>
				<a class="button radius small" href="#" data-reveal-id="myModal">Speaker Info</a>

				<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
					<div class="row">
						<div class="small-12 medium-3 columns">
							<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
						</div>
						<div class="small-12 medium-9 columns">
							<h2 id="modalTitle">Speaker Name</h2>
				  <p class="small-caps">@twitterhandle</p>
				  <div>Fusce ut arcu id nisi lobortis mollis sit amet quis magna. Nullam justo elit, luctus id congue nec, molestie a augue. Vivamus commodo posuere nunc eu euismod. Vestibulum sodales ut nisl mollis scelerisque. Nunc et metus vel turpis efficitur faucibus vitae a tortor. Nullam aliquam, urna vitae auctor bibendum, leo mi scelerisque arcu, vel egestas erat orci in mauris. Curabitur consequat viverra lectus a sodales. Aliquam eu vulputate erat, id rhoncus ante. Aliquam eu arcu enim. Morbi bibendum ultrices orci vel efficitur. Duis tortor justo, tristique sit amet pharetra sit amet, ullamcorper eu sapien. Praesent non lacus laoreet, porttitor nunc at, molestie magna.</div>
							
						</div>
					</div>
				  
				  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
				</div>
			</li>

			<li class="text-center">
				<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
				<h4>Speaker Name</h4>
				<a class="button radius small" href="#" data-reveal-id="myModal">Speaker Info</a>

				<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
					<div class="row">
						<div class="small-12 medium-3 columns">
							<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
						</div>
						<div class="small-12 medium-9 columns">
							<h2 id="modalTitle">Speaker Name</h2>
				  <p class="small-caps">@twitterhandle</p>
				  <div>Fusce ut arcu id nisi lobortis mollis sit amet quis magna. Nullam justo elit, luctus id congue nec, molestie a augue. Vivamus commodo posuere nunc eu euismod. Vestibulum sodales ut nisl mollis scelerisque. Nunc et metus vel turpis efficitur faucibus vitae a tortor. Nullam aliquam, urna vitae auctor bibendum, leo mi scelerisque arcu, vel egestas erat orci in mauris. Curabitur consequat viverra lectus a sodales. Aliquam eu vulputate erat, id rhoncus ante. Aliquam eu arcu enim. Morbi bibendum ultrices orci vel efficitur. Duis tortor justo, tristique sit amet pharetra sit amet, ullamcorper eu sapien. Praesent non lacus laoreet, porttitor nunc at, molestie magna.</div>
							
						</div>
					</div>
				  
				  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
				</div>
			</li>

			<li class="text-center">
				<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
				<h4>Speaker Name</h4>
				<a class="button radius small" href="#" data-reveal-id="myModal">Speaker Info</a>

				<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
					<div class="row">
						<div class="small-12 medium-3 columns">
							<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
						</div>
						<div class="small-12 medium-9 columns">
							<h2 id="modalTitle">Speaker Name</h2>
				  <p class="small-caps">@twitterhandle</p>
				  <div>Fusce ut arcu id nisi lobortis mollis sit amet quis magna. Nullam justo elit, luctus id congue nec, molestie a augue. Vivamus commodo posuere nunc eu euismod. Vestibulum sodales ut nisl mollis scelerisque. Nunc et metus vel turpis efficitur faucibus vitae a tortor. Nullam aliquam, urna vitae auctor bibendum, leo mi scelerisque arcu, vel egestas erat orci in mauris. Curabitur consequat viverra lectus a sodales. Aliquam eu vulputate erat, id rhoncus ante. Aliquam eu arcu enim. Morbi bibendum ultrices orci vel efficitur. Duis tortor justo, tristique sit amet pharetra sit amet, ullamcorper eu sapien. Praesent non lacus laoreet, porttitor nunc at, molestie magna.</div>
							
						</div>
					</div>
				  
				  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
				</div>
			</li>

			<li class="text-center">
				<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
				<h4>Speaker Name</h4>
				<a class="button radius small" href="#" data-reveal-id="myModal">Speaker Info</a>

				<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
					<div class="row">
						<div class="small-12 medium-3 columns">
							<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
						</div>
						<div class="small-12 medium-9 columns">
							<h2 id="modalTitle">Speaker Name</h2>
				  <p class="small-caps">@twitterhandle</p>
				  <div>Fusce ut arcu id nisi lobortis mollis sit amet quis magna. Nullam justo elit, luctus id congue nec, molestie a augue. Vivamus commodo posuere nunc eu euismod. Vestibulum sodales ut nisl mollis scelerisque. Nunc et metus vel turpis efficitur faucibus vitae a tortor. Nullam aliquam, urna vitae auctor bibendum, leo mi scelerisque arcu, vel egestas erat orci in mauris. Curabitur consequat viverra lectus a sodales. Aliquam eu vulputate erat, id rhoncus ante. Aliquam eu arcu enim. Morbi bibendum ultrices orci vel efficitur. Duis tortor justo, tristique sit amet pharetra sit amet, ullamcorper eu sapien. Praesent non lacus laoreet, porttitor nunc at, molestie magna.</div>
							
						</div>
					</div>
				  
				  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
				</div>
			</li>

			<li class="text-center">
				<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
				<h4>Speaker Name</h4>
				<a class="button radius small" href="#" data-reveal-id="myModal">Speaker Info</a>

				<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
					<div class="row">
						<div class="small-12 medium-3 columns">
							<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/04/person.png">
						</div>
						<div class="small-12 medium-9 columns">
							<h2 id="modalTitle">Speaker Name</h2>
				  <p class="small-caps">@twitterhandle</p>
				  <div>Fusce ut arcu id nisi lobortis mollis sit amet quis magna. Nullam justo elit, luctus id congue nec, molestie a augue. Vivamus commodo posuere nunc eu euismod. Vestibulum sodales ut nisl mollis scelerisque. Nunc et metus vel turpis efficitur faucibus vitae a tortor. Nullam aliquam, urna vitae auctor bibendum, leo mi scelerisque arcu, vel egestas erat orci in mauris. Curabitur consequat viverra lectus a sodales. Aliquam eu vulputate erat, id rhoncus ante. Aliquam eu arcu enim. Morbi bibendum ultrices orci vel efficitur. Duis tortor justo, tristique sit amet pharetra sit amet, ullamcorper eu sapien. Praesent non lacus laoreet, porttitor nunc at, molestie magna.</div>
							
						</div>
					</div>
				  
				  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
				</div>
			</li>

		</ul>
		
		</div>
	</div>
</section> -->

<!-- <section id="archive">
	<div class="row">
		<div class="small-12 columns">
			<h4>Archive of Videos</h4>

			<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>				
			</ul>
		</div>
	</div>
</section>
 -->


<?php get_footer(); ?>
