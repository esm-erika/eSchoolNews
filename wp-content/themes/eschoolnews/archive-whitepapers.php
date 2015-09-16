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

<script>
  $(document).foundation({
    tab: {
      callback : function (tab) {
        console.log(tab);
      }
    }
  });
</script>

<div class="row">
	
<!-- Row for main content area -->
	<div class="small-12 large-8 columns" role="main">

<h1>White Papers</h1>

		<ul class="tabs" data-tab role="tablist">

			<?php 
				// We need to be able to spit out the names of all the SUBJECT categories JUST in the Whitepapers
			 ?>

		  <li class="tab-title active" role="presentation"><a href="#panel2-1" role="tab" tabindex="0" aria-selected="true" aria-controls="panel2-1">Tab 1</a></li>
		  <li class="tab-title" role="presentation"><a href="#panel2-2" role="tab" tabindex="0" aria-selected="false" aria-controls="panel2-2">Tab 2</a></li>
		  <li class="tab-title" role="presentation"><a href="#panel2-3" role="tab" tabindex="0" aria-selected="false" aria-controls="panel2-3">Tab 3</a></li>
		  <li class="tab-title" role="presentation"><a href="#panel2-4" role="tab" tabindex="0" aria-selected="false" aria-controls="panel2-4">Tab 4</a></li>
		</ul>

		<div class="tabs-content">
		  <section role="tabpanel" aria-hidden="false" class="content active" id="panel2-1">
		    <h2>First panel content goes here...</h2>
		    <?php if ( have_posts() ) : ?>

		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
			<?php get_template_part( 'content', get_post_format() ); ?>
		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; // End have_posts() check. ?>

		  </section>
		  <section role="tabpanel" aria-hidden="true" class="content" id="panel2-2">
		    <h2>Second panel content goes here...</h2>
		  </section>
		  <section role="tabpanel" aria-hidden="true" class="content" id="panel2-3">
		    <h2>Third panel content goes here...</h2>
		  </section>
		  <section role="tabpanel" aria-hidden="true" class="content" id="panel2-4">
		    <h2>Fourth panel content goes here...</h2>
		  </section>
		</div>


	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
