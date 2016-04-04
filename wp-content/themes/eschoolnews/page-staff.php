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
	<div class="small-12 large-12 columns" role="main">

		<?php

		// check if the repeater field has rows of data
		if( have_rows('staff_departments') ):

		 	// loop through the rows of data
		    while ( have_rows('staff_departments') ) : the_row(); ?>

		       <h4><?php the_sub_field('department_name'); ?></h4>


		       	<?php 

				$posts = get_sub_field('staff_members');

				if( $posts ): ?>
				   
				   <ul class="small-block-grid-1 medium-block-grid-4">

				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>
				        <li>
				            <a href="#" rel="bookmark" data-reveal-id="<?php the_slug(); ?>" title="<?php the_title_attribute(); ?>">
					        	 <?php the_post_thumbnail('small-portrait'); ?>
					        	 <?php the_title(); ?>
					        </a>

					          <?php if(get_field('staff_title')) {

					            echo '<div class="small-caps">';

					            the_field('staff_title', $post); 

					            echo '</div>';

					          } ?>

					          <div id="<?php the_slug(); ?>" class="reveal-modal" data-reveal aria-labelledby="<?php the_title(); ?>" aria-hidden="true" role="dialog">
             
					            <div class="row">
					              <div class="small-12 medium-3 columns">
					                <?php the_post_thumbnail('small-portrait'); ?>
					              </div>
					              <div class="small-12 medium-9 columns">

					             

					              <h1 class="entry-title"><?php the_title(); ?></h1>
					              <h4><?php the_field('staff_title'); ?></h4>
					              
					              <?php  

					                $taxonomy = 'staff';
					                $terms = get_the_terms( $post->ID , 'departments' );
					                $terms_name = $terms[0]->name;

					                echo '<div class="small-caps">';
					                echo $terms_name;
					                echo '</div>';

					              ?>
					              <hr>

					              <?php the_content(); ?>

					              <hr>
					            
					            <?php get_template_part('parts/social'); ?> 

					             </div>
					            </div>             

					      <a class="close-reveal-modal" aria-label="Close">&#215;</a>
					            </div>
				            
				        </li>
				    <?php endforeach; ?>
				    </ul>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>
		       	

		    <?php endwhile;

		else :

		    // no rows found

		endif;

		?>
	
	</div>
	
<?php //get_sidebar('staff'); ?>
</div>
<?php get_footer(); ?>
