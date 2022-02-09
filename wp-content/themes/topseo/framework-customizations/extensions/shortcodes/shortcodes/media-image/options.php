<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'image'            => array(
		'type'  => 'upload',
		'label' => esc_html__( 'Choose Image', 'topseo' ),
		'desc'  => esc_html__( 'Either upload a new, or choose an existing image from your media library', 'topseo' )
	),
	'align' => array(
		'type' => 'short-select',
		'label' => esc_html__('Image Align', 'topseo'),
		'desc' => esc_html__('Set location for Image', 'topseo'),
		'choices' => array(
			'' => esc_html__('Default', 'topseo'),
			' text-left' => esc_html__('Left', 'topseo'),
			' text-right' => esc_html__('Right', 'topseo'),
			' text-center' => esc_html__('Center', 'topseo'),
		),
		'value' => '',
	),
	'size'             => array(
		'type'    => 'group',
		'options' => array(
			'width'  => array(
				'type'  => 'text',
				'label' => esc_html__( 'Width', 'topseo' ),
				'desc'  => esc_html__( 'Set image width', 'topseo' ),
				'value' => 300
			),
			'height' => array(
				'type'  => 'text',
				'label' => esc_html__( 'Height', 'topseo' ),
				'desc'  => esc_html__( 'Set image height', 'topseo' ),
				'value' => 200
			)
		)
	),
	'image-link-group' => array(
		'type'    => 'group',
		'options' => array(
			'link'   => array(
				'type'  => 'text',
				'label' => esc_html__( 'Image Link', 'topseo' ),
				'desc'  => esc_html__( 'Where should your image link to?', 'topseo' )
			),
			'target' => array(
				'type'         => 'switch',
				'label'        => esc_html__( 'Open Link in New Window', 'topseo' ),
				'desc'         => esc_html__( 'Select here if you want to open the linked page in a new window', 'topseo' ),
				'right-choice' => array(
					'value' => '_blank',
					'label' => esc_html__( 'Yes', 'topseo' ),
				),
				'left-choice'  => array(
					'value' => '_self',
					'label' => esc_html__( 'No', 'topseo' ),
				),
			),
		)
	)
);

