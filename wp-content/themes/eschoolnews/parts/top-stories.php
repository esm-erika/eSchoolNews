<?php
/**
 * Template part for featured article 
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<?php // get_template_part( 'parts/ads/leaderboard-2' ); ?>

<?php 

			if(get_field('layout_select', 'option') == "layout-2x2_halfpage"){

				get_template_part( 'parts/top-stories/layout-2x2_halfpage' );

			} elseif(get_field('layout_select', 'option') == "layout-2x2_box_ecn") {

				get_template_part( 'parts/top-stories/layout-2x2_box_ecn' );

			} elseif(get_field('layout_select', 'option') == "layout-1x3_noad"){

				get_template_part( 'parts/top-stories/layout-1x3_noad' );

			} else {

				echo '</div> </div></div>';
			}

?>








