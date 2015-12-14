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

				// The Query
				$args = array(
					'post_type' => 'special-reports',
					'posts_per_page' => '5',
					'orderby' => 'date'
					);

				$query = new WP_Query( $args ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				
					<article class="row">
							<?php if( has_post_thumbnail()){ ?>
								<div class="medium-4 columns">
								<?php the_post_thumbnail('medium'); ?>
							</div>
						<div class="medium-8 columns">
							<?php } else{ ?>

							<div class="medium-12 columns">

							<?php } ?>

						
						<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<!-- <p class="small-caps"><?php //the_time('F j, Y'); ?></p> -->

							<?php 

							$file = get_field('download_files');

							if( $file ): ?>
						  <a href="<?php echo $file['url']; ?>" class="button radius tiny">Download Report</a>
						  <?php endif; ?>

						  <a href="<?php the_permalink(); ?>" class="button tiny readmore">Read More</a>
						
					</div>

						</article>
						<hr/>
						  
				
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</ul>

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
$box_qt = 'esm_c_sra_a'.$astused."c".$astc.'c'.'p';
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
	

	

			<hr class="thick"/>

			<h4>More Special Reports</h4>

			<br/>


		<ul class="medium-block-grid-2">

			<?php

				// The Query
				$args2 = array(
					'post_type' => 'special-reports',
					'orderby' => 'date',
					'offset' => '5'
					);

				$query2 = new WP_Query( $args2 ); ?>


				<?php // The Loop
				 while ( $query2->have_posts() ) :
					$query2->the_post(); ?>
<li>
			
				<article class="row">
							<?php if( has_post_thumbnail()){ ?>
								<div class="medium-4 columns">
								<?php the_post_thumbnail('medium'); ?>
							</div>
						<div class="medium-8 columns">
							<?php } else{ ?>

							<div class="medium-12 columns">

							<?php } ?>

					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<p class="small-caps"><?php the_time('F j, Y'); ?></p>
				
					<?php 

							$file = get_field('download_files');

							if( $file ): ?>
						  <a href="<?php echo $file['url']; ?>" class="button radius tiny">Download Report</a>
						  <?php endif; ?>

						  <a href="<?php the_permalink(); ?>" class="button tiny readmore">Read More</a>

				
					</div>
				</article>
				

		</li>

			

			<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>


</ul>
	</div>
	
</div>
<?php get_footer(); ?>
