	<?php 

	$post_type = get_post_type( $post->ID ); 

	if (get_field('sponsored_article')) {
		echo '<span class="flag content">';
		echo '<a href="' . get_the_permalink() . '">';
		echo 'Sponsored';
		echo '</a></span>';

	} elseif ($post_type == 'post') {

		echo '<span class="flag content">';
		echo '<a href="' . get_the_permalink() . '">';
		echo 'News'; 
		echo '</a></span>';

	} elseif ($post_type == 'press-releases') {

		echo '<span class="flag content">';
		echo '<a href="' . get_the_permalink() . '">';
		echo 'Press Release'; 
		echo '</a></span>';

	} elseif ($post_type == 'staff') {

		echo '<span class="flag content">';
		echo '<a href="' . get_site_url() .'/staff'. '">';
		echo 'Staff'; 
		echo '</a></span>';
	
	} else {

		$post_type = get_post_type_object( get_post_type($post) );

		echo '<span class="flag content">';
		echo '<a href="' . get_site_url() .'/'. get_post_type( get_the_ID() ) . '">';
		echo $post_type->labels->singular_name; 
		echo '</a></span>';

	} ?>

	 <!--  -->