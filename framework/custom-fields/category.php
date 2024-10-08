<?php
if( function_exists('acf_add_local_field_group') ):

acf_add_local_field_group(array (
	'key' => 'group_58734fdd30c57',
	'title' => 'Category Colors',
	'fields' => array (
		array (
			'layout' => 'vertical',
			'choices' => theme_colors(),
			'default_value' => '',
			'other_choice' => 0,
			'save_other_choice' => 0,
			'allow_null' => 0,
			'return_format' => 'array',
			'key' => 'field_58734fe7e611d',
			'label' => 'Category Colors',
			'name' => 'category_colors',
			'type' => 'radio',
			'instructions' => '',
			'required' => 0,
			'conditional_logic' => 0,
			'wrapper' => array (
				'width' => '',
				'class' => '',
				'id' => '',
			),
		),
	),
	'location' => array (
		array (
			array (
				'param' => 'taxonomy',
				'operator' => '==',
				'value' => 'all',
			),
		),
	),
	'menu_order' => 0,
	'position' => 'normal',
	'style' => 'default',
	'label_placement' => 'top',
	'instruction_placement' => 'label',
	'hide_on_screen' => '',
	'active' => 1,
	'description' => '',
));

endif;
