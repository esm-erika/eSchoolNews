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


	<?php // get_template_part( 'parts/ads/leaderboard-2' ); ?>




	<?php get_template_part( 'parts/section-titles' ); ?>





	<?php get_template_part( 'parts/featured-article' ); ?>

	<div class="row">

		
	
	<div class="small-12 medium-8 columns">

		<?php if( is_page('resources')) {

echo '<hr class="thick" />';

}?>


		<h4>New Resources</h4>
		<br/>



		<?php // The Query
				$args = array(
					'post_type' => array('ercs','special-reports','whitepapers'),
					'posts_per_page' => '6'
					//'order'
					);


				$query = new WP_Query( $args );
				
				
				while ( $query->have_posts() ) :
					$query->the_post(); ?>

		<article class="row">

					

							

							<div class="medium-4 columns">

							<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?> 

						    <img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
							
							</div>

						  

						    

						                        	<header class="medium-8 columns">

				<?php get_template_part('parts/flags'); ?>
			
				<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					
				<div class="excerpt">
				<?php 
				//echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 15, $more = '' ), true); 
				?>
			</div>
			</header>
		</article>
		<br/>
	<?php endwhile; 
				wp_reset_postdata(); ?>

			</div>

				<?php get_sidebar(); ?>
</div>


<div class="row">



<div class="medium-12 columns">
	<hr class="thick" />
<h4>Additional Resources</h4>

<br/>

<ul class="medium-block-grid-2">

<?php // The Query
				$args2 = array(
					'post_type' => array('ercs','special-reports','whitepapers'),
					'offset' => '6'
					);


				$query2 = new WP_Query( $args2 );
				
				
				while ( $query2->have_posts() ) :
					$query2->the_post(); ?>

			<li><article class="row">
			<header class="large-12 columns">
				<?php 

				$post_type = get_post_type_object( get_post_type($post) );
				echo '<span class="flag content">';
				echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
				echo $post_type->labels->singular_name; 
				echo '</a></span>';
				?>
			
				<h5 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				
				<div class="excerpt">
				<?php 
				//echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 15, $more = '' ), true); 
				?>
			</div>
			</header>
		</article></li>

				<?php endwhile; 
				wp_reset_postdata(); ?>

</ul>


</div>

<?php get_footer(); ?>
