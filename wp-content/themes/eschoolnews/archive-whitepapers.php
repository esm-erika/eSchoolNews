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
	<div class="small-8 medium-8 columns" role="main">

<?php get_template_part( 'parts/section-titles' ); ?>

		<ul class="tabs" data-tab role="tablist">

			<?php 
				// We need to be able to spit out the names of all the SUBJECT categories JUST in the Whitepapers
			 ?>

		  <li class="tab-title active" role="presentation"><a href="#panel1" role="tab" tabindex="0" aria-selected="true" aria-controls="panel1">All White Papers</a></li>

<?php 
		 
 	     $args = array(
         	  'orderby' => 'name',
			  'echo' => 0,
	          'show_count' => 0,
        	  'pad_counts' => 0,
	          'hierarchical' => 1,
        	  'taxonomy' => 'subject_categories', 
        	  'title_li' => '',
			  'hide_empty' => 0,
			  
        	);

$tabsconstruct = wp_list_categories( $args );
//  subject_categories/curriculum/" >Curriculum,
$replacethis = '/(<li[^>]*>)|(<\/a[^>]*>)|(<\/l[^>]*>)|(<a[^>]*subject_categories\/)/';
$tabsconstruct = preg_replace($replacethis, ',', $tabsconstruct);
$tabsconstruct = preg_replace('/\/" >/', '~', $tabsconstruct);

$tabsconstruct = explode(",", $tabsconstruct);

$pannel=2;
$tabindex=1;
foreach ($tabsconstruct as $key => $value) {
	if (preg_match('/\S/', $value)){
		$pos = strpos($value, '~');
		$catname =substr( $value , $pos+1);
		echo '<li class="tab-title" role="presentation"><a href="#panel'.$pannel.'" role="tab" tabindex="'.$tabindex.'" aria-selected="false" aria-controls="panel'.$pannel.'">'.$catname.'</a></li>';
		$pannel++;$tabindex++;
	}
	
}

 ?>
	</ul>
	<div class="tabs-content">
        
<?php 
/*
register_taxonomy("company_categories", array("whitepapers"), array("hierarchical" => true, "label" => "Companies", "singular_label" => "Company", "rewrite" => true));

register_taxonomy("subject_categories", array("whitepapers"), array("hierarchical" => true, "label" => "Subjects", "singular_label" => "Subject", "rewrite" => true));
*/

?>

<section role="tabpanel" aria-hidden="false" class="content active" id="panel1">
		 
		    <h3>All White Papers</h3>
		    <ul class="medium-block-grid-2">
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

				<li><?php the_title(); ?></li>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

			</ul>
		

		  </section>
<?php
$pannel=2;
$tabindex=1;
foreach ($tabsconstruct as $key => $value) {
	if (preg_match('/\S/', $value)){
		$pos = strpos($value, '~');
		$catname = substr( $value , $pos+1);	
		$catslug = substr( $value,0, $pos);	
		
echo '<section role="tabpanel" aria-hidden="true" class="content" id="panel'.$pannel.'"><h3>'.$catname.'</h3>'?>
		    <ul class="medium-block-grid-2">
		    <?php
				// The Query
				$args2 = array(
					//'post_type' => 'whitepapers',
					'orderby' => 'rand',
					'tax_query' => array(
						array(

							'taxonomy' => 'subject_categories',
							'field' => 'slug',
							'terms' => $catslug,

							),

						),

					);

				$query = new WP_Query( $args2 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<li><?php the_title(); ?></li>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

		   </ul>
		  </section>
<?php
		$pannel++;$tabindex++;
	}
	
}        
?>        
		  <?php /*<section role="tabpanel" aria-hidden="false" class="content active" id="panel1">
		 
		    <h3>All White Papers</h3>
		    <ul class="medium-block-grid-2">
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

				<li><?php the_title(); ?></li>
					
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
					//'post_type' => 'whitepapers',
					'orderby' => 'rand',
					'tax_query' => array(
						array(

							'taxonomy' => 'subject_categories',
							'field' => 'slug',
							'terms' => 'digital',

							),

						),

					);

				$query = new WP_Query( $args2 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<li><?php the_title(); ?></li>
					
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
					//'post_type' => 'whitepapers',
					'orderby' => 'rand',
					'tax_query' => array(
						array(

							'taxonomy' => 'subject_categories',
							'field' => 'slug',
							'terms' => 'mobile-online',

							),

						),

					);

				$query = new WP_Query( $args3 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<li><?php the_title(); ?></li>
					
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
					//'post_type' => 'whitepapers',
					'orderby' => 'rand',
					'tax_query' => array(
						array(

							'taxonomy' => 'subject_categories',
							'field' => 'slug',
							'terms' => 'technologies',

							),

						),

					);

				$query = new WP_Query( $args4 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<li><?php the_title(); ?></li>
					
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
					//'post_type' => 'whitepapers',
					'orderby' => 'rand',
					'tax_query' => array(
						array(

							'taxonomy' => 'subject_categories',
							'field' => 'slug',
							'terms' => 'technologies',

							),

						),

					);

				$query = new WP_Query( $args5 ); ?>


				<?php // The Loop
				 while ( $query->have_posts() ) :
					$query->the_post(); ?>

				<li><?php the_title(); ?></li>
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			</ul>
		
		</section> */?>

		</div>

		


	</div>
	<?php get_sidebar('whitepaper'); ?>

</div>
<?php get_footer(); ?>
