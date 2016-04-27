<article>

	<h4>Past Issues</h4>

	<?php 

		$taxonomy = 'years';
		$terms = get_the_terms( $post->ID, $taxonomy);
		$term_name = $terms[0]->name;

		$this_post = $post->ID;

		if(is_page('current-issue')) {

			$args = array(
			'posts_per_page' => '5',
			'post_type'	=> 'digital-issues',
			'meta_key'	=> 'digital_issue_date',
			'orderby'	=> 'meta_value_num',
			'order'		=> 'ASC',
			'offset' => '1',

			);

		} else {

		$args = array(
			'posts_per_page' => '5',
			'post_type'	=> 'digital-issues',
			'meta_key'	=> 'digital_issue_date',
			'orderby'	=> 'meta_value_num',
			'order'		=> 'ASC',
			'post__not_in' => array($this_post),

			);

		}
		
		// the query
		$the_query = new WP_Query( $args ); 

		if ( $the_query->have_posts() ) : ?>

		<ul>

		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?> <?php echo $term_name; ?></a></li>
		
		<?php endwhile; wp_reset_postdata(); ?>

		</ul>

		<?php endif; ?>

</article>