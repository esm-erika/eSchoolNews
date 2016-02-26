<div class="row">
	<div class="small-12 medium-10 medium-centered columns">


		<section id="recent-entries">

					<h2 class="text-center">2016 Entries</h2>

					<?php

					// check if the repeater field has rows of data
					if( have_rows('video_section') ):

					 	// loop through the rows of data
					    while ( have_rows('video_section') ) : the_row(); ?>

						
						<?php 

							$image = get_sub_field('entry_video');

							if( !empty($image) ): ?>

								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

							<?php endif; ?>



					<?php

						endwhile;

						else :

						endif;

					?>
				</section>

	</div>
</div>