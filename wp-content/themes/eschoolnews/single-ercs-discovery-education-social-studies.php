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
		//get_template_part( 'parts/ads/leaderboard-2' );		 
		// } else {
		// get_template_part( 'parts/ads/billboard' );
	 // }
	 ?>  

<div id="discovery-erc">
			<!-- Start Content -->
		<section class="row social-studies">
			<div class="small-12 columns">
			
			<header>

<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=363&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 					
                
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner-socialstudies_discovery-erc.jpg" alt="Powerful Practices"></a>
				<nav class="social-studies">

					<div class="row">
						<div class="small-12 columns">
							<span class="studies-menu"><strong>> RESOURCES:</strong> <a href="<?php home_url(); ?>/ercs/discovery-education-social-studies">SOCIAL STUDIES</a></span>
							<span class="math-menu"><a href="<?php home_url(); ?>/ercs/discovery-education-math">MATH</a></span>
							<span class="science-menu"><a href="<?php home_url(); ?>/ercs/discovery-education-science">SCIENCE</a></span>
							<span class="event-menu"><strong>> EVENTS:</strong> <a href="<?php home_url(); ?>/ercs/discovery-education">Powerful Practices: The Instructional Leadership Experience</a></span>
						</div>
					</div>

				</nav>
			</header>

			<div class="row">
				<div class="small-12 medium-8 columns">
					<h3>Discovery Education Social Studies Techbook&trade;</h3>

					<p>Social Studies Techbook is a core digital textbook that makes teaching and learning an unforgettable experience. Using an inquiry-based approach that enhances literacy and critical thinking skills, Social Studies Techbook supports any device, anywhere, anytime in any instructional setting.</p>

					<p>
						
<?php if ( esm_is_user_logged_in()) { ?>
      <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=363&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 	                        
                       
							<img width="120" class="more-button" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button_learn-more.png" alt="Learn More">
						</a>
					</p>

					<div class="video">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/o7U8Sdfzy7E" frameborder="0" allowfullscreen></iframe>
					</div>

					<h5 style="color: #666;">What Educators Can Do with Social Studies Techbook</h5>
					<hr>

					<h4>Maximize their time to plan, prepare, and deliver high quality instruction</h4>
					<p>Teachers can access model lessons, primary and secondary source documents, interactive tools and activities, document-based investigations, and assessments all in one place at their fingertips.</p>


					<h4>Engage students with multimedia content that is current and relevant</h4>
					<p>The combination of videos, photographs, audio recordings, interactive maps, and variety of activities makes Social Studies more interesting and exciting to students. Social Studies Techbook is updated regularly and the Global Wrap feature includes weekly current events videos provided by MacNeil/Lehrer productions.</p>

					<h4>Strengthens literacy, critical thinking, and citizenship skills for all students</h4>
					<p>The inquiry-based format and interactive investigations emphasize informational text literacy, analytical writing, and problem solving skills that students will apply in academics and as citizens.</p>

					<h4>Differentiate instruction for 21st century learners</h4>
					<p>Students can use digital resources to help them process information from multiple sources. A variety of reading tools, including two different text levels, text-to-speech, and Spanish translations help students make meaning from the text. Formative and summative assessments are already built and ready for teachers and students to use.</p>

					<h6><a href="http://www.DiscoveryEducation.com/SocialStudies" class="button large radius">Find out more or sign up for a free trial at:  DiscoveryEducation.com/SocialStudies.</a></h6>
					
					
				</div>

				<div id="sidebar" class="small-12 medium-4 columns">
					<h3>Resources</h3>

					<article>
						<div class="row">
							<div class="small-12 medium-6 columns">
								<h6 style="color: #666;">Ed-Tech Pont of View</h6>
								<h5>Transforming Social Studies Education for a Digital Era</h5>	
								
								<?php if ( esm_is_user_logged_in()) { ?>
								     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=364&ast=154&astc=11650">
								<?php } else { ?>
									<a href="#" data-reveal-id="login-popup">
								<?php } ?> 	                                
                                
								
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-download_discovery-erc.png" alt="Download">
								</a>
							</div>
							<div class="small-12 medium-6 columns">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/transforming-social_discovery-erc.png" alt="">

							</div>
						</div>
					</article>

					<article>
						<div class="row">
							<div class="small-12 medium-6 columns">
								<h6 style="color: #666;">Powerful Practices</h6>
								<h5>Five Strategies for Using Primary Source Documents</h5>	

<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=365&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 									
                                
								
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-download_discovery-erc.png" alt="Download">
								</a>
							</div>
							<div class="small-12 medium-6 columns">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/five-strategies_discovery-erc.png" alt="">

							</div>
						</div>
					</article>

					<article>
						<div class="row">
							<div class="small-12 medium-6 columns">
								<h6 style="color: #666;">Powerful Practices</h6>
								<h5>Building Content Knowledge and Inquiry Skills</h5>	
								
<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=366&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 	                                
                                
                                
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-download_discovery-erc.png" alt="Download">
								</a>
							</div>
							<div class="small-12 medium-6 columns">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/building-content_discovery-erc.png" alt="">

							</div>
						</div>
					</article>

					<?php get_template_part( 'parts/ads/embeddedbanner' ); ?>

					<article>
						<div class="row">
							<div class="small-12 medium-6 columns">
								<h6 style="color: #666;">Story</h6>
								<h5>From the Heart: Chris Layton</h5>	

<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=367&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 	
								
								
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-download_discovery-erc.png" alt="Download">
								</a>
							</div>
							<div class="small-12 medium-6 columns">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/chris-layton_discovery-erc.png" alt="">

							</div>
						</div>
					</article>

					<article>
						<div class="row">
							<div class="small-12 medium-6 columns">
								<h6 style="color: #666;">Story</h6>
								<h5>From the Heart: Queenie Hall</h5>	

<?php if ( esm_is_user_logged_in()) { ?>
     <a target="new" href="http://www.eschoolnews.com/rtp.php?rtl=368&ast=154&astc=11650">
<?php } else { ?>
	<a href="#" data-reveal-id="login-popup">
<?php } ?> 	
								
								
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-download_discovery-erc.png" alt="Download">
								</a>
							</div>
							<div class="small-12 medium-6 columns">
								<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/queenie-hall_discovery-erc.png" alt="">

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