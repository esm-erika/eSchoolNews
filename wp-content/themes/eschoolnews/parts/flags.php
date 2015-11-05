	<?php 

	$post_type = get_post_type( $post->ID ); 

	if ($post_type == 'post') {

		echo '<span class="flag content">';
		echo '<a href="' . site_url('/') . the_permalink() . '">';
		echo 'News'; 
		echo '</a></span>';
	
	} else {

		$post_type = get_post_type_object( get_post_type($post) );

		echo '<span class="flag content">';
		echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
		echo $post_type->labels->singular_name; 
		echo '</a></span>';

	} ?>

	 <!--  -->