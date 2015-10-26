<article>
<h4>Professional Development</h4>
<br/>
<section class="webinars">
	<h5>Webinars</h5>
	<br/>
	<ul>
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
</section>

<?php // The Query
$events = array(
	'post_type' => 'events',
	'posts_per_page' => '3',
	);

$query2 = new WP_Query( $events ); ?>

<?php if ( $query->have_posts() ) : ?>

<hr/>
<section class="events">
	<h5>Events</h5>
	<br/>

<ul>
<?php while ( $query2->have_posts() ) :
	$query2->the_post(); ?>


<li>
		<div><?php 
		$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
		if($showdate){ echo $showdate -> format('F d, Y');} ?></div>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
</li>

<?php endwhile; ?>


<h6 class="readmore"><a href="<?php site_url(); ?>/events">More Events &raquo;</a></h6>

</section>

<?php endif;
wp_reset_postdata(); ?>
</article>