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
	<div class="small-12 medium-8 columns" role="main">

		<?php get_template_part('parts/flags'); ?>

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<?php if ( has_term( 'upcoming-webinars', 'status-webinars' ) ) { ?>

				<h6><i class="fi-calendar"></i> <?php 
				$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
				if($showdate){ echo $showdate -> format('F d, Y');} ?></h6>
				<h6><i class="fi-clock"></i> <?php the_field('event_time'); ?></h6>

				<?php } ?>

				<?php if ( has_term( 'archived-webinars', 'status-webinars' ) ) { ?>

				<div class="posted-on"><i class="fi-calendar"></i> <strong>Posted on:</strong> <?php 
				$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
				if($showdate){ echo $showdate -> format('F d, Y');} ?></div>

				<?php } ?>

				<?php get_template_part('parts/social'); ?>
			</header>

			

			<hr/>

			

			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="row entry-content">

				<?php 

				echo '<h5 class="columns">About Event</h5>';

				if ( has_post_thumbnail() ) {

					echo '<div class="medium-4 columns">';
					the_post_thumbnail('medium-landscape'); 
					echo '</div>';

					echo '<div class="medium-8 columns">';


				} else {

					echo '<div class="medium-12 columns">';

				}
					

					if (get_field('youtube_embed')) {
						echo '<div class="videoWrapper">';
						echo '<iframe width="560" height="315" src="https://www.youtube.com/embed/';
						the_field('youtube_embed');
						echo '" frameborder="0" allowfullscreen></iframe>';
						echo '</div>';
					}
					
					if (get_field('event_information') or ( have_rows('speakers')) ) {
					the_field('event_information');
					} else {
						the_content();
					}

					if (has_term( 'upcoming-webinars', 'status-webinars' )) {

						if (get_field('registration_link')) {

							echo '<a class="button small radius" href="';

							the_field('registration_link');

							echo '" target="new">Register Now</a>';
						}
					} else {

						echo '';

					}
				
					echo '</div>';

				 ?>

			</div>

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

<?php get_template_part('parts/social'); ?>

<?php do_action( 'foundationpress_post_before_comments' ); ?>
<?php //comments_template(); ?>
<?php do_action( 'foundationpress_post_after_comments' ); ?>
</article>
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
$box_qt = 'esm_c_swnr_a'.$ast."c".$astc.'p'.$post_id;
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