<article>
<section>
<h3 class="section-title"><span>Related posts</span></h3>	
<?php 

//$args = array( 'category__in => 6870, 'tag__in' => array( 'tag1', 'tag2' ), 'showposts' => 2 );

    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
    $tag_ids = array();
    echo "<!-- post id".$post->ID." tags:";
	print_r($tags);
	foreach($tags as $individual_tag){ $tag_ids[] = $individual_tag->term_id;}
	$cats = wp_get_post_categories($post->ID);
    $cat_ids = array();
    echo "cats:";
	print_r($cats);
	foreach($cats as $individual_cat){ $cat_ids[] = $individual_cat;}
	


	echo "cat ids:<br>";
	print_r($cat_ids);
	echo "tag ids:";
	print_r($tag_ids);
	echo "<br> --> ";

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
	 

	 
?>	
</section>
</article>
<?php	
//	}
    $post = $orig_post;
    wp_reset_query();
?>