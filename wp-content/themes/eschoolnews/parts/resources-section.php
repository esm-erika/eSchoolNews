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

<?php // The Query

//if( is_home() || is_front_page()) {

	//first query
	$ercs = get_posts(array(
			'post_type' => 'ercs',
			'status' => 'active-erc'
	 		));
	//second query
	$specialreports = get_posts(array(
			'post_type' => 'special-reports'
	 		));
	$resources = array_merge( $ercs, $specialreports ); //combine queries

	//$postids = array();

	//foreach( $resources as $item ) {
	//	$postids[]=$item->ID; //create a new query only of the post ids
	//}

	//$uniqueposts = array_unique($postids); //remove duplicate post ids

	//$posts = get_posts(array(
	//		'post__in' => $resources, //new query of only the unique post ids on the merged queries from above
	// 		));
	//foreach( $posts as $post ) :
	//setup_postdata($post);

	// $stuff = get_posts(array(
	// 	'post_type' => $resources,
	// 	'orderby' => 'date'

	// 	));

	foreach ( $resources as $post ) : setup_postdata( $post ); 

 	?>

	<?php $resourcessection = 1; ?>
		

	<article class="row">
		<div class="small-12 medium-4 columns">

			<?php if( has_post_thumbnail()){
				the_post_thumbnail('small');
			} ?>

		</div>

		<header class="small-12 medium-8 columns"> 
			<?php get_template_part('parts/flags'); ?>
			<h4> <a href="<?php the_permalink();?>"><?php the_title( ); ?></a></h4>

			<?php if( 'webinars' == get_post_type()){ ?>
			<h5><i class="fi-calendar"></i> <?php 
			$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
			if($showdate){ echo $showdate -> format('F d, Y');} ?></h5>
			<h5><i class="fi-clock"></i> <?php the_field('event_time'); ?></h5>

			<?php } ?>

			<?php the_field('masthead_text') ?>


		</header>

	</article>

	<hr>



	<?php endforeach; 
	wp_reset_postdata();?>




	<h6 class="readmore"><a href="<?php echo home_url(); ?>/resources">See All Resources &raquo;</a></h6>


