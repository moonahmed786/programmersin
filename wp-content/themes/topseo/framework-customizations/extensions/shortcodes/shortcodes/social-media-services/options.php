<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'sms' => array(
		'type' => 'addable-popup',
		'label' => esc_html__('Social Media Services', 'topseo'),
		'desc' => esc_html__('Add your Social Media Services', 'topseo'),
		'template' => '{{- title}}',
		'limit' => 4,
		'popup-options' => array(
			'icon' => array(
				'type' => 'icon',
				'set' => 'ionicon',
				'label' => esc_html__('Icon', 'topseo'),
				'desc' => esc_html__('Choose icon', 'topseo'),
			),
			'title' => array(
				'type' => 'text',
				'label' => esc_html__('Title', 'topseo'),
				'desc' => esc_html__('Write some text', 'topseo'),
			),
			'link' => array(
				'type' => 'text',
				'label' => esc_html__('Social link', 'topseo'),
				'desc' => esc_html__('Write some text', 'topseo'),
				'value' => '#',
			),
			'bg' => array(
				'type' => 'color-picker',
				'label' => esc_html__('Background', 'topseo'),
				'desc' => esc_html__('Choose color', 'topseo'),
				'value' => '#3b5998'
			),
		),
	),
);