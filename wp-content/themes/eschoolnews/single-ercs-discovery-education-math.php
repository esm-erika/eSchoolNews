<?php /* Template Name: Discovery ERC Home Template */ 

global $post, $page, $esmuser; 
$post_id = $post->ID;

//check if there are ads and if user is logged in
get_template_part( 'library/ad-check' );
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



          echo '<div class="welcome-menu small-only-text-center text-left"><a href="/profile">Profile</a>';

          echo '<a class="logout" href="' . wp_logout_url( home_url() ) . '">Logout</a></div>';

        } ?>

      </div>

        <div class="small-12 medium-6 columns">


        <a href="#" data-reveal-id="subscribe-drop" class="subscribe hide-for-small-only">Subscribe</a>

        <div id="subscribe-drop" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">



          <h3>Subscribe to Our Newsletters</h3>


          <?php //get_template_part( 'parts/subscribe-form' ); ?>

          <a class="close-reveal-modal" aria-label="Close">&#215;</a>


        </div>

        

      </div>

      </div>

      </div>
<?php if ( !esm_is_user_logged_in()){ get_template_part( 'parts/login-modal' ); } ?>
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
          <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="eSchool News" />
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

<?php 
//insert cache query
$box_qt = 'esm_c_header_menu';
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){
	// start code to cache
		ob_start( );
		echo '<!-- c -->'; ?>

    <?php get_template_part( 'parts/off-canvas-menu' ); ?>

    <?php get_template_part( 'parts/top-bar' ); ?>

    <section class="container" role="document">

    <?php do_action( 'foundationpress_after_header' ); ?>

<?php
		echo '<!-- c '.date(DATE_RFC2822).' -->' ;
		$local_box_cache = ob_get_clean( );
	// end the code to cache
		echo $local_box_cache;
	//end cache query 
	
	if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
	} else {
		set_transient($box_q ,$local_box_cache, 60 * 10);
	}
} else { 

echo $local_box_cache;

}

if ( !esm_is_user_logged_in()){ get_template_part( 'parts/login-modal' ); }

?>

     <?php 
	 // if ( is_singular( 'post' )){
		// get_template_part( 'parts/ads/leaderboard-2' );		 
		// } else {
		// get_template_part( 'parts/ads/billboard' );
	 // }
	 ?>  

<div id="discovery-erc">
			<!-- Start Content -->
		<section class="row math">
			<div class="small-12 columns">
			
			<header>

<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=351&ast=154&astc=11650">
     
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 				
                
                
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner-math_discovery-erc.png" alt="Powerful Practices">
				</a>
				<nav class="math">

					<div class="row collapse">
						<div class="small-12 columns">
              <span class="micro-menu">
							<span class="active"><strong>> RESOURCES:</strong> <a href="<?php home_url(); ?>/ercs/discovery-education-math">MATH</a></span>
							<a class="science-menu" href="<?php home_url(); ?>/ercs/discovery-education-science">SCIENCE</a>
							<a class="studies-menu" href="<?php home_url(); ?>/ercs/discovery-education-social-studies">SOCIAL STUDIES</a>
            </span>
							<span class="events-menu right"><strong>> EVENTS:</strong> <a href="<?php home_url(); ?>/ercs/discovery-education">Powerful Practices: The Instructional Leadership Experience</a></span>
						</div>
					</div>

				</nav>
			</header>

			<div class="row">
				<div class="small-12 medium-7 columns">
					<h3>Learning Math Starts with a Connection.</h3>

					<p>Math Techbook is a breakthrough digital textbook that will change the way students and
					teachers experience math. Using an inquiry-based approach, Math Techbook engages
					students with real world problems worth solving while supporting any device, anywhere,
					anytime in any secondary instructional setting.</p>

					<p>

