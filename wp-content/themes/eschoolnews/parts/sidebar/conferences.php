<article class="conferences">
	
<h4>Conferences</h4>

<ul class="small-block-grid-1 medium-block-grid-2">

	<?php

	$taxonomy = 'conferences';
	$terms = get_terms( $taxonomy );

    echo '<ul>';

    foreach ( $terms as $term ) {

    	$term_link = get_term_link( $term->term_id, $taxonomy);

    	echo $term->name;

        //echo '<li><a href="' . esc_url($term_link) . '">' . $term->name . '</a></li>';
    }
    
    echo '</ul>';
	
	 ?>

</ul>


</article>