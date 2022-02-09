<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title' => array(
		'type' => 'text',
		'desc' => esc_html__('Write some text', 'topseo'),
		'label' => esc_html__('Title', 'topseo'),
	),
	'img' => array(
		'type' => 'upload',
		'label' => esc_html__('Lading image', 'topseo'),
		'desc' => esc_html__('Choose image', 'topseo'),
	),
	'btn' => array(
		'type' => 'text',
		'label' => esc_html__('Button label', 'topseo'),
		'desc' => esc_html__('Write some text', 'topseo'),
		'value' => 'VIEW DEMO'
	),
	'btn_link' => array(
		'type' => 'text',
		'label' => esc_html__('Button link', 'topseo'),
		'desc' => esc_html__('Enter button link', 'topseo'),
		'value' => '#'
	),
);
