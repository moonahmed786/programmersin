<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type' => 'select',
		'label' => esc_html__('Style', 'topseo'),
		'choices' => array(
			't1' => esc_html__('Default', 'topseo'),
			't2' => esc_html__('Image circle', 'topseo'),
		),
		'value' => 't1',
	),
	'image' => array(
		'label' => esc_html__( 'Team Member Image', 'topseo' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'topseo' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Team Member Name', 'topseo' ),
		'desc'  => esc_html__( 'Name of the person', 'topseo' ),
		'type'  => 'text',
	),
	'job'   => array(
		'label' => esc_html__( 'Team Member Job Title', 'topseo' ),
		'desc'  => esc_html__( 'Job title of the person.', 'topseo' ),
		'type'  => 'text',
	),
	'social'  => array(
		'label' => esc_html__( 'Team Member Social', 'topseo' ),
		'type'  => 'addable-popup',
		'template' => '{{- social_link}}',
		'popup-options' => array(
			'social_link' => array(
				'type' => 'text',
				'label' => esc_html__('Add link', 'topseo'),
				'desc' => esc_html__('Write some text', 'topseo'),
			),
		),
	)
);