<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<aside id="sidebar" class="small-12 large-4 columns">
	
	<!-- <div class="box-ad"><img  src="<?php echo get_stylesheet_directory_uri(); ?>/assets/img/sample-ad.png"/></div> -->

	<?php do_action( 'foundationpress_before_sidebar' ); ?>


	<article id="text-2" class="row widget widget_text"><div class="small-12 columns"><h3 class="section-title"><span>White Papers By Company</span></h3>			<div class="textwidget">
    


<?php 
		 
 	     $args = array(
         	  'orderby' => 'name',
	          'show_count' => 0,
        	  'pad_counts' => 0,
	          'hierarchical' => 1,
        	  'taxonomy' => 'company_categories', 
        	  'title_li' => '',
			  'hide_empty' => 0,
			  'style' => 'none',
			  
        	);

	     wp_list_categories( $args );

 ?>

</div>
		</div></article>	
	<?php // dynamic_sidebar( 'sidebar-widgets' ); ?>
	<?php do_action( 'foundationpress_after_sidebar' ); ?>
</aside>