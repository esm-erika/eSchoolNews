<?php
/**
 * @package eSchool Media Logging
 * @author Vince Carlson
 * @version 1.0
 */
/*
Plugin Name: eSchool News Page Ads 
Plugin URI: http://www.eschoolnews.com/#
Description: This plugin adds ads to pages on the site that are in wordpress.
Author: Vince Carlson
Version: 9.9.9
Author URI: http://www.eschoolnews.com
*/

//	This function scans the template files of the active theme, 
//	and returns an array of [Template Name => {file}.php]
if(!function_exists('get_esmad_templates')) {
function get_esmad_templates() {
	$themes = get_themes();
	$theme = get_current_theme();
	$templates = $themes[$theme]['Template Files'];
	$post_templates = array();

	foreach ((array)$templates as $template) {
		$template_data = implode('', file(WP_CONTENT_DIR.$template));

		$name = '';
		if(preg_match('|Ad Template:(.*)$|mi', $template_data, $name))
			$name = $name[1];

		if(!empty($name)) {
			if(basename($template) != basename(__FILE__))
				$post_templates[trim($name)] = basename($template);
		}
	}

	return $post_templates;
}}

//	build the dropdown items
if(!function_exists('post_esmad_dropdown')) {
function post_esmad_dropdown() {
	global $post;
	$post_templates = get_esmad_templates();
	
	foreach ($post_templates as $template_name => $template_file) { //loop through templates, make them options
		if ($template_file == get_post_meta($post->ID, '_wp_esmad_template', true)) { $selected = ' selected="selected"'; } else { $selected = ''; }
		$opt = '<option value="' . $template_file . '"' . $selected . '>' . $template_name . '</option>';
		echo $opt;
	}
}}

//	Filter the single template value, and replace it with
//	the template chosen by the user, if they chose one.
// this replavces the template !!!!!!!!!!!!         add_filter('single_template', 'get_esmad_template');



if(!function_exists('get_esmad_template')) {
function get_esmad_template($template) {
	global $post;
	
	$custom_field = get_post_meta($post->ID, '_wp_esmad_template', true);
	if(!empty($custom_field) && file_exists(TEMPLATEPATH . "/{$custom_field}")) { 
		include( TEMPLATEPATH . "/$custom_field" ); 
		
	}
	
}}

add_action('wp_head', 'get_esmad_template');

//	Everything below this is for adding the extra box
//	to the post edit screen so the user can choose a template

//	Adds a custom section to the Post edit screen
add_action('admin_menu', 'esmad_add_custom_box');
function esmad_add_custom_box() {
	if(get_esmad_templates() && function_exists( 'add_meta_box' )) {
		add_meta_box( 'esmad_post_templates', __( 'Ad Template', 'esmad' ), 
			'esmad_inner_custom_box', 'post', 'normal', 'high' ); //add the boxes under the post
	}
}
   
//	Prints the inner fields for the custom post/page section
function esmad_inner_custom_box() {
	global $post;
	// Use nonce for verification
	echo '<input type="hidden" name="esmad_noncename" id="esmad_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	// The actual fields for data entry
	echo '<label class="hidden" for="esmad_template">' . __("Ad Template", 'esmad' ) . '</label><br />';
	echo '<select name="_wp_esmad_template" id="esmad_template" class="dropdown">';
	echo '<option value="">Default</option>';
	post_esmad_dropdown(); //get the options
	echo '</select><br /><br />';
	echo '<p>' . __("Some post require they always have custom ads. If there are ones available, you'll see them above.", 'esmad' ) . '</p><br />';
}

//	When the post is saved, saves our custom data
add_action('save_post', 'esmad_save_postdata', 1, 2); // save the custom fields
function esmad_save_postdata($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['esmad_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post->ID ))
		return $post->ID;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	}

	// OK, we're authenticated: we need to find and save the data
	
	// We'll put the data into an array to make it easier to loop though and save
	$mydata['_wp_esmad_template'] = $_POST['_wp_esmad_template'];
	// Add values of $mydata as custom fields
	foreach ($mydata as $key => $value) { //Let's cycle through the $mydata array!
		if( $post->post_type == 'revision' ) return; //don't store custom data twice
		$value = implode(',', (array)$value); //if $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { //if the custom field already has a value...
			update_post_meta($post->ID, $key, $value); //...then just update the data
		} else { //if the custom field doesn't have a value...
			add_post_meta($post->ID, $key, $value);//...then add the data
		}
		if(!$value) delete_post_meta($post->ID, $key); //and delete if blank
	}
}
?>