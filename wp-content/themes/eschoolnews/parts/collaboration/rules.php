<div id="rules" class="row">
				<div class="small-12 medium-10 medium-centered columns">

<h4>2016 Collaboration Nation Award Program</h4>

<?php 

$file = get_field('rules_pdf');

if( $file ): ?>
	
	<a class="download-rules" href="<?php echo $file['url']; ?>">Download Official Rules</a>

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