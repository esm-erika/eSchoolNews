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
		'posts_per_page' => 1
		
		);
		
		$query = new WP_Query( $args );  

		?>

		<?php while ( $query->have_posts() ) : $query->the_post(); ?>

		<?php the_post_thumbnail(); ?>
		<br><br>
		
		<?php if(get_field('symposium_intro')) {
			echo '<br><br>';
			the_field('symposium_intro');
		} ?>

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


		<?php 

		$posts = get_field('symposium_entries');

		if( $posts ): ?>
		    <ul>
		    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
		        <?php setup_postdata($post); ?>
		        <li>
		            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		        </li>
		    <?php endforeach; ?>
		    </ul>
		    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
		<?php endif; ?>

		<?php endwhile; wp_reset_postdata(); ?>

		<?php comments_template(); ?>

		   


				




				
						
					
					

									

			
			


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

		$args = array(
		'post_type' => 'symposiums',
		'post_per_page' => 10,
		'offset' => 1
		
		);
		
		$archived = new WP_Query( $args );  

		?>
        
        <?php if ( $archived->have_posts() ) : ?>
	
			<hr class="thick"/>

			<h4>View Our Past Symposiums</h4>

			<ul class="small-block-grid-1 medium-block-grid-2">	

			<?php while ( $archived->have_posts() ) : $archived->the_post(); ?>

				<li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></li>

			<?php endwhile; wp_reset_postdata(); ?>
				
			</ul>

		<?php endif; ?>


		
	</div>
	
</div>
<?php get_footer(); ?>
