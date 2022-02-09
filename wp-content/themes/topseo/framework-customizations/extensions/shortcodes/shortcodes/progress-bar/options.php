<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title' => array(
		'label' => esc_html__('Widget title', 'topseo'),
		'desc' => esc_html__('Enter text used as widget title (Note: located above content element).', 'topseo'),
		'type' => 'text',
	),
	'data' => array(
		'type' => 'addable-popup',
		'label' => esc_html__('Values', 'topseo'),
		'desc' => esc_html__('Enter values for graph - value, title and color.', 'topseo'),
		'template' => '{{- label}}',
		'value' => array(
			array(
				'id'    => array( 'type' => 'unique' ),
				'label' => 'One',
				'value' => 50,
				'color' => '#f4524d'
			),
			array(
				'id'    => array( 'type' => 'unique' ),
				'label' => 'Two',
				'value' => 90,
				'color' => '#5472d2'
			)
		),
		'popup-options' => array(
			'id'    => array( 'type' => 'unique' ),
			'label' => array(
				'label' => esc_html__('Label', 'topseo'),
				'desc' => esc_html__('Enter text used as title of progress bar.', 'topseo'),
				'type' => 'text',
			),
			'value' => array(
				'label' => esc_html__('Value', 'topseo'),
				'desc' => esc_html__('Enter value of progress bar.', 'topseo'),
				'type' => 'slider',
				'propertied' => array(
					'min' => 1,
					'max' => 100,
					'step' => 1
				),
				'value' => 50
			),
			'color' => array(
				'label' => esc_html__('Color', 'topseo'),
				'desc' => esc_html__('Select single progress bar background color', 'topseo'),
				'type' => 'color-picker',
				'value' => '#81d742'
			),
		),
	),
	'unit' => array(
		'label' => esc_html__('Units', 'topseo'),
		'desc' => esc_html__('Enter measurement units Example: %, px, points, etc. Note: graph value and units will be appended to graph title.', 'topseo'),
		'type' => 'short-text',
		'value' => '%'
	),
	'stripe' => array(
		'label' => false,
		'desc' => false,
		'type' => 'multi-picker',
		'picker' => array(
			'gadget' => array(
				'type' => 'switch',
				'label' => esc_html__('Enable Stripes', 'topseo'),
				'left-choice' => array(
					'label' => esc_html__('No', 'topseo'),
					'value' => 'no',
				),
				'right-choice' => array(
					'label' => esc_html__('Yes', 'topseo'),
					'value' => 'yes',
				),
				'value' => 'yes'
			),
		),
		'choices' => array(
			'no' => array(),
			'yes' => array(
				'animation' => array(
					'type' => 'switch',
					'label' => esc_html__('Enable Animation', 'topseo'),
					'left-choice' => array(
						'label' => esc_html__('No', 'topseo'),
						'value' => 'no',
					),
					'right-choice' => array(
						'label' => esc_html__('Yes', 'topseo'),
						'value' => 'yes',
					),
					'value' => 'yes'
				)
			),
		),
	),
);
