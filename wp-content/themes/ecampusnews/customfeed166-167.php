<?php
/*
Template Name: Custom Feed Full Posts Webinars
*/
 
$numposts = 20;
$catnums = '166,167'; 
function yoast_rss_date( $timestamp = null ) {
  $timestamp = ($timestamp==null) ? time() : $timestamp;
  echo date(DATE_RSS, $timestamp);
}

function yoast_rss_text_limit($string, $length, $replacer = '...') {

$string = str_replace("<!--nextpage-->", "&lt;!--nextpage--&gt;", $string);




$string = str_replace("[caption id=", "<div id=", $string);
$string = str_replace('align="alignleft" width="', ' class="wp-caption alignleft"  style="width:', $string);
$string = str_replace('"]<a href="', 'px;color: #888;font-size: 12px;margin: 5px;"><a href="', $string);
$string = str_replace('[/caption]', '</p></div>', $string);




  $string = strip_tags($string, '<div><strong><em><p><a><br><img><blockquote><li><ul><!--nextpage-->');
  // $string = str_replace("[caption ", "<!-- ", $string);
  // $string = str_replace("[/caption]", " --> ", $string);
  // Order of replacement
$str     = $string;
$order   = array("\r\n"); //, "\n", "\r"
$replace = '<br /><br />';
// Processes \r\n's first so they aren't converted twice.
$string = str_replace($order, $replace, $str);
//
//$string = str_replace("<ul>", "&lt;ul&gt;", $string);
//$string = str_replace("</ul>", "&lt;/ul&gt;", $string);
//$string = str_replace("<li>", "&lt;li&gt;", $string);
//$string = str_replace("</li>", "&lt;/li&gt;", $string);
//$string = str_replace("<blockquote>", "&lt;blockquote&gt;", $string);
//$string = str_replace("</blockquote>", "&lt;/blockquote&gt;", $string);

$string = str_replace("<br>", "<br />", $string);
$string = str_replace("<br /><br />", "<br />", $string);
$string = str_replace("<br /><br /><br />", "<br /><br />", $string);

//$string = str_replace(array( '&', '"', "'", '<', '>' ),array( '&amp;' , '&quot;', '&apos;' , '&lt;' , '&gt;' ),$string);

  if(strlen($string) > $length) 
    return (preg_match('/^(.*)\W.*$/', substr($string, 0, $length+1), $matches) ? $matches[1] : substr($string, 0, $length)) . $replacer;   
  return $string; 
}

$posts = query_posts('showposts='.$numpost.'&cat='.$catnums.'&orderby=date');

$lastpost = $numposts - 1;

header("Content-Type: application/rss+xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	>

<channel>
  <title>eSchool News Feed Update</title>
  <link>http://www.eschoolnews.com/</link>
  <description>The latest blog posts from eSchool News.com.</description>
  <language>en-us</language>
  <pubDate><?php yoast_rss_date( strtotime($ps[$lastpost]->post_date_gmt) ); ?></pubDate>
  <lastBuildDate><?php yoast_rss_date( strtotime($ps[$lastpost]->post_date_gmt) ); ?></lastBuildDate>
  <managingEditor>webmaster@eschoolnews.com</managingEditor>
<?php foreach ($posts as $post) { ?>
  <item>
    <title><?php echo get_the_title($post->ID); ?></title>
    <link><?php echo get_permalink($post->ID); ?></link>
    <description><?php the_excerpt_rss(); ?></description>
    <content:encoded><?php echo '<![CDATA['.yoast_rss_text_limit($post->post_content, 955500).']]>';  ?></content:encoded>
    <pubDate><?php yoast_rss_date( strtotime($post->post_date_gmt) ); ?></pubDate>
    
    <guid><?php echo get_permalink($post->ID); ?></guid>
  </item>
<?php } ?>
</channel>
</rss>