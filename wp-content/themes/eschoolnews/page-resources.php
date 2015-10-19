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


		<?php // The Query
				$args3 = array(
					'post_type' => array('ercs','special-reports','whitepapers'),
					'posts_per_page' => '1',
					'meta_key'		=> 'featured',
					'meta_value'	=> 'yes'
					);


				$featured = new WP_Query( $args3 ); ?>

				<?php if( $featured->have_posts() ):
				 while( $featured->have_posts() ) : $featured->the_post(); ?>

			<div class="panel">
				<h4>Featured</h4>
				<h3><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h3>
			</div>


		<?php endwhile; ?>

		<?php endif;
				wp_reset_postdata(); ?>


		<h4>New Resources</h4>

		<ul class="large-block-grid-2">

		<?php do_action( 'foundationpress_before_content' ); ?>

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

	<?php do_action( 'foundationpress_after_content' ); ?>

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

				<article <?php post_class() ?> id="post-<?php the_ID(); ?>" style="margin-bottom: 1rem;">
			<header>
			
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
