<?php 

					$args = array(
						'post_type' => 'judges',
						'order' => 'ASC',
						'tax_query' => array(
							array(
							'taxonomy' => 'years',
							'field' => 'slug',
							'terms' => '2016',

								),

							),

					); 

					$the_query = new WP_Query($args); ?>

					<div class="row" id="judges">
						<div class="small-12 medium-10 medium-centered columns">

					<?php if ( $the_query->have_posts() ) : ?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			
				<article>
					<div class="row">
					<div class="small-12 medium-3 columns">
						<?php the_post_thumbnail('medium-portrait'); ?>
					</div>
					<div class="small-12 medium-9 columns">

					<h5><?php the_title(); ?></h5>
					<h5><?php the_field('judge_title') ?></h5>
					<div class="content">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
				</article>

				<?php endwhile; 
				wp_reset_postdata(); ?>

				<!-- pagination here -->

				<?php endif; ?>
			</div>

		</div>
	</div>


