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

<?php if (is_singular('staff')) { ?>

    <?php if(get_field('facebook_link')) {
        echo '<a target="_blank" href="' . get_field('facebook_link') . '" class="left"><i class="fi-social-facebook large"></i></a>';
    
    } ?>

    <?php if(get_field('twitter_link')) {
        echo '<a target="_blank" href="' . get_field('twitter_link') . '" class="left"><i class="fi-social-twitter large"></i></a>';

    } ?>

    <?php if(get_field('linkedin_link')) {
        echo '<a target="_blank" href="' . get_field('linkedin_link') . '" class="left"><i class="fi-social-linkedin large"></i></a>';
    } ?>

    <?php if(get_field('website_link')) {
        echo '<a target="_blank" href="' . get_field('website_link') . '" class="left"><i class="fi-web large"></i></a>';
    } ?>

<? } else { ?>

    <?php 
		if ( function_exists( 'sharing_display' ) ) {
		    sharing_display( '', true );
		}
     ?>
     
     <a rel="nofollow" data-shared="" class="share-email" href="<?php the_permalink(); ?>?email" target="_blank" title="Click to email">
     	<i class="fi-mail"></i>
     </a>

     <a rel="nofollow" data-shared="" class="share-print" href="<?php the_permalink(); ?>?print" target="_blank" title="Click to print">
     	<i class="fi-print"></i>
     </a> 
    <?php } ?>
</div>