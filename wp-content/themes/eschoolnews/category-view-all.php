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

get_header(); 

global $cat;

// get parent category slug
	$parentCatList = get_category_parents($cat,false,',');
	$parentCatListArray = explode(",",$parentCatList);
	$topParentName = $parentCatListArray[0];
	$sdacReplace = array(" " => "-", "(" => "", ")" => "");
	$topParent = strtolower(strtr($topParentName,$sdacReplace));

	//echo '<pre>';
	//var_dump($topParent);
	//echo '</pre>';

?>


<div class="row">

	<br/>

				<h1 class="section-title"><span><?php echo $topParentName ?> Top Stories</span></h1>


	<div class="small-12 large-8 columns" role="main">

	<?php // The Query

	$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;

	$topstories = new WP_Query(array(
		'post_type' => 'post',
		'category_name' => $topParent,
		'page' => $paged


		

		)); ?>

		<?php if ( $topstories->have_posts() ) : ?>

		<?php pagination($topstories->max_num_pages) ?>

		<?php while ( $topstories->have_posts() ) :
		$topstories->the_post(); ?>


		<article class="row">


			<?php if (has_post_thumbnail( )) { 

				$smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
				$largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?>


				<div class="small-12 large-4 columns" role="main">

					<img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
				</div>
				<header class="small-12 large-8 columns">

					<?php } ?>

					<?php if ( ! has_post_thumbnail( )) { ?>
					<header class="small-12 large-12 columns">
						<?php } ?>

						


						<span class="flag content"><a href="<?php the_permalink(); ?>">News</a></span>

						<h4 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						<div class="small-caps">By <?php the_author(); ?></div>
						<div class="posted-on">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div>		
					</article>
					<hr/>


				<?php endwhile; ?>



			<?php endif;
			wp_reset_postdata(); ?>

							<?php pagination($topstories->max_num_pages) ?>




		</div>

		<?php get_sidebar(); ?>
	</div>
	<?php get_footer(); ?>