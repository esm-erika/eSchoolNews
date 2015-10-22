<?php if( have_rows('webinar_speakers') ): ?>

	<article>

		<h4>Meet Your Speakers</h4>
		<br/>

		<ul class="medium-block-grid-2">

			<?php while( have_rows('speakers') ): the_row(); 

				// vars
			$photo = get_sub_field('speaker_photo');
			$name = get_sub_field('speaker_name');
			$title = get_sub_field('speaker_title');
			$organization = get_sub_field('speaker_organization');
			$bio = get_sub_field('speaker_bio');

			?>

			<li class="speaker text-center">

				<?php if( $photo ): ?>	
				<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" />
			<?php endif; ?>

			<?php if( $name ): ?>
			<h6><?php echo $name; ?></h6>
		<?php endif; ?>
		<?php if( $title ): ?>
		<div><?php echo $title; ?></div>
	<?php endif; ?>
	<?php if( $name ): ?>
	<div><em><?php echo $organization; ?></em></div>
<?php endif; ?>
<?php if( $bio): ?>
	<a href="#" style="margin-top: .5rem;" class="button radius tiny" data-reveal-id="<?php echo $name; ?>">Speaker Bio</a>

	<div id="<?php echo $name; ?>" class="reveal-modal" data-reveal aria-labelledby="<?php echo $name; ?>" aria-hidden="true" role="dialog">
		<div class="row">
			<div class="small-12 medium-4">
				<?php if( $photo ): ?>	
				<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" />
			<?php endif; ?>

			<?php if( $name ): ?>
			<h6><?php echo $name; ?></h6>
		<?php endif; ?>
		<?php if( $title ): ?>
		<div><?php echo $title; ?></div>
	<?php endif; ?>
	<?php if( $name ): ?>
	<div><em><?php echo $organization; ?></em></div>
<?php endif; ?>
</div>
<div class="small-12 medium-8 columns">
	<?php if( $bio): ?>
	<div class="bio">
		<?php echo $bio; ?>
	</div>
<?php endif; ?>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
<?php endif; ?>


</li>

<?php endwhile; ?>

</ul>

<?php endif; ?>
</article>