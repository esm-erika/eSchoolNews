<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<!doctype html>
<html class="no-js" <?php language_attributes(); ?> >
<head>
  <!-- /* Fonts */ -->
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,700|Merriweather:300|Cinzel+Decorative|Forum' rel='stylesheet' type='text/css'>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/favicon.ico" type="image/x-icon">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-144x144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-114x114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-72x72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icons/apple-touch-icon-precomposed.png">

  <!-- /* Foundation Icons */ -->
  <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/foundation-icons/foundation-icons.css">

  <!-- /* Slick Carousel */ -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/slick/slick.css"/>

  <!-- slick-theme.css default styling -->
  <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/slick/slick-theme.css"/>

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<?php do_action( 'foundationpress_after_body' ); ?>
	
	<div class="off-canvas-wrap" data-offcanvas>
   <div class="inner-wrap">

     <?php do_action( 'foundationpress_layout_start' ); ?>

     <nav class="tab-bar">
      <section class="left-small">
       <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
     </section>
     <section class="middle tab-bar-section show-for-small-up">

       <h1 class="title">
        <?php //bloginfo( 'name' ); ?>
        <a href="<?php echo home_url(); ?>">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/eschoolnewslogo.png"/>
        </a>
      </h1>

    </section>
  </nav>

  <nav class="small-nav row small-collapse medium-uncollapse">

    <div class="small-12 medium-6 search columns small-text-center medium-text-left">

    <?php if ( ! is_user_logged_in() ) { ?>

      <a href="#" data-dropdown="login-drop" aria-controls="login-drop" aria-expanded="false" class="login">Login</a>

      <div id="login-drop" data-dropdown-content class="f-dropdown content small text-left" aria-autoclose="false" aria-hidden="true" tabindex="-1">
        <?php wp_login_form(); ?>
      </div>

   <?php }?>

   <?php 

   global $current_user;

   if ( is_user_logged_in() ) {
 
    $current_user = wp_get_current_user();

    echo '<div class="welcome left">';

    echo 'Welcome <strong>' . $current_user->user_firstname . '</strong>! <br/>'; 

    echo '</div>';

    }?>


      <a href="#" data-reveal-id="subscribe-drop" class="subscribe">Subscribe</a>

      <div id="subscribe-drop" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
        

        
            <h3>Subscribe to Our Newsletters</h3>
         

        <?php get_template_part( 'parts/subscribe-form' ); ?>

          <a class="close-reveal-modal" aria-label="Close">&#215;</a>


      </div>

      <?php if ( is_user_logged_in()) {

        echo '<div class="welcome-menu"><a href="#">My eSchool News</a>';

        echo '<a class="logout" href="' . wp_logout_url( home_url() ) . '">Logout</a></div>';

      } ?>

    </div>

    <div class="small-12 medium-6 columns small-text-center medium-text-right">
      <div class="social right">
        <a href="http://www.twitter.com/eschoolnews" target="new" class="right"><i class="fi-social-twitter medium"></i></a>
        <a href="http://www.facebook.com/eschoolnews/" target="new" class="right"><i class="fi-social-facebook medium"></i></a>
        <a href="<?php site_url(); ?>/contact"><i class="fi-mail medium"></i></a>
      </div>

      <a href="#" data-dropdown="drop2" aria-controls="drop2" aria-expanded="false" class="search"> <i class="fi-magnifying-glass"></i> Search</a>

      <div id="drop2" data-dropdown-content class="f-dropdown content small search-drop" aria-hidden="true" tabindex="-1">
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

  </nav>

  <?php get_template_part( 'parts/off-canvas-menu' ); ?>



  <?php get_template_part( 'parts/top-bar' ); ?>

  <section class="container" role="document">
    
   <?php do_action( 'foundationpress_after_header' ); ?>


	<?php get_template_part( 'parts/ads/billboard' ); ?>  

