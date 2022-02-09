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
	'item' => array(
        'type' => 'multi-select',
        'population' => 'posts',
        'source' => 'post',
        'prepopulate' => 30,
        'label' => esc_html__( 'Select post(s)', 'topseo' ),
        'desc' => false,
        'limit' => 100
    ),
);