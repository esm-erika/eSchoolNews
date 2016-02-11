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
global $page;
$box_qt = 'esm_c_arcSR_menu_pg'.$page;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){
	// start code to cache
		ob_start( );
		echo '<!-- c -->'; 
		?>

<div class="row">

		<?php get_template_part( 'parts/section-titles' ); ?>


<!-- Row for main content area -->
	<div class="small-12 medium-8 columns" role="main">

		   


				<?php 

				$taxonomy = 'subjects';
				$terms = get_the_terms( $post->ID, $taxonomy);
				$term_id = $terms[0]->term_id;

				$image = get_field('subjects_image', $taxonomy . '_' . $term_id);
				//$url = get_field('sponsor_url', $taxonomy . '_' . $term_id);
				
				if( !empty($image) ): ?>


				<div class="row">
					<div class="small-12 columns">
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					</div>
				</div>

				<?php endif; ?>


				 <?php

				// The Query
				$args = array(
					'post_type' => 'symposiums',
					'posts_per_page' => '2',
					'orderby' => 'date'
					);

				$query = new WP_Query( $args ); ?>

				<article class="row">



				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				
							<div class="small-12 medium-6 columns">

								<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

								<?php the_excerpt(); ?>

								
							</div>
						
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

									</article>


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
        
	
			<hr class="thick"/>

			<h4>View Our Past Symposiums</h4>

			<br/>


		
	</div>
	
</div>
<?php get_footer(); ?>
