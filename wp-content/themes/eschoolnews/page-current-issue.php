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
	<div class="small-12 large-8 columns" role="main">

	<?php do_action( 'foundationpress_before_content' ); ?>

		<?php get_template_part('parts/flags'); ?>

	<?php 

		$args = array(
			'posts_per_page' => '1',
			'post_type'	=> 'digital-issues',
			//'meta_key'	=> 'digital_issue_date',
			//'orderby'	=> 'meta_value_num',
			'order'		=> 'ASC'

			);
		// the query
		$the_query = new WP_Query( $args ); 

		if ( $the_query->have_posts() ) : ?>

	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>


		<h4><?php the_title(); ?></h4>


		<?php 

		$file = get_field('download_file');
		$pdfurl = $file['url'];

		$content = '[pdf-embedder url="' . $pdfurl . '"]';

		//var_dump( $content);


		if( $file ) { 

		echo do_shortcode( $content );


		 } ?>

		<?php endwhile; wp_reset_postdata(); endif; ?>



	<?php do_action( 'foundationpress_after_content' ); ?>

	
	</div>
	
		<?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>
