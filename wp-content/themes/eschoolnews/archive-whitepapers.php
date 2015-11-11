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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
	$("#panel1").click(function(){
        $("div.row.curriculum-whitepapers").show();
		$("div.row.digital-whitepapers").show();
		$("div.row.technologies-whitepapers").show();
		$("div.row.mobile-online-whitepapers").show();
    });

	$("#panel2").click(function(){
		$("div.row.digital-whitepapers").hide();
		$("div.row.technologies-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").hide();
        $("div.row.curriculum-whitepapers").show();
    });

	$("#panel3").click(function(){
        $("div.row.curriculum-whitepapers").hide();
		$("div.row.technologies-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").hide();
		$("div.row.digital-whitepapers").show();
    });

	$("#panel4").click(function(){
        $("div.row.curriculum-whitepapers").hide();
		$("div.row.digital-whitepapers").hide();
		$("div.row.technologies-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").show();
    });	
    
	$("#panel5").click(function(){
        $("div.row.curriculum-whitepapers").hide();
		$("div.row.digital-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").hide();
		$("div.row.technologies-whitepapers").show();
    });
	$("#panel6").click(function(){
        $("div.row").hide();
    });	
	
});
</script>

<div class="row">
<button id="#panel1">All White Papers</button>
<button id="#panel2">Curriculum</button>
<button id="#panel3">Digital</button>
<button id="#panel4">Mobile &amp; Online Learning</button>
<button id="#panel5">Technologies</button>
<button id="#panel6">Hide All (test)</button>
</div>

<!-- <ul class="tabs" data-tab role="tablist">
		  <li class="tab-title active" role="presentation" id="#panel1"><a href="#panel1" role="tab" tabindex="0" aria-selected="true" aria-controls="panel1">All White Papers</a></li>
		  <li class="tab-title" role="presentation" id="#panel2"><a href="#panel2" role="tab" tabindex="0" aria-selected="true" aria-controls="panel2">Curriculum</a></li>
		  <li class="tab-title" role="presentation" id="#panel3"><a href="#panel3" role="tab" tabindex="0" aria-selected="true" aria-controls="panel3">Digital</a></li>
		  <li class="tab-title" role="presentation" id="#panel4"><a href="#panel4" role="tab" tabindex="0" aria-selected="true" aria-controls="panel4">Mobile &amp; Online Learning</a></li>
		  <li class="tab-title" role="presentation" id="#panel5"><a href="#panel5" role="tab" tabindex="0" aria-selected="true" aria-controls="panel5">Technologies</a></li>
</ul> -->
	
<!-- Row for main content area -->
	<div class="small-8 medium-8 columns" role="main">



	<div class="tabs-content">
        

