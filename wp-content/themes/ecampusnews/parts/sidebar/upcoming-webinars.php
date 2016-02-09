<article>
<h4>Recorded Webinars</h4>

<?php // The Query
$upcoming = array(
	'post_type' => 'webinars',
	'posts_per_page' => '3',
	'tax_query' => array(
		array(

			'taxonomy' => 'status-webinars',
			'field' => 'slug',
			'terms' => 'archived-webinars',

			),

		),

	);


$query = new WP_Query( $upcoming ); ?>

<ul>

<?php while ( $query->have_posts() ) :
	$query->the_post(); ?>


<li>
	<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
</li>

<?php endwhile; 
wp_reset_postdata(); ?>

</ul>

<br/>
<h6 class="readmore"><a href="<?php site_url(); ?>/webinars">View All Webinars &raquo;</a></h6>

			
</article>