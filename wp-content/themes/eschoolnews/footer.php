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
<?php if ($astused > 0){ ?>
    <div class="ad-container">
        <?php get_template_part( 'parts/ads/ercbottom' ); ?>
    </div>
<?php } ?>
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

</div>
<a class="exit-off-canvas"></a>

</div>
<?php do_action( 'foundationpress_layout_end' ); ?>





<?php wp_footer(); ?>
<?php do_action( 'foundationpress_before_closing_body' ); ?>

<script>
$(document).ready(function(){
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();	
	$("#all").click(function(){
        $("div.row.all").show();
		$("h4#AllTitle").show();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();		
		
    });

	$("#curriculum").click(function(){
		$("div.row.digital-whitepapers").hide();
		$("div.row.technologies-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").hide();
        $("div.row.curriculum-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").show();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();		

    });

	$("#digital").click(function(){
        $("div.row.curriculum-whitepapers").hide();
		$("div.row.technologies-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").hide();
		$("div.row.digital-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").show();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();		

    });

	$("#mobile").click(function(){
        $("div.row.curriculum-whitepapers").hide();
		$("div.row.digital-whitepapers").hide();
		$("div.row.technologies-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").show();
		$("h4#TechnologiesTitle").hide();		

    });	
    
	$("#technologies").click(function(){
        $("div.row.curriculum-whitepapers").hide();
		$("div.row.digital-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").hide();
		$("div.row.technologies-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").show();		

    });
});
</script>

</body>
</html>
