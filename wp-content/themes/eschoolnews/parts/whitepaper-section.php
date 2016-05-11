<?php
/**
 * Template part for Tertiary Stories
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */
$whitepapersection = 0;

?>

<h1 class="section-title"><span><div class="icon whitepapers"></div> White Papers</span></h1>

<?php

				// The Query
$args = array(
	'post_type' => 'whitepapers',
	'posts_per_page' => '6'
	);

	$query = new WP_Query( $args ); ?>

	<ul class="small-block-grid-1 medium-block-grid-2" >


				<?php // The Loop
				while ( $query->have_posts() ) :
					$query->the_post(); ?>

				
					
				

				<li data-equalizer><div class="panel" data-equalizer-watch>

				<header style="margin-bottom:8px;" class="row collapse">



					<?php 

					if (has_post_thumbnail()) { ?>

					<div class="small-12 medium-3 columns">

						<div class="hide-for-small-only">
							<?php the_post_thumbnail('medium-portrait'); ?>
						</div>

					</div>

					<div class="small-12 medium-9 columns">
						<div class="row">
							<div class="small-12 columns">



								<?php }else{ ?>

								<div class="small-12 columns">
									<div class="row collapse">
										<div class="small-12 columns">

											<?php } ?>


											<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
											<div class="posted-on"><?php the_time('F j, Y'); ?></div>
											<hr/>








											
										</div>
										<br/>


										<?php //endif; ?>


										<?php
										$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);

										if ( esm_is_user_logged_in() and !$WPForm > 0) { ?>

										<?php 

							// $post_date = strtotime( the_date( 'Y-m-d', '', '', false ) );
							// $cutoff_date = strtotime( '2016-04-27' ); 

							// if( $post_date < $cutoff_date ) {

										?>

										<?php 

										$posts = get_field('pdf_select');

										if( $posts ) { ?>

										<?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
										<?php setup_postdata($post); ?>

										<div class="text-center">
											<a class="button radius" target="_blank" href="<?php the_permalink(); ?>">View Now</a>
										</div>

									<?php endforeach; ?>

									<?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>

									<?php } else { ?>



									<div class="text-center">
										<a class="button medium radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit">View Now</a>
									</div>

									<?php } ?>


									<?php } else { // not logged in ?>

									<div class="text-center">
										<a href="#" class="button medium radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">View Now</a>
									</div>
									<?php get_template_part( 'parts/whitepapers-modal' ); ?>


									<?php } ?>




								</header>

								<div class="row">
									<div class="small-12 columns">

										<p class="excerpt">
											<?php 
											echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); 
							//the_content();

											echo ' <a href="' .get_permalink(). '">';
											echo 'Read More';
											echo '</a>';
											?>
										</p>



										<div class="row sponsored">
											<div class="small-12 columns">

												<small><strong>Sponsored by:</strong></small><br>


												<?php 

												$product_terms = wp_get_object_terms( $post->ID,  'sponsor', $args );

												if ( ! empty( $product_terms ) ) {
													if ( ! is_wp_error( $product_terms ) ) {
														echo '<ul class="small-block-grid-2 medium-block-grid-4">';
														foreach( $product_terms as $term ) { ?>



														<?php 
														$taxonomy = 'sponsor';
														$term_id = $term->term_id; 
														$image = get_field('sponsor_image', $taxonomy . '_' . $term_id);

														?>

														<li>

															<div class="responsive-container">
																<div class="dummy"></div>
																<div class="img-container">
																	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
																</div>
															</div>
														</li>

														

														<?php }
														echo '</ul>';

													}
												} ?>




											</div>
										</div>





									</div>
								</div>



							</div> </li>

							



						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>

						</ul>