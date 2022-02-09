<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'process' => array(
		'type' => 'addable-popup',
		'label' => esc_html__('Process', 'topseo'),
		'desc' => esc_html__('Add your Process', 'topseo'),
		'template' => '{{- title}}',
		'limit' => 4,
		'popup-options' => array(
			'image' => array(
				'type' => 'upload',
				'label' => esc_html__('Image', 'topseo'),
				'desc' => esc_html__('Choose image', 'topseo'),
			),
			'title' => array(
				'type' => 'text',
				'label' => esc_html__('Title', 'topseo'),
				'desc' => esc_html__('Write some text', 'topseo')
			),
		),
	),
);