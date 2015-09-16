<?php
/**
 * Bucket - Misc scripts that need to be put into functions.php
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

//function custom_excerpt_length( $length ) {
//	return 20;
//}
//add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


function new_excerpt_more( $more ) {
	return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


/*=====================================================
	Added PHP to Textwidget
=======================================================*/

add_filter('widget_text','execute_php',100);
function execute_php($html){
     if(strpos($html,"<"."?php")!==false){
          ob_start();
          eval("?".">".$html);
          $html=ob_get_contents();
          ob_end_clean();
     }
     return $html;
}

?>