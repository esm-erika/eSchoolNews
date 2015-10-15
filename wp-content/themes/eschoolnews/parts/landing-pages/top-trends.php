<?php 	
	//$category = get_the_category();
	//$firstCategory = $category[0]->cat_name; 
?>



<?php 

function LandingRecentItems($catslug, $qty = 3){
	if($catslug == null){
		echo '<!--- No Category Passed --->';	
	} else {
	 $idObj = get_category_by_slug($catslug);
	 $catname =  $idObj->name;
	 $catid = $idObj->term_id;
	 	 
 echo '<!-- '.$catname.' -->';

	$query_1 = array(
		'cat' => $catid,
		'posts_per_page' => $qty

		);

	$query_1 = new WP_Query( $query_1 );
 ?>
<h4><?php  echo '<!-- '.$catname.' -->'; ?></h4>
<ul class="small-block-grid-2 large-block-grid-3">
	<?php // The Loop
	while ( $query_1->have_posts() ) :
		$query_1->the_post(); ?>
	<li>
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="excerpt">
		<?php 
			echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '' ), true); 
		?> 
		</div>
	</li>

<?php endwhile; ?>

</ul>

<h6><a href="<?php get_category_link( $catid ); ?> ">Read more <strong><?php echo '<!-- '.$catname.' -->'; ?></strong> Posts &raquo;</a></h6>

<hr/>
<?php wp_reset_postdata(); 

	
	}
}

?>


<!--- fun test ---->

<?php LandingRecentItems('funding', 3) ?>

<!-- fun test end --->


<!-- 21ST CENTURY SKILLS -->

<?php 

	$query_1 = array(
		'category_name' => '21st-century-skills',
		'posts_per_page' => '3'

		);

	$query_1 = new WP_Query( $query_1 );


 ?>

<h4>21st Century Skills</h4>

<ul class="small-block-grid-2 large-block-grid-3">

	<?php // The Loop
	while ( $query_1->have_posts() ) :
		$query_1->the_post(); ?>

	<li>
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="excerpt">
		<?php 
			echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '' ), true); 
		?> 
		</div>
	</li>

<?php endwhile; ?>

</ul>

<h6><a href="#">Read more <strong>21st Century Skills</strong> Posts &raquo;</a></h6>

<hr/>
<?php wp_reset_postdata(); ?>


<!--- end loop ---->



<!-- APPS -->

<?php 

	$query_2 = array(
		'category_name' => 'apps',
		'posts_per_page' => '3'

		);

	$query_2 = new WP_Query( $query_2 );


 ?>

<h4>Apps</h4>

<ul class="small-block-grid-2 large-block-grid-3">

	<?php // The Loop
	while ( $query_2->have_posts() ) :
		$query_2->the_post(); ?>

	<li>
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="excerpt">
		<?php 
			echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '' ), true); 
		?> 
		</div>
	</li>

<?php endwhile; ?>
</ul>

<h6><a href="#">Read more <strong>Apps</strong> Posts &raquo;</a></h6>

<hr/>
<?php wp_reset_postdata(); ?>


<!-- BLENDED LEARNING -->

<?php 

	$query_3 = array(
		'category_name' => 'blended-learning',
		'posts_per_page' => '3'

		);

	$query_3 = new WP_Query( $query_3 );


 ?>

<h4>Blended Learning</h4>

<ul class="small-block-grid-2 large-block-grid-3">

	<?php // The Loop
	while ( $query_3->have_posts() ) :
		$query_3->the_post(); ?>

	<li>
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="excerpt">
		<?php 
			echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '' ), true); 
		?> 
		</div>
	</li>

<?php endwhile; ?>
</ul>

<h6><a href="#">Read more <strong>Blended Learning</strong> Posts &raquo;</a></h6>


<hr/>
<?php wp_reset_postdata(); ?>


<!-- FUNDING -->

<?php 

	$query_4 = array(
		'category_name' => 'funding',
		'posts_per_page' => '3'
		);

	$query_4 = new WP_Query( $query_4 );


 ?>

<h4>Funding</h4>

<ul class="small-block-grid-2 large-block-grid-3">

	<?php // The Loop
	while ( $query_4->have_posts() ) :
		$query_4->the_post(); ?>

	<li>
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="excerpt">
		<?php 
			echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '' ), true); 
		?> 
		</div>
	</li>

<?php endwhile; ?>
</ul>

<h6><a href="#">Read more <strong>Funding</strong> Posts &raquo;</a></h6>

<hr/>
<?php wp_reset_postdata(); ?>


<!-- INNOVATION CORNER -->

<?php 

	$query_5 = array(
		'category_name' => 'innovation-corner',
		'posts_per_page' => '3'
		);

	$query_5 = new WP_Query( $query_5 );


 ?>

<h4>Innovation Corner</h4>

<ul class="small-block-grid-2 large-block-grid-3">

	<?php // The Loop
	while ( $query_5->have_posts() ) :
		$query_5->the_post(); ?>

	<li>
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="excerpt">
		<?php 
			echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '' ), true); 
		?> 
		</div>
	</li>

<?php endwhile; ?>
</ul>

<h6><a href="#">Read more <strong>Innovation Corner</strong> Posts &raquo;</a></h6>

<hr/>
<?php wp_reset_postdata(); ?>


<!-- MOBILE LEARNING -->

<?php 

	$query_6 = array(
		'category_name' => 'mobile-learning',
		'posts_per_page' => '3'
		);

	$query_6 = new WP_Query( $query_6 );


 ?>

<h4>Mobile Learning</h4>

<ul class="small-block-grid-2 large-block-grid-3">

	<?php // The Loop
	while ( $query_6->have_posts() ) :
		$query_6->the_post(); ?>

	<li>
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
		<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		<div class="excerpt">
		<?php 
			echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 20, $more = '' ), true); 
		?> 
		</div>
	</li>

<?php endwhile; ?>


</ul>

<h6><a href="#">Read more <strong>Mobile Learning</strong> Posts &raquo;</a></h6>


<?php wp_reset_postdata(); ?>