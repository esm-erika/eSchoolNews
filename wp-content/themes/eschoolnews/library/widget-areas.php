<?php
/**
 * Register widget areas
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

if ( ! function_exists( 'foundationpress_sidebar_widgets' ) ) :
function foundationpress_sidebar_widgets() {
	register_sidebar(array(
	  'id' => 'sidebar-widgets',
	  'name' => __( 'Sidebar widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this sidebar container.', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
	  'after_widget' => '</div></article>',
	  'before_title' => '<h3 class="section-title"><span>',
	  'after_title' => '</span></h3>',
	));

	register_sidebar(array(
	  'id' => 'footer-widgets',
	  'name' => __( 'Footer widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to this footer container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="large-3 columns widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h5>',
	  'after_title' => '</h5>',
	));

	register_sidebar(array(
	  'id' => 'publication-widgets',
	  'name' => __( 'Publication widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to publications container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="small-6 medium-3 columns widget %2$s"><a href="#" data-reveal-id="subscribe-drop">',
	  'after_widget' => '</a></article>',
	  'before_title' => '<h5 style="display: none;">',
	  'after_title' => '</h5>',
	));

	register_sidebar(array(
	  'id' => 'sites-widgets',
	  'name' => __( 'Sites widgets', 'foundationpress' ),
	  'description' => __( 'Drag widgets to sites container', 'foundationpress' ),
	  'before_widget' => '<article id="%1$s" class="small-12 medium-3 columns widget %2$s">',
	  'after_widget' => '</article>',
	  'before_title' => '<h5 style="display: none;">',
	  'after_title' => '</h5>',
	));


}

add_action( 'widgets_init', 'foundationpress_sidebar_widgets' );
endif;
?>
