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
<div class="top-bar-container contain-to-grid show-for-medium-up">

        <div class="title-area row show-for-large-up" data-equalizer>
            <div class="large-3 columns text-center" data-equalizer-watch>

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
            <div class="name large-6 columns" data-equalizer-watch>
                <div class="show-for-large-up" style="height: 20px;"></div>
                    <h1 class="text-center">
                        <a href="<?php echo home_url(); ?>">
                            <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" style="max-width: 400px;" />                    
                        </a>
                    </h1>
                </div>
            <div class="large-3 columns text-center" data-equalizer-watch>

                <div style="height: 100%; position: relative;">
                    <div style="positon: absolute; width: 100%; height: 100%; display: table;">
                        <div style="display: table-cell; vertical-align: middle;">

                            Subscribe box

                    </div>
                    </div>
                    </div>
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