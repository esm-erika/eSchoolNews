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
		<section class="home">
			
			<header>
				<a target="new" href="http://www.discoveryeducation.com/Events/powerful-practices/index.cfm">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/banner_discovery-erc.png" alt="Powerful Practices">
				</a>
			</header>

			<div class="row">
				<div class="small-12 medium-6 columns">
					<h3>About Discovery Education's Powerful Practices Series</h3>
					<p>The Powerful Practices series is a new collection of exclusive
					experiences and content designed specifically for superintendents
					and curriculum leaders searching for new ideas and inspiration
					to support instructional leadership capacity. Powerful Practices
					hones in on the issues all district leaders face today and
					provides rich insights to help move your schools forward.</p>

					<hr>

					<h4 style="color: #666;">Upcoming Events:</h4>
					<h3>Powerful Practices:<br>
					<em>The Instructional Leadership Experience</em></h3>
					<p><strong>Join</strong> us for a one-day event to enrich the learning in your district,
					diocese, or charter.<br>
					<strong>Learn</strong> from nationally renowned experts about equitable and
					effective strategies that yield results.<br>
					<strong>Engage</strong> in rich discussions about personalized learning,
					formative assessment, culturally responsive classrooms, and
					student engagement.</p>
				</div>

				<div id="zmag-script" class="small-12 medium-6 columns">

				</div>
			</div>

			<section class="banner">
			<div class="row">
				<div class="small-12 columns">
					<h2>A Forum for Superintendents and Curriculum Leaders</h2>
				</div>
			</div>
			</section>

			<div class="row">
				<div class="small-12 medium-8 columns">
					<h3>Events and Locations</h3>

					<table width="100%">
						<tr>
							<td>
								<strong>January 28</strong> in Hershey, PA with keynote speaker, Dr. Freeman Hrabowski<br/>
								<a target="new" href="https://www.eventbrite.com/e/powerful-practices-pa-january-2016-tickets-19532153196" class="hershey button small radius">Register- Hershey, PA <span>></span></a>
							</td>
						</tr>
						<tr>
							<td>
								<strong>February 24</strong> in Nashville, TN with keynote speaker, Erin Gruwell<br>
								<a target="new" href="https://www.eventbrite.com/e/powerful-practices-tn-february-2016-tickets-19587495727" class="nashville button small radius">Register- Nashville, TN <span>></span></a>

							</td>
						</tr>
						<tr>
							<td>
								<strong>March 15</strong> in Pasadena, CA with keynote speaker, Dr. Pedro Noguera<br>
								<a target="new" href="https://www.eventbrite.com/e/powerful-practices-ca-march-2016-tickets-19579146755" class="pasadena button small radius">Register- Pasadena, CA <span>></span></a>

							</td>
						</tr>
					</table>
					
				</div>
				<div class="small-12 medium-4 columns">
									<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/300x250_discovery-erc.png" alt="">
				</div>
			</div>

			<div class="row">
				<div class="small-12 medium-8 columns">
					<h3>Keynote Speakers</h3>

					<ul class="medium-block-grid-3">
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/freeman_discovery-erc.png" alt="Dr. Freeman A. Hrabowski">

							<h6 class="name">Dr. Freeman A. Hrabowski</h6>
							<h6 class="title">President</h6>
							<div class="school">
							University of
							Maryland,
							Baltimore County
							</div>
							<a class="about" href="#" data-reveal-id="Freeman">About Dr. Freeman
							A. Hrabowski</a>

							<div id="Freeman" class="reveal-modal medium" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
							  	<div class="row">
							  		<div class="small-12 medium-4 columns">
							  			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/freeman_discovery-erc.png" alt="Dr. Freeman A. Hrabowski">
							  		</div>
							  		<div class="small-12 medium-8 columns">
										<h2 id="modalTitle">Dr. Freeman A. Hrabowski</h2>
										<p>Dr. Freeman A. Hrabowski, President of UMBC (University of Maryland, Baltimore County), is a national leader in science and math education and an expert on closing opportunity gaps. Hrabowski, author of “Empowering Youth from the Civil Rights Crusade to STEM Achievement,” has led UMBC to yield one of the highest rates of African-American post-graduate degrees in science and engineering fields throughout the country. He chairs the President’s Advisory Commission on Educational Excellence for African Americans and was named one of the 100 Most Influential People in the World by TIME.</p>
									</div>
								</div>
									<a class="close-reveal-modal" aria-label="Close">&#215;</a>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/erin_discovery-erc.png" alt="Erin Gruwell">
							<h6 class="name">Erin Gruwell</h6>
							<h6 class="title">The Freedom Writers Foundation</h6>
							<div class="school">
							University of
							Maryland,
							Baltimore County
						</div>
							<a class="about" href="#" data-reveal-id="Erin">About Erin Gruwell</a>

							<div id="Erin" class="reveal-modal medium" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
							  	<div class="row">
							  		<div class="small-12 medium-4 columns">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/erin_discovery-erc.png" alt="Erin Gruwell">
							  		</div>
							  		<div class="small-12 medium-8 columns">
										<h2 id="modalTitle">Erin Gruwell</h2>
										<p>Erin Gruwell was a high school teacher to inner-city Los Angeles youth who helped 150 of her students to use the power of education to write a book, graduate from high school, and attend college. Her journey was chronicled in the New York Times bestseller, The Freedom Writers Diary and in a 2007 film with Hillary Swank. Erin challenged her students to overcome poverty, racism, and violence to become published writers and catalysts for change. Today, Erin has extended the reach of her powerful teaching methods by providing professional development to teachers nationwide through the Freedom Writers Foundation.</p>
									</div>
								</div>
									<a class="close-reveal-modal" aria-label="Close">&#215;</a>
							</div>
						</li>
						<li>
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pedro_discovery-erc.png" alt="Dr. Pedro Noguera">
							<h6 class="name">Dr. Pedro Noguera</h6>
							<h6 class="title">Distinguished
							Professor of
							Education</h6>
							<div class="school">
							University of
							California,
							Los Angeles
							</div>
							<a class="about" href="#" data-reveal-id="Pedro">About Dr. Pedro Noguera</a>

							<div id="Pedro" class="reveal-modal medium" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
							  	<div class="row">
							  		<div class="small-12 medium-4 columns">
										<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/pedro_discovery-erc.png" alt="Dr. Pedro Noguera">
							  		</div>
							  		<div class="small-12 medium-8 columns">
										<h2 id="modalTitle">Dr. Pedro Noguera</h2>
										<p>Dr. Pedro Noguera is a Distinguished Professor of Education in the Graduate School of Education at UCLA and one of America’s most important voices for public education. He focuses on how socioeconomic conditions impact schools and how districts grapple with issues of equity and excellence. Noguera’s research is detailed in eleven books and over 20 articles and monographs. Previously, he served as professor at New York University, Harvard University, and the University of California, Berkeley, and as a Trustee for the State University of New York. Noguera appears regularly as an education commentator on CNN, MSNBC, and NPR.</p>
									</div>
								</div>
									<a class="close-reveal-modal" aria-label="Close">&#215;</a>
							</div>
						</li>

					</ul>

					<h6><strong style="color: #000;">Learn more and register at</strong> <a href="http://www.discoveryeducation.com/powerfulpractices">DiscoveryEducation.com/PowerfulPractices.</a></h6>
					
				</div>
			</div>
			<br>

			<div class="row">
				<div class="small-12 columns text-center">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/leaderboard_discovery-erc.png" alt="">
				</div>
			</div>

			<br>





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