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
<?php 
//insert cache query
Global $page;

$box_qt = 'esm_c_ercarc_pg'.$page;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){
	// start code to cache
		ob_start( );
		echo '<!-- c -->'; 
		?>
<?php get_template_part( 'parts/section-titles' ); ?>


	<div class="row">
		<div class="small-12 medium-8 columns">

		<!-- <h4>Active ERCs</h4> -->

		<?php 
		
		// the query
			$the_query = new WP_Query(array(
				'post_type' => 'ercs',
				'meta_query' => array(
					array(
						'key' => 'erc_status',
						'value' => '1',
						'compare' => '=='
						)
					),
				'posts_per_page' => -1
				));	


		
		 ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<!-- pagination here -->

			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<article class="row">
						<div class="small-12 medium-4 columns">
							<?php if( has_post_thumbnail()){
								the_post_thumbnail('medium-portrait');
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
				<br/>

			<?php endwhile; ?>
			<!-- end of the loop -->

			<!-- pagination here -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>	
				
				

			
		

		<hr/>

		<div class="erc-sponsors">

	<h4>Sponsors</h4>
	
	<ul class="small-block-grid-2 medium-block-grid-3" data-equalizer>

	<?php

	$taxonomy = 'sponsor';
	$taxonomy_terms = get_terms( $taxonomy, array(
	    'hide_empty' => 0,
	    'fields' => 'ids'
	) );

	$sponsors = new WP_Query(array(
		'post_type' => 'ercs',
		'posts_per_page' => -1,
		'meta_query' => array(
			array(
				'key' => 'erc_status',
				'value' => '1',
				'compare' => '=='
				)
			),
    ));   

	?>

		<?php if ( $sponsors->have_posts() ) : ?>

			<!-- the loop -->
			<?php while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>

			<?php //the_title(); ?>

		 <?php   
   $terms = get_the_terms( $post->ID , 'sponsor' );
   ksort($terms);
   $shownlist = array();
   foreach($terms as $term){ 

   $termlink = get_term_link( $term->slug, 'sponsor' );
   $image = get_field('sponsor_image', 'sponsor_'.$term->term_id);
   
    if (!in_array($termlink, $shownlist)) { ?>
       
    <li data-equalizer-watch>
     <a class="single-library-cat" href="<?php echo $termlink; ?>">
      <img src="<?php echo $image['url']; ?>" /> 
     </a>
    </li>
    
    <?php 
    array_push($shownlist, $termlink);
    }
      
   } ?>   


		<?php endwhile; wp_reset_postdata(); ?>
	<?php endif; ?>

	</div>
			
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
//name format esm_c_[template name in 5 char]_a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique]t[if a tag page]
//$cat_name = get_category(get_query_var('cat'))->term_id;

global $astc, $astused;
$box_qt = 'esm_c_perc_a'.$astused."c".$astc.'c'.'p';
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