<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=351&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 							
                        
                        
							<img class="more-button" width="120" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button_learn-more.png" alt="Learn More">
						</a>
					</p>

					<div class="video">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/hF5xONSlQ9Q" frameborder="0" allowfullscreen></iframe>
					</div>

					<br>

					<h3 style="color: #666;">What Educators Can Do with Math Techbook</h3>
					

					<div class="row collapse">
            <div class="small-1 columns">
              <img style="max-width: 40px;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/discovery-bullets.png" alt="">
            </div>
            <div class="small-11 columns">
					<h4>Teach using an inquiry-based approach</h4>
					<p>Math Techbook uses a Discover, Practice, Apply cycle that balances conceptual learning,
					procedural fluency, and application to real world problems so students gain lasting
					proficiency.</p>

				</div></div>


					<div class="row collapse">
            <div class="small-1 columns">
              <img style="max-width: 40px;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/discovery-bullets.png" alt="">
            </div>
            <div class="small-11 columns">
					<h4>Engage Students First to Make Learning Last</h4>
					<p>Students can access dynamic content, interactives, videos, digital tools, and game-like
					activities that increase their motivation to learn math. Students learn content through
					multiple pathways that match their learning style and can monitor their own progress in
					real time with the Student Dashboard.</p>
				</div></div>

					<div class="row collapse">
            <div class="small-1 columns">
              <img style="max-width: 40px;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/discovery-bullets.png" alt="">
            </div>
            <div class="small-11 columns">
					<h4>Differentiate Instruction for 21st Century Learners</h4>
					<p>The newest generation of technology enhanced items and formative assessments are
					woven throughout the entire instructional cycle. Teachers can collect evidence of
					student progress instantly.</p>
				</div></div>

					<div class="row collapse">
            <div class="small-1 columns">
              <img style="max-width: 40px;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/discovery-bullets.png" alt="">
            </div>
            <div class="small-11 columns">
					<h4>Save Teachers Time in Planning and Preparation</h4>
					<p>Comprehensive resources, student activities, and model lessons are at teachers'
					fingertips in one, easy-to-navigate site. Real-time feedback and easy-to-read data on
					the Teacher Dashboard make it easier to adjust instruction.</p>
				</div></div>

					<h6><a style="background-color: #65308f;" href="http://www.DiscoveryEducation.com/SocialStudies" class="button medium radius">Find out more or sign up for a free trial at:  DiscoveryEducation.com/SocialStudies.</a></h6>
					
					<div class="row">
						<div class="small-12 medium-8 columns">
							<small>Sponsored by:</small>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/discovery_math.png" alt="Discovery Education: Math Techbook">
						</div>
					</div>
					
				</div>

				<div id="sidebar" class="small-12 medium-5 columns">
					<div class="sidebar-bg">
					<h3><img class="left" style="max-width: 30px; margin-right: 5px;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/lightbulb.png"> Insights &amp; Resources</h3>

					<article>
						<h5>Ed-Tech Point of View: <br>Transforming Math for a Digital Era</h5>
						<div class="row">
							<div class="small-12 medium-6 columns">
									
								
<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=352&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 	
                                
                                
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-download_discovery-erc.png" alt="Download">
								</a>
							</div>
							<div class="small-12 medium-6 columns">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/math-cover_discovery-erc.png" alt="">

							</div>
						</div>
					</article>

					<article>
								<h5>Infographic: <br>Problems Worth Solving</h5>
						<div class="row">
							<div class="small-12 medium-6 columns">
								
								
<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=353&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 	                                
                                
                                
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-download_discovery-erc.png" alt="Download">
								</a>
								
							</div>
							<div class="small-12 medium-6 columns">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/infographic_discovery-erc.png" alt="Infographic">

							</div>
						</div>
					</article>

					<article>
								<h5>Mathematical Learning Through Rigorous Tasks</h5>
						<div class="row">
							<div class="small-12 medium-6 columns">
									
								
<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=354&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 	                                
                                
                                
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-download_discovery-erc.png" alt="Download">
								</a>
							</div>
							<div class="small-12 medium-6 columns">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/math-learning_discovery-erc.png" alt="">

							</div>
						</div>
					</article>

					<?php get_template_part( 'parts/ads/embeddedbanner' ); ?>

					<article>
								<h5>From the Heart: Why this Career Corrections Officer Went Back to Middle School</h5>	

						<div class="row">
							<div class="small-12 medium-6 columns">
								
<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=400&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 	
								
								
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-download_discovery-erc.png" alt="Download">
								</a>
							</div>
							<div class="small-12 medium-6 columns">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/from-the-heart_discovery-erc.png" alt="">

							</div>
						</div>
					</article>

				</div>

			</div>
			<br>

			<div class="row">
				<div class="small-12 columns text-center">
					<?php get_template_part( 'parts/ads/ercbottom' ); ?>
				</div>
			</div>

			<br>




</div>
</div>
</section>

</div>
		<!-- End Content -->
</div>
</div>
<a class="exit-off-canvas"></a>

</div>
<?php do_action( 'foundationpress_layout_end' ); ?>





<?php wp_footer(); ?>

<?php do_action( 'foundationpress_before_closing_body' ); ?>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-2806543-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>