<?php 
$args = array(
	'category_name' => 'cc-blog',
	'posts_per_page' => '3'

	);
$roundtable = new WP_Query( $args ); ?>

<?php if ( $roundtable->have_posts() ) : ?>

	<article class="company-categories">

	<h4>Prior Blog Posts</h4>

	<!-- the loop -->
	<?php while ( $roundtable->have_posts() ) : $roundtable->the_post(); ?>
		<h5><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h5>
		<div class="posted-on"><strong><?php the_time('F jS, Y') ?></strong></div>
		
			<?php 
		echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); 
		?>
		<br/>
		
		<a href="<?php the_permalink(); ?>">Read more</a>

		<br><br>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<h6><a href="<?php echo site_url(); ?>/cc-blog">View all Roundtable Posts</a></h6>

</article>