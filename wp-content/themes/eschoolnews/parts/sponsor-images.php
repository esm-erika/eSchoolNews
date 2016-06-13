<?php 

			$taxonomy = 'sponsor';
			$terms = get_the_terms( $post->ID, $taxonomy);
			$term_id = $terms[0]->term_id;

			$image = get_field('sponsor_image', $taxonomy . '_' . $term_id);
			
			if( !empty($image) ): ?>

				
					<div class="sponsored">

						<small>Sponsored By:</small><br>

						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

					</div>

				

			<?php endif; ?>