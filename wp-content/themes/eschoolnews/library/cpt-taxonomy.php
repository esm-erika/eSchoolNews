<?php
add_filter('pre_get_posts', 'query_post_type');
function query_post_type($query) {
  if ( is_tag() && empty( $query->query_vars['suppress_filters'] ) ) {
  	
    $post_type = get_post_types();

        if ( $post_type )
            $post_type = $post_type;
        else
            $post_type = $post_types;

        $query->set('post_type', $post_type);

    return $query;
    }
}
?>