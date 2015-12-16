<div class="author-bio row">

						<?php if(function_exists('get_avatar')) { ?>
							<div class="hide-for-small-only medium-2 columns author-avatar small-text-center">

								<?php echo get_avatar($post->post_author, 50); ?>
							</div>
							<div class="small-12 medium-10 columns author-bio-text">
							<?php } else { ?>

							<div class="small-12 medium-12 columns author-bio-text">

							<?php } ?>
					

						
							<strong>About the Author:</strong> <br>

							<h4 class="left small-text-center">

							<?php if( get_field('contributor_bio')) { ?>
							
								<?php the_field('contributor_name'); ?>

							<?php } elseif( get_field('contributor_name') || get_field('Byline') || !empty($contributor_bio)) { 

								echo '';

							?>

							<?php } else {  

						 		//echo the_author_posts_link(); 
						
								the_author();
							?>

							<?php } ?>
						</h4>

						<?php if ( get_field('contributor_bio') || get_field( 'contributor_name') || get_field('contributor_email') ) { ?>

							<?php the_field('contributor_email'); ?>

							<?php } else { ?>


							<ul class="icons right">
								<?php 
									$email = get_the_author_meta( 'user_email' );
									if ( $email && $email != '' ) {
										echo '<li class="email left"><a href="mailto:' . $email . '"><i class="fi-mail"></i></a></li>';
									}

									$rss_url = get_the_author_meta( 'rss_url' );
									if ( $rss_url && $rss_url != '' ) {
										echo '<li class="rss left"><a href="' . esc_url($rss_url) . '"><i class="fi-rss"></i></a></li>';
									}
													
									$google_profile = get_the_author_meta( 'google_profile' );
									if ( $google_profile && $google_profile != '' ) {
										echo '<li class="google left"><a href="' . esc_url($google_profile) . '" rel="author"><i class="fi-social-google-plus medium"></i></a></li>';
									}
													
									$twitter_profile = get_the_author_meta( 'twitter_profile' );
									if ( $twitter_profile && $twitter_profile != '' ) {
										echo '<li class="twitter left"><a href="' . esc_url($twitter_profile) . '"><i class="fi-social-twitter medium"></i></a></li>';
									}
													
									$facebook_profile = get_the_author_meta( 'facebook_profile' );
									if ( $facebook_profile && $facebook_profile != '' ) {
										echo '<li class="facebook left"><a href="' . esc_url($facebook_profile) . '"><i class="fi-social-facebook medium"></i></a></li>';
									}
													
									$linkedin_profile = get_the_author_meta( 'linkedin_profile' );
									if ( $linkedin_profile && $linkedin_profile != '' ) {
									       echo '<li class="linkedin left"><a href="' . esc_url($linkedin_profile) . '"><i class="fi-social-linkedin medium"></i></a></li>';
									}
								?>
							</ul>

							<?php } ?>

						<?php 

						$contributor_bio = get_field('contributor_bio');

						if ( get_field('contributor_bio')) { 
						
							the_field('contributor_bio'); 

				
							} elseif( get_field('contributor_name') || get_field('Byline') || !empty($contributor_bio)) { 

								echo '';
							
							} else { ?>

						<p><?php echo get_the_author_meta('description'); ?></p>

						<?php } ?>
					</div>
				</div>