<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
	    'type' => 'select',
	    'desc' => esc_html__('Choose style', 'topseo'),
	    'label' => esc_html__('Counter', 'topseo'),
	    'choices' => array(
	        '1' => esc_html__('Style 1', 'topseo'),
	        '2' => esc_html__('Style 2', 'topseo'),
	    ),
	    'value' => '1',
	),
	'title' => array(
	    'type' => 'text',
	    'label' => esc_html__('Title', 'topseo'),
	    'desc' => esc_html__('Write some text', 'topseo'),
	    'value' => 'One'
	),
	'number' => array(
	    'type' => 'text',
	    'label' => esc_html__('Number', 'topseo'),
	    'desc' => esc_html__('Enter the number', 'topseo'),
	    'value' => 123
	),
	'image' => array(
	    'type' => 'upload',
	    'label' => esc_html__('Image', 'topseo'),
	    'desc' => esc_html__('Choose image', 'topseo'),
	),
);
