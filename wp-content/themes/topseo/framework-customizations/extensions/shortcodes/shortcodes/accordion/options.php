<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'acc' => array(
		'label' => false,
		'desc' => false,
		'type' => 'multi-picker',
		'picker' => array(
			'gadget' => array(
				'label' => esc_html__('Style', 'topseo'),
				'type' => 'select',
				'choices' => array(
					'a1' => esc_html__('Normal Accordion', 'topseo'),
					'a2' => esc_html__('Accordion with Icon', 'topseo'),
					'a3' => esc_html__('Accordion with Image', 'topseo'),
					'a4' => esc_html__('Accordion with Transparent tabs', 'topseo'),
				),
				'value' => 'a1',
				'desc' => esc_html__('Choose style', 'topseo'),
			)
		),
		'choices' => array(
			'a1' => array(
				'a1_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Content', 'topseo'),
					'desc' => esc_html__('Add your Accordion', 'topseo'),
					'template' => '{{- a1_title}}',
					'popup-options' => array(
						'a1_title'  => array(
							'label' => esc_html__( 'Title', 'topseo' ),
							'desc'  => esc_html__( 'Write some text', 'topseo' ),
							'type'  => 'text',
						),
						'a1_content'  => array(
							'label' => esc_html__( 'Content', 'topseo' ),
							'desc'  => esc_html__( 'Write some text', 'topseo' ),
							'type'  => 'wp-editor',
						),
					),
				),
			),
			'a2' => array(
				'a2_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Content', 'topseo'),
					'desc' => esc_html__('Add your Accordion', 'topseo'),
					'template' => '{{- a2_title}}',
					'popup-options' => array(
						'a2_icon'  => array(
							'label' => esc_html__( 'Icon', 'topseo' ),
							'desc'  => esc_html__( 'Choose Icon', 'topseo' ),
							'type'  => 'icon',
							'set' => 'ionicon',
						),
						'a2_title'  => array(
							'label' => esc_html__( 'Title', 'topseo' ),
							'desc'  => esc_html__( 'Write some text', 'topseo' ),
							'type'  => 'text',
						),
						'a2_content'  => array(
							'label' => esc_html__( 'Content', 'topseo' ),
							'desc'  => esc_html__( 'Write some text', 'topseo' ),
							'type'  => 'wp-editor',
						)
					),
				),
			),
			'a3' => array(
				'a3_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Content', 'topseo'),
					'desc' => esc_html__('Add your Accordion', 'topseo'),
					'template' => '{{- a3_title}}',
					'popup-options' => array(
						'a3_icon'  => array(
							'label' => esc_html__( 'Image', 'topseo' ),
							'desc'  => esc_html__( 'Choose Image', 'topseo' ),
							'type'  => 'upload',
						),
						'a3_title'  => array(
							'label' => esc_html__( 'Title', 'topseo' ),
							'desc'  => esc_html__( 'Write some text', 'topseo' ),
							'type'  => 'text',
						),
						'a3_content'  => array(
							'label' => esc_html__( 'Content', 'topseo' ),
							'desc'  => esc_html__( 'Write some text', 'topseo' ),
							'type'  => 'wp-editor',
						)
					),
				),
			),
			'a4' => array(				
				'a4_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Content', 'topseo'),
					'desc' => esc_html__('Add your Accordion', 'topseo'),
					'template' => '{{- a4_title}}',
					'popup-options' => array(
						'a4_icon'  => array(
							'label' => esc_html__( 'Icon', 'topseo' ),
							'desc'  => esc_html__( 'Choose Icon', 'topseo' ),
							'type'  => 'icon',
							'set' => 'ionicon',
						),
						'a4_title'  => array(
							'label' => esc_html__( 'Title', 'topseo' ),
							'desc'  => esc_html__( 'Write some text', 'topseo' ),
							'type'  => 'text',
						),
						'a4_content'  => array(
							'label' => esc_html__( 'Content', 'topseo' ),
							'desc'  => esc_html__( 'Write some text', 'topseo' ),
							'type'  => 'wp-editor',
						),
					),
				),
			),
		),
	),
	'ac_active' => array(
		'label' => esc_html__('Active Accordion', 'topseo'),
		'type' => 'short-text',
		'desc' => 'Set the accordion that is open by default', 'topseo',
		'value' => 1
	)
);