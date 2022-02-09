<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'multi_icon' => array(
		'label' => esc_html__('Multi Icon box', 'topseo'),
		'desc' => esc_html__('Add your Icon box', 'topseo'),
		'type' => 'addable-popup',
		'template' => '{{- i_title}}',
		'popup-options' => array(
			'i_style' => array(
				'type' => 'select',
				'choices' => array(
					's1' => esc_html__('Icon above Title', 'topseo'),
					's2' => esc_html__('Icon inline with Title', 'topseo'),
				),
				'value' => 's1',
				'label' => esc_html__('Icon box style', 'topseo'),
				'desc' => esc_html__('Choose style', 'topseo'),
			),
			'i_center' => array(
				'type' => 'switch',
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'topseo'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'topseo'),
				),
				'desc' => esc_html__('Choose Yes if you want to display Icon box centered', 'topseo'),
				'value' => 'no',
				'label' => esc_html__('Centered', 'topseo'),
			),
			'icon_box' => array(
			    'type' => 'multi-picker',
			    'desc' => false,
			    'label' => false,
			    'picker'       => array(
					'gadget' => array(
						'label'   => esc_html__( 'Icon type', 'topseo' ),
						'type'    => 'select',
						'choices' => array(
							'i1'  => esc_html__( 'Use Image', 'topseo' ),
							'i2' => esc_html__( 'Use Icon', 'topseo' ),
						),
						'value' => 'i1',
						'desc'    => esc_html__('Choose style', 'topseo' ),
					)
				),
				'choices'      => array(
					'i1'  => array(
						'i_image' => array(
							'type' => 'upload',
							'label' => esc_html__('Image', 'topseo'),
							'desc' => esc_html__('Choose image', 'topseo'),
						),
					),
					'i2'  => array(
						'i_icon' => array(
							'type' => 'icon',
							'set' => 'ionicon',
							'label' => esc_html__('Icon', 'topseo'),
							'desc' => esc_html__('Choose Icon', 'topseo'),
						),
						'i_size' => array(
							'type'  => 'slider',
							'value' => 16,
							'label' => esc_html__('Icon size', 'topseo'),
							'desc' => esc_html__('Set Icon size', 'topseo'),
						),
						'i_color' => array(
							'type'  => 'color-picker',
							'value' => '#999999',
							'label' => esc_html__('Color', 'topseo'),
							'desc' => esc_html__('Set Icon color', 'topseo'),
						),	
					),
				),
				'show_borders' => false,
			),
			'i_title' => array(
				'type' => 'text',
				'label' => esc_html__('Title', 'topseo'),
				'desc' => esc_html__('Write some text', 'topseo'),
			),
			'i_content' => array(
				'type' => 'textarea',
				'label' => esc_html__('Content', 'topseo'),
				'desc' => esc_html__('Write some text', 'topseo'),
			),
		),
	),
);
