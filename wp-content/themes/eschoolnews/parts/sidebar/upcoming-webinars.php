<article>
<h4>Webinars</h4>
<br/>
<?php // The Query
				$upcoming = array(
					'post_type' => 'webinars',
					'posts_per_page' => '5',
					'tax_query' => array(
						array(

							'taxonomy' => 'status-webinars',
							'field' => 'slug',
							'terms' => 'archived-webinars',

							),

						),

					);


				$query = new WP_Query( $upcoming );
				
				
				while ( $query->have_posts() ) :
					$query->the_post(); ?>


				<div class="row">
					<div class="large-12 columns">
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<p class="date"><?php 
				$showdate = DateTime::createFromFormat('Ymd', get_field('webinar_date'));
				if($showdate){ echo $showdate -> format('F d, Y');} ?></p>
                         
                        
					</div>
				</div>
					
					<?php endwhile; 
				wp_reset_postdata(); ?>

				<h6 class="readmore"><a href="<?php site_url(); ?>/webinars">See more Webinars &raquo;</a></h6>
			</article>