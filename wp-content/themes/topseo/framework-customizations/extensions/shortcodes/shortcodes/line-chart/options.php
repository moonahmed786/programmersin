<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'title' => array(
		'label' => esc_html__('Widget title', 'topseo'),
		'desc' => esc_html__('Enter text used as widget title. Note: located above content element.', 'topseo'),
		'type' => 'text',
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
			'bar' => esc_html__('Bar', 'topseo'),
			'line' => esc_html__('Line', 'topseo'),
		),
		'value' => 'bar',
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
	'values' => array(
		'label' => esc_html__('X-axis values', 'topseo'),
		'desc' => esc_html__('Enter values (Note: separate values with ";").', 'topseo'),
		'type' => 'text',
		'value' => 'JAN; FEB; MAR; APR; MAY',
	),
	'data' => array(
		'type' => 'addable-popup',
		'label' => esc_html__('Line Chart', 'topseo'),
		'desc' => esc_html__('Add your Options', 'topseo'),
		'template' => '{{- label}}',
		'value' => array(
	        array(
	            'label' => 'One',
	            'value' => '20;30;40;50;60',
	            'color' => '#f4524d'
	        ),
	        array(
	            'label' => 'Two',
	            'value' => '30;40;50;60;70',
	            'color' => '#5472d2'
	        ),
	    ),
		'popup-options' => array(
			'label' => array(
				'label' => esc_html__('Title', 'topseo'),
				'desc' => esc_html__('Enter title for chart dataset.', 'topseo'),
				'type' => 'text',
			),
			'value' => array(
				'label' => esc_html__('Y-axis values', 'topseo'),
				'desc' => esc_html__('Enter values (Note: separate values with ";").', 'topseo'),
				'type' => 'text',
			),
			'color' => array(
				'label' => esc_html__('Color', 'topseo'),
				'desc' => esc_html__('Choose color', 'topseo'),
				'type' => 'color-picker',
				'value' => '#F4524D'
			),
		),
	),
);
