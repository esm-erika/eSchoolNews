<article>
<h4>Webinars</h4>
<br/>

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
		<div class="date"><?php 
		$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
		if($showdate){ echo $showdate -> format('F d, Y');} ?></div>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

</li>

<?php endwhile; 
wp_reset_postdata(); ?>

</ul>

<h6 class="readmore"><a href="<?php site_url(); ?>/webinars">More Webinars &raquo;</a></h6>

			


				</article>