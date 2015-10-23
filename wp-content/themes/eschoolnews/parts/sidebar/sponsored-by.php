
<?php 

			$image = get_field('sponsored_by');

			if( !empty($image) ): ?>
			<article id="sponsored-by">

				<p class="small-caps">Webinar Sponsored By:</p>

	

<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />


</article>

<?php endif; ?>
