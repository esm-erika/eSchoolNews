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


<!-- Row for main content area -->
	<div class="small-12 medium-12 columns" role="main">

		
				
			


		<?php 

		$args = array(
			'post_type' => 'symposiums',
			'posts_per_page' => '1',
			'order' => 'DESC'

			);

		// the query
		$the_query = new WP_Query( $args ); ?>

		<?php if ( $the_query->have_posts() ) : ?>

			<!-- the loop -->
			<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

			<?php if(has_post_thumbnail()) {

				echo '<div class="row"><div class="small-12 medium-12 columns text-center">';

				echo '<a href="' . get_permalink() . '">';

				the_post_thumbnail('full');

				echo '</a>';

				echo '</div></div>';

				echo '<br>';
			}?>

			<?php if(get_field('symposium_intro')) {

				the_field('symposium_intro');

			} ?>

			<?php 

				$posts = get_field('symposium_entries');

				if( $posts ): ?>

				    <ul class="small-block-grid-1 medium-block-grid-2" data-equalizer>
				    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>
				        <li>
				        	<article class="panel" data-equalizer-watch>
				        		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				        		<?php if(get_field('symposium_subhead')){
				        			echo '<h3>';
				        			the_field('symposium_subhead');
				        			echo '</h3>';
				        		} ?>

				        		<?php if(get_field('symposium_author')){

				        			echo '<p class="small-caps">By ';
				        			the_field('symposium_author');
				        			echo '<br>';
				        			the_field('symposium_author_title');
				        			echo '</p>';

				        		} ?>
									<?php the_excerpt(); ?>

									<h6><a href="<?php the_permalink(); ?>">Read more</a></h6>
				        	</article>
				            
				        </li>
				    <?php endforeach; ?>
				    </ul>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>


				<?php 

				$more = get_field('additional_entries');

				if( $more ): ?>

				<h4>Additional Commentary <?php the_title(); ?></h4>

				   
				    <?php foreach( $more as $post): // variable must be called $post (IMPORTANT) ?>
				        <?php setup_postdata($post); ?>
				       
				        		<hr>

				        		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

				        		
				        						            
				        
				    <?php endforeach; ?>
				   <br>
				    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
				<?php endif; ?>

				

						<?php 

						$post_id = $post->ID;

						if (get_comment_count($post_id) > 0) {

							//echo '<hr class="thick">';
							echo '<h4>Current Views and Opinions on '; 
							the_title();
							echo '</h4>';

							//Gather comments for a specific page/post 
							$comments = get_comments(array(
								'post_id' => $post_id,
								'status' => 'approve' //Change this to the type of comments to be displayed
							));

						

							//Display the list of comments
							wp_list_comments(array(
								'per_page' => 5, //Allow comment pagination
								'reverse_top_level' => false, //Show the latest comments at the top of the list
								'callback' => 'custom_comments' 
							), $comments);

							

						   } ?>

						   <a class="button small radius" href="<?php the_permalink(); ?>/#comments">Comment Now</a>
				
				

			<?php endwhile; ?>
			<!-- end of the loop -->

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>

		<?php 

		$args = array(
			'post_type' => 'symposiums',
			'posts_per_page' => '10',
			'offset' => '1',
			'order' => 'DESC'
			);

		// the query
		$archived = new WP_Query( $args ); ?>

		<?php if ( $archived->have_posts() ) : ?>

		<hr class="thick">

		<h4>View Past Symposia</h4>

			<ul class="small-block-grid-1 medium-block-grid-2">

			<!-- the loop -->
			<?php while ( $archived->have_posts() ) : $archived->the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('full'); ?></a></li>
			<?php endwhile; ?>
			<!-- end of the loop -->

			</ul>

			<?php wp_reset_postdata(); ?>

		<?php endif; ?>


		</div>


		

	

		
	</div>
	
</div>
<?php get_footer(); ?>
