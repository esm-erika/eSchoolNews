<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<br>
<div class="top-bar-container contain-to-grid">

        <div class="title-area row show-for-small-up" data-equalizer>
            <div class="large-3 medium-3 columns text-center" data-equalizer-watch>

                <div style="height: 100%; position: relative; border: 1px solid #ccc; padding: 10px;" data-equalizer-watch>
                    <div style="positon: absolute; width: 100%; height: 100%; display: table;">
                        <div style="display: table-cell; vertical-align: middle;">

                
                <?php 

                  $args = array(
                    'post_type' => 'newsletter',
                    'posts_per_page' => '1',
                    'order' => 'DESC',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'publications',
                            'field'    => 'slug',
                            'terms'    => 'eschool-news-today',
                        ),
                    ),

                    );
                // the query
                $the_query = new WP_Query( $args ); ?>

                <?php if ( $the_query->have_posts() ) : ?>

                    <!-- pagination here -->

                    <!-- the loop -->
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                    <?php if ( is_user_logged_in() ) { 
                    
                    $current_user = wp_get_current_user(); ?>

                        <a href="<?php the_permalink(); ?>">
                            <strong>Today's News Brief</strong> for <br> 
                        <strong><?php echo $current_user->user_firstname; ?> <?php echo $current_user->user_lastname; ?></strong> is now available.
                     
                       </a><br>

                
                    
                <?php } else { ?>

                   <a href="<?php the_permalink(); ?>"><strong>Today's News Brief</strong><br />
is now available.</a>

                <?php } ?>
                    
                <?php endwhile; wp_reset_postdata(); ?>

                <?php endif; ?>


                </div>
                </div>
                </div>

            </div>
            
            <div class="show-for-small-up hide-for-medium-up" style="height: 20px; clear: both;"></div>

            <div class="name large-6 medium-6 columns" data-equalizer-watch>
                <div class="show-for-large-up" style="height: 20px;"></div>
                    <h1 class="row text-center">
                        <div class="small-10 small-centered medium-10 medium-centered large-10 large-centered columns">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" />                    
                        </a>
                        </div>
                    </h1>
                </div>
            <?php if(!is_user_logged_in()){ ?>
            <div class="large-3 medium-3 columns text-center subscribe-form" data-equalizer-watch>
                <div class="show-for-small-only" style="height: 20px;"></div>
                <div class="row">
                    <div class="small-10 small-centered medium-12 large-12 columns">

                        <div style="border: 1px solid #ccc; padding: 10px;" data-equalizer-watch>

                <div style="height: 100%; position: relative;">
                    <div style="positon: absolute; width: 100%; height: 100%; display: table;">
                        <div style="display: table-cell; vertical-align: middle;">

<?php 


//This is a filter to change the default validation message that Gravity Forms generates
add_filter('gform_validation_message_228', 'change_validation_message', 10, 2);
function change_validation_message($message, $form)
{
    return "";
}
// Often forms in Gravity Forms to need to start with default values and we need to check the form in case the user hasn't entered new data and give them a validation message back
// Append the Gravity Forms ID to the end of the filter so that the validation only runs on this form. In this example I'm doing it on Form #2
add_filter('gform_validation_228', 'custom_validation');
function custom_validation($validation_result)
{
    $form = $validation_result["form"];
    //We need to loop through all the form fields to check if the value matches and of the default values
    foreach ($form['fields'] as &$field) {
        //Check if the value is equal to the Default Value you entered in Gravity Forms
        if ($field["value"] === "email") {
            // set the form validation to false
            $validation_result["is_valid"] = false;
            //The field ID can be found by hovering over the field in the backend of WordPress
            if ($field["id"] == "1") {
                $field["failed_validation"] = true;
                $field["validation_message"] = "";
            }
        }
       
    }
    //Assign modified $form object back to the validation result
    $validation_result["form"] = $form;
    return $validation_result;
}





















?>
                        
                          
                        <style>#field_228_1 > label.gfield_label{ display: none;} input#input_228_1{font-size: 12px!important; color:#000!important; height: 22px;    margin: 0px!important;
    padding:0px!important;} /* gform placeholders*/
::-webkit-input-placeholder { color:#333; }
:-moz-placeholder { opacity: 1; color:#333; } /* Firefox 18- */
::-moz-placeholder { opacity: 1; color:#333; } /* firefox 19+ */
:-ms-input-placeholder { color:#333; } /* ie */
input:-moz-placeholder { color:#333; }
input#gform_submit_button_228 {margin-left:5px;}
div.gfield_description.validation_message{ display:none }
li.gfield.gfield_error {
	background-color:#fff!important;
    margin: 0px!important;
    padding:0px!important;
    border-top: none!important;
    border-bottom: none!important;}
	

                        </style>
                        
                        <h5 style="font-size: 85%; line-height: 1.2;margin-bottom: 7px">Join over 150,000 of your Peers!</h5>
                        <div style="font-size: 85%; line-height: 1.2; margin-bottom: 7px; padding: 2px 0;">Get the latest ed-tech news &amp; innovations delivered to your email!</div>
                        
                        <?php gravity_form( 228, $display_title = false, $display_description = true, $display_inactive = false, $field_values = null, $ajax = false, $tabindex, $echo = true ); ?>
                    
                        </div>
                        </div>
                        </div>

                    </div>
                    </div>
                    </div>
            </div>
            <?php } ?>
            
            
        </div>

    <div class="row mobile-search show-for-small-only">
      <div class="small-12 columns">

        <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
          <div class="row collapse">
            <div class="small-9 columns">
              <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
            </div>
            <div class="small-3 columns">
              <input style="padding: 0;" type="submit" class="button postfix" value="Go" />
            </div>
          </div>
        </form>

      </div>
    </div>

    <div class="sticky">

        <nav class="top-bar row" data-topbar role="navigation">
            <section class="top-bar-section medium-12 columns">

                <?php foundationpress_top_bar_c(); ?>
            </section>

        </nav>

    </div>
</div>