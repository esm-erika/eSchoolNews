<?php /* Template Name: Collaboration Nation Template */ ?>

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
						<a class="facebook" href="#"><i class="fi-social-facebook"></i></a>
					</div>

					<div class="sponsored-by text-left right">
						<small>Sponsored By</small> <br/>
						<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/cdwg-logo.gif"/>
					</div>
				</div>
			</div>
		</nav>
	



		<img class="text" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/collaboration-banner-text.png" alt="">


	</header>

	<div class=" row buttons-container">
		
	<div class="medium-12 columns">
		<a href="#" class="menu-icon left">
			<?php if (is_page('winners')){ ?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/prizes-button.png" alt="Videos &amp; Winners">
			<?php } elseif( is_page('judges')){ ?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/judges-button.png" alt="Judges">
			<?php } elseif( is_page('rules')){ ?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/rules-button.png" alt="Rules">
			<?php } elseif( is_page('faqs')){ ?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/faqs-button.png" alt="FAQs">
			<?php } elseif( is_page('about-us')){ ?>
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/about-button.png" alt="About Us">
			<?php } ?>
		</a>
		

		<a href="#" class="submit-button right">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/submit-button.png" alt="Submit">
		</a>
	</div>
</div>

<section class="inside <?php the_slug(); ?>">
	<div class="row">
		<div class="small-12 medium-8 medium-centered columns">

				<h2 class="page-title"><?php the_title(); ?></h2>

				<?php 
				if ( have_posts() ) {
					while ( have_posts() ) {
						the_post(); 
						//
						the_content();
						//
					} // end while
				} // end if
				?>

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