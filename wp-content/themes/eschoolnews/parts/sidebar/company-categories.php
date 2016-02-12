<?php if ( is_tax('company_categories') ) {
	echo '<div class="text-center">';
	echo '<a class="button" href="' . site_url('/') . 'whitepapers">&laquo; Back to All White Papers</a>';
	echo '</div>';
}?>

<article class="company-categories">

	<h4>White Papers By Company</h4>

<?php

  $taxonomy = 'sponsor';
  $taxonomy_terms = get_terms( $taxonomy, array(
      'hide_empty' => 0,
      'fields' => 'ids',
      'orderby' => 'name'
  ) );

  $sponsors = new WP_Query(array(
    'post_type' => 'whitepapers',
    'posts_per_page' => -1,
    //'orderby' => 'title',
    //'order' => 'ASC',
    ));   

  ?>

    <?php if ( $sponsors->have_posts() ) : ?>

    <ul>

      <!-- the loop -->
      <?php 
      $shownlist = array();
      while ( $sponsors->have_posts() ) : $sponsors->the_post(); ?>

      <?php //the_title(); ?>

     <?php   
   $terms = get_the_terms( $post->ID , 'sponsor' );
   //ksort($terms);
   
   foreach($terms as $term){ 

   $termlink = get_term_link( $term->slug, 'sponsor' );
   $image = get_field('sponsor_image', 'sponsor_'.$term->term_id);
   
    if (!in_array($termlink, $shownlist)) { ?>
       
    <li data-equalizer-watch>
     <a class="single-library-cat" href="<?php echo $termlink; ?>">
      <!-- <img src="<?php echo $image['url']; ?>" />  -->
      <?php echo $term->name; ?>
     </a>
    </li>
    
    <?php 
    
  $shownlist[] = $termlink;

    }
    
   } ?>   


    <?php endwhile; wp_reset_postdata(); ?>
    </ul>
  <?php endif; ?>

</article>