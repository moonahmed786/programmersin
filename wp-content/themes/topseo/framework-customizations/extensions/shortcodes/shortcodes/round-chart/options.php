<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title' => array(
		'label' => esc_html__('Widget title', 'topseo'),
		'desc' => esc_html__('Enter text used as widget title. Note: located above content element.', 'topseo'),
		'type' => 'text',
	),
	'bg' => array(
		'type' => 'color-picker',
		'value' => '#ffffff',
		'label' => esc_html__('Background Pie Chart', 'topseo'),
	),
	'width' => array(
		'type' => 'slider',
		'properties' => array(
			'min' => 1,
			'max' => 10,
			'step' => 1,
		),
		'value' => 2,
		'label' => esc_html__('Width Pie Chart', 'topseo'),
	),
	'legend' => array(
		'label' => esc_html__('Show legend', 'topseo'),
		'desc' => esc_html__('Choose Yes if you want show legend.', 'topseo'),
		'type' => 'switch',
		'left-choice' => array(
			'value' => 'no',
			'label' => esc_html__('No', 'topseo'),
		),
		'right-choice' => array(
			'value' => 'yes',
			'label' => esc_html__('Yes', 'topseo'),
		),
		'value' => 'yes'
	),
	'tt' => array(
		'label' => esc_html__('Enable tooltips', 'topseo'),
		'type' => 'switch',
		'desc' => esc_html__('Choose Yes if you want to display tooltips', 'topseo'),
		'left-choice' => array(
			'value' => 'no',
			'label' => esc_html__('No', 'topseo'),
		),
		'right-choice' => array(
			'value' => 'yes',
			'label' => esc_html__('Yes', 'topseo'),
		),
		'value' => 'yes'
	),
	'design' => array(
		'label' => esc_html__('Design', 'topseo'),
		'desc' => esc_html__('Select type of chart.', 'topseo'),
		'type' => 'short-select',
		'choices' => array(
			'pie' => esc_html__('Pie', 'topseo'),
			'doughnut' => esc_html__('Doughnut', 'topseo'),
		),
		'value' => 'pie',
	),
	'animation' => array(
		'label' => esc_html__('Animation', 'topseo'),
		'desc' => esc_html__('Select animation style.', 'topseo'),
		'type' => 'short-select',
		'choices' => array(
			'easeOutBounce' => esc_html__('Bounce', 'topseo'),
			'easeOutElastic' => esc_html__('Elastic', 'topseo'),
			'easeInOutBack' => esc_html__('Back', 'topseo'),
			'easeinOutCubic' => esc_html__('Cubic', 'topseo'),
			'easeOutQuint' => esc_html__('Quint', 'topseo'),
			'easeOutQuart' => esc_html__('Quart', 'topseo'),
			'easeOutQuad' => esc_html__('Quad', 'topseo'),
			'easeInOutSine' => esc_html__('Sine', 'topseo'),
		),
		'value' => 'easeinOutCubic',
	),
	'data' => array(
		'type' => 'addable-popup',
		'label' => esc_html__('Round Chart', 'topseo'),
		'desc' => esc_html__('Add your Options', 'topseo'),
		'template' => '{{- label}}',
		'value' => array(
			array(
				'label' => 'One',
				'value' => 80,
				'sbg' => '#f4524d',
				'highlight' => '#5472d2'
			),
			array(
				'label' => 'Two',
				'value' => 50,
				'sbg' => '#ff9900',
				'highlight' => '#ff0000'
			)
		),
		'popup-options' => array(
			'label' => array(
				'label' => esc_html__('Label', 'topseo'),
				'desc' => esc_html__('Write some text', 'topseo'),
				'type' => 'text',
			),
			'value' => array(
				'label' => esc_html__('Value', 'topseo'),
				'desc' => esc_html__('Write some text', 'topseo'),
				'type' => 'short-text',
				'value' => 50
			),
			'sbg' => array(
				'label' => esc_html__('Background', 'topseo'),
				'type' => 'color-picker',
				'value' => '#ff0000'
			),
			'highlight' => array(
				'label' => esc_html__('Highlight', 'topseo'),
				'type' => 'color-picker',
				'value' => '#ff9900'
			),
		),
	),
);
