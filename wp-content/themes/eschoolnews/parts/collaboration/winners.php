<div class="row">
	<div class="small-12 medium-10 medium-centered columns">


		<section id="recent-entries">

			<h2 class="text-center">2016 Entries</h2>

			<?php 

			$args = array(
				'post_type' => 'collabnation',

				);
			// the query
			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<h2><?php the_title(); ?></h2>

		<?php endwhile;
		wp_reset_postdata(); ?>

	<?php endif; ?>




</section>

</div>
</div>