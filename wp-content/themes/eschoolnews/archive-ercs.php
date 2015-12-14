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
<?php 
//insert cache query
Global $page;

$box_qt = 'esm_c_ercarc_pg'.$page;
$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){
	// start code to cache
		ob_start( );
		echo '<!-- c -->'; 
		?>
<?php get_template_part( 'parts/section-titles' ); ?>


	






	<div class="row">
		<div class="small-12 medium-8 columns">

					
			<!-- <h4>Active ERCs</h4> -->


				<?php

				// The Query
				$args = array(
					'posts_per_page' => -1,
					'tax_query' => array(
						array(

							'taxonomy' => 'status',
							'field' => 'slug',
							'terms' => 'active-erc',

							),

						));

				$query2 = new WP_Query( $args ); ?>

				<?php // The Loop
				while ( $query2->have_posts() ) :
					$query2->the_post(); ?>

				
				<article>
					<h4>
						<a href="<?php the_permalink(); ?>">
						<?php the_title();?>
						</a>
					</h4>

					<?php if(get_field('masthead_text')){

						echo the_field('masthead_text');

					} ?>
				</article>
				<br/>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		

		<hr/>

		<div class="erc-sponsors">

	<h4>Sponsors</h4>
 <ul class="medium-block-grid-3">

<?php

        // $libargs=array(  
        //     'hide_empty'        => 0,  
        //     'parent'        => 0,  
        //     'taxonomy'      => 'sponsor');  

        //     $libcats=get_categories($libargs);  

        //     foreach($libcats as $lc){ 
        //         $termlink = get_term_link( $lc->slug, 'sponsor' ); 

        //         $image = get_field('sponsor_image', 'sponsor_'.$lc->term_id);

        ?>

       

        <li> 
           	<a href="http://eschoolnews.esminc.staging.wpengine.com/sponsor/middlebury-interactive/">
               	<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2015/12/Middlebury396.gif" alt="" scale="0">
			</a>
        </li>

        <li>
			<a href="http://eschoolnews.esminc.staging.wpengine.com/sponsor/pcm-g/">
               	<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2015/12/PCMGLogo239.gif" alt="PCM-G" scale="0">
			</a>
        </li>
        <li>
        	<a href="http://eschoolnews.esminc.staging.wpengine.com/sponsor/pd-learning-network/">
               	<img src="http://eschoolnews.esminc.staging.wpengine.com/files/2015/12/pd-learning.gif" alt="PD Learning Network" scale="0">
			 </a>
        </li>

          

        <?php } ?>


			 </ul>

	</div>
			
	
			

</div>
		<?php
		echo '<!-- c '.date(DATE_RFC2822).' -->' ;
		$local_box_cache = ob_get_clean( );
	// end the code to cache
		echo $local_box_cache;
	//end cache query 
	
	if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
	} else {
		set_transient($box_q ,$local_box_cache, 60 * 10);
} else { 

echo $local_box_cache;

}
?>

<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique]t[if a tag page]
//$cat_name = get_category(get_query_var('cat'))->term_id;

global $astc, $astused;
$box_qt = 'esm_c_perc_a'.$astused."c".$astc.'c'.'p';
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
