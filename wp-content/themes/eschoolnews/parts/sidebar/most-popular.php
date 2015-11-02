<article>

<?php $popular = array(
    'post_type' => 'post',
    'posts_per_page' => 10,
    'meta_key' => 'post_views_count',
    'orderby' => 'meta_value_num',

    'order'=> 'ASC',
    'date_query' => array(
        array(
            'after'  => '30 days ago'
        ),
    ),
);

$query = new WP_Query( $popular ); ?>

<ul>

<?php while ( $query->have_posts() ) :
	$query->the_post(); ?>

	<li>
		<?php 
						$post_type = get_post_type_object( get_post_type($post) );
						echo '<span class="flag content">';
						echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
						echo $post_type->labels->singular_name; 
						echo '</a></span>';
					?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
	</li>

<?php endwhile;
wp_reset_postdata(); ?>
</ul>

</article>