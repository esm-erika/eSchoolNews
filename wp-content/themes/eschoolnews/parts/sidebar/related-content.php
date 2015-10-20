<?php 
    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
     
    if ($tags) {
    $tag_ids = array();
    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
	
	$args=array(
    'tag__in' => $tag_ids,
    'post__not_in' => array($post->ID),
    'posts_per_page'=>4, // Number of related posts to display.
    'caller_get_posts'=>1,
	'post_type' => array( 'whitepapers' ,'ercs' ,'webinars' ,'special-reports','post' )    );
  
    $my_query = new wp_query( $args );
	
if ( have_posts() ) {	
?>
<article>
<section>
<h3 class="section-title"><span>Related posts</span></h3>	
<?php
    while( $my_query->have_posts() ) {
      $my_query->the_post();
    ?>







<div class="row">
	<div class="large-12 columns">
<?php /* //Prints the CPT and links to the archive page for that CPT
							$post_type = get_post_type_object( get_post_type($post) );
							echo '<span class="flag content">';
							echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
							echo $post_type->labels->singular_name; 
							echo '</a></span>';*/
							?>    
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	</div>
</div>


     <?php 
    
	
	 }
	 

	 
    }
?>	
</section>
</article>
<?php	
	}
    $post = $orig_post;
    wp_reset_query();
?>
