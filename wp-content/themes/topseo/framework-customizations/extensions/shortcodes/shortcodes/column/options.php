<?php if (!defined('FW')) die('Forbidden');

$options = array(
	'en_animate' => array(
		'label' => false,
		'desc' => false,
		'type' => 'multi-picker',
		'picker' => array(
			'gadget' => array(
				'type' => 'switch',
				'label' => esc_html__('Enable Animate', 'topseo'),
				'left-choice' => array(
					'value' => 'no',
					'label' => esc_html__('No', 'topseo'),
				),
				'right-choice' => array(
					'value' => 'yes',
					'label' => esc_html__('Yes', 'topseo'),
				),
				'value' => 'no'
			)
		),
		'choices' => array(
			'no' => array(),
			'yes' => array(
				// animate
				'animate' => array(
					'label'   => esc_html__('Animation style', 'topseo'),
					'desc'    => esc_html__('Choose animation type. Default is not animation', 'topseo'),
					'type'    => 'select',
					'choices' => array(
			            'wow fadeInUp' => esc_html__('Fade In Up', 'topseo'),
			            'wow fadeInDown' => esc_html__('Fade In Down', 'topseo'),
			            'wow fadeInLeft' => esc_html__('Fade In Left', 'topseo'),
			            'wow fadeInRight' => esc_html__('Fade In Right', 'topseo'),
			            'wow slideInLeft' => esc_html__('Slide In Left', 'topseo'),
			            'wow slideInRight' => esc_html__('Slide In Right', 'topseo'),
			            'wow slideInUp' => esc_html__('Slide In Up', 'topseo'),
			            'wow slideInDown' => esc_html__('Slide In Down', 'topseo'),
			            'wow bounceInUp' => esc_html__('Bounce In Up', 'topseo'),
			            'wow bounceInDown' => esc_html__('Bounce In Down', 'topseo'),
			            'wow bounceInLeft' => esc_html__('Bounce In Left', 'topseo'),
			            'wow bounceInRight' => esc_html__('Bounce In Right', 'topseo'),
					),
			        'value'   => 'wow fadeInUp',
				),
				'animate_delay' => array(
					'label'   => esc_html__('Animation delay', 'topseo'),
					'desc'    => esc_html__('Set time to display Animation on scroll. Default is not delay time', 'topseo'),
					'type'    => 'select',
					'choices' => array(
			            '0.1s'   => esc_html__('0.1s', 'topseo'),
						'0.2s'   => esc_html__('0.2s', 'topseo'),
			            '0.3s'   => esc_html__('0.3s', 'topseo'),
			            '0.4s'   => esc_html__('0.4s', 'topseo'),
			            '0.5s'   => esc_html__('0.5s', 'topseo'),
			            '0.6s'   => esc_html__('0.6s', 'topseo'),
						'0.7s'   => esc_html__('0.7s', 'topseo'),
						'0.8s'   => esc_html__('0.8s', 'topseo'),
						'0.9s'   => esc_html__('0.9s', 'topseo'),
						'1s'   => esc_html__('1s', 'topseo'),
						'1.1s'   => esc_html__('1.1s', 'topseo'),
						'1.2s'   => esc_html__('1.2s', 'topseo'),
						'1.3s'   => esc_html__('1.3s', 'topseo'),
						'1.4s'   => esc_html__('1.4s', 'topseo'),
						'1.5s'   => esc_html__('1.5s', 'topseo'),
						'1.6s'   => esc_html__('1.6s', 'topseo'),
						'1.7s'   => esc_html__('1.7s', 'topseo'),
						'1.8s'   => esc_html__('1.8s', 'topseo'),
						'1.9s'   => esc_html__('1.9s', 'topseo'),
						'2s'   => esc_html__('2s', 'topseo'),
					),
			        'value'   => '0.1s',
				),
			)
		),
	),
	// background option
	'background_color' => array(
		'label' => esc_html__('Background Color', 'topseo'),
		'desc'  => esc_html__('Please select the background color', 'topseo'),
		'type'  => 'color-picker',
	),
	'background_image' => array(
		'label'   => esc_html__('Background Image', 'topseo'),
		'desc'    => esc_html__('Please select the background image', 'topseo'),
		'type'    => 'background-image',
		'choices' => array(//	in future may will set predefined images
		)
	),
	'background_repeat' => array(
		'label'   => esc_html__('Background Repeat', 'topseo'),
		'desc'    => esc_html__('Please select the background repeat', 'topseo'),
		'type'    => 'short-select',
		'choices' => array(
			'' => esc_html__('Default', 'topseo'),
			'no-repeat' => esc_html__('No Repeat', 'topseo'),
			'repeat' => esc_html__('Repeat', 'topseo'),
			'repeat-x' => esc_html__('Repeat X', 'topseo'),
			'repeat-y' => esc_html__('Repeat Y', 'topseo'),
		),
		'value' => '',
	),
	'background_size' => array(
		'label'   => esc_html__('Background Size', 'topseo'),
		'desc'    => esc_html__('Please select the background size', 'topseo'),
		'type'    => 'short-select',
		'choices' => array(
			'' => esc_html__('Default', 'topseo'),
			'cover' => esc_html__('Cover', 'topseo'),
			'contain' => esc_html__('Contain', 'topseo'),
		),
		'value' => '',
	),
	'background_position' => array(
		'label'   => esc_html__('Background Position', 'topseo'),
		'desc'    => esc_html__('Please select the background position', 'topseo'),
		'type'    => 'short-select',
		'choices' => array(
			'' => esc_html__('Default', 'topseo'),
			'top left' => esc_html__('Top and Left', 'topseo'),
			'top right' => esc_html__('Top and Right', 'topseo'),
			'top center' => esc_html__('Top and Center', 'topseo'),
			'bottom left' => esc_html__('Bottom and Left', 'topseo'),
			'bottom right' => esc_html__('Bottom and Right', 'topseo'),
			'bottom center' => esc_html__('Bottom and Center', 'topseo'),
			'center' => esc_html__('Center', 'topseo'),
		),
		'value' => '',
	),
	'background_attachment' => array(
		'label'   => esc_html__('Background Attachment', 'topseo'),
		'desc'    => esc_html__('Please select the background attachment', 'topseo'),
		'type'    => 'short-select',
		'choices' => array(
			'' => esc_html__('Default', 'topseo'),
			'fixed' => esc_html__('Fixed', 'topseo'),
			'local' => esc_html__('Local', 'topseo'),
		),
		'value' => '',
	),
);
