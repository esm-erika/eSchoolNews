

<article>

	<?php if (is_singular( array('webinars', 'special-reports', 'ercs', 'whitepapers')) ) { ?>
	<h4>Other Resources</h4>
	<?php } else { ?>
	<h4>Resources</h4>
	<?php } ?>
	<ul>

		<?php // The Query

if(is_post_type_archive('webinars' )) {
	$args = array(
		'post_type' => array('special-reports','ercs','whitepapers'),
		'posts_per_page' => -1,
	);
} else {
	$args = array(
		'post_type' => array('special-reports','ercs','whitepapers','webinars'),
		'posts_per_page' => -1,
		)
	);
} 
	
$resources = new WP_Query( $args );

?>


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


