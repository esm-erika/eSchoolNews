<?php
/**
 * The template for displaying McGraw Hill Multi-Page ERC
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

 get_header(); ?>

<div id="content">

<header class="row collapse header-engrade">
	<div class="small-12 columns">
 		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/banner-engrade.png" alt="Curriculum; Meet Data.">

 		<nav class="show-for-large-up" id="main-nav">
 			<h5 class="left"><a href="<?php echo site_url(); ?>/ercs/mcgrawhill/">Learning Science Solutions</a></h5>
			<ul class="left">
				<li><h5><a class="active" href="<?php echo site_url(); ?>/ercs/mcgrawhill-engrade">Engrade<sup>&reg;</sup></a></h5></li>
				<li><h5><a href="<?php echo site_url(); ?>/ercs/mcgrawhill-acuity">Acuity<sup>&reg;</sup></a></h5></li>
				<li><h5><a href="<?php echo site_url(); ?>/ercs/mcgrawhill-thrive">Thrive<sup>&trade;</sup></a></h5></li>
			</ul>
 		</nav>

 		<br>

 		<select class="hide-for-large-up" onchange="window.location.href=this.value;"> 
		  	<option value="<?php echo site_url(); ?>/ercs/mcgrawhill/">Home</option> 	    
			<option selected="selected" value="<?php echo site_url(); ?>/ercs/mcgrawhill-engrade/">Engrade</option> 
		    <option value="<?php echo site_url(); ?>/ercs/mcgrawhill-acuity/">Acuity</option> 
		    <option value="<?php echo site_url(); ?>/ercs/mcgrawhill-thrive/">Thrive</option> 
		</select>
 		</div>
</header>

<div class="row collapse" data-equalizer>
	<div class="small-12 medium-8 columns" data-equalizer-watch>

		<div class="row" id="body">
			<div class="small-12 columns">

				<article>
					<div class="row">
						<div class="small-12 columns">
							<h3>Engrade: Curriculum, Meet Data.</h3>

							<p><em>Engrade<sup>&reg;</sup></em> combines learning management and assessment into a single powerful platform.</p>

							<p>The complete <em>Engrade</em> suite brings together learning management and assessment in a single platform with a single sign-on. Connecting curriculum, assessments, and data across the learning cycle, Engrade helps students learn what they need, when they need it.</p>

							<a href="http://www.mheducation.com/prek-12/platforms/engrade/about.html" class="button tiny learn-more" title="Learn More" target="_blank">Learn More</a>
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
					well as IMS and Learning Tools Interoperability<sup>&reg;</sup> (LTI<sup>&reg;</sup>) standards.

					<hr>
					
					<h4>Monitor Learning Progress</h4>
					Examine results by student, classroom, school, or district-wide, with a
					powerful Data Wall visualization that captures student performance
					across assessments.

					<hr>

					<h4>Deliver Impactful Assessment</h4>
					Design assessments with more than fifteen tech-enhanced questions,
					or distribute assessments at the district level for consistent metrics
					across schools.

					<hr>
					
					<h4>Communicate and Collaborate</h4>
					Send and receive messages with parents and students; assign and
					grade homework from within <em>Engrade</em>.
				</article>
				
			</div>
		</div>

		<br>

		<div class="row" id="sponsor">
			<div class="small-12 medium-3 columns">
				<p>Sponsored by:</p>
				
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/logo-mcgrawhill.png" alt="McGraw Hill Education">

			</div>
		</div>

	</div>


	<div class="small-12 medium-4 columns" id="sidebar" data-equalizer-watch>

		<div class="row" >
			<div class="small-12 columns">
				
				<h4><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/lightbulb.png" class="left"> Insights &amp; Resources</h4>

				<aside>
					<h5>Unify Your Digital Learning Ecosystem</h5>

						
					<img width="128" class="right-for-large-only cover" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/cover-engrade_unify-your-digital-learning-ecosystem.png" alt="Unify Your Digital Learning Ecosystem">

					<a href="http://www.eschoolnews.com/pdfs/engrade-overview-brochure/" target="_blank" class="button tiny view-now" title="Engrade - View Now">View Now</a>
							
					<div class="clearfix"></div>
				</aside>

				<aside>
					<h5>Transforming The Learning Experience In Baltimore County, MD</h5>

					<img width="128" class="right-for-large-only cover" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/cover-engrade_transforming-the-learning-experience-in-baltimore.png" alt="Transforming The Learning Experience In Baltimore County, MD">

					<a href="http://www.eschoolnews.com/pdfs/engrade-balitmore-city-public-schools-case-study/" target="_blank" class="button tiny view-now" title="Engrade - View Now">View Now</a>

					<div class="clearfix"></div>
				</aside>

				<aside>
					<h5>engrade Inform</h5>

					<img width="128" class="right-for-large-only cover" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/cover-engrade_engrade-inform.png" alt="engrade INFORM">

					<a href="http://www.eschoolnews.com/pdfs/engrade-inform-brochure/" target="_blank" class="button tiny view-now" title="Engrade - View Now">View Now</a>

					<div class="clearfix"></div>
				</aside>

				<aside id="top-stories">
					<h5>eSchool News Resources</h5>

					<h4>
					<a href="http://www.eschoolnews.com/2015/05/13/post-lms-era-437/" target="_blank">5 Core Functions of the LMS of the Future</a></h4>

					<hr>

					<h4><a href="http://www.eschoolnews.com/2014/12/22/education-lms-590/" target="_blank">12 Big Education Challenges Your LMS can Solve</a></h4>

					<div class="clearfix"></div>
				</aside>

				<?php get_template_part( 'parts/ads/embeddedbanner' ); ?>
				
			</div>
		</div>



		
		
	</div>
</div>

<hr>

<div class="row">
	<div class="small-12 columns">
		<small>Learning Tools Interoperability® (LTI®) is a trademark of the IMS Global Learning Consortium, Inc. (www.imsglobal.org)</small>
	</div>
</div>

		

 
</div>
 <?php get_footer(); ?>