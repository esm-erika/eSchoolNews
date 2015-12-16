<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">

			<?php get_template_part( 'parts/section-titles' ); ?>

<!-- Row for main content area -->
	<div class="small-12 medium-8 columns" role="main">

	<?php

	if (is_tax('company_categories')) { ?>


	<?php 
if ( have_posts() ) {
/*	while ( have_posts() ) {
		the_post(); 
		//
		get_template_part( 'parts/whitepapers-modal' );
		//
	} // end while */
	
 while ( have_posts() ) : the_post(); ?>

					<div style="margin-bottom:8px;" class="panel row all<?php 
					$terms = wp_get_post_terms( $post->ID, 'subject_categories' );
					foreach ( $terms as $term ) { echo " ".$term->slug ; } ?>">


						
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
                    		<h3><?php the_title(); ?></h3>
                    		<div class="posted-on">Posted on <?php the_time('F j, Y'); ?></div>
                    		<hr/>
                    	</header>

                    	<p class="excerpt">
							<?php 
							echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); 
							?>
						</p>
						
						<?php
						$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);

						if ( esm_is_user_logged_in() and !$WPForm > 0) { ?>
						
						<div class="text-center">
							<a class="button small radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit">Download White Paper</a>
						</div>

						<?php } else { // not logged in ?>
						
						<div class="text-center">
                        	<a href="#" class="button small radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download White Paper</a>
                    	</div>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
                        
                        
                        <?php } ?>
					</div>
                    </div>

                   

					
					
					<?php endwhile;	
	
	
} // end if
?>

		

		<?php  } elseif( is_tax('sponsor') ) { ?>

				<article class="row">
						<div class="small-12 medium-4 columns">
							<?php if( has_post_thumbnail()){
								the_post_thumbnail('medium');
							} ?>

						</div>

						<div class="small-12 medium-8 columns">
						<h4>
							<a href="<?php the_permalink(); ?>">
							<?php the_title();?>
							</a>
						</h4>

						<?php if(get_field('masthead_text')){

							echo the_field('masthead_text');

						} ?>
					</div>
				</article>

				<hr/>

	


	<?php } else {

		echo '<h4><a href="';
		get_permalink();
		echo '">';  
		the_title();
		echo '</a></h4>';
		echo '<hr>';

	} ?>

	<?php /* Display navigation to next/previous pages when applicable */ ?>
	<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>
		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
		</nav>
	<?php } ?>



	</div>
<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc][c ...category][p  ...post id(if sidebar needs to be unique][t ...(tagid)if a tag page][a ... Author ID (if an author page)]
//$cat_name = get_category(get_query_var('cat'))->term_id;

$tag_id = get_query_var('tag_id');
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_tax_a'.$ast."c".$astc.'t'.$tag_id;
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