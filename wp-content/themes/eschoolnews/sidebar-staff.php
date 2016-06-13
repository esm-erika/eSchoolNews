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
      'caller_get_posts'=> 1,
      'meta_query' => array(
        array(
          'key' => 'sidebar_true',
          'value' => '1',
          'compare' => '=='
        )
      )
    );

    $my_query = null;
    $my_query = new WP_Query($args);
    if( $my_query->have_posts() ) { ?>

    <?php 
      echo "<h5 class=\"tax_term-heading\" id=\"".$tax_term->slug."\"> $tax_term->name </h5>";
      echo '<ul class="small-block-grid-1 medium-block-grid-2">';
      while ($my_query->have_posts()) : $my_query->the_post(); ?>
        <li>
          <a href="#" rel="bookmark" data-reveal-id="<?php the_slug(); ?>" title="<?php the_title_attribute(); ?>">
        	<?php the_post_thumbnail('small-portrait'); ?>
        	 <?php the_title(); ?>
          </a>
          
          <div id="<?php the_slug(); ?>" class="reveal-modal" data-reveal aria-labelledby="<?php the_title(); ?>" aria-hidden="true" role="dialog">
             
                      <div class="row">
                        <div class="small-12 medium-3 columns">
                          <?php the_post_thumbnail('small-portrait'); ?>
                        </div>
                        <div class="small-12 medium-9 columns">

                        <h1 class="entry-title"><?php the_title(); ?></h1>
                        <h4><?php the_field('staff_title'); ?></h4>
                        
                        <?php  

                          $taxonomy = 'staff';
                          $terms = get_the_terms( $post->ID , 'departments' );
                          $terms_name = $terms[0]->name;

                          echo '<div class="small-caps">';
                          echo $terms_name;
                          echo '</div>';

                        ?>
                        <hr>

                        <?php the_content(); ?>

                        <hr>
                      
                      <?php get_template_part('parts/social'); ?> 

                       </div>
                      </div>             

                <a class="close-reveal-modal" aria-label="Close">&#215;</a>
                      </div>


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

<div class="text-center">
  <a class="button radius" href="<?php echo site_url(); ?>/staff">View All Staff</a>
</div>

	</article>


</aside>