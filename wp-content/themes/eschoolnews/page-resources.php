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
	<div class="small-12 medium-8 columns">

		<ul class="large-block-grid-2">

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php query_posts( array ( 'post_type' => array('webinar','erc','specialreport','whitepapers'), 'posts_per_page' => -1));
		?>

		<?php while ( have_posts() ) : the_post(); ?>
		<li <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<?php 
				$post_type = get_post_type_object( get_post_type($post) );
				echo '<span class="flag content">';
				echo $post_type->labels->singular_name; 
				echo '</span>'
				?>


				<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
				<div class="excerpt">
				<?php 
				echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 15, $more = '' ), true); 
				?>
			</div>
			</header>
		</li>
	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>

</ul>


</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
