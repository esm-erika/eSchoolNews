<div id="rules" class="row">
				<div class="small-12 medium-10 medium-centered columns">

<h4>2016 Collaboration Nation Award Program</h4>

<?php if(get_field('rules_pdf')) : ?>
	
	<a class="download-rules" href="<?php the_field('rules_pdf'); ?>">Download Official Rules</a>

<?php endif; ?>

<div class="content">
	<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		//
		the_content();
		//
	} // end while
} // end if
?>
</div>

</div>
</div>