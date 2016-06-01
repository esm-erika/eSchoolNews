<article>
<section>
<h4>Related Content</h4>

<?php 
    $orig_post = $post;
    global $post;
   // $tags = wp_get_post_tags($post->ID);
   // $tag_ids = array();
	//foreach($tags as $individual_tag){ $tag_ids[] = $individual_tag->term_id;}

	$cats = wp_get_post_categories($post->ID);
    $cat_ids = array();
	foreach($cats as $individual_cat){ $cat_ids[] = $individual_cat;}

	if(!empty($cat_ids)){ 
		$args=array(
		'post__not_in' => array($post->ID),
		'posts_per_page'=>3, // Number of related posts to display.
		'ignore_sticky_posts'=>1,
		'post_type' => array('post' ),  // 'whitepapers' ,'ercs' ,'webinars' ,'special-reports',
		'category__in' => $cat_ids,
		'cat' => '-11583,-11,-133,-10650'
		);
	
$tech=array("11237","5","11564","5351","9","3");
$mobile=array("10568","499","3602","10567","7794","16","166");
$digital=array("10651","3875","10652"); 
$curriculum=array("165","27","43","120","10238");




$result=array_intersect($cat_ids,$tech);$result2=array_intersect($cat_ids,$mobile);$result3=array_intersect($cat_ids,$digital);$result4=array_intersect($cat_ids,$curriculum);
if($result){
	
	$wargs = array(
		'post_type' => array('whitepapers'),
		'posts_per_page' => '2',
		//'cat' => '11153'
	);

} else if($result2){

	$wargs = array(
		'post_type' => array('whitepapers'),
		'posts_per_page' => '2',
		//'cat' => '11152'
	);	
	
} else if($result3){

	$wargs = array(
		'post_type' => array('whitepapers'),
		'posts_per_page' => '2',
		//'cat' => '11151'
	);

}else if($result4){

	$wargs = array(
		'post_type' => array('whitepapers'),
		'posts_per_page' => '2',
		//'cat' => '11125'
	);	
	
} else { 
	
	$wargs = array(
		'post_type' => array('whitepapers'),
		'posts_per_page' => '2',
		//'cat' => '11125'
	);		
}
	$ercarg = array(
		'post_type' => array('ercs'),
		'posts_per_page' => '2',
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
	 

    $wargs_query = new wp_query( $wargs );
    while( $wargs_query->have_posts() ) {
      $wargs_query->the_post();
    ?>



<li>
<?php get_template_part('parts/flags'); ?>
<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
</li>


     <?php 
    
	
	 }
	 
	 
  $ercargs_query = new wp_query( $ercarg );
    while( $ercargs_query->have_posts() ) {
      $ercargs_query->the_post();
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