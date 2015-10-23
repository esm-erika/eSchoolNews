<article>
<h4>Professional Development</h4>
<br/>
<section class="webinars">
	<h5>Webinars</h5>
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


$query = new WP_Query( $upcoming );


while ( $query->have_posts() ) :
	$query->the_post(); ?>


<div class="row">
	<div class="large-12 columns">
		<div class="date"><?php 
		$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
		if($showdate){ echo $showdate -> format('F d, Y');} ?></div>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>

	</div>
</div>

<?php endwhile; 
wp_reset_postdata(); ?>
</section>
<hr/>
<section class="events">
	<h5>Events</h5>
<?php // The Query
$events = array(
	'post_type' => 'events',
	'posts_per_page' => '3',
	);

$query2 = new WP_Query( $events );


while ( $query2->have_posts() ) :
	$query2->the_post(); ?>


<div class="row">
	<div class="large-12 columns">
		<div><?php 
		$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
		if($showdate){ echo $showdate -> format('F d, Y');} ?></div>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
	</div>
</div>

<?php endwhile; 
wp_reset_postdata(); ?>
</section>
</article>