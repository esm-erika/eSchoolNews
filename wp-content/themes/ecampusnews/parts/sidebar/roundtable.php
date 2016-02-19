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
		<h2><?php the_title(); ?></h2>
		<div class="posted-on"><?php the_time('F jS, Y') ?></div>
		<p class="excerpt">
			<?php 
		echo balanceTags(wp_trim_words( strip_tags(get_the_excerpt()), $num_words = 30, $more = '&hellip;' ), true); 
		?>
		</p>
		<a href="<?php the_permalink(); ?>">Read more</a>
	<?php endwhile; ?>
	<!-- end of the loop -->

	<!-- pagination here -->

	<?php wp_reset_postdata(); ?>

<?php else : ?>
	<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<h6><a href="<?php echo site_url(); ?>/cc-blog">View all Roundtable Posts</a></h6>

</article>