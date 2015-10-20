<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<div class="top-bar-container contain-to-grid show-for-large-up">

        <div class="title-area row">
            <div class="name large-5 large-centered columns">
                <h1>
                    <a href="<?php echo home_url(); ?>">
                        <?php //bloginfo( 'name' ); ?>
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/eschoolnewslogo.png"/>
                    </a>
                </h1>
            </div>
        </div>

    <div class="sticky">

        <nav class="top-bar show-for-small" data-topbar role="navigation">
            <section class="top-bar-section">

                <?php foundationpress_top_bar_l(); ?>
                <?php foundationpress_top_bar_r(); ?>
                <?php foundationpress_top_bar_c(); ?>
               
            </section>
        </nav>

    </div>
</div>