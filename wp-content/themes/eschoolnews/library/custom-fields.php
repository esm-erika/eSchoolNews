<?php

if( !class_exists('Acf') )
    include_once('external/acf/acf.php' );

if( !class_exists('acf_repeater_plugin') )
    include_once('external/acf-repeater/acf-repeater.php');

if( !class_exists('acf_options_page_plugin') )
    include_once('external/acf-options-page/acf-options-page.php');

/*===================================================================================
 * ERC Custom Fields
 * =================================================================================*/

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_erc-html-field',
		'title' => 'ERC HTML Field',
		'fields' => array (
			array (
				'key' => 'field_566b07e462d68',
				'label' => 'ERC HTML',
				'name' => 'erc_html',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'ercs',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_erc-link-fields',
		'title' => 'ERC Link Fields',
		'fields' => array (
			array (
				'key' => 'field_56842e1b5e5cd',
				'label' => 'Link to Whitepaper',
				'name' => 'link_to_whitepaper',
				'type' => 'relationship',
				'instructions' => 'Link to a specific Whitepaper (limited to 1).',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'whitepapers',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => 1,
			),
			array (
				'key' => 'field_56842e782d13f',
				'label' => 'Link to Other Post',
				'name' => 'link_to_ancillary',
				'type' => 'relationship',
				'instructions' => 'Link to posts in the \'Ancillary\' category (limit to 1).',
				'return_format' => 'object',
				'post_type' => array (
					0 => 'post',
				),
				'taxonomy' => array (
					0 => 'category:84',
				),
				'filters' => array (
					0 => 'search',
				),
				'result_elements' => array (
					0 => 'featured_image',
					1 => 'post_type',
					2 => 'post_title',
				),
				'max' => 1,
			),
			array (
				'key' => 'field_56842f052f6e7',
				'label' => 'Link to External URL',
				'name' => 'link_to_external_url',
				'type' => 'text',
				'instructions' => 'Full URL (including \'http://\') to external link.',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			// array (
			// 	'key' => 'field_56844dc3946e6',
			// 	'label' => 'Choose Icon',
			// 	'name' => 'choose_icon',
			// 	'type' => 'select',
			// 	'choices' => array (
			// 		'video' => 'Video Icon',
			// 		'globe' => 'Globe Icon',
			// 		'page' => 'Page Icon',
			// 		'twitter' => 'Twitter Icon',
			// 		'download' => 'Download Icon',
			// 	),
			// 	'default_value' => '',
			// 	'allow_null' => 1,
			// 	'multiple' => 0,
			// ),
			array (
				'key' => 'field_56845bd9ea38f',
				'label' => 'Button Text',
				'name' => 'text_for_button',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'ercitems',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_erc-masthead-fields',
		'title' => 'ERC Masthead Fields',
		'fields' => array (
			array (
				'key' => 'field_560995121d2c0',
				'label' => 'Masthead Image',
				'name' => 'masthead_image',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'large',
				'library' => 'all',
			),
			array (
				'key' => 'field_5609a7e17fb22',
				'label' => 'Masthead Text',
				'name' => 'masthead_text',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
			),
			array (
				'key' => 'field_56856a8710349',
				'label' => 'Masthead Sidebar Item',
				'name' => 'masthead_sidebar',
				'type' => 'textarea',
				'instructions' => 'Paste code for any items that need to appear as a sidebar item for the Masthead. This is completely optional. Masthead text will span the full width of the page otherwise.',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
			),
			array (
				'key' => 'field_560ac9bd1633c',
				'label' => 'Base Color',
				'name' => 'base_color',
				'type' => 'color_picker',
				'default_value' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'ercs',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'slug',
				8 => 'author',
				9 => 'format',
				10 => 'featured_image',
				11 => 'categories',
				12 => 'tags',
				13 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_erc-section-fields',
		'title' => 'ERC Section Fields',
		'fields' => array (
			array (
				'key' => 'field_5684298c66514',
				'label' => 'Left Column',
				'name' => 'left_column',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56843123c15b4',
						'label' => 'Section Title',
						'name' => 'section_title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_568431bc42535',
						'label' => 'ERC Items',
						'name' => 'erc_items_left',
						'type' => 'relationship',
						'instructions' => 'Select multiple ERC items to publish in this section.',
						'column_width' => '',
						'return_format' => 'object',
						'post_type' => array (
							0 => 'ercitems',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'filters' => array (
							0 => 'search',
						),
						'result_elements' => array (
							0 => 'featured_image',
							1 => 'post_type',
							2 => 'post_title',
						),
						'max' => '',
					),
					array (
						'key' => 'field_568448f118059',
						'label' => 'Horizontal Rule',
						'name' => 'hr_left',
						'type' => 'true_false',
						'instructions' => 'Insert HR between each item in this section.',
						'column_width' => '',
						'message' => 'Add horizontal rule?',
						'default_value' => 0,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Section',
			),
			array (
				'key' => 'field_5684318f899e3',
				'label' => 'Right Column',
				'name' => 'right_column',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_5684318f899e4',
						'label' => 'Section Title',
						'name' => 'section_title',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5684320a92ba4',
						'label' => 'ERC Items',
						'name' => 'erc_items_right',
						'type' => 'relationship',
						'instructions' => 'Select multiple ERC Items to publish in this section.',
						'column_width' => '',
						'return_format' => 'object',
						'post_type' => array (
							0 => 'ercitems',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'filters' => array (
							0 => 'search',
						),
						'result_elements' => array (
							0 => 'featured_image',
							1 => 'post_type',
							2 => 'post_title',
						),
						'max' => '',
					),
					array (
						'key' => 'field_568449d0d7cf2',
						'label' => 'Horizontal Rule',
						'name' => 'hr_right',
						'type' => 'true_false',
						'instructions' => 'Insert HR between each item in this section.',
						'column_width' => '',
						'message' => 'Add Horizontal Rule?',
						'default_value' => 0,
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Section',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'ercs',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}
?>