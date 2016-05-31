<article class="conferences">
	
<h4>Conferences</h4>

<ul class="small-block-grid-1 medium-block-grid-2">

	<?php

	$taxonomy = 'conferences';
	$terms = get_terms( $taxonomy );

    echo '<ul>';

    foreach ( $terms as $term ) {

    	$term_link = get_term_link( $term->term_id, $taxonomy='conferences');

    	//echo $term->name;

        echo '<li><a href="';
        echo esc_url($term_link); 
        echo '">' . $term->name . '</a></li>';

        // echo '<pre>';
        // var_dump($term_link);
        // echo '</pre>';
    }
    
    echo '</ul>';
	
	 ?>

</ul>


</article>