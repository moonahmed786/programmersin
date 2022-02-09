<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'id'    => array( 'type' => 'unique' ),
	'title' => array(
		'label' => esc_html__('Widget title', 'topseo'),
		'desc' => esc_html__('Enter text used as widget title (Note: located above content element).', 'topseo'),
		'type' => 'text',
	),
	'value' => array(
		'label' => esc_html__('Value', 'topseo'),
		'desc' => esc_html__('Enter value', 'topseo'),
		'type' => 'slider',
		'properties' => array(
			'min' => 1,
			'max' => 100,
			'step' => 1
		),
		'value' => 50
	),
	'unit' => array(
		'label' => esc_html__('Units', 'topseo'),
		'desc' => esc_html__('Enter measurement units (Example: %, px, points, etc. Note: graph value and units will be appended to graph title).', 'topseo'),
		'type' => 'short-text',
		'value' => '%'
	),
	'color' => array(
		'label' => esc_html__('Color', 'topseo'),
		'desc' => esc_html__('Choose color', 'topseo'),
		'type' => 'color-picker',
		'value' => '#000000'
	),
);
