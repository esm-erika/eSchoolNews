	<h4>Top Stories</h4>
	<br/>

	<?php

	$popular = new WP_Query(array(
		'post_type' => 'post',
		'posts_per_page' => '10'

)); ?>

			<?php while ( $popular->have_posts() ) :
			$popular->the_post(); ?>

			<article>
				<header>
				<?php //get_template_part('parts/flags'); ?>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<div class="small-caps">By <?php the_author(); ?></div>
					<div class="posted-on">Posted on <?php the_time('l, F jS, Y') ?> at <?php the_time() ?></div>	

				

				</header>
			</article>

			<hr/>

			<?php endwhile;
			wp_reset_postdata(); ?>

		<h6 class="readmore"><a href="<?php site_url(); ?>/top-stories">See All Top Stories &raquo;</a>

