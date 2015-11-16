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
global $post, $page, $esmuser; 
$post_id = $post->ID;
$astcset = $_GET['astc'];
if(!filter_var($astcset, FILTER_VALIDATE_INT))
{//reserved for default ad set
  $astc = 1;
} else {
// Retrieve adset info from url
  $astc = $astcset; 
}

$astused = get_post_meta($post_id, '_wp_esmad_template', true);
if($astused > 1){
 $astf = $astused; 
} else {
  $pageadset = $_GET['ast'];
  if(!filter_var($pageadset, FILTER_VALIDATE_INT))
  {//reserved for default ad set
    $astused = 1;
  } else {
    // Retrieve adset info from page
    $astused = $pageadset;  
  }
}
//check if user is logged in
get_template_part( 'library/logged-in-check' ); 
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
  <!-- <link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/slick/slick-theme.css"/> -->

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php do_action( 'foundationpress_after_body' ); ?>
  
  <div class="off-canvas-wrap" data-offcanvas>
   <div class="inner-wrap">

     <?php do_action( 'foundationpress_layout_start' ); ?>

     <nav class="tab-bar show-for-small-up hide-for-medium-up">
      <section class="left-small ">
       <a class="left-off-canvas-toggle menu-icon" href="#"><span></span></a>
     </section>
     </nav>
     
     <section class="small-nav row">

  <div class="show-for-medium-up" style="height: 20px;"></div>


      <div class="small-12 medium-6 small-offset-1 medium-offset-0 search columns small-only-text-center medium-text-left">
        
        <div class="row">
          <div class="small-12 medium-6 columns">
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

          echo '<div class="welcome">';

          echo 'Welcome <strong>' . $current_user->user_firstname . '</strong>! <br/>'; 

          echo '</div>';



          echo '<div class="welcome-menu small-only-text-center text-left"><a href="#">My eSchool News</a>';

          echo '<a class="logout" href="' . wp_logout_url( home_url() ) . '">Logout</a></div>';

        } ?>

      </div>

        <div class="small-12 medium-6 columns">


        <a href="#" data-reveal-id="subscribe-drop" class="subscribe hide-for-small-only">Subscribe</a>

        <div id="subscribe-drop" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">



          <h3>Subscribe to Our Newsletters</h3>


          <?php get_template_part( 'parts/subscribe-form' ); ?>

          <a class="close-reveal-modal" aria-label="Close">&#215;</a>


        </div>

        

      </div>

      </div>

      </div>

      <div class="small-12 medium-6 columns small-text-center medium-text-right">

        <div class="row">

          <div class="small-12 medium-8 columns hide-for-small-only">
            <a href="#" data-dropdown="drop2" aria-controls="drop2" aria-expanded="false" class="search hide-for-small-only"> <i class="fi-magnifying-glass"></i> Search</a>

            <div id="drop2" data-dropdown-content class="f-dropdown content medium search-drop" aria-hidden="true" tabindex="-1">
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

          <div class="small-11 medium-uncentered medium-4 small-only-text-center columns social">
            <div class="show-for-small-only" style="height: 20px;"></div>
            <a href="http://www.twitter.com/eschoolnews" target="new"><i class="fi-social-twitter medium"></i></a>
            <a href="http://www.facebook.com/eschoolnews/" target="new"><i class="fi-social-facebook medium"></i></a>
            <a href="<?php site_url(); ?>/contact"><i class="fi-mail medium"></i></a>
          </div>

        </div>

        </section>
    

    <nav class="row middle show-for-small-up hide-for-large-up">
      <div class="show-for-small-up hide-for-large-up" style="height: 20px;"></div>
      <h1 class="small-12 medium-6 medium-centered large-uncentered columns title">
        <?php //bloginfo( 'name' ); ?>
        <a href="<?php echo home_url(); ?>">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/eschoolnewslogo.png"/>
        </a>
      </h1>
    </nav>

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

    <?php get_template_part( 'parts/off-canvas-menu' ); ?>



    <?php get_template_part( 'parts/top-bar' ); ?>

    <section class="container" role="document">

     <?php do_action( 'foundationpress_after_header' ); ?>


     <?php //get_template_part( 'parts/ads/billboard' ); ?>      

