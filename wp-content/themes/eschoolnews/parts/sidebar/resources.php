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
	<br/>

	<ul>

		<?php while ( $resources->have_posts() ) : $resources -> the_post(); ?>

		<li>
<?php //Prints the CPT and links to the archive page for that CPT
$post_type = get_post_type_object( get_post_type($post) );
echo '<span class="flag content">';
echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
echo $post_type->labels->singular_name; 
echo '</a></span>';
?>  


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


