<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */ 

global $cat;

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
		
	<header>
		<nav class="top-bar">
			<div class="row" data-topbar role="navigation">
		        <div class="top-bar-section medium-12 columns">
					<img id="logo" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/Collaboration_Nation_Logo.png" alt="Collaboration Nation" class="left">
					<?php collaboration_nation(); ?>

					<div class="social left">
						<a class="twitter" href="#"><i class="fi-social-twitter"></i></a>
						<a class="facebook" target="new" href="http://www.facebook.com/cdwgcollaboration/"><i class="fi-social-facebook"></i></a>
					</div>

					<div class="sponsored-by text-left right">
						<small>Sponsored By</small> <br/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cdwg-logo.gif"/>
					</div>
				</div>
			</div>
		</nav>
	

		<div class="text-container"></div>

	</header>

	<div class="row buttons-container show-for-medium-up">
		
	<div class="medium-12 columns">
		<ul  class="button-menu left">
			<li class="home">
				<a href="<?php site_url(); ?>/collaboration/">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/home-button.png" alt="Home">
					<span class="hide-for-medium-only">HOME</span>
				</a>
			</li>

			<li class="prizes">
				<a href="<?php site_url(); ?>/collaboration/winners">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/prizes-button.png" alt="Prizes">
					<span class="hide-for-medium-only">VIDEOS &amp; WINNERS</span>
				</a>
			</li>

			<li class="judges">
				<a href="<?php site_url(); ?>/collaboration/judges">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/judges-button.png" alt="Judges">
					<span class="hide-for-medium-only">JUDGES</span>
				</a>
			</li>

			<li class="rules">
				<a href="<?php site_url(); ?>/collaboration/rules">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rules-button.png" alt="Rules">
					<span class="hide-for-medium-only">RULES</span>
				</a>
			</li>

			<li class="faq">
				<a href="<?php site_url(); ?>/collaboration/faqs">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/faqs-button.png" alt="FAQs">	
					<span class="hide-for-medium-only">FAQs</span>
				</a>
			</li>

			<li class="about">
				<a href="<?php site_url(); ?>/collaboration/about-us">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-button.png" alt="About">
					<span class="hide-for-medium-only">ABOUT</span>
				</a>
			</li>
			
		</ul>

		<a href="<?php home_url(); ?>/collaboration/submission-form/" class="submit-button right">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/submit-button.png" alt="Submit">
			<span class="hide-for-medium-only">ENTRY FORM</span>
		</a>
	</div>
</div>

<div id="mobile-nav" class="row hide-for-medium-up">
	<div class="small-12 columns">
	<select> 
	    <option value="" selected="selected">Navigation</option> 
	    
	    <option value="<?php site_url(); ?>/collaboration">Home</option> 
	    <option value="<?php site_url(); ?>/collaboration/winners">Videos &amp; Winners</option> 
	    <option value="<?php site_url(); ?>/collaboration/judges">Judges</option> 
	    <option value="<?php site_url(); ?>/collaboration/rules">Rules</option> 
	    <option value="<?php site_url(); ?>/collaboration/faqs">FAQs</option> 
	    <option value="<?php site_url(); ?>/collaboration/about">About</option>
	    <option value="<?php site_url(); ?>/collaboration/submit-form">Submit</option>  
	  </select>
	</div>
</div>

<section class="home">
	<div class="row">
		<div class="small-12 medium-10 medium-centered columns">


			<?php 

			$args = array(
				'pagename' => 'collaboration'
			);

			$the_query = new WP_Query( $args ); ?>

			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
				<h2 class="page-title">Submission Deadline Ends In:</h2>

				<div class="calendar">
					<span class="days"><?php

						$date1 = new DateTime(date('Y-m-d'));  //current date or any date
						$date2 = new DateTime("2016-04-30");   //Future date
						$diff = $date2->diff($date1)->format("%a");  //find difference
						$days = intval($diff);   //rounding days
						echo $days;

					?><br>
					Days
				</span>

				</div>

				<?php the_content(); ?>
			<?php endwhile; 
			wp_reset_postdata(); ?>

			<a href="<?php home_url(); ?>/collaboration/submission-form" class="button-entry">
				<img width="150" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button_submit-today.png" alt="Submit Today!">
			</a>

		</div>
	</div>

	<br><br>

	<div class="row">
		<div class="small-12 medium-7 columns submission">
			<h4>Submission Deadlines</h4>
			<hr>
			<ul>
				<li style="background: #dfeed4;"><strong>Grand Prize:</strong> Entries accepted February 1 – April 30</li>
				<li style="background: #d3e3f5;"><strong>February Monthly Prize:</strong><br/>
Entries accepted from 2/1-2/29 and voting takes place from 3/1-3/15</li>
				<li style="background: #fdddc7;"><strong>March Monthly Prize:</strong><br/>
Entries accepted from 3/1-3/31 and voting takes place from 4/1-4/15</li>
				<li style="background: #d3c9e2;"><strong>April Monthly Prize:</strong><br/>
Entries accepted from 4/1-4/30 and voting takes place from 5/1-5/15</li>
			</ul>

			<br><br>

			<h4>Vote for Your Favorite Collaboration Nation Monthly Project on <a href="http://www.facebook.com/cdwgcollaboration/" style="color: #1f58a0;">Facebook</a> <a href="#" class="facebook"><i class="fi-social-facebook"></i></a></h4>
			<hr>
			<p>Share your school or district's success story with the Collaboration Nation community and with your friends, faculty, parents and family. The school or district with the most votes between the first and the fifteenth of March, April and May will win a $15,000 prize in products from Collaboration Nation partners HP, Lenovo, Cisco or Cisco Meraki.</p>
			
			<a href="<?php home_url(); ?>/collaboration/submission-form" class="button-submit">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/voting-begins.png" alt="Voting Begins March 1!">
			</a>
		</div>

		<div class="small-12 medium-4 columns twitter">
			<h4>Twitter <a href="#" class="twitter"><i class="fi-social-twitter"></i></a></h4>
			<hr>
			<p align="center">
                      <a class="twitter-timeline" data-border-color="#cc0000" width="302" height="295"   href="https://twitter.com/search?q=%23k12techsuccess%20OR%20from%3A%40NoApp4Pedagogy%20OR%20from%3A%40CDWNews%20OR%20from%3A%40k12cto" data-widget-id="572504242909229056">Tweets about #k12techsuccess OR from:@NoApp4Pedagogy OR from:@CDWNews OR from:@k12cto</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
          
          

          </p> 

			<hr>
			<h4>Questions? Want to Learn More?</h4>
			<br/>
			<a href="<?php home_url(); ?>/collaboration/faqs" class="button-faq">
				<img width="150" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/button-faq.png" alt="FAQs">
			</a>

		</div>
	</div>
	<br><br>

	<div class="row partnerships">
		<div class="medium-12 columns">
			<h4>In Partnership With</h4>
			<hr>
			<ul class="block-grid-medium-4">
				<?php dynamic_sidebar( 'collaboration-widgets' ); ?>
			</ul>
			
		</div>
	</div>
</section>

<footer>
	<div class="row">
		<div class="medium-6 medium-centered columns">

			<img class="star left" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/star.png" alt="Star" class="left">
			<?php collaboration_nation(); ?>

		</div>
	</div>
</footer>








		</div>
		<a class="exit-off-canvas"></a>

	</div>
	<?php do_action( 'foundationpress_layout_end' ); ?>

	<?php wp_footer(); ?>
	<?php do_action( 'foundationpress_before_closing_body' ); ?>


</body>
</html>

