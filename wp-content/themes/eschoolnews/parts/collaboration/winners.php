<div class="row">
	<div class="small-12 medium-10 medium-centered columns">


		<section id="recent-entries">

			<h2 class="text-center">2016 Entries</h2>

			<?php 

			$args = array(
				'post_type' => 'collabnation',
				'tax_query' => array(
					array(
					'taxonomy' => 'years',
					'field' => 'slug',
					'terms' => '2016',

						),

					),

				);
			// the query
			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<h4><?php the_title(); ?></h4>

				<?php

					// check if the repeater field has rows of data
					if( have_rows('video_section') ):

					 	// loop through the rows of data
					    while ( have_rows('video_section') ) : the_row(); ?>

					<div class="entries">
						<div>
					  		<div class="video">

					  			<?php the_sub_field('entry_video'); ?>

					  		</div>

					  		<?php if( get_sub_field('video_title')){ ?>
					  			
					  			<h6 class="text-center"><?php the_sub_field('video_title') ?></h6>

					  		<?php } ?>
					  	</div>

					</div>


					



				<?php endwhile; 
				endif; ?>

		<?php endwhile;
		wp_reset_postdata(); ?>

	<?php endif; ?>




</section>

<section id="past-winners">

	<h4>Congratulations to Our 2015 Winners</h4>

			<?php 

			$args = array(
				'post_type' => 'collabnation',
				'tax_query' => array(
					array(
					'taxonomy' => 'years',
					'field' => 'slug',
					'terms' => '2015',

						),

					),

				);
			// the query
			$the_query = new WP_Query( $args ); ?>

			<?php if ( $the_query->have_posts() ) : ?>

			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<?php

					// check if the repeater field has rows of data
					if( have_rows('video_section') ):

					 	// loop through the rows of data
					    while ( have_rows('video_section') ) : the_row(); ?>

					<article>

						<?php if( get_sub_field('video_title')){ ?>
					  			
					  		<h6>
					  			<a target="_blank" href="<?php the_sub_field('external_link'); ?>">
					  				<?php the_sub_field('video_title'); ?> 

					  				<?php if(get_sub_field('award_name')){ ?>

					  				&mdash; <?php the_sub_field('award_name'); ?>

					  				<?php } ?>
					  			</a>
					  		</h6>
					  	<?php } ?>

					  		<div class="content">
								<?php 
								the_sub_field('video_text');
								?> 
							</div>

							<div class="video">
					  			<?php the_sub_field('entry_video'); ?>
					  		</div>

					  		

					  		
					  </article>


					



				<?php endwhile; 
				endif; ?>

		<?php endwhile;
		wp_reset_postdata(); ?>

	<?php endif; ?>


</section>

</div>
</div>