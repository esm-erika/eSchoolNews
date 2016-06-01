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
$box_qt = 'esm_c_arcevnt_menu_pg'.$page;
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
					'post_type' => 'events',
					'posts_per_page' => '5',
					'meta_query' => array(
						array(
							'key' => 'event_status',
							'value' => '1',
							'compare' => '=='
							)
						),
					'meta_key'	=> 'event_date',
					'orderby'	=> 'meta_value_num',
					'order'		=> 'DESC'
					);

				$events = new WP_Query( $args ); ?>

				<?php if( $events->have_posts() ) : ?>

				<h4>Upcoming Events</h4>
		<br/>

				<?php // The Loop
				 while ( $events->have_posts() ) :
					$events->the_post(); ?>

				<article class="row">
					<header class="small-12 columns">
						
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail(); ?></a>
			
				<h4 class="entry-title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
				<h6>
					<i class="fi-calendar"></i> 
					<?php 
					$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
					$enddate = DateTime::createFromFormat('Ymd', get_field('event_end_date'));
					
					if($showdate){
					echo $showdate -> format('F d, Y');
					} ?>

					<?php if($enddate){ 
						echo ' - ';
						echo $enddate -> format('F d, Y');
					} ?>
				</h6>
			</header>
		</article>
		<br/>

				<?php endwhile; ?>

				<hr class="thick"/>
			<?php endif; ?>
				<?php wp_reset_postdata(); ?>

		

			<?php

			$custom_terms = get_terms('conferences');

			foreach($custom_terms as $custom_term) {
			    wp_reset_query();
			    
			    $args = array(
			    	'post_type' => 'post',
			        'tax_query' => array(
			            array(
			                'taxonomy' => 'conferences',
			                'field' => 'slug',
			                'terms' => $custom_term->slug,
			            ),
			        ),
			     );

			     $loop = new WP_Query($args);

			     if($loop->have_posts()) {
			        //echo '<h2>'.$custom_term->name.'</h2>';

			        while($loop->have_posts()) : $loop->the_post(); ?>


			        <?php 
		
					$taxonomy = 'conferences'; 

					$terms = get_the_terms($post->id, 'conferences');

					foreach ( $terms as $term ) {

						$term_link = get_term_link( $term->term_id, $taxonomy);

						echo '<span class="flag content">';
						echo '<a href="' . esc_url($term_link) . '">' . $term->name . '</a>';
						echo '</span>';

					}

					?>

		            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
		            <hr>
			<?php
			        endwhile;
			     }
			}

			?>

	
			
		
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
//name format esm_c_[template name in 5 char]a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique] 
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_evnts_a'.$astused."c".$astc.'c'.'p';
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
