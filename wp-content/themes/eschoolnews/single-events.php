<?php
/**
* The template for displaying all single posts and attachments
*
* @package WordPress
* @subpackage FoundationPress
* @since FoundationPress 1.0.0
*/

get_header(); ?>

<div class="row top">
	<div class="small-12 large-8 columns" role="main">

		<?php if( is_singular( array('ercs','whitepapers','webinars','special-reports') )) {?>

		<?php $post_type = get_post_type_object( get_post_type($post) );

		echo '<span class="flag content">';
		echo '<a href="' . site_url('/') . get_post_type( get_the_ID() ) . '">';
		echo $post_type->labels->singular_name; 
		echo '</a></span>'; ?>

		<?php }?>

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<h5><i class="fi-calendar"></i> <?php 
				$showdate = DateTime::createFromFormat('Ymd', get_field('event_date'));
				if($showdate){ echo $showdate -> format('F d, Y');} ?></h5>
				<h5><i class="fi-clock"></i> <?php the_field('event_time'); ?></h5>

				<?php get_template_part('parts/social'); ?>
			</header>

			

			<hr/>

			
			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="row entry-content">

				<?php 

				echo '<div class="large-12 columns">';

				

				if ( has_post_thumbnail() ) {

					the_post_thumbnail('full'); 

					echo '<br/><br/>';

					
				}

					

				echo '<h5>About Event</h5>';

				the_field('event_information');

				if (get_field('registration_link')) {

					echo '<a class="button small radius" href="';

					the_field('registration_link');

					echo '" target="new">Register Now</a>';
				}
				
				echo '</div>';

				?>

			</div>

			<?php if( ! has_tag()){
				echo '<hr/>';
			} ?>


			<?php if( has_tag()) { ?>
			<br/>
			<footer class="panel tags">
				<h6>Related Tags</h6>
				<p><?php the_tags('<span class="flag tag">','</span><span class="flag tag">','</span>'); ?></p>
			</footer>

			<?php } ?>

			<?php get_template_part('parts/social'); ?>

			<?php do_action( 'foundationpress_post_before_comments' ); ?>
			<?php //comments_template(); ?>
			<?php do_action( 'foundationpress_post_after_comments' ); ?>
		</article>
	<?php endwhile;?>

	<?php do_action( 'foundationpress_after_content' ); ?>

</div>

<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>