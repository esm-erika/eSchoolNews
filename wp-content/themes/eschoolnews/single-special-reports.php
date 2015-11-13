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

		<?php get_template_part('parts/flags'); ?>

		<?php do_action( 'foundationpress_before_content' ); ?>

		<?php while ( have_posts() ) : the_post(); ?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="posted-on">Posted on <?php the_time('F j, Y'); ?></div>
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
				} 


			if (esm_is_user_logged_in()){
				$showpagecontent = 1;
			} else { 
				$reg_requirement=get_post_meta($post->ID, 'registration_requirement_for_content', $single = true); /*	0 : Default,  1 : Required,  2 : Not Required */
				if($reg_requirement == 2){
					$showpagecontent = 1;
				} else {
					$showpagecontent = 0;
				}
			}

				if($showpagecontent == 1){
					the_content();
					$file = get_field('download_file');

							if( $file ){ ?>
								<a class="button radius small" href="<?php echo $file['url']; ?>">Download Report</a>
							<?php } 

					
				} else {
				the_excerpt(); 
					wp_login_form();
				}

				?>

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