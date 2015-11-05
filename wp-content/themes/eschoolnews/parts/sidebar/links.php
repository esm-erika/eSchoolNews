<article>
    <h4>Sponsored Links</h4>
    <br/>
<?php $args = array(
    'orderby'          => 'rand',
    'order'            => 'ASC',
    'limit'            => -1,
    'category'         => ' ',
    'exclude_category' => ' ',
    'category_name'    => 'sponsored-links',
    'hide_invisible'   => 1,
    'show_updated'     => 0,
    'echo'             => 1,
    'categorize'       => 1,
    'title_li'         => __(''),
    'title_before'     => '<h2>',
    'title_after'      => '</h2>',
    'category_orderby' => 'name',
    'category_order'   => 'ASC',
    'class'            => 'linkcat',
    'category_before'  => '<li id=%id class=%class>',
    'category_after'   => '</li>' ); ?> 

<ul>
    <?php wp_list_bookmarks( $args ); ?> 
</ul>

</article>