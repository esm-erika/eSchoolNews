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
<div class="row">
	<div class="ad-container">
		<?php get_template_part( 'parts/ads/ercbottom' ); ?>
	</div>
	<div class="ad-container">
		<?php get_template_part( 'parts/ads/anchorboard' ); ?>
	</div>
</div>



<section id="publications">

	<div class="row sites">
		<h5 class="columns">Our Web Sites</h5>
		<?php dynamic_sidebar( 'sites-widgets' ); ?>
	</div>
	
	<?php do_action( 'foundationpress_before_footer' ); ?>
	<div class="row newsletters">

		<h5 class="columns">Newsletters</h5>
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
			&copy; Copyright <?php echo date("Y") ?> eSchoolMedia &amp; eSchool News. All Rights Reserved.
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

<!-- <script type="text/javascript" src="<?php //echo get_stylesheet_directory_uri(); ?>/slick/slick.min.js"></script>

<script type="text/javascript">
$(document).ready(function(){
  $('.featured-slick').slick({
  	adaptiveHeight: true
  });
});
</script> -->

<script>
$(document).foundation('offcanvas', 'reflow');
</script>

</body>
</html>
