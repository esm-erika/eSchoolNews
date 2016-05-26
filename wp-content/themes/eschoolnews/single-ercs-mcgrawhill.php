<?php
/**
 * The template for displaying McGraw Hill Multi-Page ERC
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

 get_header(); ?>

<header class="row main-header collapse text-center">
	<div class="small-12 columns">
 		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/mcgrawhill-banner.png" alt="Learning Science Solutions :: Powered By Purpose">
 	</div>
</header>

 <br>

 <div class="row collapse table-grid" data-equalizer="content">
 	<div class="small-12 medium-4 columns engrade">

 		<div class="logo text-center">
 			<a title="Engrade Logo" class="learn-more" href="<?php echo site_url(); ?>/ercs/mcgrawhill-engrade/"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/logo-engrade.png">
 			</a>
 		</div>
		
			<h6 class="text-center">LMS, Assessment, SSO</h6>

 		<div class="row content">
 			<div class="small-12 column" data-equalizer-watch="content">
 				<em>Engrade<sup>&reg;</sup></em> unifies the digital learning ecosystem, bringing together the data, curriculum, and assessments into a single-sign on, cloud-based platform. With products for learning management and assessments, <em>Engrade</em> enables data-driven, personalized learning, connecting students with the instruction they need when they need it. 
 			</div>

 			<div class="text-center learn-more">
 				<a class="learn-more" title="Engrade - Learn More" href="<?php echo site_url(); ?>/mcgrawhill-engrade/">
 					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/button-learn_more.png">
 				</a>
 			</div>
 		</div>
 		
 	</div>
 	<div class="small-12 medium-4 columns acuity">

 		<div class="logo text-center">
 			<a title="Acuity Logo" class="learn-more" href="<?php echo site_url(); ?>/ercs/mcgrawhill-acuity/">
 				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/logo-acuity.png">
 			</a>

 		</div>
 		
 			<h6 class="text-center">K&ndash;12 Assessments</h6>
 		
 		<div class="row content">
 			<div class="small-12 column" data-equalizer-watch="content">
 				<em>Acuity<sup>&reg;</sup></em> K&ndash;12 interim assessment solution provides valid and reliable measurements of student growth and proficiency, informs instruction, and offers engaging instructional content. This data-driven solution is in use every day in thousands of districts, helping educators gain a deeper understanding of each student’s strengths and opportunities for instructional improvement relative to state standards.
 			</div>

 			<div class="text-center learn-more">
 				<a class="learn-more" title="Acuity - Learn More" href="<?php echo site_url(); ?>/mcgrawhill-acuity/">
 					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/button-learn_more.png">
 				</a>
 			</div>
 		</div>
 		
 	</div>
 	<div class="small-12 medium-4 columns thrive">

 		<div class="logo text-center">
 			<a title="Thrive Logo" class="learn-more" href="<?php echo site_url(); ?>/ercs/mcgrawhill-thrive/">
 				<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/logo-thrive.png">
 			</a>

 		</div>
 		
 			<h6 class="text-center">Digital Teaching and Learning</h6>

 		<div class="row content">
 			<div class="small-12 column" data-equalizer-watch="content">
 				<em>Thrive<sup>&reg;</sup></em> powered by Time to Know<sup>&trade;</sup> offers purely digital, core curriculum for ELA, Math, and Science, that is research-based and proven to improve student learning in the 1:1 powered classroom. It blends advanced technology with multiple proven teaching practices to create a rich standards-based digital learning experience. <em>Thrive</em> allows you to easily plan and manage your 1:1 classroom, and provide differentiated instructional support.
 			</div>

 			<div class="text-center learn-more">
 				<a title="Learn More" class="learn-more" href="<?php echo site_url(); ?>/mcgrawhill-thrive/">
 					<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/button-learn_more.png">
 				</a>
 			</div>
 		</div>
 		
 	</div>
 </div>


 <div class="row collapse">
 	<div class="small-12 medium-8 columns">

 		<div class="learn-more-box">
 			<p>McGraw-Hill Education connects decision makers and innovative educators with purposeful technology, bringing together comprehensive teaching tools with proven educational content.  Grounded in deep insights into how learning happens, we deliver tools, platforms, and services proven to power performance and achievement. We harness technology and data insights both inside and outside the classroom to ignite the spark between teaching and learning.</p>

			<p>This ideal blend of technology, content, and inspiration isn’t a distant dream&mdash;with McGraw-Hill Education, you can see it in action today.</p>

			<a title="McGraw Hill - Learn More" class="learn-more" href="http://www.mheducation.com/prek-12/platforms.html" target="_blank">
				<img style="border: 3px solid #fff;" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/mcgrawhill/button-learn_more.png">
			</a>
 		</div>
 		
 	</div>
 	<div class="small-12 medium-4 columns text-center">
 		<?php get_template_part( 'parts/ads/embeddedbanner' ); ?>
 	</div>
 </div>

 <?php get_footer(); ?>