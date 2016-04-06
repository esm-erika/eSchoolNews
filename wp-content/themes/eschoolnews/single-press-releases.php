<?php
/**
 * Template Name: About Page Template
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



<div class="row">
	<div class="small-12 medium-10 medium-centered large-8 large-centered columns" role="main">

		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<div class="row">
			<div class="small-8 small-centered medium-6 medium-centered large-6 large-centered columns">
						<?php the_post_thumbnail(); ?>
			</div>
		</div>
	

		<div class="text-center">
			<span><?php the_field('press_address_1'); ?></span>
			
				<?php 
				if(get_field('press_address_2')) {
				echo ', <span>';
				the_field('press_address_2');
				echo '</span><br>';
				} ?>
			
			<span> <?php the_field('press_city_state_zip'); ?><br></span>
			<span><?php the_field('press_contact_number'); ?><br></span>
			<span>
				<a target="_blank" href="<?php the_field('press_website'); ?>">
					<?php the_field('press_website'); ?>
				</a>
			</span>

		</div>

		<hr>

		<h3 class="text-center">PRESS RELEASE</h3>

		<br>

		<div>			

			<p>For more information contact:</p>


			<ul style="margin: 0; list-style: none;">
			<li><strong>Name:</strong> <?php the_field('press_contact_name'); ?></li>
			<li><strong>Phone:</strong> <?php the_field('press_contact_number'); ?></li>
			<li><strong>Email:</strong> <a href="mailto:<?php the_field('press_contact_email'); ?>"><?php the_field('press_contact_email'); ?></a></li>
			</ul>
		</div>
		<br><br>
		
<div class="text-center" style="text-transform: uppercase;"><strong>For Immediate Release</strong></div>

		<h1 class="text-center" style="text-transform: uppercase;"><?php the_title(); ?></h1>
		<h4 class="text-center"><?php the_field('subheadline') ?></h4>

		<br>

		<?php 

		// get raw date
		$date = get_field('press_release_date', false, false);

		// make date object
		$date = new DateTime($date);

		?>
		

		

		<div class="content">
			

			<strong class="left"><span style="text-transform: uppercase;"><?php the_field('press_release_city'); ?></span>, <?php echo $date->format('F j, Y'); ?> &mdash;</strong><?php the_content(); ?>
		</div>

		<div class="text-center"><strong>###</strong></div>

		<div>
			<h5>About <?php the_field('company_name'); ?></h5>
			<?php the_field('about_company'); ?>
		</div>
		

	<?php endwhile; endif; ?>
	
	</div>
	
<?php //get_sidebar('staff'); ?>
</div>
<?php get_footer(); ?>
