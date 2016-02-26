				
				
				<div class="row">
				<div class="small-12 medium-10 medium-centered columns">

					<section id="recent-entries">

					<h2 class="text-center">2016 Entries</h2>

					<?php

					// check if the repeater field has rows of data
					if( have_rows('video_section') ):

					 	// loop through the rows of data
					    while ( have_rows('video_section') ) : the_row(); ?>
					
					<h4><?php the_title(); ?></h4>

					<?php 

					$args2 = array(
						'post_type' => 'collabnation',
						'order' => 'ASC',
						'tax_query' => array(
							array(
							'taxonomy' => 'years',
							'field' => 'slug',
							'terms' => '2016',

								),

							),

					); 

					$entries = new WP_Query($args2); ?>

					<div class="entries">

					<?php if ( $entries->have_posts() ) : ?>

					<?php while ( $entries->have_posts() ) : $entries->the_post(); ?>

					  <div>

					  	<div class="video">

					  		<?php 

							$image = get_sub_field('entry_video');

							if( !empty($image) ): ?>

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endif; ?>
					  		
					  	</div>

					  	<h6 class="text-center"><a href="<?php the_permalink(); ?>"><?php the_sub_field('entry_title'); ?></a></h6>

					  	
					  	
					  </div>

					<?php endwhile; 
				wp_reset_postdata(); ?>

				<?php endif; ?>


					</div> 

					<?php

					endwhile;

					else :

					endif;

					?>
				</section>

				<?php 

					$args = array(
						'post_type' => 'collabnation',
						'order' => 'ASC',
						'meta_query' => array(
							array(
								'key' => 'entry_winner',
								'value' => '1',
								'compare' => '=='
								)
							),
						'tax_query' => array(
							array(
							'taxonomy' => 'years',
							'field' => 'slug',
							'terms' => '2015',

								),

							),

					); 

					$the_query = new WP_Query($args); ?>

				<h4>Congratulations to Our 2015 Winners</h4>

				<?php if ( $the_query->have_posts() ) : ?>

				<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

				<article>
					<h6>
						<?php if(get_field('external_link')){ ?> 
						
						<a href="<?php the_field('external_link'); ?>"><?php the_title(); ?> &mdash; <?php the_field('award_name'); ?></a>

						<?php } else { ?>

						<a href="<?php the_permalink(); ?>"><?php the_title(); ?> &mdash; <?php the_field('award_name'); ?></a>

						<?php } ?>
					</h6>
					<div class="content">
						<?php 
						// echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 50, $more = '&hellip;' ), true); 
						the_content();
						?> 
					</div>

					



					<?php if( get_field('entry_video')){ ?>

					  	<iframe width="420" height="315" src="https://www.youtube.com/embed/<?php the_field('entry_video') ?>" frameborder="0" allowfullscreen></iframe>

					<?php } ?>

				</article>

				<?php endwhile; 
				wp_reset_postdata(); ?>

				<!-- pagination here -->

				<?php endif; ?>


				

			</div>
		</div>


