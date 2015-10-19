<article>
<h3 class="section-title"><span>Professional Development</span></h3>

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
			'terms' => 'upcoming-webinars',

			),

		),

	);


$query = new WP_Query( $upcoming );


while ( $query->have_posts() ) :
	$query->the_post(); ?>


<div class="row">
	<div class="large-12 columns">
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<p><?php 
		$showdate = DateTime::createFromFormat('Ymd', get_field('webinar_date'));
		if($showdate){ echo $showdate -> format('F d, Y');} ?></p>

	</div>
</div>

<?php endwhile; 
wp_reset_postdata(); ?>
</section>
<hr/>
<section class="events">
<?php // The Query
$events = array(
	'post_type' => 'eventss',
	'posts_per_page' => '3',
	'tax_query' => array(
		array(

			//'taxonomy' => 'status-webinars',
			//'field' => 'slug',
			//'terms' => 'upcoming-webinars',

			),

		),

	);


$query2 = new WP_Query( $events );


while ( $query2->have_posts() ) :
	$query2->the_post(); ?>


<div class="row">
	<div class="large-12 columns">
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<p><?php 
		$showdate = DateTime::createFromFormat('Ymd', get_field('webinar_date'));
		if($showdate){ echo $showdate -> format('F d, Y');} ?></p>

	</div>
</div>

<?php endwhile; 
wp_reset_postdata(); ?>
</section>
</article>