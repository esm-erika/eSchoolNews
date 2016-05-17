<?php
/**
 * The template for displaying McGraw Hill Multi-Page ERC
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

 get_header(); ?>

<header class="header-engrade">
 		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/banner-engrade.png" alt="Curriculum; Meet Data.">

 		<nav id="main-nav">
 			<h5 class="left">Learning Science Solutions:</h5>
			<ul class="left">
				<li><h5><a class="active" href="<?php echo site_url(); ?>/ercs/mcgrawhill-engrade">Engrade<sup>&reg;</sup></a></h5></li>
				<li><h5><a href="<?php echo site_url(); ?>/ercs/mcgrawhill-acuity">Acuity<sup>&reg;</sup></a></h5></li>
				<li><h5><a href="<?php echo site_url(); ?>/ercs/mcgrawhill-thrive">Thrive<sup>&trade;</sup></a></h5></li>
			</ul>
 		</nav>
</header>

<div class="row collapse" data-equalizer>
	<div class="small-12 medium-8 columns" data-equalizer-watch>

		<div class="row" id="body">
			<div class="small-12 columns">

				<article>
					<div class="row">
						<div class="small-12 columns">
							<h3>Learning math Starts with a Connection.</h3>

							<p><em>Engrade<sup>&reg;</sup></em> combines learning management and assessment into a single powerful platform.</p>

							<p>The complete Engrade® suite brings together learning management and assessment
							in a single platform with a single sign-on. Connecting curriculum,
							assessments, and data across the learning cycle, Engrade helps students
							learn what they need, when they need it.</p>

							<a href="http://www.mheducation.com/prek-12/platforms/engrade/about.html" class="button tiny" target="_blank">Learn More</a>
						</div>
					</div>
				</article>

				<div class="video">
					<iframe width="560" height="315" src="https://www.youtube.com/embed/vZqzbBGg-MQ" frameborder="0" allowfullscreen></iframe>
				</div>

				<article>
					<h4>Centralize Content and Curriculum</h4>
					One open, integrated repository for curriculum resources across
					providers, with full support for open educational resources (OER) as
					well as IMS and Learning Tools Interoperability® (LTI) standards.

					<hr>
					
					<h4>Monitor Learning Progress</h4>
					Examine results by student, classroom, school, or district -wide, with a
					powerful Data Wall visualization that captures student performance
					across assessments.

					<hr>

					<h4>Deliver Impactful Assessment</h4>
					Design assessments with more than fifteen tech- enhanced questions,
					or distribute assessments at the district level for consistent metrics
					across schools.

					<hr>
					
					<h4>Communicate and Collaborate</h4>
					Send and receive messages with parents and students; assign and
					grade homework from within Engrade.
				</article>
				
			</div>
		</div>

		<br>

		<div class="row" id="sponsor">
			<div class="small-12 medium-3 columns">
				<p>Sponsored by:</p>
				
				<img width="144" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/logo-mcgrawhill.png" alt="McGraw Hill Education">

			</div>
		</div>

	</div>

	<div class="small-12 medium-4 columns" id="sidebar" data-equalizer-watch>

		<div class="row" >
			<div class="small-12 columns">
				
				<h4><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/lightbulb.png" class="left"> Insights &amp; Resources</h4>

				<aside>
					<h5>Unify Your Digital Learning Ecosystem</h5>

					<img width="128" class="right cover" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/cover-engrade_unify-your-digital-learning-ecosystem.png" alt="Unify Your Digital Learning Ecosystem">

					<a href="http://www.eschoolnews.com/pdfs/engrade-overview-brochure/" target="_blank" class="button tiny">View Now</a>
							
					<div class="clearfix"></div>
				</aside>

				<aside>
					<h5>Transforming The Learning Experience In Baltimore County, MD</h5>

					<img width="128" class="right cover" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/cover-engrade_transforming-the-learning-experience-in-baltimore.png" alt="Transforming The Learning Experience In Baltimore County, MD">

					<a href="http://www.eschoolnews.com/pdfs/engrade-balitmore-city-public-schools-case-study/" target="_blank" class="button tiny">View Now</a>

					<div class="clearfix"></div>
				</aside>

				<aside>
					<h5>engrade Inform</h5>

					<img width="128" class="right cover" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/cover-engrade_engrade-inform.png" alt="engrade INFORM">

					<a href="http://www.eschoolnews.com/pdfs/engrade-inform-brochure/" target="_blank" class="button tiny">View Now</a>

					<div class="clearfix"></div>
				</aside>

				<aside id="top-stories">
					<h5>eSchool News - Top News</h5>

					<?php // The Query
			
				    global $pagefeaturedid; 

					$exclude_val = get_option( 'esm_top_story_exclude' );	
					
					$topstories = new WP_Query(array(
					'post_type' => 'post',
					'posts_per_page' => 2,
					'post__not_in' => array($pagefeaturedid),
					'cat' => -$exclude_val
					)); 

				  	while ( $topstories->have_posts() ) : $topstories -> the_post(); ?>

					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

					<hr>

				  	<?php endwhile; wp_reset_query(); ?>

					<div class="clearfix"></div>
				</aside>

				<div class="text-center">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/ad-engrade.png" alt="engrade: Transform the Learning Experience">
				</div>
				
			</div>
		</div>

		
		
	</div>
</div>

 

 <?php get_footer(); ?>