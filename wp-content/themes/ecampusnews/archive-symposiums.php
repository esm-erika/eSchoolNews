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
	<div class="small-12 medium-12 columns" role="main">


		<?php 

		$args = array(
			'post_type' => 'symposiums',
			'posts_per_page' => '1'


			);

		// the query
		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<!-- pagination here -->

			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php the_post_thumbnail(); ?>
				
				<?php 

				$posts = get_field('symposium_entries');

				if( $posts ): ?>
				    <ul class="small-block-grid-1 medium-block-grid-2">
				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>
				        <li>
				        	<div class="panel">
				        		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				        		<?php if(get_field('symposium_subhead')){
				        			echo '<h4>';
				        			the_field('symposium_subhead');
				        			echo '</h4>';
				        		} ?>
									<?php the_excerpt(); ?>

									<h6><a href="<?php the_permalink(); ?>">Read more</a></h6>
				        	</div>
				            
				        </li>
				    <?php endforeach; ?>
				    </ul>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>


			<?php endwhile; ?>
			<!-- end of the loop -->

			<!-- pagination here -->

			<?php wp_reset_postdata(); ?>

		<?php else : ?>
			<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
		<?php endif; ?>

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

	

		
	</div>
	
</div>
<?php get_footer(); ?>
