<?php
/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */
$resourcessection = 0;
?>

<?php if(is_category()) {
		echo '<h4>';
		single_cat_title();
		echo ' Resources</h4>';
		echo '<br/>';
	} else {
		echo '<h1 class="section-title"><span><div class="icon resources"></div> Resources</span></h1>';
	} ?>

<?php

	$args = array(
		'post_type' => array('special-reports','ercs'),
		'posts_per_page' => '6',
	);

$resources = new WP_Query( $args );

?>
<?php while ( $resources->have_posts() ) : $resources->the_post(); ?>
	<?php $resourcessection = 1; ?>
		

	<article class="row">
		<div class="small-12 medium-4 columns">

			<?php if( has_post_thumbnail()){
				the_post_thumbnail('medium-portrait');
			} ?>

		</div>

		<header class="small-12 medium-8 columns"> 
			<?php get_template_part('parts/flags'); ?>
			<h4> <a href="<?php the_permalink();?>"><?php the_title( ); ?></a></h4>
			
			<?php if( 'ercs' == get_post_type()){ 
				the_field('masthead_text');
			 } ?>

			 <?php if( 'special-reports' == get_post_type()){ 
				the_content();
			 } ?>


		</header>

	</article>

	<hr>



	<?php endwhile; 
	wp_reset_postdata();?>




	<h6 class="readmore"><a href="<?php echo home_url(); ?>/resources">See All Resources &raquo;</a></h6>


