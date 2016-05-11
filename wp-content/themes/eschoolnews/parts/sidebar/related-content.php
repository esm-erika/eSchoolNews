<article>
<section>
<h4>Related Content</h4>

<?php 
//$args = array( 'category__in => 6870, 'tag__in' => array( 'tag1', 'tag2' ), 'showposts' => 2 );

    $orig_post = $post;
    global $post;
    $tags = wp_get_post_tags($post->ID);
    $tag_ids = array();
    $tag_slugs = array();
	foreach($tags as $individual_tag){ $tag_ids[] = $individual_tag->term_id;}
	foreach($slug as $individual_tagslug){ $tag_slugs[] = $individual_tag->slug;}
	 

	$cats = wp_get_post_categories($post->ID);
    $cat_ids = array();
	foreach($cats as $individual_cat){ $cat_ids[] = $individual_cat;}


 if(!empty($tag_ids) || !empty($cat_ids)){
				 
		if(!empty($cat_ids)){ 
	
			$args=array(
			'post__not_in' => array($post->ID),
			'posts_per_page'=>3, // Number of related posts to display.
			'ignore_sticky_posts'=>1,
			'post_type' => array('post' ),  // 'whitepapers' ,'ercs' ,'webinars' ,'special-reports',
			'category__in' => $cat_ids,
			'cat' => '-11583,-11,-133'
			);

		 } else if(!empty($tag_ids)){ 
			$args=array(
			'post__not_in' => array($post->ID),
			'posts_per_page'=>3, // Number of related posts to display.
			'ignore_sticky_posts'=>1,
			'post_type' => array('post' ),  // 'whitepapers' ,'ercs' ,'webinars' ,'special-reports',
			'tag__in ' => $tag_ids,
			'cat' =>  '-11583'
			);
		 }	
	
	} else {

		$args=array(
		'post__not_in' => array($post->ID),
		'posts_per_page'=>5, // Number of related posts to display.
		'ignore_sticky_posts'=>1,
		'cat' => '-11583',
		'post_type' => array( 'post' ),  // 'whitepapers' ,'ercs' ,'webinars' ,'special-reports', 'events',
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
<?php 
echo '<!-- ';
print_r(tag_slugs);
echo ' -->';
if(!empty($tag_slugs)){
				 
			$tagargs=array(
			'post__not_in' => array($post->ID),
			'posts_per_page'=>3, // Number of related posts to display.
			'ignore_sticky_posts'=>1,
			'post_type' => array('post','whitepapers' ,'ercs' ,'webinars' ,'special-reports' ),  // ,
			'tag_slug__and' => $tag_slugs,
			);
			
			$mytag_query = new wp_query( $tagargs );

}

    while( $mytag_query->have_posts() ) {
      $mytag_query->the_post();
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