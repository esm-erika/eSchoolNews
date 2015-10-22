
<?php 

			$image = get_field('sponsored_by');

			if( !empty($image) ): ?>
			<article id="sponsored-by">

				<div class="small-caps">Webinar Sponsored By:</div>

	

<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />


</article>

<?php endif; ?>
