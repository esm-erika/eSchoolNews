<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "off-canvas-wrap" div and all content after.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0.0
 */

?>

</section>

<section id="publications">

	<div class="row sites">
	<h5 class="columns">Our Web Sites</h5>
	<?php dynamic_sidebar( 'sites-widgets' ); ?>

	</div>
	
	<?php do_action( 'foundationpress_before_footer' ); ?>
	<div class="row newsletters">

	<h5 class="columns">Principal Newsletters</h5>
	<?php dynamic_sidebar( 'publication-widgets' ); ?>
</div>
	<?php do_action( 'foundationpress_after_footer' ); ?>
	
</section>

<footer class="container">
	<div class="row">
	<?php do_action( 'foundationpress_before_footer' ); ?>
	<?php dynamic_sidebar( 'footer-widgets' ); ?>
	<?php do_action( 'foundationpress_after_footer' ); ?>
</div>
<div class="row copyright">
	<div class="small-12 large-6 columns small-text-center large-text-left">
		© Copyright 2015 eSchoolMedia & eSchool News. All Rights Reserved.
	</div>
	<div class="small-12 large-6 columns text-right small-text-center large-text-right">
		7920 Norfolk Ave, Suite 900, Bethesda, MD 20814 | 1-800-394-0115
	</div>
</div>
</footer>
<!-- <section id="sites">
	
</section> -->
<a class="exit-off-canvas"></a>

	<?php do_action( 'foundationpress_layout_end' ); ?>
	</div>
</div>
<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>


<script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/slick/slick.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
      $('.featured-article').slick();
    });
  </script>

</body>
</html>
