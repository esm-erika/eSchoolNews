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

<div class="row">

	<?php get_template_part( 'parts/ads/leaderboard-2' ); ?>


	<?php get_template_part( 'parts/section-titles' ); ?>

	<div class="small-12 medium-8 columns">

		<h4>New Resources</h4>

		<ul class="large-block-grid-2">


		<?php // The Query
				$args = array(
					'post_type' => array('ercs','special-reports','whitepapers'),
					'posts_per_page' => '6'
					//'order'
					);


				$query = new WP_Query( $args );
				
				
				while ( $query->have_posts() ) :
					$query->the_post(); ?>

		<li <?php post_class() ?> id="post-<?php the_ID(); ?>">

						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">

			<header>
			
				<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<?php 
						$post_type = get_post_type_object( get_post_type($post) );
						echo '<span class="flag content">';
						echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
						echo $post_type->labels->singular_name; 
						echo '</a></span>';
					?>
				<div class="excerpt">
				<?php 
				//echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 15, $more = '' ), true); 
				?>
			</div>
			</header>
		</li>
	<?php endwhile; 
				wp_reset_postdata(); ?>

</ul>
<hr/>
<section>
<h4>Resources</h4>

<?php // The Query
				$args2 = array(
					'post_type' => array('ercs','special-reports','whitepapers'),
					'offset' => '6'
					);


				$query2 = new WP_Query( $args2 );
				
				
				while ( $query2->have_posts() ) :
					$query2->the_post(); ?>

				<article class="row" style="margin-bottom: 1rem;">
					<div class="large-4 columns">
						<?php 
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						?>

						<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">
					</div>
			<header class="large-8 columns">
			
				<h3 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php 

				$post_type = get_post_type_object( get_post_type($post) );
				echo '<span class="flag content">';
				echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
				echo $post_type->labels->singular_name; 
				echo '</a></span>';
				?>
				<div class="excerpt">
				<?php 
				//echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 15, $more = '' ), true); 
				?>
			</div>
			</header>
		</article>

				<?php endwhile; 
				wp_reset_postdata(); ?>

</section>
</div>



<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
