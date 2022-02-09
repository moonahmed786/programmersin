<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'    => array( 'type' => 'unique' ), // generate unique id of shortcode\
	'size' => array(
		'label' => esc_html__('Button Size', 'topseo'),
		'type' => 'short-select',
		'choices' => array(
			'ht-btn-small' => esc_html__('Small', 'topseo'),
			'ht-btn-normal' => esc_html__('Normal', 'topseo'),
			'ht-btn-large' => esc_html__('Large', 'topseo'),
		),
		'value' => 'ht-btn-normal',
	),
	'align' => array(
		'type' => 'short-select',
		'label' => esc_html__('Button position', 'topseo'),
		'choices' => array(
			'text-left' => esc_html__('Left', 'topseo'),
			'text-center' => esc_html__('Center', 'topseo'),
			'text-right' => esc_html__('Right', 'topseo'),
		),
		'value' => 'text-center',
		'desc' => esc_html__('Set position', 'topseo'),
	),
	'icon' => array(
		'label' => false,
		'desc' => false,
		'type' => 'multi-picker',
		'picker' => array(
			'gadget' => array(
				'label' => esc_html__('Button Icon', 'topseo'),
				'type' => 'switch',
				'right-choice' => array(
					'label' => esc_html__('Yes', 'topseo'),
					'value' => 'yes'
				),
				'left-choice' => array(
					'label' => esc_html__('No', 'topseo'),
					'value' => 'no'
				),
				'value' => 'no',
				'desc'  => esc_html__( 'Custom icon of button.', 'topseo' ),
			)
		),
		'choices' => array(
			'yes' => array(
				'icon' => array(
					'type'  => 'icon-v2',
					'label'   => esc_html__( 'Icon', 'topseo' ),
					'desc'    => esc_html__( 'Choose an Icon', 'topseo' ),
					'modal_size' => 'large',
					'preview_size' => 'sauron',
				),
				'icon_position' => array(
					'label' => esc_html__('Icon position', 'topseo'),
					'desc' => esc_html__('Set position', 'topseo'),
					'type' => 'short-select',
					'choices' => array(
						'left' => esc_html__('Left', 'topseo'),
						'right' => esc_html__('Right', 'topseo'),
					),
					'value' => 'left',
				),
			),
			'no' => array(),
		),
	),
	'border' => array(
		'label' => false,
		'desc' => false,
		'type' => 'multi-picker',
		'picker' => array(
			'gadget' => array(
				'label' => esc_html__('Button Border', 'topseo'),
				'type' => 'switch',
				'right-choice' => array(
					'label' => esc_html__('Yes', 'topseo'),
					'value' => 'yes'
				),
				'left-choice' => array(
					'label' => esc_html__('No', 'topseo'),
					'value' => 'no'
				),
				'value' => 'no',
				'desc'  => esc_html__( 'Custom border of button.', 'topseo' ),
			)
		),
		'choices' => array(
			'yes' => array(
				'border_style' => array(
					'type'  => 'short-select',
					'label'   => esc_html__( 'Border style', 'topseo' ),
					'desc'    => esc_html__( 'Choose border style', 'topseo' ),
					'choices' => array(
						'solid' => esc_html__('Solid', 'topseo'),
						'dotted' => esc_html__('Dotted', 'topseo'),
						'dashed' => esc_html__('Dashed', 'topseo'),
						'double' => esc_html__('Double', 'topseo'),
						'groove' => esc_html__('Groove', 'topseo'),
						'ridge' => esc_html__('Ridge', 'topseo'),
						'inset' => esc_html__('Inset', 'topseo'),
						'outset' => esc_html__('Outset', 'topseo'),
						'hidden' => esc_html__('Hidden', 'topseo'),
					),
					'value' => 'solid',
				),
				'border_width' => array(
					'type'  => 'slider',
					'label'   => esc_html__( 'Border width', 'topseo' ),
					'properties' => array(
						'min' => 1,
						'max' => 20,
						'step' => 1,
					),
					'value' => 5,
				),
				'border_color' => array(
					'type'  => 'color-picker',
					'label'   => esc_html__( 'Border color', 'topseo' ),
					'desc'    => esc_html__('Choose color', 'topseo'),
					'value' => '#ffffff',
				),
				'border_hover' => array(
					'type'  => 'color-picker',
					'label'   => esc_html__( 'Border hover color', 'topseo' ),
					'desc'    => esc_html__('Choose color', 'topseo'),
					'value' => '#232323',
				),
			),
			'no' => array(),
		),
	),
	'style' => array(
		'type'         => 'multi-picker',
		'label'        => false,
		'desc'         => false,
		'picker'       => array(
			'gadget' => array(
				'label'        => esc_html__( 'Custom Style', 'topseo' ),
				'type'         => 'switch',
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__( 'Yes', 'topseo' )
				),
				'left-choice'  => array(
					'value' => 'no',
					'label' => esc_html__( 'No', 'topseo' )
				),
				'value'        => 'no',
				'desc'         => esc_html__( 'Custom all styles of button.','topseo' ),
			)
		),
		'choices'      => array(
			'yes'  => array(
				'text_color'              => array(
					'label' => esc_html__( 'Text color', 'topseo' ),
					'type'  => 'color-picker',
					'value' => '#27ae61',
				),
				'bg_color'              => array(
					'label' => esc_html__( 'Background color', 'topseo' ),
					'type'  => 'rgba-color-picker',
					'value' => '#ffffff',
				),
				'text_hover'              => array(
					'label' => esc_html__( 'Text Hover', 'topseo' ),
					'type'  => 'color-picker',
					'value' => '#ffffff',
				),
				'bg_hover'              => array(
					'label' => esc_html__( 'Background Hover', 'topseo' ),
					'type'  => 'rgba-color-picker',
					'value' => '#27ae61',
				),
			),
			'no' => array(
			),
		),
		'show_borders' => false,
	),
	'label'  => array(
		'label' => esc_html__( 'Button Label', 'topseo' ),
		'desc'  => esc_html__( 'This is the text that appears on your button', 'topseo' ),
		'type'  => 'text',
		'value' => 'This is Button'
	),
	'link'   => array(
		'label' => esc_html__( 'Button Link', 'topseo' ),
		'desc'  => esc_html__( 'Where should your button link to', 'topseo' ),
		'type'  => 'text',
		'value' => '#'
	),
	'target' => array(
		'type'  => 'switch',
		'label'   => esc_html__( 'Open Link in New Window', 'topseo' ),
		'desc'    => esc_html__( 'Select here if you want to open the linked page in a new window', 'topseo' ),
		'right-choice' => array(
			'value' => '_blank',
			'label' => esc_html__('Yes', 'topseo'),
		),
		'left-choice' => array(
			'value' => '_self',
			'label' => esc_html__('No', 'topseo'),
		),
	),
);
