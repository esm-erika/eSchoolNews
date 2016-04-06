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

<div class="row">

			<?php get_template_part( 'parts/section-titles' ); ?>

<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">

		<?php 

		$args = array(

			'post_type' => 'press-releases',
			'meta_key'	=> 'press_release_date',
			'orderby'	=> 'meta_value_num',
			'order'		=> 'ASC'
			);
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- pagination here -->

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


	<?php get_template_part('parts/flags'); ?>

	<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
	<h6><?php the_field('subheadline'); ?></h6>

	<?php 

		// get raw date
		$date = get_field('press_release_date', false, false);

		// make date object
		$date = new DateTime($date);

	?>

	<div class="small-caps"><?php echo $date->format('F j, Y'); ?></div>



	<hr>




	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>


	<!-- the loop -->

	


	


    
			

	</div>
  <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
