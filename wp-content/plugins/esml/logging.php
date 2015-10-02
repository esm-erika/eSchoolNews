<?php
/**
 * @package eSchool Media Logging
 * @author Vince Carlson
 * @version 2.0
 */
/*
Plugin Name: eSchool News Site Logs
Plugin URI: http://www.eschoolnews.com/#
Description: This plugin adds user tracking to all pages of the site that are in wordpress.
Author: Vince Carlson
Version: 2.0
Author URI: http://www.eschoolnews.com
*/


// This just echoes the chosen line, we'll position it later
function setesm_logging() {
/* echo '<!-- Q --> ';
global $page, $wp_query;

$esml_thepageid = $wp_query->post->ID;
$esml_astused = get_post_meta($esml_thepageid, '_wp_esmad_template', true);
/*
if ($esml_astused > 0){
	//reserved
} else {
	if (defined($_GET['ast'])){
		$pageadset = $_GET['ast'];
	} else {
		$pageadset = 0;
	}
	if($pageadset > 0){ $esml_astused = $pageadset; }
}
echo '<!-- o --> <iframe src="/wp-content/plugins/esml/l.php?esmlp='.$esml_thepageid.'&amp;esmlpa='.$esml_astused.'" height="1" width="1"></iframe> <!-- c -->';
}
// Now we set that function up to execute when the wp_footer action is called
add_action('wp_footer', 'setesm_logging'); */
}
?>