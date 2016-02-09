<article>
	<h4>Past Issues</h4>

	<ul>
		<? $args2 = array(
			'post__not_in'=>$do_not_duplicate,
			'cat' => 11351
			); 
		$query2 = new WP_Query( $args2 );  ?><?php while ($query2->have_posts()) : $query2->the_post(); 
		echo '<li>'; 
		?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<?php 
		echo '</li>';				
		endwhile; wp_reset_query(); ?>
	</ul>

</article>