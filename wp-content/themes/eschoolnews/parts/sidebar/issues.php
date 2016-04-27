<article>



	<?php 

		$this_post = $post->ID;

			$args = array(
			'posts_per_page' => '5',
			'post_type'	=> 'digital-issues',
			//'meta_key'	=> 'digital_issue_date',
			//'orderby'	=> 'meta_value_num',
			'order'		=> 'ASC',
			//'offset' => '1',
			'post__not_in' => array($this_post),

			);

		
		// the query
		$past_issues = new WP_Query( $args ); 

		if ( $past_issues->have_posts() ) : ?>

		<h4>Past Issues</h4>

		<ul>

		<?php while ( $past_issues->have_posts() ) : $past_issues->the_post(); ?>
				
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		
		<?php endwhile; wp_reset_postdata(); ?>

		</ul>

		<?php endif; ?>

</article>