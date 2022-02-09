<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'checkbox' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc' => false,
		'picker' => array(
			'gadget' => array(
				'type'    => 'switch',
				'left-choice' => array(
					'value'  => 'no',
					'label' => esc_html__( 'No', 'topseo' ),
				),
				'right-choice' => array(
					'value'  => 'yes',
					'label' => esc_html__( 'Yes', 'topseo' ),
				),
				'value' => 'no',
				'label' => esc_html__('Pricing Popular', 'topseo'),
				'desc' => esc_html__('Check it to display special item', 'topseo'),
			),
		),
		'choices' => array(
			'no' => array(),
			'yes' => array(
				'popular' => array(
					'type' => 'text',
					'label' => esc_html__('Popular text', 'topseo'),
					'desc' => esc_html__('Write some text', 'topseo'),
				),
				'highlight' => array(
					'type' => 'checkbox',
					'value' => false,
					'label' => esc_html__('Hightlight', 'topseo'),
					'desc' => esc_html__('Tick a box if you want highlight this Item', 'topseo'),
				),
			),
		),
	),
	'image' => array(
		'label' => esc_html__( 'Pricing Image', 'topseo' ),
		'desc'  => esc_html__( 'Choose image', 'topseo' ),
		'type'  => 'upload'
	),
	'name'  => array(
		'label' => esc_html__( 'Pricing Name', 'topseo' ),
		'desc'  => esc_html__( 'Write some text', 'topseo' ),
		'type'  => 'text',
	),
	'price'   => array(
		'label' => esc_html__( 'Pricing Price', 'topseo' ),
		'desc'  => esc_html__( 'Write some text', 'topseo' ),
		'type'  => 'text',
	),
	'time'   => array(
		'label' => esc_html__( 'Pricing Time', 'topseo' ),
		'desc'  => esc_html__( 'Write some text', 'topseo' ),
		'type'  => 'text',
	),
	'content'  => array(
		'label' => esc_html__( 'Pricing Content', 'topseo' ),
		'type'  => 'addable-popup',
		'template' => '{{- textbox}}',
		'popup-options' => array(
			'textbox' => array(
				'type' => 'text',
				'label' => esc_html__('Add Pricing item', 'topseo'),
				'desc' => esc_html__('Write some text', 'topseo'),
			),
		),
	),
	'label' => array(
		'type' => 'text',
		'label' => esc_html__('Button label', 'topseo'),
		'desc' => esc_html__('Write some text', 'topseo'),
	),
	'link' => array(
		'type' => 'text',
		'value' => '#',
		'label' => esc_html__('Button link', 'topseo'),
		'desc' => esc_html__('Write some text', 'topseo'),
	),
);