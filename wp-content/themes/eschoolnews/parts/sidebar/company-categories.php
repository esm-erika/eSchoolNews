<?php if ( is_tax('company_categories') ) {
  echo '<div class="text-center">';
  echo '<a class="button" href="' . site_url('/') . 'whitepapers">&laquo; Back to All White Papers</a>';
  echo '</div>';
}?>

<article class="company-categories">

  <h4>White Papers By Company</h4>

<?php

$displayarray = array();


  $taxonomy = 'sponsor';
  $taxonomy_terms = get_terms( $taxonomy, array(
      'hide_empty' => 0,
      'fields' => 'ids'
  ) );

  $sponsors = new WP_Query(array(
    'post_type' => 'whitepapers',
    'posts_per_page' => -1,
    'orderby' => 'name',
    'order' => 'ASC',
    // 'meta_query' => array(
    //   array(
    //     'key' => 'erc_status',
    //     'value' => '1',
    //     'compare' => '=='
    //     )
    //   ),
    ));   

  ?>

    <?php if ( $sponsors->have_posts() ) : ?>

    <ul>

      <!-- the loop -->
      <?php 
      $shownlist = array();
      while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>

     <?php   
   $terms = get_the_terms( $post->ID , 'sponsor' );
   
   foreach($terms as $term){ 

   $termlink = get_term_link( $term->slug, 'sponsor' );
   $image = get_field('sponsor_image', 'sponsor_'.$term->term_id);
   
    if (!in_array($termlink, $shownlist)) { ?>

<?php 

 $companydata = '<!-- '.$term->name.' --><li data-equalizer-watch><a class="single-library-cat" href="'.$termlink.'">'.$term->name.'</a></li>';

 array_push($displayarray, $companydata);     
 $shownlist[] = $termlink;
    }
   } ?>   


    <?php endwhile; wp_reset_postdata(); 
  asort($displayarray); 
foreach ($displayarray as $key) {
    echo $key;
} 
  
  ?>
    </ul>
  <?php endif; ?>

</article>