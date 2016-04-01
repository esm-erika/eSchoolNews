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

$post_type = 'staff';
$tax = 'departments';
$tax_terms = get_terms($tax,'hide_empty=0');

//list everything
if ($tax_terms) {
  foreach ($tax_terms  as $tax_term) {
    $args=array(
      'post_type' => $post_type,
      "$tax" => $tax_term->slug,
      'post_status' => 'publish',
      'posts_per_page' => -1,
      'caller_get_posts'=> 1
    );

    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) { ?>

    <?php 
      echo "<h4 class=\"tax_term-heading\" id=\"".$tax_term->slug."\"> $tax_term->name </h4>";
      echo '<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">';
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <li class="staff-member">
        	<?php the_post_thumbnail('small-portrait'); ?>
        	<span>
          <a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        	 <?php the_title(); ?>
          </a>
	          <?php if(get_field('staff_title')) {

	            echo '<div class="small-caps">';

	            the_field('staff_title'); 

	            echo '</div>';

	          } ?>
	      </span>
        	
        </li>
        <?php
      endwhile;
      echo '</ul>';
    } ?>

    <?php 
    wp_reset_query();
  }
}
?>
		


	</div>
</div>
<?php get_footer(); ?>
