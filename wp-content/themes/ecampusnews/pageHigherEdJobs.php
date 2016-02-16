<?php /* 
Template Name: Higher Ed Jobs
*/
get_header(); ?>
<div class="row">

	<div class="small-12 large-12 columns right-column top-stories">
		<?php
        	if (have_posts()) : while (have_posts()) : the_post();
			// Display content
			the_content();
		endwhile; else : endif;
		?>
	</div>
</div>

<div class="row">

<div class="small-12 large-12 columns right-column top-stories">

	<div class="row">

		<div class="columns large-4 small-12">


<a href="http://www.higheredjobs.com/rss/selectiveFeed.cfm?TypeID=1" target="_blank">Administrative Listings</a> 



    
    
    <?php if(function_exists('fetch_feed')) {
    
        include_once(ABSPATH . WPINC . '/feed.php'); // the file to rss feed generator
        $feed = fetch_feed('http://www.higheredjobs.com/rss/selectiveFeed.cfm?TypeID=1'); // specify the rss feed
    
        $limit = $feed->get_item_quantity(7); // specify number of items
        $items = $feed->get_items(0, $limit); // create an array of items
    
    }
    if ($limit == 0) echo '<div>The feed is either empty or unavailable.</div>';
    else foreach ($items as $item) : ?>
    
    <p><a href="<?php echo $item->get_permalink(); ?>" alt="<?php echo $item->get_title(); ?>"><strong><?php echo $item->get_title(); ?></strong></a><br />
    <span style="color:#666666; font-size:9px;"><?php echo $item->get_date('j F Y @ g:i a'); ?></span><br />
    <?php echo substr($item->get_description(), 0, 200); ?> ...</p>
    
    <?php endforeach; ?>
    <a href="http://www.higheredjobs.com/admin/" target="_blank">View all listings</a>

</div>

<div class="columns large-4 small-12">
<a href="http://www.higheredjobs.com/rss/selectiveFeed.cfm?TypeID=2" target="_blank">Executive Listings</a>
    
    
    <?php if(function_exists('fetch_feed')) {
    
        include_once(ABSPATH . WPINC . '/feed.php'); // the file to rss feed generator
        $feed = fetch_feed('http://www.higheredjobs.com/rss/selectiveFeed.cfm?TypeID=2'); // specify the rss feed
    
        $limit = $feed->get_item_quantity(7); // specify number of items
        $items = $feed->get_items(0, $limit); // create an array of items
    
    }
    if ($limit == 0) echo '<div>The feed is either empty or unavailable.</div>';
    else foreach ($items as $item) : ?>
    
    <p><a href="<?php echo $item->get_permalink(); ?>" alt="<?php echo $item->get_title(); ?>"><strong><?php echo $item->get_title(); ?></strong></a><br />
    <span style="color:#666666; font-size:9px;"><?php echo $item->get_date('j F Y @ g:i a'); ?></span><br />
    <?php echo substr($item->get_description(), 0, 200); ?> ...</p>
    
    <?php endforeach; ?>
        <a href="http://www.higheredjobs.com/executive/" target="_blank">View all listings</a>

</div>
<div class="columns large-4 small-12">
<a href="http://www.higheredjobs.com/rss/selectiveFeed.cfm?TypeID=3" target="_blank">Faculty Listings</a> 
    
    
    <?php if(function_exists('fetch_feed')) {
    
        include_once(ABSPATH . WPINC . '/feed.php'); // the file to rss feed generator
        $feed = fetch_feed('http://www.higheredjobs.com/rss/selectiveFeed.cfm?TypeID=3'); // specify the rss feed
    
        $limit = $feed->get_item_quantity(7); // specify number of items
        $items = $feed->get_items(0, $limit); // create an array of items
    
    }
    if ($limit == 0) echo '<div>The feed is either empty or unavailable.</div>';
    else foreach ($items as $item) : ?>
    
    <p><a href="<?php echo $item->get_permalink(); ?>" alt="<?php echo $item->get_title(); ?>"><strong><?php echo $item->get_title(); ?></strong></a><br />
    <span style="color:#666666; font-size:9px;"><?php echo $item->get_date('j F Y @ g:i a'); ?></span><br />
    <?php echo substr($item->get_description(), 0, 200); ?> ...</p>
    
    <?php endforeach; ?>
        <a href="http://www.higheredjobs.com/faculty/" target="_blank">View all listings</a>

</div>

</div>
</div>
</div>
<?php get_footer(); ?>
