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

        <div class="title-area row show-for-large-up">
            <div class="name large-6 large-centered columns">
                <div class="row show-for-large-up" style="height: 20px;"></div>
                <h1 class="large-10 large-centered columns">
                    <a href="<?php echo home_url(); ?>">
                        
<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="<?php bloginfo( 'name' ); ?>" />                    </a>
                </h1>
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