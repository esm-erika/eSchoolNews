<?php
/**
 * Custom Post Types
 *
 */

/*===================================================================================
 * Education Resource Center
 * =================================================================================*/

add_action('init', 'erc_register');
 
function erc_register() {
 
	$labels = array(
		'name' => _x('Educator Resource Center', 'post type general name'),
		'singular_name' => _x('ERC', 'post type singular name'),
		'menu_name' => _x('ERCs', 'menu name'),
		'add_new' => _x('Add New', 'erc item'),
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
		'menu_icon' => 'dashicons-welcome-learn-more',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'taxonomies' => array('post_tag'),
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'ercs' , $args );

	// register_taxonomy("status", array("ercs"), array("hierarchical" => true, "label" => "Status", "singular_label" => "Status", "rewrite" => true));
	register_taxonomy("sponsor", array("ercs"), array("hierarchical" => true, "label" => "Sponsors", "singular_label" => "Sponsor", "rewrite" => true));
} 


add_action( 'init', 'ercs_items_register' );

function ercs_items_register() {
        register_post_type( 'ercitems', array(
                'labels' => array(
                        'name' => 'ERC Items',
                        'singular_name' => 'ERC Item',
                ),
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => 'edit.php?post_type=ercs',
                'supports' => array( 'title' ,'thumbnail', 'editor' ),
        ) );
}

/*===================================================================================
 * White Papers
 * =================================================================================*/

add_action('init', 'whitepaper_register');
 
function whitepaper_register() {
 
	$labels = array(
		'name' => _x('White Papers', 'post type general name'),
		'singular_name' => _x('White Paper', 'post type singular name'),
		'add_new' => _x('Add New', 'whitepaper item'),
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
		'menu_icon' => 'dashicons-media-default',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'taxonomies' => array('post_tag', 'sponsor'),
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'whitepapers' , $args );

	//register_taxonomy("company_categories", array("whitepapers"), array("hierarchical" => true, "label" => "Companies", "singular_label" => "Company", "rewrite" => true));
	register_taxonomy("subject_categories", array("whitepapers"), array("hierarchical" => true, "label" => "Subjects", "singular_label" => "Subject", "rewrite" => true));

} 

/*===================================================================================
 * Webinars
 * =================================================================================*/

add_action('init', 'webinar_register');
 
function webinar_register() {
 
	$labels = array(
		'name' => _x('Webinars', 'post type general name'),
		'singular_name' => _x('Webinar', 'post type singular name'),
		'add_new' => _x('Add New', 'webinar item'),
		'add_new_item' => __('Add New Webinar'),
		'edit_item' => __('Edit Webinar'),
		'new_item' => __('New Webinar'),
		'view_item' => __('View Webinar'),
		'search_items' => __('Search Webinars'),
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
		'menu_icon' => 'dashicons-format-video',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'taxonomies' => array('post_tag'),
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'webinars' , $args );

	register_taxonomy("status-webinars", array("webinars"), array("hierarchical" => true, "label" => "Status", "singular_label" => "Status", "rewrite" => true));

} 


/*===================================================================================
 * Special Reports
 * =================================================================================*/

add_action('init', 'specialreports_register');
 
function specialreports_register() {
 
	$labels = array(
		'name' => _x('Special Reports', 'post type general name'),
		'singular_name' => _x('Special Report', 'post type singular name'),
		'add_new' => _x('Add New', 'webinar item'),
		'add_new_item' => __('Add New Report'),
		'edit_item' => __('Edit Report'),
		'new_item' => __('New Report'),
		'view_item' => __('View Report'),
		'search_items' => __('Search Special Reports'),
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
		'menu_icon' => 'dashicons-megaphone',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'taxonomies' => array('post_tag'),
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'special-reports' , $args );
} 


/*===================================================================================
 * Events
 * =================================================================================*/

add_action('init', 'events_register');
 
function events_register() {
 
	$labels = array(
		'name' => _x('Events', 'post type general name'),
		'singular_name' => _x('Event', 'post type singular name'),
		'add_new' => _x('Add New', 'webinar item'),
		'add_new_item' => __('Add New Event'),
		'edit_item' => __('Edit Event'),
		'new_item' => __('New Event'),
		'view_item' => __('View Event'),
		'search_items' => __('Search Eventss'),
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
		'menu_icon' => 'dashicons-tickets-alt',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'events' , $args );

	register_taxonomy("conferences", array("events"), array("hierarchical" => true, "label" => "Conferences", "singular_label" => "Conference", "rewrite" => true));

} 


/*===================================================================================
 * Newsletter Builder
 * =================================================================================*/

add_action('init', 'newsletter_register');
 
function newsletter_register() {
 
	$labels = array(
		'name' => _x('Newsletters', 'post type general name'),
		'singular_name' => _x('Issue', 'post type singular name'),
		'add_new' => _x('Add New', 'newsletter issue'),
		'add_new_item' => __('Add New Issue'),
		'edit_item' => __('Edit Issue'),
		'new_item' => __('New Issue'),
		'view_item' => __('View Issue'),
		'search_items' => __('Search Issues'),
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
		'menu_icon' => 'dashicons-layout',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'newsletter' , $args );

	register_taxonomy("publications", array("newsletter"), array("hierarchical" => true, "label" => "Publications", "singular_label" => "Publication", "rewrite" => true));

}

add_action( 'init', 'newsletter_items_register' );

function newsletter_items_register() {
        register_post_type( 'newsletteritems', array(
                'labels' => array(
                        'name' => 'Custom Items',
                        'singular_name' => 'Custom Item',
                ),
                'public' => true,
                'show_ui' => true,
                'show_in_menu' => 'edit.php?post_type=newsletter',
                'supports' => array( 'title' ,'thumbnail', 'editor' ),
        ) );
}


/*===================================================================================
 * Symposium 
 * =================================================================================*/

add_action('init', 'symposium_register');
 
function symposium_register() {
 
	$labels = array(
		'name' => _x('Symposium', 'post type general name'),
		'singular_name' => _x('Symposium', 'post type singular name'),
		'add_new' => _x('Add New', 'newsletter issue'),
		'add_new_item' => __('Add New Symposium'),
		'edit_item' => __('Edit Symposium'),
		'new_item' => __('New Symposium'),
		'view_item' => __('View Symposium'),
		'search_items' => __('Search Symposiums'),
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
		'menu_icon' => 'dashicons-networking',
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail')
	  ); 
 
	register_post_type( 'symposiums' , $args );

	//register_taxonomy("subjects", array("symposiums"), array("hierarchical" => true, "label" => "Symposium Subjects", "singular_label" => "Symposium Subject", "rewrite" => true, 'show_in_menu' => true));

}

add_action( 'init', 'symposium_entry_register' );

function symposium_entry_register() {
        register_post_type( 'entry', array(
                'labels' => array(
                        'name' => 'Entries',
                        'singular_name' => 'Symposium Entry',
                ),
                'public' => true,
                'show_ui' => true,
                'hierarchical' => true,
                'rewrite' => array('slug' => 'entry', 'with_front' => true),
                'show_in_menu' => 'edit.php?post_type=symposiums',
                'supports' => array( 'title' ,'thumbnail', 'editor', 'page-attributes' ),
        ) );

        flush_rewrite_rules();
}

?>