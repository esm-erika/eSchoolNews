<?php
/**
 * Custom Post Types
 *
 */

/*===================================================================================
 * White Papers
 * =================================================================================*/

add_action('init', 'whitepaper_register');
 
function whitepaper_register() {
 
	$labels = array(
		'name' => _x('White Papers', 'post type general name'),
		'singular_name' => _x('White Paper', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New White Paper'),
		'edit_item' => __('Edit White Paper'),
		'new_item' => __('New White Paper'),
		'view_item' => __('View White Paper'),
		'search_items' => __('Search White Papers'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'whitepaper' , $args );
} 


/*===================================================================================
 * Education Resource Center
 * =================================================================================*/

add_action('init', 'erc_register');
 
function erc_register() {
 
	$labels = array(
		'name' => _x('ERCs', 'post type general name'),
		'singular_name' => _x('ERC', 'post type singular name'),
		'add_new' => _x('Add New', 'portfolio item'),
		'add_new_item' => __('Add New ERC'),
		'edit_item' => __('Edit ERC'),
		'new_item' => __('New ERC'),
		'view_item' => __('View ERC'),
		'search_items' => __('Search ERCs'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);
 
	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => get_stylesheet_directory_uri() . '/article16.png',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'erc' , $args );
} 

?>