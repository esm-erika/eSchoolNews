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
		$("div.row.digital-whitepapers").hide();
		$("div.row.technologies-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").hide();
        $("div.row.curriculum-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").show();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();		

    });

	$("#digital").click(function(){
        $("div.row.curriculum-whitepapers").hide();
		$("div.row.technologies-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").hide();
		$("div.row.digital-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").show();
		$("h4#MobileTitle").hide();
		$("h4#TechnologiesTitle").hide();		

    });

	$("#mobile").click(function(){
        $("div.row.curriculum-whitepapers").hide();
		$("div.row.digital-whitepapers").hide();
		$("div.row.technologies-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").show();
		$("h4#AllTitle").hide();
		$("h4#CurriculumTitle").hide();
		$("h4#DigitalTitle").hide();
		$("h4#MobileTitle").show();
		$("h4#TechnologiesTitle").hide();		

    });	
    
	$("#technologies").click(function(){
        $("div.row.curriculum-whitepapers").hide();
		$("div.row.digital-whitepapers").hide();
		$("div.row.mobile-online-whitepapers").hide();
		$("div.row.technologies-whitepapers").show();
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

					<div style="margin-bottom:8px;" class="panel row all<?php 
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
                    	
						<header>
                    		<h3><?php the_title(); ?></h3>
                    		<div class="posted-on">Posted on <?php the_time('F j, Y'); ?></div>
                    		<hr/>
                    	</header>

                    	<p class="excerpt">
							<?php 
							echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); 
							?>
						</p>
						
						<?php
						$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);

						if ( esm_is_user_logged_in() and !$WPForm > 0) { ?>
						
						<div class="text-center">
							<a class="button small radius" href="<?php echo site_url(); ?>/<?php echo 'wp.php?wp='. get_the_ID();echo $aststr; ?>" rel="bookmark" title="<?php printf( esc_attr__( '%s', 'advanced' ), the_title_attribute( 'echo=0' ) ); ?>" target="_blank" id="submit">Download White Paper</a>
						</div>

						<?php } else { // not logged in ?>
						
						<div class="text-center">
                        	<a href="#" class="button small radius" data-reveal-id="whitepaper-<?php the_ID(); ?>">Download White Paper</a>
                    	</div>
						<?php get_template_part( 'parts/whitepapers-modal' ); ?>
                        
                        
                        <?php } ?>
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