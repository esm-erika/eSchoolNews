<?php 
/*
*
* shared ad-check.php
*
* @package WordPress
* @subpackage FoundationPress
* @since FoundationPress 1.0.0
*
*
*
*/


global $post, $wpdb, $esmuser; 
$astcset = $_GET['astc'];
if(!filter_var($astcset, FILTER_VALIDATE_INT))
{//reserved for default ad set
  $astc = 1;
} else {
// Retrieve adset info from url
global $astc;
  $astc = $astcset; 
}
global $astused;

$astused = get_post_meta($post_id, '_wp_esmad_template', true);

if($astused > 1){
 $astf = $astused; 
} else {
  $pageadset = $_GET['ast'];
  if(!filter_var($pageadset, FILTER_VALIDATE_INT))
  {//reserved for default ad set
    $astused = 1;
  } else {
    // Retrieve adset info from page
//  global $astused;
  $astused = $pageadset;  
  }
}