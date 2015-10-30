<article class="tag-cloud">
<h4>Tag Cloud</h4>

<?php $args = array(
	'smallest'                  => 11, 
	'largest'                   => 11,
	'unit'                      => 'px', 
	'number'                    => 20,  
	'format'                    => 'flat',
	'separator'                 => "\n",
	'orderby'                   => 'name', 
	'order'                     => 'ASC',
	'exclude'                   => null, 
	'include'                   => null, 
	//'topic_count_text_callback' => default_topic_count_text,
	'link'                      => 'view', 
	'taxonomy'                  => 'post_tag', 
	'echo'                      => true,
	'child_of'                  => null, // see Note!
); 

wp_tag_cloud( $args );

?>
</article>