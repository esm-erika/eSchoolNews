<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row top">

	<?php get_template_part( 'parts/ads/leaderboard' ); ?>

	<h1 class="columns"><?php single_cat_title(); ?></h1>
	
			
			<?php //get_template_part( 'parts/featured-article' ); ?>

		<div class="small-12 large-6 columns" role="main">

			

<?php if ( have_posts() ) : ?>

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php
			if ( is_front_page() ) {
				query_posts( array ( 'category_name' => 'featured', 'posts_per_page' => 1 ));
			} elseif ( is_category()) {
				
				global $query_string;
				query_posts( $query_string . '&posts_per_page=1' );
			}

		?>

		<?php while ( have_posts() ) : the_post(); ?>
			

			<?php the_post_thumbnail(); ?>

		</div>

		<article class="small-12 large-6 columns">


			

			<header> 
				<p class="date"><?php the_time('F j, Y'); ?></p>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="excerpt">
					<?php 
					echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '' ), true); 
					?>
				</div>
			</header>

		</article>

		<?php endwhile; ?>

		<?php wp_reset_query(); ?>

	<?php endif;?>

	<?php rewind_posts(); ?>


	<?php do_action( 'foundationpress_after_content' ); ?>

</div>



</div>

	

	<div class="row">
		<div class="small-12 large-12 columns right-column top-stories">

		<?php get_template_part( 'parts/top-stories' ); ?>

	</div>
	</div>


<div class="bottom">

	<div class="row">

	<div class="small-12 large-8 columns">

			<?php get_template_part('parts/secondary'); ?>		

		<!-- secondary -->

		
		<?php get_template_part('parts/tertiary'); ?>

		<!-- tertiary -->

</div>

	<?php get_sidebar(); ?>

</div>


		<?php //get_template_part('parts/quaternary'); ?>

		<?php get_footer(); ?>

