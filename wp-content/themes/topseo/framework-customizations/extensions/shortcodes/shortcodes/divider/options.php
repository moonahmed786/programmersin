<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'style' => array(
		'type'     => 'multi-picker',
		'label'    => false,
		'desc'     => false,
		'picker' => array(
			'ruler_type' => array(
				'type'    => 'select',
				'label'   => esc_html__( 'Ruler Type', 'topseo' ),
				'desc'    => esc_html__( 'Here you can set the styling and size of the HR element', 'topseo' ),
				'choices' => array(
					'line'  => esc_html__( 'Line', 'topseo' ),
					'space' => esc_html__( 'Whitespace', 'topseo' ),
				),
				'value' => 'space'
			)
		),
		'choices'     => array(
			'space' => array(
				'height' => array(
					'label' => esc_html__( 'Height', 'topseo' ),
					'desc'  => esc_html__( 'How much whitespace do you need? Enter a pixel value. Positive value will increase the whitespace, negative value will reduce it. eg: \'50\', \'-25\', \'200\'', 'topseo' ),
					'type'  => 'text',
					'value' => '50'
				)
			),
			'line' => array(
				'line_style' => array(
					'label' => esc_html__('Style', 'topseo'),
					'desc' => esc_html__('Choose style', 'topseo'),
					'type' => 'short-select',
					'choices' => array(
						'solid' => esc_html__('Solid', 'topseo'),
						'dotted' => esc_html__('Dotted', 'topseo'),
						'dashed' => esc_html__('Dashed', 'topseo'),
						'solid-bold' => esc_html__('Solid and Bold', 'topseo'),
						'parttern' => esc_html__('Parttern', 'topseo'),
					),
					'value' => 'solid'
				),
			),
		)
	)
);