<section role="tabpanel" aria-hidden="false" class="content active" id="panel1">
		 
		    <h4>All White Papers</h4>
		    <br/>
		    <?php

				// The Query
				$args = array(
					'post_type' => 'whitepapers',
					'posts_per_page' => '-1'
					);

				$query = new WP_Query( $args ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

					<div class="row<?php 
					$terms = wp_get_post_terms( $post->ID, 'subject_categories' );
					foreach ( $terms as $term ) { echo " ".$term->slug ; } ?>">


						
							<?php 

							if (has_post_thumbnail()) { ?>

							<div class="medium-4 columns">

							<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?> 

						    <img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
							
							</div>
                    	<div class="medium-8 columns">

						    <?php }else{ ?>

						    <div class="medium-12 columns">

						    <?php } ?>
                    	

                    	<h5><?php the_title(); ?></h5>

                    	<p class="excerpt">
							<?php 
							echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); 
							?>
						</p>
						
						<?php
						$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);

						if ( is_user_logged_in()  and !$WPForm > 0) { ?>

							<a class="button tiny radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a>


						<?php } else { // not logged in ?>
					
                        
                        <a href="#" class="button tiny radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
                        
                        
                        	<?php } ?>
					</div>
					<hr/>
                    </div>

					
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

		

		  </section>
 <?php /*
		  <section role="tabpanel" aria-hidden="true" class="content" id="panel2">
		    <h4>Curriculum</h4>
		    <br/>

		    <?php

				// The Query
				$args2 = array(
					'post_type' => 'whitepapers',
					'taxonomy' => 'subject_categories',
					'term' => 'curriculum-whitepapers',
					'posts_per_page' => '-1'
					
					);

				$query = new WP_Query( $args2 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>
				
					<div class="row">
						<?php 

							if (has_post_thumbnail()) { ?>

							<div class="medium-4 columns">

							<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?> 

						    <img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
							
							</div>
                    	<div class="medium-8 columns">

						    <?php }else{ ?>

						    <div class="medium-12 columns">

						    <?php } ?>
                    	

                    	<h5><?php the_title(); ?></h5>

                    	<p class="excerpt">
							<?php 
							echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
							?>
						</p>
						
<?php 
						

						$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);

if ( is_user_logged_in()  and !$WPForm > 0){ ?>

							<a class="button tiny radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a>


						<?php } else { // not logged in ?>
						
                        
                        <a href="#" class="button tiny radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
						
						<?php } ?>
					</div>
					</div>

					<hr/>

					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

		 
		  </section>
		  <section role="tabpanel" aria-hidden="true" class="content" id="panel3">
		    <h4>Digital</h4>
		    <br/>


		    <?php

				// The Query
				$args3 = array(
					'post_type' => 'whitepapers',
					'taxonomy' => 'subject_categories',
					'term' => 'digital-whitepapers',
					'posts_per_page' => '-1'

					);

				$query = new WP_Query( $args3 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<div class="row">
						<?php 

							if (has_post_thumbnail()) { ?>

							<div class="medium-4 columns">

							<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?> 

						    <img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
							
							</div>
                    	<div class="medium-8 columns">

						    <?php }else{ ?>

						    <div class="medium-12 columns">

						    <?php } ?>
                    	

                    	<h5><?php the_title(); ?></h5>

                    	<p class="excerpt">
							<?php 
							echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
							?>
						</p>
						
<?php
						$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);

if ( is_user_logged_in()  and !$WPForm > 0) {?>

							<a class="button tiny radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a>


						<?php } else { // not logged in ?>
						
                        

                        <a href="#" class="button tiny radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
						<?php } ?>
					</div>
					</div>

					<hr/>
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

		  </section>
		  <section role="tabpanel" aria-hidden="true" class="content" id="panel4">

		    <h4>Mobile &amp; Online Learning</h4>
		    <br/>


		    <?php

				// The Query
				$args4 = array(
					'post_type' => 'whitepapers',
					'taxonomy' => 'subject_categories',
					'term' => 'mobile-online-whitepapers',
					'posts_per_page' => '-1'

					);

				$query = new WP_Query( $args4 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<div class="row">
						<?php 

							if (has_post_thumbnail()) { ?>

							<div class="medium-4 columns">

							<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?> 

						    <img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
							
							</div>
                    	<div class="medium-8 columns">

						    <?php }else{ ?>

						    <div class="medium-12 columns">

						    <?php } ?>
                    	

                    	<h5><?php the_title(); ?></h5>

                    	<p class="excerpt">
							<?php 
							echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
							?>
						</p>
						
<?php
						$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);

if ( is_user_logged_in()  and !$WPForm > 0)  {?>

							<a class="button tiny radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a>


						<?php } else { // not logged in ?>
						
                        <a href="#" class="button tiny radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
						<?php } ?>
                        
					</div>
					</div>

					<hr/>

					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</ul>
		  </section>
		<section role="tabpanel" aria-hidden="true" class="content" id="panel5">
			<h4>Technologies</h4>
			<br/>


			<?php

				// The Query
				$args5 = array(
					'post_type' => 'whitepapers',
					'taxonomy' => 'subject_categories',
					'term' => 'technologies-whitepapers',
					'posts_per_page' => '-1'

					);

				$query = new WP_Query( $args5 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>
				
				<div class="row">
						<?php 

							if (has_post_thumbnail()) { ?>

							<div class="medium-4 columns">

							<?php $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large' ); ?> 

						    <img data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]" alt="<?php the_title(); ?>">
							
							</div>
                    		
                    		<div class="medium-8 columns">

						    <?php }else{ ?>

						    <div class="medium-12 columns">

						    <?php } ?>
                    	

                    	<h5><?php the_title(); ?></h5>

                    	<p class="excerpt">
							<?php 
							echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
							?>
						</p>
						
				<?php
						$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);

if ( is_user_logged_in() and !$WPForm > 0)  { ?>

							<a class="button tiny radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( 'Permalink to %s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit" > Download </a>


						<?php } else { // not logged in ?>
						
                        
                        <a href="#" class="button tiny radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download</a>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
						
						<?php } ?>
					</div>
					</div>

					<hr/>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
		
		</section> 
*/ ?>
		</div>

		


	</div>
	<?php get_sidebar(); ?>


</div>

<?php get_footer(); ?>