<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'style' => array(
		'label' => esc_html__('Style', 'topseo'),
		'desc' => esc_html__('Choose style', 'topseo'),
		'type' => 'select',
		'choices' => array(
			's1' => esc_html__('Blog post with only title', 'topseo'),
			's2' => esc_html__('Blog post 1 column with thumbnail', 'topseo'),
			's3' => esc_html__('Blog post 2 columns with thumbnail', 'topseo'),
			's4' => esc_html__('Carousel Blog post', 'topseo'),
		),
	),
	'item_select' => array(
		'type' => 'multi-picker',
		'label' => false,
		'desc' => false,
		'value' => array(
			'gadget' => 'all'
		),
		'picker' => array(
			'gadget' => array(
				'type' => 'select',
				'label' => esc_html__('Pick post by:', 'topseo'),
				'desc' => false,
				'choices' => array(
					'all' => esc_html__('All', 'topseo'),
					'category' => esc_html__('Categories', 'topseo'),
				),
			),
		),
		'choices' => array(
			'all' => array(
			),
			'category' => array(
				'cat_items' => array(
					'type' => 'multi-select',
					'population' => 'taxonomy',
					'source' => 'category',
					'prepopulate' => 20,
					'label' => esc_html__( 'Select category(s)', 'topseo' ),
					'desc' => false,
				),
			),
		),
	),
	'limit' => array(
		'type'  => 'short-text',
		'value' => -1,
		'label' => esc_attr__('Limit: ', 'topseo'),
		'desc'  => esc_attr__('-1 by default mean getting all posts', 'topseo'),
	)
);