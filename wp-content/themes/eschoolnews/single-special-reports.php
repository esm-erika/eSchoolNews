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
				<?php get_template_part('parts/social'); ?>
			</header>

			

			<hr/>

			

			<?php do_action( 'foundationpress_post_before_entry_content' ); ?>
			<div class="entry-content row">

				<?php if ( has_post_thumbnail() ) {
					echo '<div class="small-12 medium-4 columns">';
							the_post_thumbnail('full');
					echo '</div>';
					echo '<div class="small-12 medium-8 columns">';
						
				} else {
					echo '<div class="medium-12">';
				} ?>

				<?php the_content(); ?>

				

							<?php 

							$file = get_field('download_file');

							if( $file ): ?>
								
								<a class="button radius small" href="<?php echo $file['url']; ?>">Download Report</a>

							<?php endif; ?>

							</div>


</article>






<?php if( ! has_tag()){
 echo '<hr/>';
} ?>


<?php if( has_tag()) { ?>
<br/>
<footer class="panel related-tags">
	<h6>Related Tags</h6>
	<p><?php the_tags('','',''); ?></p>
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