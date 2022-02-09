<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'carousel' => array(
	    'type' => 'multi-picker',
	    'desc' => false,
	    'label' => false,
	    'picker'       => array(
			'gadget' => array(
				'label'   => esc_html__( 'Carousel style', 'topseo' ),
				'type'    => 'select',
				'choices' => array(
					's1'  => esc_html__( 'Client Carousel', 'topseo' ),
					's2' => esc_html__( 'Partner Carousel', 'topseo' ),
					's3' => esc_html__( 'Reputation Carousel', 'topseo' ),
					's4' => esc_html__( 'Full Range Carousel', 'topseo' ),
					's5' => esc_html__( 'Real results Carousel', 'topseo' ),
					's6' => esc_html__( 'Partner Carousel with pagination', 'topseo' ),
				),
				'value' => '1',
				'desc'    => esc_html__('Choose style', 'topseo' ),
			)
		),
		'choices'      => array(
			's1'  => array(
				's1_options'  => array(
					'type'  => 'addable-popup',
					'label' => esc_html__( 'Image', 'topseo' ),
					'desc' => esc_html__('Choose image', 'topseo'),
					'template' => 'Images',
					'limit' => 3,
					'popup-options' => array(
						's1_image' => array(
							'type' => 'multi-upload',
							'label' => esc_html__('Carousel image', 'topseo'),
							'desc' => esc_html__('Choose image', 'topseo'),
						),
					),
				),
			),
			's2' => array(
				's2_image'  => array(
					'type'  => 'multi-upload',
					'label' => esc_html__( 'Carousel image', 'topseo' ),
					'desc' => esc_html__('Choose image', 'topseo'),
				),
			),
			's3'  => array(
				's3_image'  => array(
					'type'  => 'multi-upload',
					'label' => esc_html__( 'Carousel image', 'topseo' ),
					'desc' => esc_html__('Choose image', 'topseo'),
				),
			),
			's4' => array(
				's4_image'  => array(
					'type'  => 'multi-upload',
					'label' => esc_html__( 'Carousel image', 'topseo' ),
					'desc' => esc_html__('Choose image', 'topseo'),
				),
			),
			's5' => array(
				's5_options' => array(
					'type'  => 'addable-popup',
					'label' => esc_html__( 'Content', 'topseo' ),
					'desc' => esc_html__('Add your carousel item', 'topseo'),
					'template' => '{{- s5_title}}',
					'limit' => 12,
					'popup-options' => array(
						's5_image'  => array(
							'type'  => 'upload',
							'label' => esc_html__( 'Image', 'topseo' ),
							'desc' => esc_html__('Choose image', 'topseo'),
						),
						's5_title'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Title', 'topseo' ),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
						's5_content'  => array(
							'type'  => 'text',
							'label' => esc_html__( 'Description', 'topseo' ),
							'desc' => esc_html__('Write some text. The text inside [ ] will style bold.', 'topseo'),
						),
					),
				),
			),
			's6' => array(
				's6_image'  => array(
					'type'  => 'multi-upload',
					'label' => esc_html__( 'Carousel image', 'topseo' ),
					'desc' => esc_html__('Choose image', 'topseo'),
				),
			),
		),
		'show_borders' => false,
	),
);
