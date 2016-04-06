<?php

// if( !class_exists('Acf') )
    // include_once('external/acf/acf.php' );

// if( !class_exists('acf_repeater_plugin') )
    // include_once('external/acf-repeater/acf-repeater.php');

// if( !class_exists('acf_options_page_plugin') )
    // include_once('external/acf-options-page/acf-options-page.php');

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
			array (
				'key' => 'field_5685a92244d45',
				'label' => 'ERC Item HTML',
				'name' => 'erc_item_html',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
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
				'key' => 'field_56aa47cc91c7d',
				'label' => 'Hide Masthead Text',
				'name' => 'hide_masthead_text',
				'type' => 'true_false',
				'message' => 'Hide Masthead Text',
				'default_value' => 0,
			),
			array (
				'key' => 'field_56ba71782d518',
				'label' => 'ERC Alt Text',
				'name' => 'alt_text',
				'type' => 'textarea',
				'instructions' => 'Alternate text to appear on ERC Main page.',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'html',
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

	register_field_group(array (
		'id' => 'acf_erc-status',
		'title' => 'ERC Status',
		'fields' => array (
			array (
				'key' => 'field_569e72147ba13',
				'label' => 'Active ERC',
				'name' => 'erc_status',
				'type' => 'true_false',
				'message' => 'Is this an active ERC?',
				'default_value' => 0,
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
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

	register_field_group(array (
		'id' => 'acf_erc-highlight',
		'title' => 'ERC Highlight',
		'fields' => array (
			array (
				'key' => 'field_56a282ef0747d',
				'label' => 'Highlight',
				'name' => 'highlight',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'full',
				'media_upload' => 'no',
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

	register_field_group(array (
		'id' => 'acf_erc-sponsor-placement',
		'title' => 'ERC Sponsor Placement',
		'fields' => array (
			array (
				'key' => 'field_56a8eb9b7a084',
				'label' => 'Sponsor Placement',
				'name' => 'sponsor_placement',
				'type' => 'radio',
				'choices' => array (
					'left' => 'Left',
					'right' => 'Right',
				),
				'other_choice' => 0,
				'save_other_choice' => 0,
				'default_value' => '',
				'layout' => 'vertical',
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
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));



/*===================================================================================
 * Collaboration Nation Custom Fields
 * =================================================================================*/

	register_field_group(array (
		'id' => 'acf_collaboration-nation-pdfs',
		'title' => 'Collaboration Nation PDFs',
		'fields' => array (
			array (
				'key' => 'field_568aca9a46e1d',
				'label' => 'Upload PDFs',
				'name' => 'rules_pdf',
				'type' => 'file',
				'instructions' => 'Upload PDF containing Rules.',
				'save_format' => 'url',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'page',
					'operator' => '==',
					'value' => '177152',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_collaboration-nation-video',
		'title' => 'Collaboration Nation Video',
		'fields' => array (
			array (
				'key' => 'field_56d0bbf4085fb',
				'label' => 'Entry Section',
				'name' => 'video_section',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56d0beb282838',
						'label' => 'School Name',
						'name' => 'video_title',
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
						'key' => 'field_56d0bc1a085fc',
						'label' => 'Entry Video',
						'name' => 'entry_video',
						'type' => 'textarea',
						'instructions' => 'Video Embed Script',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_56d0c656eefe3',
						'label' => 'Award Name',
						'name' => 'award_name',
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
						'key' => 'field_56d0dc6c00782',
						'label' => 'video_text',
						'name' => 'video_text',
						'type' => 'textarea',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'html',
					),
					array (
						'key' => 'field_56d0e37f178b1',
						'label' => 'External Link',
						'name' => 'external_link',
						'type' => 'text',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
				),
				'row_min' => '',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Entry Section',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'collabnation',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'default',
			// 'hide_on_screen' => array (
			// 	0 => 'the_content',
			// ),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_collaboration-nation-winner-field',
		'title' => 'Collaboration Nation Winner Field',
		'fields' => array (
			array (
				'key' => 'field_5682c95afa7fc',
				'label' => 'Is this entry a winner?',
				'name' => 'entry_winner',
				'type' => 'true_false',
				'message' => 'Select if this entry is a winner.',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'collabnation',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));


/*===================================================================================
 * Newsletter Custom Fields
 * =================================================================================*/

	register_field_group(array (
		'id' => 'acf_newsletter-date',
		'title' => 'Newsletter Date',
		'fields' => array (
			array (
				'key' => 'field_569520912a8b5',
				'label' => 'Date',
				'name' => 'newsletter_date',
				'type' => 'date_picker',
				'required' => 1,
				'date_format' => 'MM dd, yy',
				'display_format' => 'MM dd, yy',
				'first_day' => 1,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'newsletter',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
				0 => 'permalink',
				1 => 'the_content',
				2 => 'excerpt',
				3 => 'custom_fields',
				4 => 'discussion',
				5 => 'comments',
				6 => 'revisions',
				7 => 'author',
				8 => 'format',
				9 => 'categories',
				10 => 'tags',
				11 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_newsletter-sections',
		'title' => 'Newsletter Sections',
		'fields' => array (
			array (
				'key' => 'field_5695432954dd3',
				'label' => 'Newsletter Section',
				'name' => 'newsletter_section',
				'type' => 'repeater',
				'sub_fields' => array (
					array (
						'key' => 'field_56954a7991310',
						'label' => 'Section Title',
						'name' => 'newsletter_section_title',
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
						'key' => 'field_5696a69e5f1e9',
						'label' => 'Sponsored Section',
						'name' => 'sponsored_section',
						'type' => 'image',
						'instructions' => 'Upload sponsored image here, if there is one. ',
						'column_width' => '',
						'save_format' => 'object',
						'preview_size' => 'thumbnail',
						'library' => 'all',
					),
					array (
						'key' => 'field_5695436754dd4',
						'label' => 'Article',
						'name' => 'article_newsletter',
						'type' => 'relationship',
						'column_width' => '',
						'return_format' => 'object',
						'post_type' => array (
							0 => 'post',
							1 => 'ercs',
							2 => 'whitepapers',
							3 => 'special-reports',
							4 => 'events',
							5 => 'newsletteritems',
						),
						'taxonomy' => array (
							0 => 'all',
						),
						'filters' => array (
							0 => 'search',
							1 => 'post_type',
						),
						'result_elements' => array (
							0 => 'featured_image',
							1 => 'post_type',
							2 => 'post_title',
						),
						'max' => 1,
					),
					array (
						'key' => 'field_56a96b29ec859',
						'label' => 'Custom Link',
						'name' => 'custom_link_newsletter',
						'type' => 'text',
						'instructions' => 'Include \'http://\' for custom link.',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'prepend' => '',
						'append' => '',
						'formatting' => 'none',
						'maxlength' => '',
					),
					array (
						'key' => 'field_5696aacd56c4e',
						'label' => 'Horizontal Rule',
						'name' => 'hr_newsletter',
						'type' => 'true_false',
						'column_width' => '',
						'message' => 'Include Horizontal Rule',
						'default_value' => 0,
					),
					array (
						'key' => 'field_5696ad9653363',
						'label' => 'Exclude Excerpt',
						'name' => 'exclude_excerpt',
						'type' => 'true_false',
						'column_width' => '',
						'message' => 'Exclude Excerpt',
						'default_value' => 0,
					),
					array (
						'key' => 'field_56994daceeedf',
						'label' => 'Remove Thumbnail',
						'name' => 'remove_thumbnail',
						'type' => 'true_false',
						'column_width' => '',
						'message' => 'Remove Thumbnail',
						'default_value' => 0,
					),
					array (
						'key' => 'field_56b273b4cb1a5',
						'label' => 'Bullets',
						'name' => 'bullets',
						'type' => 'true_false',
						'column_width' => '',
						'message' => 'Add bullets?',
						'default_value' => 0,
					),
					
					array (
						'key' => 'field_5699247fc9304',
						'label' => 'Ad',
						'name' => 'ad_newsletter',
						'type' => 'textarea',
						'instructions' => 'Insert ad code here. The add will appear just BELOW this section.',
						'column_width' => '',
						'default_value' => '',
						'placeholder' => '',
						'maxlength' => '',
						'rows' => '',
						'formatting' => 'html',
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
					'value' => 'newsletter',
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
		'id' => 'acf_publication-logo',
		'title' => 'Publication Logo',
		'fields' => array (
			array (
				'key' => 'field_56a94ae6789d3',
				'label' => 'Publication Logo',
				'name' => 'publication_logo',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'publications',
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
		'id' => 'acf_current-issue-banner',
		'title' => 'Current Issue Banner',
		'fields' => array (
			array (
				'key' => 'field_56be19bd0b34d',
				'label' => 'Current Issue',
				'name' => 'current_issue',
				'type' => 'true_false',
				'message' => 'Include current issue banner?',
				'default_value' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'newsletter',
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





/*===================================================================================
 * Press Release Custom Fields
 * =================================================================================*/

register_field_group(array (
		'id' => 'acf_about-company',
		'title' => 'About Company',
		'fields' => array (
			array (
				'key' => 'field_57056e88dec79',
				'label' => 'Company Name',
				'name' => 'company_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_570532a31a933',
				'label' => 'Company Information',
				'name' => 'about_company',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'press-releases',
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
		'id' => 'acf_press-company-information',
		'title' => 'Press Company Information',
		'fields' => array (
			array (
				'key' => 'field_57053ae7a93cb',
				'label' => 'Press Address 1',
				'name' => 'press_address_1',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57053af9a93cc',
				'label' => 'Press Address 2',
				'name' => 'press_address_2',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57053b04a93cd',
				'label' => 'Press City, State & Zip',
				'name' => 'press_city_state_zip',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57053b306bb73',
				'label' => 'Press Website',
				'name' => 'press_website',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'press-releases',
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
		'id' => 'acf_press-contact-information',
		'title' => 'Press Contact Information',
		'fields' => array (
			array (
				'key' => 'field_57052d1cc2bb8',
				'label' => 'Press Contact Name',
				'name' => 'press_contact_name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57052d2ec2bb9',
				'label' => 'Press Contact Email',
				'name' => 'press_contact_email',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_57052d3dc2bba',
				'label' => 'Press Contact Number',
				'name' => 'press_contact_number',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'press-releases',
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
		'id' => 'acf_press-release-date',
		'title' => 'Press Release Date',
		'fields' => array (
			array (
				'key' => 'field_57054e039f06e',
				'label' => 'Press Release Date',
				'name' => 'press_release_date',
				'type' => 'date_picker',
				'required' => 1,
				'date_format' => 'yymmdd',
				'display_format' => 'dd/mm/yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_57056d0fed112',
				'label' => 'Press Release City',
				'name' => 'press_release_city',
				'type' => 'text',
				'required' => 1,
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'press-releases',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_subheadline',
		'title' => 'Subheadline',
		'fields' => array (
			array (
				'key' => 'field_57042a10e20de',
				'label' => 'Subheadline',
				'name' => 'subheadline',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'press-releases',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'default',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));

}

?>