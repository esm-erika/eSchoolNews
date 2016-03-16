<aside id="sidebar" class="small-12 medium-4 columns">

	<article>
		<h4>eSchool News Staff</h4>

<?php

$post_type = 'staff';
$tax = 'departments';
$tax_terms = get_terms($tax,'hide_empty=0');

//list the taxonomy
// $i=0; // counter for printing separator bars
// foreach ($tax_terms as $tax_term) {
// $wpq = array ('taxonomy'=>$tax,'term'=>$tax_term->slug);
// $query = new WP_Query ($wpq);
// $article_count = $query->post_count;
// echo "<a href=\"#".$tax_term->slug."\">".$tax_term->name."</a>";
// // output separator bar if not last item in list
// if ( $i < count($tax_terms)-1 ) {
// echo " | " ;
// }
// $i++;
// }

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
      echo "<h2 class=\"tax_term-heading\" id=\"".$tax_term->slug."\"> $tax_term->name </h2>";
      echo '<ul class="small-block-grid-1 medium-block-grid-2">';
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <li>
        	<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>">
        	<?php the_post_thumbnail('small-portrait'); ?>
        	<?php the_title(); ?>
        	</a>
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


	</article>


</aside>