<?php

if(function_exists('acf_add_options_page')) { 
 
	acf_add_options_page(array(
        'page_title'    => 'My Settings Page',
        'menu_title'    => 'My Settings',
        'menu_slug'     => 'my_settings',
        'capability'    => 'edit_posts',
        'redirect'      => false, 
    ));	
	
	acf_add_options_sub_page(array(
		'title' => 'Header',
		'slug' => 'header',
		'parent' => 'my_settings',
	));

	acf_add_options_sub_page(array(
		'title' => 'Footer',
		'slug' => 'footer',
		'parent' => 'my_settings',
	));
		 
}

?>