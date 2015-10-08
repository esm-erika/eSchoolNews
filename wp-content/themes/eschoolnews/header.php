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
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,700|Merriweather:300|Cinzel+Decorative' rel='stylesheet' type='text/css'>

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


      <a href="#" data-dropdown="login-drop" aria-controls="login-drop" aria-expanded="false" class="login">Login</a>

      <div id="login-drop" data-dropdown-content class="f-dropdown content small text-left" aria-hidden="true" tabindex="-1">
        <?php wp_login_form(); ?>
      </div>

      <a href="#" data-dropdown="subscribe-drop" aria-controls="subscribe-drop" aria-expanded="false" class="subscribe">Subscribe</a>

      <div id="subscribe-drop" data-dropdown-content class="f-dropdown content medium text-left" aria-hidden="true" aria-autoclose="false" tabindex="-1">
        

        <div class="row">
          <div class="medium-12 columns">
            <h3>Subscribe to Our Newsletters</h3>
            <p>Select from our list of newsletters to subscribe:</p>
          </div>
        </div>

        <form>

            <div class="row">
              <div class="medium-12 columns">
                <ul class="medium-block-grid-2">
                  <li><input id="checkbox1" type="checkbox"><label for="checkbox1">eSchool News Today <i data-tooltip aria-haspopup="true" class="fi-info has-tip" title="Test tooltip."></i></label></li>
                
                  <li><input id="checkbox2" type="checkbox"><label for="checkbox2">Innovation Weekly <i class="fi-info"></i></label></li>

                  <li><input id="checkbox3" type="checkbox"><label for="checkbox3">School IT Leadership <i class="fi-info"></i></label></li>

                  <li><input id="checkbox4" type="checkbox"><label for="checkbox4">Digtial Leadership <i class="fi-info"></i></label></li>

                  <li><input id="checkbox5" type="checkbox"><label for="checkbox3">Reinventing HigherEd <i class="fi-info"></i></label></li>

                  <li><input id="checkbox6" type="checkbox"><label for="checkbox6">eCampus News Today <i class="fi-info"></i></label></li>

                  <li><input id="checkbox7" type="checkbox"><label for="checkbox7">IT Campus Leadership <i class="fi-info"></i></label></li>

                  <li><input id="checkbox8" type="checkbox"><label for="checkbox8">eClassroom News <i class="fi-info"></i></label></li>
                </ul>
              </div>

              <a class="button small radius">Subscribe</a>
              
            </div>
        </form>

      </div>

    </div>

    <div class="small-12 medium-6 columns small-text-center medium-text-right">
      <div class="social right">
        <a href="#" class="right"><i class="fi-social-twitter medium"></i></a>
        <a href="#" class="right"><i class="fi-social-facebook medium"></i></a>

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


