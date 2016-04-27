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
	<div class="small-12 columns" role="main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
				
			<h3><?php the_title(); ?></h3>
		<small>Date Published: <strong><?php the_date(); ?></strong></small>

		<?php endwhile;
				endif; 
		?>

		

		<hr>


		<?php 

		$file = get_field('download_file');
		$pdfurl = $file['url'];

		$content = '[pdf-embedder url="' . $pdfurl . '"]';

		//var_dump( $content);


		if( $file ) { 

		echo do_shortcode( $content );


		 } ?>

	</div>


		<?php //get_sidebar(); ?>

</div>
<?php get_footer(); ?>