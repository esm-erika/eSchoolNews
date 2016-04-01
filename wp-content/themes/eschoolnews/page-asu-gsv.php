<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>
</div>

<section id="player">
<div class="row full-width collapse" data-equalizer>
	<div class="small-12 medium-12 large-3 columns" style="background-color: #2acf23;" data-equalizer-watch>
		<div class="row collapse">
			<div class="small-6 medium-6 large-12 columns">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/asu-gsv_logo.png" alt="2016 ASU GSV Summit">
		</div>
		<div class="small-6 medium-6 large-12 columns">
		<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/asu-gsv_date.png" alt="">
		</div>
		</div>
	</div>
	<div class="small-12 medium-12 large-9 columns video-player" data-equalizer-watch>
		<div class="row">
			<div class="small-12 large-centered columns">
				<h1 class="text-center">Live Conference Coverage</h1>
			</div>
		</div>

		<section class="text-center">
				

				<article class="row">
					<div class="small-12 medium-9 medium-centered large-9 large-centered columns text-left">
						<h4>Description of Video</h4>

						<img class="center" src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player">

						<hr class="thick">
						<strong>April 12, 2016</strong>
						<p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin tempus dapibus pulvinar. Mauris iaculis dignissim dolor, sed consequat tortor tristique ut.</p>
					</div>
				</article>
				</section>
	</div>
</div>
</section>

<br>





<div class="container-content">

<section id="sponsors">
	<div class="row">
		<div class="small-12 columns">
			<p class="small-caps">Brought to you by:</p>

			<ul class="small-block-grid-2 medium-block-grid-3 large-block-grid-6">
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
				<li class="text-center">LOGO</li>
			</ul>
			
		</div>

	</div>
</section>


<hr class="thick">

	<div class="row">
		
		<div class="small-12 columns text-center">
			
			<a target="_blank" href="http://asugsvsummit.com/2016-agenda/" class="button radius custom-button">View 2016 Agenda</a>


		</div>
	</div>
</div>

<section id="archive">
	<div class="row">
		<div class="small-12 columns">
			<h4>Archive of Videos</h4>

			<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-3">
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>
				<li><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/shindig-video.png" alt="Video Player"></li>				
			</ul>
		</div>
	</div>
</section>


<!-- <section id="profiles">
	<div class="row">
		<h4>2016 Speakers</h4>
		
		<ul class="small-block-grid-1 medium-block-grid-2">
			<li>
				<div class="row collapse">
					<div class="small-6 columns">
						
					</div>
					<div class="small-6 columns">
						
					</div>
				</div>
			</li>

		</ul>

	</div>
</section> -->



<?php get_footer(); ?>