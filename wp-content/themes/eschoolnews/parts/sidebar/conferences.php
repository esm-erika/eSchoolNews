<article class="conferences">
	
<h4>Conferences</h4>

<ul class="small-block-grid-1 medium-block-grid-2">

	<?php

	// $taxonomy = 'conferences';
	// $terms = get_terms( $taxonomy );

 //    echo '<ul>';

 //    foreach ( $terms as $term ) {

 //    	$term_link = get_term_link( $term->term_id);

 //    	//echo $term->name;

 //        echo '<li><a href="';
 //        echo esc_url($term_link); 
 //        echo '">' . $term->name . '</a></li>';

 //        echo '<pre>';
 //        var_dump($term);
 //        echo '</pre>';
 //    }
    
 //    echo '</ul>';


	$taxonomy = 'conferences';
	  $terms = get_terms( $taxonomy, '' );
	  if ($terms) {
	    foreach($terms as $term) {
	        echo  '<a href="' . esc_attr(get_term_link($term, $taxonomy)) . '" title="' . sprintf( __( "View all posts in %s" ), $term->name ) . '" ' . '>' . $term->name.'</a>';
	    }
	  }
	
	 ?>

	 <!-- <li><a href="<?php echo site_url(); ?>/conferences/ies-israel-edtech-summit/">IES: Israel EdTech Summit</a></li> -->

</ul>


</article>