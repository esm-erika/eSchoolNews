<article class="conferences">
	
<h4>Conferences</h4>

<ul class="small-block-grid-1 medium-block-grid-2">

	<?php

	$taxonomy = 'conferences';
	  $terms = get_terms( $taxonomy, '' );
	  if ($terms) {
	    foreach($terms as $term) {
	    	echo '<li>';
	        echo  '<a href="' . esc_attr(get_term_link($term, $taxonomy)) . '" title="' . sprintf( __( "%s" ), $term->name ) . '" ' . '>' . $term->name.'</a>';
	        echo '</li>';
	    }
	  }
	
	 ?>

</ul>


</article>