<article>
<section>
<h4>Related Posts</h4>	
<br/>
<?php 

//$args = array( 'category__in => 6870, 'tag__in' => array( 'tag1', 'tag2' ), 'showposts' => 2 );

    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
    $tag_ids = array();
	foreach($tags as $individual_tag){ $tag_ids[] = $individual_tag->term_id;}

	$cats = wp_get_post_categories($post->ID);
    $cat_ids = array();
	foreach($cats as $individual_cat){ $cat_ids[] = $individual_cat;}
	


	if(empty($tag_ids) || empty($cat_ids)){
		if(empty($tag_ids)){ 

			$args=array(
			'post__not_in' => array($post->ID),
			'posts_per_page'=>5, // Number of related posts to display.
			'ignore_sticky_posts'=>1,
			'post_type' => array( 'whitepapers' ,'ercs' ,'webinars' ,'special-reports','post' ),  
			'category__in ' => $cat_ids
			);


		 }
		if(empty($cat_ids)){ 
		
			$args=array(
			'post__not_in' => array($post->ID),
			'posts_per_page'=>5, // Number of related posts to display.
			'ignore_sticky_posts'=>1,
			'post_type' => array( 'whitepapers' ,'ercs' ,'webinars' ,'special-reports','post' ),  
			'tag__in' => $tag_ids
			);
		
		
		 }	
	
	} else {

		$args=array(
		'post__not_in' => array($post->ID),
		'posts_per_page'=>5, // Number of related posts to display.
		'ignore_sticky_posts'=>1,
		'post_type' => array( 'whitepapers' ,'ercs' ,'webinars' ,'special-reports','post' ),  
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'category__in ' => $cat_ids
			),
			array(
				'tag__in' => $tag_ids
			)
		)
		 
		);
		
	}	




    $my_query = new wp_query( $args );
//if ( have_posts() ) {	
?>

<ul>

<?php
    while( $my_query->have_posts() ) {
      $my_query->the_post();
    ?>



<li>
<?php //Prints the CPT and links to the archive page for that CPT
							$post_type = get_post_type_object( get_post_type($post) );
							echo '<span class="flag content">';
							echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
							echo $post_type->labels->singular_name; 
							echo '</a></span>';
							?>  

													<?php if( has_post_thumbnail()) {
						    $smallsrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium-thumb' );
						    $largesrc = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full' );
						} ?>

						<img class="thumb" data-interchange="[<?php echo $largesrc[0]; ?>, (default)], [<?php echo $smallsrc[0]; ?>, (large)]">
  		
  		<div class="small-caps"><?php the_time('F j, Y'); ?></div>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
</li>


     <?php 
    
	
	 }
	 

	 
?>	

</ul>
</section>
</article>
<?php	
//	}
    $post = $orig_post;
    wp_reset_query();
?>