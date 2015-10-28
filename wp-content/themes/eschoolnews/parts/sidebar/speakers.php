<?php if( have_rows('speakers') ): ?>

	<article>

		<h4>Meet Your Speakers</h4>
		<br/>

		<ul>


			<?php while( have_rows('speakers') ): the_row(); 

				// vars
			$photo = get_sub_field('speaker_photo');
			$firstname = get_sub_field('first_name');
			$lastname = get_sub_field('first_name');
			$title = get_sub_field('speaker_title');
			$organization = get_sub_field('speaker_organization');
			$bio = get_sub_field('speaker_bio');

			?>

			<li class="row speaker">

				

			<?php if( $photo ): ?>	
			<div class="medium-5 columns">
				<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" />
			</div>
			<div class="medium-7 columns">
			<?php endif; ?>

			<?php if( ! $photo ): ?>	
				<div class="medium-12 columns">
			<?php endif; ?>

			
			<h6><?php echo $firstname; ?> <?php echo $lastname; ?></h6>
		

		<?php if( $title ): ?>
		<div><?php echo $title; ?></div>
	<?php endif; ?>
	<?php if( $name ): ?>
	<div><em><?php echo $organization; ?></em></div>
<?php endif; ?>
<?php if( $bio): ?>
	<a href="#" style="margin-top: .5rem;" class="button radius tiny" data-reveal-id="<?php echo $firstname; ?>-<?php echo $lastname; ?>">Speaker Bio</a>

	<div id="<?php echo $firstname; ?>-<?php echo $lastname; ?>" class="reveal-modal" data-reveal aria-labelledby="<?php echo $name; ?>" aria-hidden="true" role="dialog">
		<div class="row">
			<div class="small-12 medium-4 columns">
				<?php if( $photo ): ?>	
				<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" />
			<?php endif; ?>
			</div>

		<div class="small-12 medium-8 columns">

			<h2><?php echo $firstname; ?> <?php echo $lastname; ?></h2>
		
		<?php if( $title ): ?>
		<div><?php echo $title; ?></div>
	<?php endif; ?>
	<?php if( $name ): ?>
	<div><em><?php echo $organization; ?></em></div>
<?php endif; ?>

	<?php if( $bio): ?>
	<hr/>
	<div class="bio">
		<?php echo $bio; ?>
	</div>
<?php endif; ?>
</div>
<?php endif; ?>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>

</div>
</li>

<?php endwhile; ?>


<?php endif; ?>

</ul>
</article>