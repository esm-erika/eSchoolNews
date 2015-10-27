<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">

	<?php get_template_part( 'parts/section-titles' ); ?>

<ul class="tabs" data-tab role="tablist">
		  <li class="tab-title active" role="presentation"><a href="#panel1" role="tab" tabindex="0" aria-selected="true" aria-controls="panel1">All White Papers</a></li>
		  <li class="tab-title" role="presentation"><a href="#panel2" role="tab" tabindex="0" aria-selected="true" aria-controls="panel2">Curriculum</a></li>
		  <li class="tab-title" role="presentation"><a href="#panel3" role="tab" tabindex="0" aria-selected="true" aria-controls="panel3">Digital</a></li>
		  <li class="tab-title" role="presentation"><a href="#panel4" role="tab" tabindex="0" aria-selected="true" aria-controls="panel4">Mobile &amp; Online Learning</a></li>
		  <li class="tab-title" role="presentation"><a href="#panel5" role="tab" tabindex="0" aria-selected="true" aria-controls="panel5">Technologies</a></li>
</ul>
<br/>
	
<!-- Row for main content area -->
	<div class="small-8 medium-8 columns" role="main">



	<div class="tabs-content">
        

<section role="tabpanel" aria-hidden="false" class="content active" id="panel1">
		 
		    <h3>All White Papers</h3>
		    <ul class="medium-block-grid-2" data-equalizer>
		    <?php

				// The Query
				$args = array(
					'post_type' => 'whitepapers',
					'orderby' => 'rand'
					);

				$query = new WP_Query( $args ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<li data-equalizer>
                        <h4><?php the_title(); ?></h4>
						<?php the_post_thumbnail( 'thumbnail', 'wp-post-image' ); ?> 
						<a href="#" class="button tiny radius" data-reveal-id="<?php the_slug(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
				</li>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</ul>
		

		  </section>
 
		  <section role="tabpanel" aria-hidden="true" class="content" id="panel2">
		    <h3>Curriculum</h3>
		    <ul class="medium-block-grid-2">

		    <?php

				// The Query
				$args2 = array(
					'post_type' => 'whitepapers',
					'orderby' => 'rand',
					'taxonomy' => 'subject_categories',
					'term' => 'curriculum-whitepapers'
					
					);

				$query = new WP_Query( $args2 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>
				<li data-equalizer>
						<h4><?php the_title(); ?></h4>
                        <?php the_post_thumbnail( 'thumbnail', 'wp-post-image' ); ?> 
						<a href="#" class="button tiny radius" data-reveal-id="<?php the_slug(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
				</li>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

		   </ul>
		  </section>
		  <section role="tabpanel" aria-hidden="true" class="content" id="panel3">
		    <h3>Digital</h3>

		    <ul class="medium-block-grid-2">

		    <?php

				// The Query
				$args3 = array(
					'post_type' => 'whitepapers',
					'orderby' => 'rand',
					'taxonomy' => 'subject_categories',
					'term' => 'digital-whitepapers'

					);

				$query = new WP_Query( $args3 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<li data-equalizer>
						<h4><?php the_title(); ?></h4>
						<?php the_post_thumbnail( 'thumbnail', 'wp-post-image' ); ?> 
						<a href="#" class="button tiny radius" data-reveal-id="<?php the_slug(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
				</li>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</ul>
		  </section>
		  <section role="tabpanel" aria-hidden="true" class="content" id="panel4">

		    <h3>Mobile &amp; Online Learning</h3>

		    <ul class="medium-block-grid-2">

		    <?php

				// The Query
				$args4 = array(
					'post_type' => 'whitepapers',
					'orderby' => 'rand',
					'taxonomy' => 'subject_categories',
					'term' => 'mobile-online-whitepapers'

					);

				$query = new WP_Query( $args4 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<li data-equalizer>
						<h4><?php the_title(); ?></h4>
						<?php the_post_thumbnail( 'thumbnail', 'wp-post-image' ); ?> 
						<a href="#" class="button tiny radius" data-reveal-id="<?php the_slug(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
				</li>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</ul>
		  </section>
		<section role="tabpanel" aria-hidden="true" class="content" id="panel5">
			<h3>Technologies</h3>

			<ul class="medium-block-grid-2">

			<?php

				// The Query
				$args5 = array(
					'post_type' => 'whitepapers',
					'orderby' => 'rand',
					'taxonomy' => 'subject_categories',
					'term' => 'technologies-whitepapers'

					);

				$query = new WP_Query( $args5 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>
				
				<li data-equalizer>
						<h4><?php the_title(); ?></h4>
						<?php the_post_thumbnail( 'thumbnail', 'wp-post-image' ); ?> 
						<a href="#" class="button tiny radius" data-reveal-id="<?php the_slug(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
				</li>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		
		</section> 

		</div>

		


	</div>
	<?php get_sidebar(); ?>


</div>
<?php get_footer(); ?>
