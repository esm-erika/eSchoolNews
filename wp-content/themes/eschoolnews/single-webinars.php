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
				<!-- <p class="date"><?php the_time('F j, Y'); ?></p> -->
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<h3>Date: <?php the_field('webinar_date'); ?></h3>
				<h5>Time: <?php the_field('webinar_time'); ?></h5>

				<?php get_template_part('parts/social'); ?>
			</header>

			
<hr/>
<?php endif; ?>

			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="row entry-content">

				<?php if ( has_post_thumbnail() ) {

					echo '<div class="large-4 columns">';
					the_post_thumbnail('full'); 
					echo '</div>';

					echo '<div class="large-8 columns">';
					
					the_field('webinar_information'); 
					
					if (get_field('webinar_registration_link')) {

						echo '<a class="button radius" href="';

						the_field('webinar_registration_link');

						echo '" target="new">Register Now</a>';
					}

					echo '</div>';

				} else {

					echo '<div class="large-12 columns">';
					echo '<h5>About Event</h5>';
					the_field('webinar_information');
					echo '</div>';

				} ?>

			</div>
			<hr/>
			<div class="row">


				<div class="medium-12 columns">

			<h4>Meet Your Speakers</h4>

				<?php if( have_rows('webinar_speakers') ): ?>

				

				<ul class="medium-block-grid-3">

			<?php while( have_rows('webinar_speakers') ): the_row(); 

				// vars
				$photo = get_sub_field('speaker_photo');
				$name = get_sub_field('speaker_name');
				$title = get_sub_field('speaker_title');
				$organization = get_sub_field('speaker_organization');

				?>

				<li class="speaker text-center">
					
					<?php if( $photo ): ?>	
						<img src="<?php echo $photo['url']; ?>" alt="<?php echo $photo['alt'] ?>" />
					<?php endif; ?>

					<?php if( $name ): ?>
						<h5><?php echo $name; ?></h5>
					<?php endif; ?>
					<?php if( $title ): ?>
						<div><?php echo $title; ?></div>
					<?php endif; ?>
					<?php if( $name ): ?>
						<div><em><?php echo $organization; ?></em></div>
					<?php endif; ?>
					
				</li>

			<?php endwhile; ?>

			</ul>

<?php endif; ?>

</div>


			</div>

			<?php 

$image = get_field('sponsored_by');

if( !empty($image) ): ?>
<hr/>
<div class="row sponsor">
	<div class="medium-4 columns">
	
<small class="right">Sponsored By:</small>
	<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />

	</div>
</div>






			

			<footer class="panel tags">
				<h6>Related Tags</h6>
				<?php //wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags('<span class="flag tag">','</span><span class="flag tag">','</span>'); ?></p>
			</footer>

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