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



						  <?php if ( has_post_thumbnail() ) {
							the_post_thumbnail('full');
						} ?>
					</div>
					<div class="small-12 medium-8 columns">
							<h3><?php the_title(); ?></h3>
							<p><?php the_date(); ?></p>
						  <div class="content"><?php the_content(); ?></div>
					
							<?php 

							$file = get_field('report_file');

							if( $file ): ?>
								
								<a class="button radius small" href="<?php echo $file['url']; ?>">Download Report</a>

							<?php endif; ?>
						  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
						</div>
					</div>

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