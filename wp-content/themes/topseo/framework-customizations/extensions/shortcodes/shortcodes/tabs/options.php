<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'tab' => array(
		'label' => false,
		'desc' => false,
		'type' => 'multi-picker',
		'picker' => array(
			'gadget' => array(
				'type' => 'select',
				'label' => esc_html__('Style', 'topseo'),
				'desc' => esc_html__('Choose style', 'topseo'),
				'choices' => array(
					't1' => esc_html__('Horizontal Tab', 'topseo'),
					't2' => esc_html__('Horizontal Tab with Icon', 'topseo'),
					't3' => esc_html__('Tab with center filter and border', 'topseo'),
					't4' => esc_html__('Tab with center filter', 'topseo'),
					't5' => esc_html__('Horizontal Tab with filter border and Icon', 'topseo'),
					't6' => esc_html__('Horizontal Tab with filter border', 'topseo'),
					't7' => esc_html__('Vertical Tab with filter border and Icon', 'topseo'),
					't8' => esc_html__('Vertical Tab with filter border', 'topseo'),
					't9' => esc_html__('Tab filter center with image', 'topseo'),
				),
			),
		),
		'choices' => array(
			't1' => array(
				't1_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Tabs', 'topseo'),
					'template' => '{{- t1_title}}',
					'popup-options' => array(
						't1_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
						't1_content' => array(
							'type' => 'wp-editor',
							'label' => esc_html__('Content', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
							'shortcodes' => true
						),
					),
				),
			),
			't2' => array(
				't2_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Tabs', 'topseo'),
					'template' => '{{- t2_title}}',
					'popup-options' => array(
						't2_icon' => array(
							'type' => 'icon',
							'set' => 'ionicon',
							'desc' => esc_html__('Choose Icon', 'topseo'),
							'label' => esc_html__('Icon', 'topseo'),
						),
						't2_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
						't2_content' => array(
							'type' => 'wp-editor',
							'label' => esc_html__('Content', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
							'shortcodes' => true
						),
					),
				),
			),
			't3' => array(
				't3_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Tabs', 'topseo'),
					'template' => '{{- t3_title}}',					
					'popup-options' => array(
						't3_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
						't3_content' => array(
							'type'  => 'wp-editor',
							'size' => 'large', // small, large
							'editor_height' => 400,
							'label' => esc_html__('Content', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
							'shortcodes' => true
						),
					),
				),
			),
			't4' => array(
				't4_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Tabs', 'topseo'),
					'template' => '{{- t4_title}}',
					'popup-options' => array(
						't4_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
						't4_content' => array(
							'type' => 'wp-editor',
							'label' => esc_html__('Content', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
							'shortcodes' => true
						),
					),
				),
			),
			't5' => array(
				't5_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Tabs', 'topseo'),
					'template' => '{{- t5_title}}',
					'popup-options' => array(
						't5_icon' => array(
							'type' => 'icon',
							'set' => 'ionicon',
							'desc' => esc_html__('Choose Icon', 'topseo'),
							'label' => esc_html__('Icon', 'topseo'),
						),
						't5_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
						't5_content' => array(
							'type' => 'wp-editor',
							'label' => esc_html__('Content', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
							'shortcodes' => true
						),
					),
				),
			),
			't6' => array(
				't6_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Tabs', 'topseo'),
					'template' => '{{- t6_title}}',
					'popup-options' => array(
						't6_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
						't6_content' => array(
							'type' => 'wp-editor',
							'label' => esc_html__('Content', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
							'shortcodes' => true
						),
					),
				),
			),
			't7' => array(
				't7_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Tabs', 'topseo'),
					'template' => '{{- t7_title}}',
					'popup-options' => array(
						't7_icon' => array(
							'type' => 'icon',
							'set' => 'ionicon',
							'desc' => esc_html__('Choose Icon', 'topseo'),
							'label' => esc_html__('Icon', 'topseo'),
						),
						't7_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
						't7_content' => array(
							'type' => 'wp-editor',
							'label' => esc_html__('Content', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
							'shortcodes' => true
						),
					),
				),
			),
			't8' => array(
				't8_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Tabs', 'topseo'),
					'template' => '{{- t8_title}}',
					'popup-options' => array(
						't8_title' => array(
							'type' => 'text',
							'label' => esc_html__('Title', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
						),
						't8_content' => array(
							'type' => 'wp-editor',
							'label' => esc_html__('Content', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
							'shortcodes' => true
						),
					),
				),
			),
			't9' => array(
				't9_ops' => array(
					'type' => 'addable-popup',
					'label' => esc_html__('Options', 'topseo'),
					'desc' => esc_html__('Add your Tabs', 'topseo'),
					'template' => 'Section',
					'popup-options' => array(
						't9_image' => array(
							'type' => 'upload',
							'label' => esc_html__('Image', 'topseo'),
							'desc' => esc_html__('Choose image', 'topseo'),
						),
						't9_content' => array(
							'type' => 'wp-editor',
							'label' => esc_html__('Content', 'topseo'),
							'desc' => esc_html__('Write some text', 'topseo'),
							'shortcodes' => true
						),
					),
				),
			),
		),
	),
);
