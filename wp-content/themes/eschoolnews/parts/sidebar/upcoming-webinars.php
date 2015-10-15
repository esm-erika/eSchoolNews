<h3 class="section-title"><span>Upcoming Webinars</span></h3>

<?php // The Query
				$upcoming = array(
					'post_type' => 'webinars',
					'tax_query' => array(
						array(

							'taxonomy' => 'status-webinars',
							'field' => 'slug',
							'terms' => 'upcoming-webinars',

							),

						),

					);


				$query = new WP_Query( $upcoming );
				
				
				while ( $query->have_posts() ) :
					$query->the_post(); ?>


				<div class="row">
					<div class="large-12 columns">
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<p><?php 
				$showdate = DateTime::createFromFormat('Ymd', get_field('webinar_date'));
				if($showdate){ echo $showdate -> format('F d, Y');} ?></p>
                         
                        
					</div>
				</div>
					
					<?php endwhile; 
				wp_reset_postdata(); ?>