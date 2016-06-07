<?php
/**
* The template for displaying all single posts and attachments
*
* @package WordPress
* @subpackage FoundationPress
* @since FoundationPress 1.0.0
*/

get_header(); ?>




<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique]t[if a tag page]
//$cat_name = get_category(get_query_var('cat'))->term_id;

global $astc, $astused;
$post_id = get_the_ID(); 
$box_qt = 'esm_c_sevntbody_a'.$astused."c".$astc.'c'.'p'.$post_id;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c a'.$astused."c".$astc.'c'.'p'.$post_id.'-->';
?>


<?php if(has_post_thumbnail()) { ?>

	<div class="row">
		<div class="small-12 columns">
			<?php the_post_thumbnail( 'full', array( 'alt' => get_the_title()) ); ?>
		</div>
	</div>

<?php } ?>


<div class="row top">
	<div class="small-12 large-8 columns" role="main">

		<?php 
		
		//get_template_part('parts/flags');

		$taxonomy = 'conferences'; 

		$terms = get_the_terms($post->id, 'conferences');


		//echo $term[0]->name;

		foreach ( $terms as $term ) {

			$term_link = get_term_link( $term->term_id, $taxonomy);

			echo '<span class="flag content">';
			echo '<a href="' . esc_url($term_link) . '">' . $term->name . '</a>';
			echo '</span>';

		}

		// echo '<pre>';
		// var_dump($term_link);
		// echo '</pre>';

		?>


		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<h5>
					<i class="fi-calendar"></i> 
					<?php 
					$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
					$enddate = DateTime::createFromFormat('Ymd', get_field('event_end_date'));
					
					echo $showdate -> format('F d, Y');

					if($enddate){ 
						echo ' - ';
						echo $enddate -> format('F d, Y');
					} ?>
				</h5>

				<?php if(get_field('event_time')) { ?>
					<h5><i class="fi-clock"></i> <?php the_field('event_time'); ?></h5>
				<?php } ?>

				<?php get_template_part('parts/social'); ?>
			</header>

			

			<hr/>

			
			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="row entry-content">

				<?php 

				echo '<div class="large-12 columns">';

				echo '<h5>About Event</h5>';

				the_content();

				if (get_field('registration_link')) {

					echo '<a class="button small radius" href="';

					the_field('registration_link');

					echo '" target="new">Register Now</a>';
				}
				
				echo '</div>';

				?>

			</div>


			<div class="row">
				<div class="small-12 columns">

					<?php

					$terms = get_the_terms($post->id, 'conferences');
					$term_slug = $terms[0]->slug;

					$args = array(

					'post_type' => 'post',
				    'tax_query' => array(
				    	array(
				    		'taxonomy' => 'conferences',
							'field'    => 'slug',
							'terms'    => $term_slug,
				      		),
				    	),
					);
			
					$article_query = new WP_Query($args); 

					// echo '<pre>';
					// var_dump($term_slug);
					// echo '</pre>';

					?>

					<?php if ( $article_query->have_posts() ) : ?>

					<div class="panel">

					<h4><?php the_title(); ?> Related Articles</h4>
					<ul class="large-block-grid-3">

					<?php while ( $article_query->have_posts() ) : $article_query->the_post(); ?>

					
						<li>
							
								<?php if(has_post_thumbnail()){ ?>
									<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
								<?php } ?>

								<h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>

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

										<span class="posted-on"><?php the_time('F jS, Y') ?></span>

									</div>

								<?php } ?>
							
						</li>
					

					

				<?php endwhile; wp_reset_postdata(); ?>
				</ul>

			<?php endif; ?>

		</div>

					
					
				</div>
			</div>

			<hr class="thick">

			<div class="row">
				<div class="small-12 medium-6 columns">

					<?php 

					if(get_field('twitter_hashtag')) {

					$hashtag = get_field('twitter_hashtag');

					$content = '[custom-twitter-feeds hashtag=' . $hashtag .']';

					echo do_shortcode($content); 

					} ?>
				</div>
				<div class="small-12 medium-6 columns">

					<?php echo do_shortcode('[instagram-feed type=hashtag hashtag="#Hashtag"]'); ?>
					
				</div>
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
$box_qt = 'esm_c_sevnt_a'.$ast."c".$astc.'p'.$post_id;
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