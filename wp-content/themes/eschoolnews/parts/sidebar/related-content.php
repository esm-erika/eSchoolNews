<article>
<section>
<h4>Related Content</h4>

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
echo '<!-- '; 
print_r($cat_ids);
echo ' -->'; 
			$args=array(
			'post__not_in' => array($post->ID),
			'posts_per_page'=>5, // Number of related posts to display.
			'ignore_sticky_posts'=>1,
			'post_type' => array( 'whitepapers' ,'ercs' ,'webinars' ,'special-reports','post' ),  
			'category__in ' => $cat_ids,
			'cat' =>  '-11583'
			);
		 }
		if(empty($cat_ids)){ 
echo '<!-- '; 
print_r($tag_ids);
echo ' -->'; 
		
			$args=array(
			'post__not_in' => array($post->ID),
			'posts_per_page'=>5, // Number of related posts to display.
			'ignore_sticky_posts'=>1,
			'post_type' => array( 'whitepapers' ,'ercs' ,'webinars' ,'special-reports','post' ),  
			'tag__in' => $tag_ids,
			'cat' => '-11583'
			);

		 }	
	
	} else {

		$args=array(
		'post__not_in' => array($post->ID),
		'posts_per_page'=>5, // Number of related posts to display.
		'ignore_sticky_posts'=>1,
		'cat' => '-11583',
		'post_type' => array( 'whitepapers' ,'ercs' ,'webinars' ,'special-reports', 'events', 'post' ),  
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'category__in ' => $cat_ids,'cat' => '-11583'
			),
			array(
				'tag__in' => $tag_ids
			)
		)
		 
		);
		
	}	

echo '<!-- arg ';
print_r($args);
echo ' --> ';

    $my_query = new wp_query( $args );
//if ( have_posts() ) {	
?>

<ul>

<?php
    while( $my_query->have_posts() ) {
      $my_query->the_post();
    ?>



<li>
<?php get_template_part('parts/flags'); ?>
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