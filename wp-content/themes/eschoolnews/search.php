<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

get_header(); ?>

<div class="row">
	<div class="small-12 large-8 columns" role="main">
    
    
<div id='cse' style='width: 100%;'>Loading search results...</div>
<script src='//www.google.com/jsapi' type='text/javascript'></script>
<script type='text/javascript'>
google.load('search', '1', {language: 'en', style: google.loader.themes.DEFAULT});
google.setOnLoadCallback(function() {
  var customSearchOptions = {};
  var orderByOptions = {};
  orderByOptions['keys'] = [{label: 'Relevance', key: ''} , {label: 'Date', key: 'date'}];
  customSearchOptions['enableOrderBy'] = true;
  customSearchOptions['orderByOptions'] = orderByOptions;
  var customSearchControl =   new google.search.CustomSearchControl('007256987256189418192:esavkywrdf8', customSearchOptions);
  customSearchControl.setResultSetSize(google.search.Search.FILTERED_CSE_RESULTSET);
  var options = new google.search.DrawOptions();
  options.setAutoComplete(true);
  customSearchControl.draw('cse', options);
  function parseParamsFromUrl() {
    var params = {};
    var parts = window.location.search.substr(1).split('&');
    for (var i = 0; i < parts.length; i++) {
      var keyValuePair = parts[i].split('=');
      var key = decodeURIComponent(keyValuePair[0]);
      params[key] = keyValuePair[1] ?
          decodeURIComponent(keyValuePair[1].replace(/\+/g, ' ')) :
          keyValuePair[1];
    }
    return params;
  }
  var urlParams = parseParamsFromUrl();
  var queryParamName = 's';
  if (urlParams[queryParamName]) {
    customSearchControl.execute(urlParams[queryParamName]);
  }
}, true);
</script>
<link rel='stylesheet' href='cse.google.com/style/look/default.css' type='text/css'/>    

		<?php /* do_action( 'foundationpress_before_content' ); ?>

		<h4><?php _e( 'Search Results for', 'foundationpress' ); ?> "<?php echo get_search_query(); ?>"</h4>
		<br/>
	<?php if ( have_posts() ) : ?>

		<?php while ( have_posts() ) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<header>
					<?php get_template_part( 'parts/flags' ); ?>
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

					<?php if( get_field('remove_author')) { 

								echo '';

							} else { ?>

								<div class="small-caps">
									
									<?php  if( get_field('Alt Author Read More Name')) {

										echo 'By ';

										the_field('Alt Author Read More Name');

									}elseif(get_field('Byline')){

										the_field('Byline');

									}elseif($post->post_type === 'ercs' ){
										echo '';

									} else {
										echo 'By ';

										the_author();

									} ?>

								</div>

							<?php } ?>
							

							<div class="posted-on"><?php the_time('F jS, Y') ?></div>		
				</header>
				<hr />
			</article>

		<?php endwhile; ?>

		<?php else : ?>
			<?php get_template_part( 'content', 'none' ); ?>

	<?php endif;?>

	<?php do_action( 'foundationpress_before_pagination' ); ?>

	<?php if ( function_exists( 'foundationpress_pagination' ) ) { foundationpress_pagination(); } else if ( is_paged() ) { ?>

		<nav id="post-nav">
			<div class="post-previous"><?php next_posts_link( __( '&larr; Older posts', 'foundationpress' ) ); ?></div>
			<div class="post-next"><?php previous_posts_link( __( 'Newer posts &rarr;', 'foundationpress' ) ); ?></div>
		</nav>
	<?php } ?>

	<?php do_action( 'foundationpress_after_content' ); */ ?>

	</div>
<?php 
//insert cache query
//name format esm_c_[template name in 5 char]_a[ast]c[astc]c[category]p[post id(if sidebar needs to be unique]t[if a tag page]
//$cat_name = get_category(get_query_var('cat'))->term_id;
global $astc, $astused;
$box_qt = 'esm_c_srch_a'.$astused."c".$astc.'c'.'p';

$box_q = preg_replace("/[^A-Za-z0-9_ ]/", '', $box_qt);
	
$local_box_cache = get_transient( $box_q );
if (false === ($local_box_cache) ){

	// start code to cache
		ob_start( );
			echo '<!-- c -->';
			get_sidebar();
			echo '<!-- c '.date(DATE_RFC2822).' -->' ;
		$local_box_cache = ob_get_clean( );
	// end the code to cache
		echo $local_box_cache;
	//end cache query 
	
	if( current_user_can( 'edit_post' ) ) {
		//you cannot cache it
	} else {
		set_transient($box_q ,$local_box_cache, 60 * 10);
	}
} else { 

echo $local_box_cache;

}
?>
</div>
<?php get_footer(); ?>
