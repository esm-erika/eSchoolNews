	<?php 

		$post_type = get_post_type_object( get_post_type($post) );

		echo '<span class="flag content">';
		echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
		echo $post_type->labels->singular_name; 
		echo '</a></span>'; 

		if ($post->post_type == "post") {

			echo '<span class="flag content">';
			echo '<a href="' . site_url('/') . the_permalink() . '">';
			echo 'News';
			echo '</a></span>'; 

		}

	?>