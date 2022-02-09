<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	't_ava' => array(
		'type' => 'upload',
		'label' => esc_html__('Avatar image', 'topseo'),
		'desc' => esc_html__('Choose image', 'topseo'),
	),
	't_logo' => array(
		'type' => 'upload',
		'label' => esc_html__('Logo company image', 'topseo'),
		'desc' => esc_html__('Choose image', 'topseo'),
	),
	't_rate' => array(
		'type' => 'select',
		'label' => esc_html__('Rating', 'topseo'),
		'desc' => esc_html__('Rating for item', 'topseo'),
		'choices' => array(
			'1s' => esc_html__('1 Star', 'topseo'),
			'2s' => esc_html__('2 Star', 'topseo'),
			'3s' => esc_html__('3 Star', 'topseo'),
			'4s' => esc_html__('4 Star', 'topseo'),
			'5s' => esc_html__('5 Star', 'topseo'),
		),
		'value' => '5s',
	),
	't_content' => array(
		'type' => 'wp-editor',
		'label' => esc_html__('Content', 'topseo'),
		'desc' => esc_html__('Write some text', 'topseo'),
	),
	't_author' => array(
		'type' => 'text',
		'label' => esc_html__('Author', 'topseo'),
		'desc' => esc_html__('Write some text', 'topseo'),
	),
	't_company' => array(
		'type' => 'text',
		'label' => esc_html__('Company', 'topseo'),
		'desc' => esc_html__('Write some text', 'topseo'),
	),
);
