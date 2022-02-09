<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'list' => array(
		'label' => false,
		'desc' => false,
		'type' => 'multi-picker',
		'picker' => array(
			'gadget' => array(
				'type' => 'select',
				'label' => esc_html__('Style', 'topseo'),
				'desc' => esc_html__('Choose style', 'topseo'),
				'choices' => array(
					'l1' => esc_html__('Default', 'topseo'),
					'l2' => esc_html__('Lists with Icon', 'topseo'),
					'l3' => esc_html__('Lists with order number', 'topseo'),
					'l4' => esc_html__('Lists with Icon and background transparent', 'topseo'),
				),
			),
		),
		'choices' => array(
			'l1' => array(
				'l1_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Lists', 'topseo'),
					'template' => '{{- l1_title}}',
					'popup-options' => array(
						'l1_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
					),
				),
			),
			'l2' => array(
				'l2_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Lists', 'topseo'),
					'template' => '{{- l2_title}}',
					'popup-options' => array(
						'l2_icon' => array(
							'type' => 'icon',
							'set' => 'ionicon',
							'label' => esc_html__('Icon', 'topseo'),
							'desc' => esc_html__('Choose Icon', 'topseo'),
						),
						'l2_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
					),
				),
			),
			'l3' => array(
				'l3_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Lists', 'topseo'),
					'template' => '{{- l3_title}}',
					'popup-options' => array(
						'l3_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
					),
				),
			),
			'l4' => array(
				'l4_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Lists', 'topseo'),
					'template' => '{{- l4_title}}',
					'popup-options' => array(
						'l4_icon' => array(
							'type' => 'icon',
							'set' => 'ionicon',
							'label' => esc_html__('Icon', 'topseo'),
							'desc' => esc_html__('Choose Icon', 'topseo'),
						),
						'l4_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
					),
				),
			),
		),
	),
);
