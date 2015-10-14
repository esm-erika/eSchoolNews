<h3 class="section-title"><span>Tag Cloud</span></h3>

<?php $args = array(
	'smallest'                  => 14, 
	'largest'                   => 14,
	'unit'                      => 'px', 
	'number'                    => 45,  
	'format'                    => 'list',
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