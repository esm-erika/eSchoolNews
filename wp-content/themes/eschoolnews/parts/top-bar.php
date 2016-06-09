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

                <div style="height: 100%; position: relative;">
                    <div style="positon: absolute; width: 100%; height: 100%; display: table;">
                        <div style="display: table-cell; vertical-align: middle;">

                <?php if ( is_user_logged_in() ) { 
                    
                        $current_user = wp_get_current_user();
                        echo '<a href="' . site_url() . '/eschoolnews-today/">';
                        echo 'Today\'s News Brief for <br> <strong>';
                        echo $current_user->user_firstname;
                        echo ' ';
                        echo $current_user->user_lastname;
                        echo '</strong></a><br>';

                ?>
                    
                <?php } else { 

                    echo '<a href="' . site_url() . '/eschoolnews-today/">See Today\'s News Brief</a>';

                 } ?>

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
            <div class="large-3 medium-3 columns text-center" data-equalizer-watch>

                <div style="height: 100%; position: relative;">
                    <div style="positon: absolute; width: 100%; height: 100%; display: table;">
                        <div style="display: table-cell; vertical-align: middle;">

                            Subscribe box

                    </div>
                    </div>
                    </div>
            </div>
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