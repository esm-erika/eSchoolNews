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

	/*$args = array(
		'post_type' => array('special-reports','ercs'),
		'posts_per_page' => '6',
	);*/
	
//////////// exp method
$args_for_query2 = array('post_type' => 'special-reports',
		'posts_per_page' => '6',
		'orderby'        => 'date',
	    'order'          => 'DESC',
	);
$args_for_query1 = array(
					'post_type' => 'ercs',
					'posts_per_page' => -1,
				    'orderby'        => 'date',
				    'order'          => 'DESC',
					'meta_query' => array(
						array(
							'key' => 'erc_status',
							'value' => '1',
							'compare' => '=='
						),

						));
//setup your queries as you already do
$query1 = new WP_Query($args_for_query1);
$query2 = new WP_Query($args_for_query2);

//create new empty query and populate it with the other two
$resources = new WP_Query();
$resources->posts = array_merge( $query1->posts, $query2->posts );


//populate post_count count for the loop to work correctly
$resources->post_count = 6;

///////////end method	
	

//$resources = new WP_Query( $args );

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
			
			<?php if( 'ercs' == get_post_type()){ ?>
				
				<?php if(get_field('alt_text')) { 
				
				the_field('alt_text');

				} else {

				the_field('masthead_text');

				} ?>
			<?php } ?>

			 <?php if( 'special-reports' == get_post_type()){ ?>
				
				<?php echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); ?> 
							
			<?php } ?>


		</header>

	</article>

	<hr>



	<?php endwhile; 
	wp_reset_postdata();?>




	<h6 class="readmore"><a href="<?php echo home_url(); ?>/resources">See All Resources &raquo;</a></h6>


