<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$map_shortcode = fw_ext('shortcodes')->get_shortcode('map');
$options = array(
	'data_provider' => array(
		'type'  => 'multi-picker',
		'label' => false,
		'desc'  => false,
		'picker' => array(
			'population_method' => array(
				'label'   => esc_html__('Population Method', 'topseo'),
				'desc'    => esc_html__( 'Select map population method (Ex: events, custom)', 'topseo' ),
				'type'    => 'select',
				'choices' => $map_shortcode->_get_picker_dropdown_choices(),
			)
		),
		'choices' => $map_shortcode->_get_picker_choices(),
		'show_borders' => false,
	),
	'gmap-key' => array_merge(
		array(
			'label' => esc_html__( 'Goolge Maps API Key', 'topseo' ),
			'value' => 'AIzaSyBvduZSoG1sba2oA1mJmq2vVuPRZ0QWp8o'
		),
		version_compare(fw()->manifest->get_version(), '2.5.7', '>=')
		? array(
			'type' => 'gmap-key',
		)
		: array(
			'type' => 'text',
			'fw-storage' => array(
				'type'      => 'wp-option',
				'wp_option' => 'fw-option-types:gmap-key',
			),
		)
	),
	'map_type' => array(
		'type'  => 'select',
		'label' => esc_html__('Map Type', 'topseo'),
		'desc'  => esc_html__('Select map type', 'topseo'),
		'choices' => array(
			'roadmap'   => esc_html__('Roadmap', 'topseo'),
			'terrain' => esc_html__('Terrain', 'topseo'),
			'satellite' => esc_html__('Satellite', 'topseo'),
			'hybrid'    => esc_html__('Hybrid', 'topseo')
		)
	),
	'map_height' => array(
		'label' => esc_html__('Map Height', 'topseo'),
		'desc'  => esc_html__('Set map height (Ex: 300)', 'topseo'),
		'type'  => 'text'
	),
	'style' => array(
		'label' => esc_html__('Style Map', 'topseo'),
		'desc'  => esc_html__('Set Style Map', 'topseo'),
		'type'  => 'textarea'
	),
	'disable_scrolling' => array(
		'type'  => 'switch',
		'value' => false,
		'label' => esc_html__('Disable zoom on scroll', 'topseo'),
		'desc'  => esc_html__('Prevent the map from zooming when scrolling until clicking on the map', 'topseo'),
		'left-choice' => array(
			'value' => false,
			'label' => esc_html__('Yes', 'topseo'),
		),
		'right-choice' => array(
			'value' => true,
			'label' => esc_html__('No', 'topseo'),
		),
	),
);