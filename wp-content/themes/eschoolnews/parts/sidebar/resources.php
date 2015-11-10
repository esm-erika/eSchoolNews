<?php // The Query

if(is_post_type_archive('webinars' )) {
	$resources = new WP_Query(array(
	'post_type' => array( 'whitepapers', 'ercs', 'specialreports'),
	'posts_per_page' => '5'
	)); 
} else {
	$resources = new WP_Query(array(
	'post_type' => array( 'whitepapers', 'ercs', 'specialreports', 'webinars'),
	'posts_per_page' => '5'
	));
} ?>

<article>
	<h4>Resources</h4>

	<ul>

		<?php while ( $resources->have_posts() ) : $resources -> the_post(); ?>

		<li>
<?php get_template_part('parts/flags'); ?> 


<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
<div class="small-caps"> 
	<?php if( 'post' == get_post_type()){ 
		echo 'By ';
		the_author();	 	
	} else {
		echo '';
	} ?>
</div>
</li>





<?php endwhile;
wp_reset_postdata(); ?>
</ul>
</article>


