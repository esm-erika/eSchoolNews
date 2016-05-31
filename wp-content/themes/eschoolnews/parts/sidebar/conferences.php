<article class="conferences">
	<h4>Conferences</h4>

<!-- <ul class="small-block-grid-1 medium-block-grid-2">
	<li><a href="<?php site_url(); ?>/tag/aasa">AASA</a></li> 
	<li><a href="<?php site_url(); ?>/tag/alas">ALAS</a></li>
	<li><a href="<?php site_url(); ?>/tag/ascd">ASCD</a></li>
	<li><a href="<?php site_url(); ?>/tag/blc">BLC</a></li>
	<li><a href="<?php site_url(); ?>/tag/cosn">COSN</a></li>
	<li><a href="<?php site_url(); ?>/tag/cue">CUE</a></li>
	<li><a href="<?php site_url(); ?>/tag/fetc">FETC</a></li>
	<li><a href="<?php site_url(); ?>/tag/infocomm">InfoComm</a></li>
	<li><a href="<?php site_url(); ?>/tag/iste">ISTE</a></li>
	<li><a href="<?php site_url(); ?>/tag/nsba">NSBA<a/></li>
	<li><a href="<?php site_url(); ?>/tag/tcea">TCEA</a></li>
</ul> -->

<ul class="small-block-grid-1 medium-block-grid-2">

	<?php

	$taxonomy = 'conferences';
	$terms = get_terms( $taxonomy, $args );


	if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
    echo '<ul>';
    foreach ( $terms as $term ) {

    	$term_link = get_term_link( $term->term_id, $taxonomy);

        echo '<li><a href="' . esc_url($term_link) . '">' . $term->name . '</a></li>';
    }
    echo '</ul>';
	
	}

	?>

		
	</ul>

</article>