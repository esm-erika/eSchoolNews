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
					0 => 'category:7899',
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
				'key' => 'field_56d0adc624ebb',
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
		'id' => 'acf_collaboration-judge-title',
		'title' => 'Collaboration Judge Title',
		'fields' => array (
			array (
				'key' => 'field_568abcd932773',
				'label' => 'Title',
				'name' => 'judge_title',
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
					'value' => 'judges',
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
	register_field_group(array (
		'id' => 'acf_collaboration-nation-award-field',
		'title' => 'Collaboration Nation Award Field',
		'fields' => array (
			array (
				'key' => 'field_5682c5bb53ae8',
				'label' => 'Award Name',
				'name' => 'award_name',
				'type' => 'text',
				'instructions' => 'The name of the award.',
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
					'value' => 'collabnation',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'acf_after_title',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
	register_field_group(array (
		'id' => 'acf_collaboration-nation-external-links',
		'title' => 'Collaboration Nation External Links',
		'fields' => array (
			array (
				'key' => 'field_568c5d6f89371',
				'label' => 'External Link',
				'name' => 'external_link',
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
					'value' => 'collabnation',
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
					'value' => '156964',
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
				'key' => 'field_5682e56ab4f21',
				'label' => 'Entry Video',
				'name' => 'entry_video',
				'type' => 'text',
				'instructions' => 'Use the last digits off of the YouTube share link:
	<br/>
	https://youtu.be/<strong>8VYgRvwZZJM</strong>',
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
 * Contributor Fields
 * =================================================================================*/

register_field_group(array (
		'id' => 'acf_contributor-fields',
		'title' => 'Contributor Fields',
		'fields' => array (
			array (
				'key' => 'field_564baf3c67dd3',
				'label' => 'Contributor Email',
				'name' => 'Author Email',
				'type' => 'email',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
			),
			array (
				'key' => 'field_564baf4f67dd4',
				'label' => 'Contributor Bio',
				'name' => 'contributor_bio',
				'type' => 'textarea',
				'default_value' => '',
				'placeholder' => '',
				'maxlength' => '',
				'rows' => '',
				'formatting' => 'br',
			),
			array (
				'key' => 'field_564cf8a667385',
				'label' => 'Read More',
				'name' => 'read_more',
				'type' => 'text',
				'instructions' => 'Link to EXTERNAL site where you can read more from this author.',
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_567073b255c2f',
				'label' => 'About Contributor Name Fields',
				'name' => '',
				'type' => 'message',
				'message' => '<h2>About Contributor Name Fields</h2>
	<p>There are 2 fields for contributor names below. BOTH fields work similarly. </p>
	
	<p>On the old eSN website, there were 2 fields for contributor names. In order to make sure names were being pulled in appropriately for older posts, we had to put both in here.</p>
	
	<strong>PLEASE NOTE: You do not have to put \'By\' in the field labeled \'Contributor Name\' you DO have to put it for the field labeled \'Byline\'. It is a carry over from the old website.</strong>',
			),
			array (
				'key' => 'field_564baf2967dd2',
				'label' => 'Contributor Name',
				'name' => 'Alt Author Read More Name',
				'type' => 'text',
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_567072a88c4b8',
				'label' => 'Byline',
				'name' => 'Byline',
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
					'value' => 'post',
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
 * Events Custom Fields
 * =================================================================================*/

register_field_group(array (
		'id' => 'acf_event-details',
		'title' => 'Event Details',
		'fields' => array (
			array (
				'key' => 'field_5609b4b842ef1',
				'label' => 'Event Date',
				'name' => 'event_date',
				'type' => 'date_picker',
				'date_format' => 'yymmdd',
				'display_format' => 'MM d, yy',
				'first_day' => 1,
			),
			array (
				'key' => 'field_5609b5d742ef2',
				'label' => 'Event Time',
				'name' => 'event_time',
				'type' => 'text',
				'instructions' => 'Place the time in the format hour:min pm EST / hour:min am PST',
				'default_value' => '',
				'placeholder' => '1:00 pm EST / 10:00 am PST',
				'prepend' => '',
				'append' => '',
				'formatting' => 'none',
				'maxlength' => '',
			),
			array (
				'key' => 'field_5609b65b42ef3',
				'label' => 'Registration Link',
				'name' => 'registration_link',
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
					'value' => 'webinars',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'events',
					'order_no' => 0,
					'group_no' => 1,
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
		'id' => 'acf_event-information',
		'title' => 'Event Information',
		'fields' => array (
			array (
				'key' => 'field_561d1b528c5af',
				'label' => 'About the Event',
				'name' => 'event_information',
				'type' => 'wysiwyg',
				'default_value' => '',
				'toolbar' => 'basic',
				'media_upload' => 'no',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'webinars',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'events',
					'order_no' => 0,
					'group_no' => 1,
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
 * Webinar Custom Fields
 * =================================================================================*/


register_field_group(array (
		'id' => 'acf_webinar-sponsor',
		'title' => 'Webinar Sponsor',
		'fields' => array (
			array (
				'key' => 'field_561d1de171998',
				'label' => 'Sponsored By',
				'name' => 'sponsored_by',
				'type' => 'image',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'library' => 'all',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'webinars',
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
		'id' => 'acf_youtube-embed',
		'title' => 'YouTube Embed',
		'fields' => array (
			array (
				'key' => 'field_562ea5eb109bc',
				'label' => 'YouTube Embed Instructions',
				'name' => '',
				'type' => 'message',
				'message' => 'Copy and paste the end of the YouTube Share link to embed:
	<br/>
	Ex: https://youtu.be/<strong>a-uNcLJ7PgI</strong>
	<br/>
	Only need: <strong>a-uNcLJ7PgI</strong>',
			),
			array (
				'key' => 'field_562e6c857412a',
				'label' => 'YouTube Embed',
				'name' => 'youtube_embed',
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
					'value' => 'webinars',
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
 * Misc Custom Fields
 * =================================================================================*/

register_field_group(array (
		'id' => 'acf_sponsor-image',
		'title' => 'Sponsor Image',
		'fields' => array (
			array (
				'key' => 'field_5627bf113e202',
				'label' => 'Sponsor Image',
				'name' => 'sponsor_image',
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
					'value' => 'sponsor',
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
		'id' => 'acf_top-stories-layout',
		'title' => 'Top Stories Layout',
		'fields' => array (
			array (
				'key' => 'field_5613da8b36533',
				'label' => 'Layout Select',
				'name' => 'layout_select',
				'type' => 'image_select',
				'choices' => array (
					'layout-2x2_halfpage' => '2x2 Articles, Halfpage Ad',
					'layout-2x2_box_ecn' => '2x2 Articles, Box Ad, eCN Article',
					'layout-1x3_noad' => '1x3 Articles, No Ad',
				),
				'default_value' => '',
				'multiple' => 0,
				'image_path' => 'http://www.ecampusnews.com/wp-content/themes/ecampusnews/assets/images/',
				'image_extension' => 'png',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'acf-options',
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
		'id' => 'acf_upload-file',
		'title' => 'Upload File',
		'fields' => array (
			array (
				'key' => 'field_5621461e0a54a',
				'label' => 'Upload File',
				'name' => 'download_file',
				'type' => 'file',
				'instructions' => 'Upload PDF here.',
				'save_format' => 'object',
				'library' => 'all',
			),
			array (
				'key' => 'field_56689ae3f89d5',
				'label' => 'Link to 3rd Party File',
				'name' => 'WP URL',
				'type' => 'text',
				'instructions' => 'Link to file hosted on another server. You must include \'http://\'.',
				'default_value' => '',
				'placeholder' => 'http://',
				'prepend' => '',
				'append' => '',
				'formatting' => 'html',
				'maxlength' => '',
			),
			array (
				'key' => 'field_56746d0cca33a',
				'label' => 'Gravity Form used to Download (Number)',
				'name' => 'WP Form Number',
				'type' => 'number',
				'instructions' => 'A value greater than 0 in this field will prevent a person from directly access the Whitepaper.',
				'default_value' => 0,
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'min' => '',
				'max' => '',
				'step' => '',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'special-reports',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'whitepapers',
					'order_no' => 0,
					'group_no' => 1,
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