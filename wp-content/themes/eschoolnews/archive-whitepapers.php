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

get_header(); 

?>

<div class="row">

	<?php get_template_part( 'parts/section-titles' ); ?>

</div>
<script type="text/javascript">
jQuery.noConflict()(function ($) { // this was missing for me
$(document).ready(function(){
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();	
	$("#all").click(function(){
        $("div.row.all").show();
		$("h4#AllTitle").show();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();		
		
    });

	$("#curriculum").click(function(){
		$("div.panel.digital-whitepapers").hide();
		$("div.panel.technologies-whitepapers").hide();
		$("div.panel.mobile-online-whitepapers").hide();
		$("div.row.all").hide();
        $("div.panel.curriculum-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").show();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();		

    });

	$("#digital").click(function(){
        $("div.panel.curriculum-whitepapers").hide();
		$("div.panel.technologies-whitepapers").hide();
		$("div.panel.mobile-online-whitepapers").hide();
		$("div.row.all").hide();
		$("div.panel.digital-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").show();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();		

    });

	$("#mobile").click(function(){
        $("div.panel.curriculum-whitepapers").hide();
		$("div.panel.digital-whitepapers").hide();
		$("div.panel.technologies-whitepapers").hide();
		$("div.row.all").hide();
		$("div.panel.mobile-online-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").show();
		$("h4#TechnologiesTitle").hide();		

    });	
    
	$("#technologies").click(function(){
        $("div.panel.curriculum-whitepapers").hide();
		$("div.panel.digital-whitepapers").hide();
		$("div.panel.mobile-online-whitepapers").hide();
		$("div.row.all").hide();
		$("div.panel.technologies-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").show();		

    });
	});
});
</script>
<div class="row">
	<div class="small-12 medium-12 columns">
		
		<ul class="stack-for-small button-group radius">
			<li><a href="#menu" class="button" id="all">All White Papers</a></li>
			<li><a href="#menu" class="button" id="curriculum">Curriculum</a></li>
			<li><a href="#menu" class="button" id="digital">Digital</a></li>
			<li><a href="#menu" class="button" id="mobile">Mobile &amp; Online Learning</a></li>
			<li><a href="#menu" class="button" id="technologies">Technologies</a></li>
		</ul>

	</div>
</div>

<div class="row">
	
<!-- Row for main content area -->
	<div class="small-12 medium-8 columns" role="main">



	<div class="tabs-content">
	<a id="#menu"></a>        

<section <?PHP // role="tabpanel" aria-hidden="false" class="content active" id="panel1" ?>>
		 
		    <h4 id="AllTitle">All White Papers</h4>
		    <h4 id="CurriculumTitle" style="display:none;">Curriculum</h4>
		    <h4 id="DigitalTitle" style="display:none;">Digital</h4>
		    <h4 id="MobileTitle" style="display:none;">Mobile &amp; Online Learning</h4>
            <h4 id="TechnologiesTitle" style="display:none;">Technologies</h4>

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

				<div class="panel all<?php 
					$terms = wp_get_post_terms( $post->ID, 'subject_categories' );
					foreach ( $terms as $term ) { echo " ".$term->slug ; } ?>">

					<header style="margin-bottom:8px;" class="row collapse">


						
							<?php 

							if (has_post_thumbnail()) { ?>

							<div class="small-12 medium-3 columns">

							<div class="hide-for-small-only">
								<?php the_post_thumbnail('medium-portrait'); ?>
							</div>
							
							</div>
                    		
                    		<div class="small-12 medium-9 columns">
                    			<div class="row">
                    				<div class="small-12 columns">
                    					
                    				

						    <?php }else{ ?>

						    <div class="small-12 columns">
						    	<div class="row collapse">
                    				<div class="small-12 columns">

						    <?php } ?>
                    	
						
                    		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    		<div class="posted-on"><?php the_time('F j, Y'); ?></div>
                    		<hr/>

                    		




	

											</div>
										</div>
									<br/>
									

								<?php //endif; ?>


								<?php
						$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);

						if ( esm_is_user_logged_in() and !$WPForm > 0) { ?>

							<?php 

							// $post_date = strtotime( the_date( 'Y-m-d', '', '', false ) );
							// $cutoff_date = strtotime( '2016-04-27' ); 

							// if( $post_date < $cutoff_date ) {

							?>

								<?php 

								$posts = get_field('pdf_select');

								if( $posts ) { ?>

								    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
								        <?php setup_postdata($post); ?>
					
						        <div class="text-center">
									<a class="button radius" target="_blank" href="<?php the_permalink(); ?>">View Now</a>
								</div>

									<?php endforeach; ?>
								   
								    <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
								
								<?php } else { ?>

							

								<div class="text-center">
									<a class="button medium radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit">View Now</a>
								</div>

							<?php } ?>
						    

						<?php } else { // not logged in ?>
						
						<div class="text-center">
                        	<a href="#" class="button medium radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">View Now</a>
                    	</div>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
                        
                        
                        <?php } ?>



                    		
                    	</header>

                    	<div class="row">
                    		<div class="small-12 columns">

                    			<p class="excerpt">
							<?php 
							echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); 
							//the_content();

							echo ' <a href="' .get_permalink(). '">';
							echo 'Read More';
							echo '</a>';
							?>
						</p>
						
						

                        <div class="row sponsored">
								<div class="small-12 columns">

									<small><strong>Sponsored by:</strong></small><br>


								 <?php 

									$product_terms = wp_get_object_terms( $post->ID,  'sponsor', $args );

										if ( ! empty( $product_terms ) ) {
											if ( ! is_wp_error( $product_terms ) ) {
												echo '<ul class="small-block-grid-2 medium-block-grid-4">';
													foreach( $product_terms as $term ) { ?>



													<?php 
													$taxonomy = 'sponsor';
													$term_id = $term->term_id; 
													$image = get_field('sponsor_image', $taxonomy . '_' . $term_id);

													?>

													<li>

														<div class="responsive-container">
    														<div class="dummy"></div>
																<div class="img-container">
																	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
																</div>
														</div>
													</li>

														

													<?php }
												echo '</ul>';

											}
										} ?>



									
										</div>
                    				</div>


                        

                        
					</div>
                    </div>



                   </div>

					
					
					<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>

				
				
		  </section>
		</div>

		


	</div>
<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique]t[if a tag page]
//$cat_name = get_category(get_query_var('cat'))->term_id;

global $astc, $astused;
$box_qt = 'esm_c_wpa_a'.$astused."c".$astc.'c'.'p';
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->';
			get_sidebar();
			echo '<!-- c '.date(DATE_RFC2822).' -->' ;
		$local_box_cache = ob_get_clean( );
	// end the code to cache
		echo $local_box_cache;
	//end cache query 
	
	if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
	} else {
		set_transient($box_q ,$local_box_cache, 60 * 10);
	}
} else { 

echo $local_box_cache;

}
?>

</div>

<?php get_footer(); ?>