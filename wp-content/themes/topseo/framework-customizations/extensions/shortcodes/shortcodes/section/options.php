<?php if (!defined('FW')) {
	die('Forbidden');
}

$options = array(
	'is_fullwidth' => array(
		'label'        => esc_html__('Full Width', 'topseo'),
		'type'         => 'switch',
	),
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
	'video' => array(
		'label' => esc_html__('Background Video', 'topseo'),
		'desc'  => esc_html__('Insert Video URL to embed this video', 'topseo'),
		'type'  => 'text',
	),
	'id' => array(
		'label' => esc_html__('Custom id for Section', 'topseo'),
		'desc'  => esc_html__('Write some text', 'topseo'),
		'type'  => 'short-text',
		'value' => ''
	),
	'sec_class' => array(
		'label' => esc_html__('Custom Class for Section', 'topseo'),
		'desc'  => esc_html__('Write some text', 'topseo'),
		'type'  => 'short-text',
		'value' => ''
	),
);
