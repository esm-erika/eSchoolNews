<?php
/**
 * Template part for social media icons on article pages
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<div class="article-social clearfix">
   <!--  <a href="#" class="left"><i class="fi-social-facebook medium"></i> <small>12 Shares</small></a>
    <a href="#" class="left"><i class="fi-social-twitter medium"></i> <small>25 Tweets</small></a>
    <a href="#" class="left"><i class="fi-mail medium"></i> <small>54 Emailed</small></a> -->

    <?php 
		if ( function_exists( 'sharing_display' ) ) {
		    sharing_display( '', true );
		}
     ?>

     <a rel="nofollow" data-shared="" class="share-print sd-button share-icon no-text" href="<?php permalink(); ?>/?print" target="_blank" title="Click to print"><span></span><span class="sharing-screen-reader-text">Click to print (Opens in new window)</span></a>
</div>