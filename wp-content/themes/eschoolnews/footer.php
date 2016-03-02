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

</div>

<div class="row">
<?php if ($astused > 0){ ?>
    <div class="medium-12 columns ad-container">
        <?php get_template_part( 'parts/ads/ercbottom' ); ?>
    </div>
<?php } ?>
	<div class="medium-12 columns ad-container">

     <?php 
	 if ( is_singular( array( 'post', 'ercs' ) )){
		get_template_part( 'parts/ads/anchorboard' );
	 } else if ( is_singular( array( 'webinars', 'whitepapers', 'special-reports' ) )){
			//display none
		} else {
		 get_template_part( 'parts/ads/anchorboard' );
	 }
	 ?>   

		

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

</div>
</div>
<a class="exit-off-canvas"></a>

</div>
<?php do_action( 'foundationpress_layout_end' ); ?>





<?php wp_footer(); ?>

<?php do_action( 'foundationpress_before_closing_body' ); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-2806543-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>
